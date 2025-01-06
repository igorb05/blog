@props(['name' => '', 'type' => 'text', 'value' => ''])

<input name="{{ $name }}" type="{{ $type }}" value="{{ $value ? $value : old($value) }}" {{ $attributes }} class="block w-full rounded-lg border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6">

<x-form.error name="{{ $name }}" />
