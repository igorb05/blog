<div class="relative py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0" {{ $attributes }}>
    <dt class="text-sm font-medium leading-6 text-gray-900">{{ $title }}</dt>
    <dd class="mt-1 flex text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
        <span class="flex-grow">{{ $value }}</span>
        {{ $slot }}
    </dd>
</div>


