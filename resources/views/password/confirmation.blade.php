<x-layouts.auth>
    <x-slot:title>
        Подтверждение пароля
    </x-slot:title>

    <x-post.card main_page class="text-center">
        Перейдите по ссылке из письма отправленного на ваш e-mail
    </x-post.card>

    <x-slot:crosslink>
        Войти в аккаунт?
        <x-link to="{{ route('login') }}">
            *тык*
        </x-link>
    </x-slot:crosslink>

</x-layouts.auth>
