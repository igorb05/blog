<div class="bg-indigo-400/10 flex items-center justify-center overflow-y-auto overflow-x-hidden fixed inset-0 z-50 justify-center items-center w-full md:inset-0 h-full max-h-full" x-cloak x-show="modalChangePassword">
    <div class="p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="bg-white rounded-lg shadow-lg">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold text-gray-900">
                    Обновление пароля
                </h3>
                <button type="button" x-on:click="modalChangePassword = false" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" >
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Закрыть</span>
                </button>
            </div>
            <div class="p-4 md:p-5">
                <x-form action="{{ route('user.settings.password.update') }}" method="PUT">
                    <x-form.item>
                        <x-form.label>Введите текущий пароль</x-form.label>
                        <x-form.input name="current_password" type="password" required autofocus />
                    </x-form.item>
                    <x-form.item margin="unset">
                        <x-form.label>Введите новый пароль</x-form.label>
                        <x-form.input name="password" type="password" required/>
                    </x-form.item>
                    <div class="flex justify-end">
                        <a href="#" class="text-sm text-indigo-700 hover:underline">Не помните пароль?</a>
                    </div>
                    <button type="submit" class="w-full text-white bg-indigo-500 hover:bg-indigo-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Обновить</button>
                </x-form>
            </div>
        </div>
    </div>
</div>
