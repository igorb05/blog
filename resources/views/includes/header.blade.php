<header class="py-5 h-20 bg-white">
    <x-container my="0">
        <div class="flex flex-row items-center">
            <a href="{{ route('home') }}" class="text-3xl font-extrabold tracking-wide text-indigo-600"><img
                    src="{{ asset('images/icons/logo.svg') }}" alt="Лого"></a>

            <ul class="flex ms-auto gap-x-4">
                <li class="hidden sm:block"><a href="{{ route('home') }}">Главная</a></li>
                <li class="hidden sm:block"><a href="{{ route('about') }}">О нас</a></li>
            </ul>

            @auth
                <!-- Profile dropdown -->
                <div x-data="{ open: false }" class="relative ml-8">
                    <button x-on:click="open = true" type="button" class="-m-1.5 flex items-center p-1.5"
                            id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                        <span class="sr-only">Open user menu</span>
                        <div class="relative w-8 h-8 overflow-hidden bg-indigo-200 rounded-full">
                            <svg class="absolute w-10 h-10 text-indigo-400 -left-1" fill="currentColor"
                                 viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                      clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <span class="hidden lg:flex lg:items-center">
                                    <span class="ml-4 text-sm font-semibold leading-6 text-gray-900"
                                          aria-hidden="true">{{ auth()->user()->name }}</span>
                                    <svg class="ml-2 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                         aria-hidden="true">
                                        <path fill-rule="evenodd"
                                              d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                </span>
                    </button>
                    <div x-cloak x-show="open" x-on:click.outside="open = false"
                         class="absolute right-0 z-10 mt-2.5 w-32 origin-top-right rounded-md bg-white py-2 shadow-lg ring-1 ring-gray-900/5 focus:outline-none"
                         role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">

                        <a href="{{ route('posts.create') }}" class="block px-3 py-1 text-sm leading-6 text-gray-900"
                           role="menuitem" tabindex="-1" id="user-menu-item-0">
                            Создать пост
                        </a>
                        <a href="{{ route('user.settings') }}" class="block px-3 py-1 text-sm leading-6 text-gray-900"
                           role="menuitem" tabindex="-1" id="user-menu-item-0">
                            Настройки
                        </a>
                        <a href="" x-on:click.prevent="$refs.logout.submit()"
                           class="block px-3 py-1 text-sm leading-6 text-gray-900" role="menuitem" tabindex="-1"
                           id="user-menu-item-1">
                            Выход
                            <x-form x-ref="logout" action="{{ route('logout') }}" method="post" class="hidden"></x-form>
                        </a>
                    </div>
                </div>
            @else
                <ul class="ms-14 gap-x-4 hidden sm:flex">
                    <li><a href="{{ route('login') }}">Войти</a></li>
                    <li><a href="{{ route('registration') }}"
                           class="bg-indigo-500 hover:bg-indigo-400 text-white px-7 py-3 rounded-lg">Регистрация</a>
                    </li>
                </ul>

                <!-- Burger dropdown -->
                <div x-data="{ burger: false }" class="relative ml-8">
                    <button x-on:click="burger = true" type="button" class="-m-1.5 flex items-center p-1.5 sm:hidden"
                            id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                        <div class="relative w-8 h-8 overflow-hidden">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                        </div>
                    </button>
                    <div x-cloak x-show="burger" x-on:click.outside="burger = false"
                         class="absolute right-0 z-10 mt-2.5 w-32 origin-top-right rounded-md bg-white py-2 shadow-lg ring-1 ring-gray-900/5 focus:outline-none"
                         role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">

                        <a href="{{ route('home') }}" class="block px-3 py-1 text-sm leading-6 text-gray-900"
                           role="menuitem" tabindex="-1" id="user-menu-item-0">
                            Главная
                        </a>
                        <a href="{{ route('about') }}" class="block px-3 py-1 text-sm leading-6 text-gray-900"
                           role="menuitem" tabindex="-1" id="user-menu-item-0">
                            О нас
                        </a>
                        <a href="{{ route('login') }}" class="block px-3 py-1 text-sm leading-6 text-gray-900"
                           role="menuitem" tabindex="-1" id="user-menu-item-0">
                            Войти
                        </a>
                        <a href="{{ route('registration') }}" class="block px-3 py-1 text-sm leading-6 text-gray-900"
                           role="menuitem" tabindex="-1" id="user-menu-item-0">
                            Регистрация
                        </a>
                    </div>
                </div>
            @endauth
        </div>
    </x-container>
</header>
