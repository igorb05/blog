<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\SearchRequest;
use Illuminate\Support\Str;
use App\Models\Post;

class SearchController extends Controller
{
    public function index(SearchRequest $request)
    {
        $query = Post::query()
            ->orderBy('published_at', 'desc')
            ->where('published', true);

        if ($search = $request->search) {
            $query->where('title', 'like', "%{$search}%")
                ->orWhere('content', 'like', "%{$search}%")
                ->orWhere('tag', 'like', "%{$search}%");
        }

        $posts = $query->paginate(5);

        foreach ($posts as $post) {
            $post->content = Str::limit(strip_tags($post->content), 150);
        }

        $result_search = true;

        return view('posts.index', compact(['posts', 'result_search']));
    }
}
