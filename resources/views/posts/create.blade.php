<x-layouts.base>
    <x-container>

        <x-settings.title>
            <x-slot:title>Создать пост</x-slot:title>
            <x-slot:description>Напишите о том, что хотите поведать миру</x-slot:description>
        </x-settings.title>

        <x-form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            <div class="flex flex-col gap-unset sm:flex-row sm:gap-3">
                <x-form.item class="w-full sm:w-1/2">
                    <x-form.input name="title" type="title" placeholder="Заголовок поста..." autofocus required />
                </x-form.item>

                <x-form.item class="w-full sm:w-1/2">
                    <x-form.input name="tag" type="tag" placeholder="Тема / тэг поста" required />
                </x-form.item>
            </div>

            {{-- Trix Editor --}}
            <x-trix.input name="content" type="hidden" value="Кое-что..." required />
            <x-trix.editor />
            <x-form.error name="content"/>

            <div class="flex flex-col justify-between sm:flex-row">
                <x-form.item class="w-1/2 sm:w-1/4">
                    <x-form.input name="image" id="file_input" type="file"/>
                    <x-form.label label_post>Загрузить обложку? PNG, JPG, JPEG</x-form.label>
                    <x-form.error name="image"/>
                </x-form.item>

                <x-form.item>
                    <x-button type="submit" submit_button>Запостить</x-button>
                </x-form.item>
            </div>
        </x-form>

    </x-container>
</x-layouts.base>
