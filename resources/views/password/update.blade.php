<x-layouts.auth>
    <x-slot:title>
        Смена пароля
    </x-slot:title>

    <x-form action="{{ route('user.settings.password.update') }}" method="PUT">
        <x-form.item>
            <x-form.label>Введите текущий пароль</x-form.label>
            <x-form.input name="current_password" type="password" required autofocus/>
        </x-form.item>
        <x-form.item margin="unset">
            <x-form.label>Введите новый пароль</x-form.label>
            <x-form.input name="password" type="password" required/>
        </x-form.item>
        <div class="flex justify-end">
            <a href="#" class="text-sm text-indigo-700 hover:underline">Не помните пароль?</a>
        </div>
        <button type="submit"
                class="w-full text-white bg-indigo-500 hover:bg-indigo-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
            Обновить
        </button>
    </x-form>
</x-layouts.auth>
