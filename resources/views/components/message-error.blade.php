@if (Session::has('error'))
<div class="my-2 flex w-full max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-md dark:bg-white-800 relative">
    <div class="flex items-center justify-center w-12 bg-red-500">
        <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M20 3.36667C10.8167 3.36667 3.3667 10.8167 3.3667 20C3.3667 29.1833 10.8167 36.6333 20 36.6333C29.1834 36.6333 36.6334 29.1833 36.6334 20C36.6334 10.8167 29.1834 3.36667 20 3.36667ZM19.1334 33.3333V22.9H13.3334L21.6667 6.66667V17.1H27.25L19.1334 33.3333Z" />
        </svg>
    </div>

    <div class="px-4 py-2 -mx-3">
        <div class="mx-3">
            <span class="font-semibold text-red-500 dark:text-red-400">{{ __('Whoops! Something went wrong.') }}</span>
            <p class="text-sm text-sm text-black-600 dark:text-black-200">
                {{ Session::get('error') }}
            </p>
        </div>
    </div>

    <button
        class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-2 mr-2 outline-none focus:outline-none"
        onclick="closeAlert(event)">
        <span>×</span>
    </button>
</div>
@endif