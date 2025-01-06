<?php

namespace App\Http\Controllers;

use App\Events\PostViewedEvent;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;
use App\Traits\FileUpload;

use Illuminate\Support\Str;

class PostController extends Controller
{
    use FileUpload;

    public function index()
    {
        $posts = Post::query()
            ->orderBy('published_at', 'desc')
            ->where('published', true)
            ->paginate(5);

        foreach ($posts as $post) {
            $post->content = Str::limit(strip_tags($post->content), 150); // ограничить количество выводимых символов, удалить HTML
        }

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        if ($post->published) {
            event(new PostViewedEvent($post)); // событие на просмотр статьи
            return view('posts.show', compact('post'));

        } else {
            abort(404); // если недоступен 404
        }
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(StoreRequest $request, Post $post)
    {
        $image_path = $this->uploadFile($request->file('image'), "images");

        Post::query()->create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'tag' => $request->input('tag'),
            'image' => $image_path ?? null,
            'published_at' => now(),
            'author_id' => auth()->user()->id,
        ]);

        return redirect()->route('home');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(StoreRequest $request, Post $post)
    {
        $image_path = $this->uploadFile($request->file('image'), 'images');

        // @TODO: Поправить удаление
        if ($request->input('delete_image') && $post->image) {
            $this->deleteFile($post->image); // удаление старого изображения
            $image_path = '';
        }

        Post::where('id', $post->id)->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'tag' => $request->input('tag'),
            'image' => $image_path ?? $post->image,
        ]);

        return redirect()->route('home');
    }
}
