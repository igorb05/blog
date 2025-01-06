<x-layouts.auth>
    <x-slot:title>
        Изменение пароля
    </x-slot:title>

    <x-form action="{{ route('password.update', $password->uuid) }}" method="POST">
        <x-form.item>
            <x-form.label>Введите новый пароль</x-form.label>
            <x-form.input name="password" type="password" autofocus />
        </x-form.item>
        <x-form.item>
            <x-button type="submit">
                Изменить
            </x-button>
        </x-form.item>
    </x-form>

    <x-slot:crosslink>
        Войти в аккаунт?
        <x-link to="{{ route('login') }}">
            *тык*
        </x-link>
    </x-slot:crosslink>

</x-layouts.auth>
