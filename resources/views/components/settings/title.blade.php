<div class="min-w-0 flex-1">
    <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">
        {{ $title }}
    </h2>
    @isset($description)
        <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">{{ $description }}</p>
    @endisset
</div>
