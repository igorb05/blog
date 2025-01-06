<x-layouts.base>
    <x-container>

        @if($post->image)
            <img class="w-full max-h-80 object-cover rounded-lg mb-5"
                 src="{{ asset(file_url($post->image)) }}"
                 alt="Обложка статьи – {{ $post->title }}">
        @endif

        <x-post.card show_page>
            <div class="flex justify-between items-center">
                <span class="flex font-light text-sm text-stone-600 gap-3">
                    {{ $post->published_at->format('d.m.Y H:i') }}
                    <div class="flex items-center gap-1">
                        <img src="{{ asset('images/icons/views.svg') }}" alt="Иконка просмотров" width="14px" height="14px">
                        {{ $post->views }}
                    </div>
                </span>
                <p class="px-2 py-1 bg-indigo-100 text-sm text-indigo-400 rounded-lg hover:bg-indigo-200">{{ $post->tag }}</p>
            </div>
            <div class="mt-2">
                <h1 class="relative text-xl font-bold max-w-max sm:text-2xl">{{ $post->title }}
                    @auth
                        @if(\App\Models\Post::where('author_id', auth()->user()->id)->where('id', $post->id)->first())
                            <a href="{{ route('posts.edit', $post->id) }}" class="absolute -right-8 top-1"
                               title="Редактировать пост">
                                <img src="{{ asset('images/icons/pencil.svg') }}" alt="Редактировать публикацию" width="24px" height="24px">
                            </a>
                        @endif
                    @endauth
                </h1>
                <div class="mt-2">{!! $post->content !!}</div>
            </div>
            <x-post.author>
                {{ \App\Models\User::find($post->author_id)->name }}
            </x-post.author>
        </x-post.card>

        @include('includes.discuss')

    </x-container>
</x-layouts.base>

