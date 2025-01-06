<x-layouts.base>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">{{ $title }}</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            {{ $slot }}
            @isset($crosslink)
                <div class="mt-5 text-center text-sm text-gray-500">
                    {{ $crosslink }}
                </div>
            @endisset
        </div>
    </div>
</x-layouts.base>




