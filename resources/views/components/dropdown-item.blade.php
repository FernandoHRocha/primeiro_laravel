@props(['active' => false])

@php
    $classes = "block rounded transition-colors duration-150 text-left px-3 text-sm leading-6 hover:bg-indigo-400 focus:bg-indigo-500 hover:text-white focus:text-white";

    if ($active) $classes .= " bg-indigo-400 text-white";
@endphp


<a {{ $attributes(['class' => $classes])}}>
    {{ $slot }}
</a>