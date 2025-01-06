@props(['margin' => ''])

<div {{ $attributes->merge([
    'class' => $margin ? 'mb-0' : 'mb-3 sm:mb-6',
]) }}>
    {{ $slot }}
</div>

{{-- $attributes->class($attributes->has('class') ? '' : 'mb-6') // mb-6 по дефолту, если других нет --}}
