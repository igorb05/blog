@props(['to' => '#'])

<a href="{{ $to }}" class="font-semibold leading-6 text-indigo-500 hover:text-indigo-400" {{ $attributes }} >
    {{ $slot }}
</a>
