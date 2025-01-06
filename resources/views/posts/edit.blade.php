<x-layouts.base>
    <x-container>
        <x-settings.title>
            <x-slot:title>Редактирование поста</x-slot:title>
            <x-slot:description>Здесь Вы можете обновить пост... или нет? Как захотите :)</x-slot:description>
        </x-settings.title>
        <x-form action="{{ route('posts.update', $post->id) }}" method="PUT" enctype="multipart/form-data">
            <div class="flex gap-3">
                <x-form.item class="w-1/2">
                    <x-form.input name="title" type="title" value="{{ $post->title }}" placeholder="Заголовок поста..." required/>
                </x-form.item>

                <x-form.item class="w-1/2">
                    <x-form.input name="tag" type="tag" value="{{ $post->tag }}" placeholder="Тема / тэг поста" required/>
                </x-form.item>
            </div>

            {{-- Trix Editor --}}
            <x-trix.input name="content" type="hidden" value="{!! $post->content !!}" required />
            <x-trix.editor />
            <x-form.error name="content"/>

            <div class="flex justify-between">
                <x-form.item class="w-1/4">
                    <x-form.input name="image" id="file_input" type="file"/>
                    <div class="mt-1 text-sm text-gray-500" id="file_input_help">
                        {{ $post->image ? 'Для обновления обложки загрузите новое изображение PNG, JPG, JPEG' : 'Загрузить обложку? PNG, JPG, JPEG' }}

                        @if($post->image)
                            <div class="flex items-center mt-1">
                                <input id="delete" type="checkbox" name="delete_image"
                                       class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                                <label  class="ms-2 text-sm text-gray-500">Удалить текущую?</label>
                            </div>
                        @endif
                    </div>
                    <x-form.error name="image"/>
                </x-form.item>

                <x-form.item>
                    <x-button type="submit" submit_button>Запостить</x-button>
                </x-form.item>
            </div>
        </x-form>
    </x-container>
</x-layouts.base>
