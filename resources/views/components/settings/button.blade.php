@props(['inactive_button' => ''])

<a  {{ $attributes->class(["rounded-lg bg-white font-medium px-4"])
                  ->merge(["class" => $inactive_button ? "cursor-not-allowed text-rose-500 hover:text-rose-400" : "text-indigo-500 hover:text-indigo-400"]) }}>

    {{ $slot }}
</a>
