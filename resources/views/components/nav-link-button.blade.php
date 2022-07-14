@props(['active'])

@php
$classes = ($active ?? false)
? 'inline-flex self-center items-center py-2 px-5 border-solid rounded-full border-2 border-[#3F1652] text-base
font-bold
font-medium
text-[#3F1652]
bg-[#F8C35B]
focus:outline-none focus:border-[#3F1652] transition duration-150 ease-in-out'
: 'inline-flex self-center items-center py-2 px-5 border-solid rounded-full border-2 border-[#3F1652] text-base
font-bold
text-[#846B8F]
hover:text-[#3F1652] hover:border-[#846B8F] focus:outline-none focus:text-[#846B8F] focus:border-[#846B8F] transition
duration-150 ease-in-out';
@endphp
<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>