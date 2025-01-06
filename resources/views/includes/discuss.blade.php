@php
    use Carbon\Carbon;
    use App\Models\User;

    Carbon::setlocale(config('app.locale'));

    $post_id = Illuminate\Support\Facades\Route::current()->parameter('post.id'); // получаем текущий id поста
    $comments = App\Models\Comment::where('post_id', $post_id)->orderBy('published_at', 'desc')->get();
@endphp

<div class="my-5">
    <x-form action="{{ route('posts.comment.store') }}" method="POST">
        <div class="w-full mb-4 rounded-[20px] bg-indigo-100">
            <div class="px-10 py-3 bg-white rounded-t-[20px]">
                <label for="text" class="sr-only">Комментарий</label>
                <textarea id="text" name="text" rows="4" class="w-full px-0 text-black bg-white border-0 max-h-20 focus:outline-none" placeholder="Комментарий..." required></textarea>
                <input name="post_id" class="hidden" value="{{ Route::current()->parameter('post.id') }}" />
            </div>
            <div class="flex items-center justify-between px-10 py-3">
                <button type="submit" class="inline-flex items-center py-2.5 px-4 font-medium text-center text-white bg-indigo-500 rounded-lg hover:indigo-400">
                    Оставить комментарий
                </button>
            </div>
        </div>
    </x-form>
</div>

@if(count($comments))
    @foreach($comments as $comment)

        @php
            $name = User::find($comment->author_id)->name; // автор
            $date = Carbon::parse($comment->published_at)->translatedFormat('d M Y г. H:i'); // переводим названия месяцев на рус. формат
            $text = $comment->text; // комментарий
        @endphp

        <div class="flex flex-col mb-3 bg-white rounded-[20px] px-5 py-3 sm:px-10 sm:py-6">
            <div class="flex flex-row gap-4 items-center text-sm">
                <div class="px-2 py-1 text-indigo-400 bg-indigo-100 rounded-lg">
                    {{ $name }}
                </div>
                <div class="font-light text-neutral-400">
                    {{ $date }}
                </div>
            </div>
            <div class="mt-2">
                {{ $text }}
            </div>
        </div>
    @endforeach
@else
    <div class="flex justify-center bg-white rounded-[20px] text-indigo-400 px-10 py-6">
        <div class="mt-2">
            Здесь пока тихо...
        </div>
    </div>
@endif
