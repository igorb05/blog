<x-layouts.base>
    <x-container>

        @include('includes.search')

        {{-- Вывод статей --}}
        <div class="flex flex-col justify-stretch gap-x-5 lg:flex-row">
            <div>
                @if(count($posts) === 0)
                    <p>Пока ничего не нашлось... <a class="text-indigo-400 underline" href="{{ route('home') }}">на главную</a></p>
                @else
                    @foreach($posts as $post)
                        <x-post.card main_page>
                            <div class="flex justify-between items-center">
                                <p class="px-2 py-1 bg-indigo-100 text-indigo-400 rounded-lg hover:bg-indigo-200 text-sm">
                                    {{ $post->tag }}
                                </p>
                                <span class="font-light text-sm text-neutral-400 sm:text-base">
                                    {{ $post->published_at->format('d.m.Y H:i') }}
                                </span>
                            </div>
                            <div class="mt-2">
                                <a class="text-xl font-bold hover:underline sm:text-2xl"
                                   href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a>
                                <p class="text-base text-neutral-400 mt-2">
                                    {!! $post->content !!}
                                </p>
                            </div>
                        </x-post.card>
                    @endforeach
                    {{ $posts->links('posts.pagination') }}
                @endif
            </div>

            {{-- Блок популярных статей --}}
            @unless($result_search ?? null)
                @include('includes.popular')
            @endunless
        </div>

    </x-container>
</x-layouts.base>


