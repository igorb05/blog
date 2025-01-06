<x-layouts.auth>
    <x-slot:title>
        Войдите в аккаунт
    </x-slot:title>

    <x-form action="{{ route('login.store') }}" method="POST">
        <x-form.item>
            <x-form.label>Ваш email</x-form.label>
            <x-form.input name="email" type="email" placeholder="mail@exmaple.com" autofocus required/>
        </x-form.item>
        <x-form.item>
            <x-form.label>Ваш пароль</x-form.label>
            <x-form.input name="password" type="password" placeholder="******" required/>
        </x-form.item>
        <x-form.item class="flex justify-between" margin="unset">
            <x-form.checkbox name="remember" type="checkbox">
                Запомнить меня
            </x-form.checkbox>
            <a href="{{ route('password') }}" class="text-sm text-indigo-400 hover:underline">Не помните пароль?</a>
        </x-form.item>
        <x-form.item>
            <x-button type="submit">
                Войти
            </x-button>
        </x-form.item>
    </x-form>

    <x-slot:crosslink>
        Нет аккаунта?
        <x-link to="{{ route('registration') }}">
            *тык*
        </x-link>
    </x-slot:crosslink>

</x-layouts.auth>



