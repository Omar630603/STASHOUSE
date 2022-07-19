@if (Session::has('warning'))
<div class="my-2 flex w-full max-w-sm mx-auto overflow-hidden bg-white-800 rounded-lg shadow-md relative">
    <div class="flex items-center justify-center w-12 bg-yellow-400">
        <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z" />
        </svg>
    </div>
    <div class="px-4 py-2 -mx-3">
        <div class="mx-3">
            <span class="font-semibold text-yellow-400">{{ __('Warning') }}</span>
            <p class="text-sm text-gray-600">{{ Session::get('warning') }}</p>
        </div>
    </div>
    <button
        class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-2 mr-2 outline-none focus:outline-none"
        onclick="closeAlert(event)">
        <span>×</span>
    </button>
</div>
@endif