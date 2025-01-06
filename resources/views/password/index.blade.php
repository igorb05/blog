<x-layouts.auth>
    <x-slot:title>
        Забыли пароль?
    </x-slot:title>

    <x-form action="{{ route('password.store') }}" method="POST">
        <x-form.item>
            <x-form.label>Ваш email</x-form.label>
            <x-form.input name="email" placeholder="mail@example.com" autofocus />
        </x-form.item>
        <x-form.item>
            <x-button type="submit">
                Продолжить
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
