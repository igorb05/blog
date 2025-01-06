<x-layouts.auth>
    <x-slot:title>
        Регистрация
    </x-slot:title>


    <x-form action="{{ route('registration.store') }}" method="POST">
        <x-form.item>
            <x-form.label>Ваше имя</x-form.label>
            <x-form.input name="name" placeholder="Иван" autofocus required/>
        </x-form.item>
        <x-form.item>
            <x-form.label>Ваш email</x-form.label>
            <x-form.input name="email" type="email" placeholder="mail@exmaple.com" required/>
        </x-form.item>
        <x-form.item>
            <x-form.label>Придумайте пароль</x-form.label>
            <x-form.input name="password" type="password" placeholder="******" required/>
        </x-form.item>
        <x-form.item>
            <x-form.label>Повторите пароль</x-form.label>
            <x-form.input name="password_confirmation" type="password" placeholder="******" required/>
        </x-form.item>
        <x-form.checkbox name="agreement" type="checkbox">
            Я соласен с пользовательским соглашением
        </x-form.checkbox>
        <x-form.item>
            <x-button type="submit">
                Зарегистрироваться
            </x-button>
        </x-form.item>
    </x-form>

    <x-slot:crosslink>
        Уже зарегистрированы?
        <x-link to="{{ route('login') }}">
            Войти
        </x-link>
    </x-slot:crosslink>

</x-layouts.auth>




