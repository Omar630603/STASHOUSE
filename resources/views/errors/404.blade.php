<x-guest-layout>
    <style>
        html {
            background-color: #72358E;
        }
    </style>
    <div class="h-screen w-full flex flex-col justify-center items-center bg-[#72358E]">
        <h1 class="text-9xl font-extrabold text-white tracking-widest">404</h1>
        <div class="bg-[#F8C35B] px-2 text-sm rounded rotate-12 absolute">
            Page Not Found
        </div>
        <button class="mt-5">
            <a href="{{url()->previous()}}"
                class="relative inline-block text-sm font-medium text-[#F8C35B] group active:text-[#F8C35B] focus:outline-none focus:ring">
                <span
                    class="absolute inset-0 transition-transform translate-x-0.5 translate-y-0.5 bg-[#FF6A3D] group-hover:translate-y-0 group-hover:translate-x-0"></span>
                <span class="relative block px-8 py-3 bg-[#3F1652] border border-current">
                    Go Back
                </span>
        </button>
    </div>
</x-guest-layout>