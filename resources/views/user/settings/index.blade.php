<x-layouts.user>
    <x-settings.title>
        <x-slot:title>Настройки</x-slot:title>
        <x-slot:description>Персональная информация</x-slot:description>
    </x-settings.title>
    <div class="mt-6 border-t border-gray-100">
        <x-settings.list>
            <x-settings.item>
                <x-slot:title>Имя</x-slot:title>
                <x-slot:value>{{ $user->name }}</x-slot:value>

                {{-- @TODO: добавить изменение имени --}}
                <x-settings.button inactive_button>
                    Изменить
                </x-settings.button>
            </x-settings.item>
            <x-settings.item>
                <x-slot:title>Email</x-slot:title>
                <x-slot:value>{{ $user->email }}</x-slot:value>

                {{-- @TODO: изменение текущего e-mail --}}
                <x-settings.button inactive_button>
                    Изменить
                </x-settings.button>
            </x-settings.item>
            <x-settings.item>
                <x-slot:title>Пароль</x-slot:title>
                <x-slot:value>
                    @if($user->password_at)
                        Изменен {{ $user->password_at->translatedFormat('j F Y') }}
                    @else
                        Не изменялся
                    @endif
                </x-slot:value>

                <x-settings.button href="{{ route('user.settings.password.update') }}">
                    Изменить
                </x-settings.button>
            </x-settings.item>
        </x-settings.list>
    </div>

    @unless($user->isEmailConfirmed())
        <x-settings.email-alert>
            Вы не подтвердили почту.
            <a href="{{ route('email.confirmation') }}"
               class="font-medium text-indigo-700 underline hover:text-indigo-600">
                Подтвердить...
            </a>
        </x-settings.email-alert>
    @endunless
</x-layouts.user>
