<div class="popular ml-0 max-w-2xl lg:ml-3">
    <div class="text-xl mt-6 font-bold mb-6 lg:mt-0">Популярные статьи</div>
    @foreach(App\Models\Post::all()->sortByDesc('views')->take(3) as $post)
        <div class="card flex flex-col mt-2 border-b pb-2">
            <a class="text-base hover:underline"
               href="{{ route('posts.show', $post->slug) }}">{{ Str::limit($post->title, 35) }}</a>
            <span
                class="font-light text-sm text-neutral-400">{{ $post->published_at->format('d.m.Y') }}</span>
        </div>
    @endforeach
</div>
