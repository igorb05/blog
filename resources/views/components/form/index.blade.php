@props(['method' => 'GET'])

@php($method = strtoupper($method))
@php($_method = in_array($method, ['GET', 'POST']))

<form {{ $attributes->class(['space-y-6']) }} method="{{ $_method ? $method : 'POST' }}">

    @unless($_method)
        @method($method)
    @endunless

    @if($method !== 'GET')
        @csrf
    @endif

    {{ $slot }}
</form>
