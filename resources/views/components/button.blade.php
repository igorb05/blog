@props(['submit_button' => ''])

<button {{ $attributes->class(["bg-indigo-500 leading-6 text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-600"])->merge([
            "class" => $submit_button ? "px-7 py-3 text-base rounded-[20px]" : "flex w-full justify-center px-3 py-1.5 text-sm font-semibold rounded-lg"
        ]) }}>

    {{ $slot }}
</button>
