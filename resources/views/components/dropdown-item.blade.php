@props(['active'=>false])

@php
    $classes="block text-left px-3 text-sm leading-6 hover:bg-blue-500 hover:text-white focus:bg-blue-500 focus:text-white "    
@endphp   
    
@if($active) 
    @php
        $classes .= "bg-blue-500 text-white"
    @endphp
@endif

<a {{ $attributes(['class'=>$classes]) }}> {{ $slot }}</a>