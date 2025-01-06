@props(['name' => ''])

@error($name)

    <div class="text-red-600 text-xs pt-1">
        {{ $message }}
    </div>

@enderror
