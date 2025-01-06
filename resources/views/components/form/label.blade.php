@props(['label_post' => ''])

<div class="mb-2">
    <label {{ $attributes->class(["text-sm font-medium leading-6"])
                         ->merge(["class" => $label_post ? "mt-1 ms-2 text-gray-500" : "text-stone-900"])
            }}>

        {{ $slot }}
    </label>
</div>
