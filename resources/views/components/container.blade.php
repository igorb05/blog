@props(['my' => true])

<div class="container max-w-screen-xl mx-auto {{ $my ? 'my-10' : '' }} px-3 sm:px-7">

    {{ $slot }}

</div>
