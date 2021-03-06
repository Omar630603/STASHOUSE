@props(['active'])

@php
$classes = ($active ?? false)
? 'inline-flex items-center px-1 pt-1 border-b-2 border-[#3F1652] text-base font-bold font-medium leading-5
text-[#3F1652]
focus:outline-none focus:border-[#3F1652] transition duration-150 ease-in-out'
: 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-[#846B8F]
hover:text-[#3F1652] hover:border-[#846B8F] focus:outline-none focus:text-[#846B8F] focus:border-[#846B8F] transition
duration-150 ease-in-out';
@endphp
<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>