<x-guest-layout>
    <x-slot name="header">
        <div class="bg-gray-100 rounded-lg my-4">
            <div class="container flex items-center px-6 py-4 mx-auto overflow-y-auto whitespace-nowrap">
                <a href="/" class="text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 48 48"
                        style=" fill:#000000;">
                        <polygon fill="#f5bc00" points="42,43 6,43 6,15.056 24,1.453 42,15.025"></polygon>
                        <polygon fill="#f55376"
                            points="3.675,24.333 0.042,19.559 24,1.453 47.958,19.518 44.378,24.333 24.021,8.926">
                        </polygon>
                        <polygon fill="#eb0000" points="6,22.573 24.021,8.926 42,22.533 42,15.025 24,1.453 6,15.056">
                        </polygon>
                        <rect width="12" height="16" x="18" y="27" fill="#eb7900"></rect>
                    </svg>
                </a>

                <span class="mx-5 text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </span>

                <a href="{{ route('choose_city') }}" class="flex items-center text-blue-600 -px-2 hover:underline">
                    <svg width="30" height="30" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink">
                        <rect width="48" height="48" fill="url(#pattern0)" />
                        <defs>
                            <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                                <use xlink:href="#image0_862_162" transform="scale(0.0208333)" />
                            </pattern>
                            <image id="image0_862_162" width="48" height="48"
                                xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAABmJLR0QA/wD/AP+gvaeTAAAEBUlEQVRoge2ZXUwcVRiGnzO7COy6Uv4sgVCirazYWn/gwqaArU2MibYRSGxINDYmYoKGaoKYGJISm6YlGts0jQ3EGLjQxlCJxvZGa9oKcoVeYCywtFL+xVlSEmTYFmaOF5S6ZXdhd2fWTXSfm01mvvO97ztzZufMDCRI8P9GWNlMvlLv1OaVV4WgUsIjQCYCL1JcATodt1LbxbdNmpWalgXQKusrpKKcQpK7htokiFrn2eZvrNJVrGiiVb17UArlqzXNA0hykbJTq2qos0IXLDgD81Xv7QX5NZEdDAMp9jk7m8+b1TcVQB5oStHmNA+QH4X0hEO59ZDoOL5gxoPdzGDtr/mXQQSYVzLSUQryEM5U5PwCxug4xszsqiqZpxn2auAzMx5MXgPixYCGGenYthUiXE5QFITLiW2rG5GZHqxBwPhIMRdAiscDGhbkBS21bQp2fYvHTOmzxhQqG1S7pUJz95ascwghg1fJrIBNjpTgpY7U5V9Dx/COo/9xjcXp4U1lHrVXQqs0OPPTw9lzkQYIeRGXDaq3TYtfJXxkn8z84tJuseRfM1/V4AUy/bfZn9i2PH1WYcx40dpOok9dhcWbyxuTHVT2jayUzAk4Yxi0dhdl/xxugDCmkHxUINv1XK+nfODPgzvGxlL9dg4FGB0dD9rFd7YFffS3f8wDWvr9/iUuCTVCobfMo/aWetSanQOqy4IAd3hACnHCrqVcLx9Um3YN39gA4ruVnXJpEX1yCN/3X7LQ9jH6yBDypg99ZAit5QiLV34JaNhXVBxcSVIsJC2KYKJ8UG0p7VdDFIY1hUKOvLF5arr9+Dv1dXJiUDG8Y0h9ac0hdw1XbDzzyXnSdof0dhdd7uygXqP/F5KkX8vZ+PaPGWmKPj0ckXmAnl0V9OUVRC2/gum10P7aRmbz3RGNmc1389Jbh8xKAxYE8CXZeerDz9E2hnc0fVl5lB5rw5dkahFwB0tWozNOJ3uOtbGUFnhb8Ed3ZfDs0Xam79tghSxgUQCAq1k5VH3wKTL13uAFyQ6qm1rpzwl+p44WywIA9Dzo5rXG08h7Vt2Nk5Kpff8UFwu3WikHWBwA4Nz2Eg7VHQXb7Tmu2Djy5mE6ntxhtdRy+1g0Pf30c5x8vREUhdYDDZzYszcWMoDJ54G1OPz8fnq2FPGDe3usJIAYnYEVYm0eYhzg3yARIN4kAsSbRIB4kwgQbxIB4k0iQLwJGUAalAhoBSJ+X7kOU0AHgjcQts1mddb9wLFzQHUJhWoBNUgC3kJ1ebzhGO5GcAFsF3ih8PeodEK82IroC01pv1qsKNRIqAZcIQKEZThiHSsCrOB/tLo83kwklxFcZJHLVBRdj6bnujqF2SVW9U2Q4L/E3x15T0p2eDsvAAAAAElFTkSuQmCC" />
                        </defs>
                    </svg>
                    <span class="mx-2">Kota: ({{$unit->city}})</span>
                </a>

                <span class="mx-5 text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </span>

                <a href="{{ route('daftarUnitPenyimpanan', ['unit_id'=>$unit->id]) }}"
                    class="flex items-center text-blue-600 -px-2 hover:underline">
                    <img width="30" height="30" src="{{ asset('storage/images/stockImages/container.svg') }}" />
                    <span class="mx-2">Unit: </span>
                </a>

                <span class="flex items-center ">
                    <span class="mx-2">{{$unit->unitCategory->name}} di {{$unit->storageOwner->storage_name}}</span>
                    <img width="30" height="30" src="{{ asset('storage/'.$unit->unitCategory->image) }}" alt="">

                </span>
            </div>
        </div>
    </x-slot>
    <x-slot name="slot">
        <div class="container max-w-7xl py-6 px-4 sm:px-6 lg:px-8 mx-auto flex flex-col">
            <!-- Choose city form-->
            <div class="lg:hidden self-end mr-3 h-12 w-24 bg-[#72358E]
            rounded-tr-full rounded-bl-full "></div>
            <div class="w-full rounded-lg border-4 border-solid border-[#72358E] p-4 relative">
                <div class="absolute bottom-0 right-0 z-0 h-24 w-48 bg-[#72358E50]
                rounded-tr-full rounded-tl-full"></div>
                <form class="flex flex-col" action="{{ route('daftarUnitPenyimpanan') }}">
                    @csrf
                    <div class="z-40">
                        <label for="countries" class="block mb-2 text-sm font-bold text-gray-900">Rent unit</label>
                    </div>

                    <div class="flex justify-between mt-4 z-50">
                        <small class="self-center p-2 border-l-2 border-[#F8C35B] bg-[#F8C35B50] text-black">Fill the
                            form for the renting process</small>
                        <x-button>
                            {{ __('Rent') }}
                        </x-button>
                    </div>
                </form>
            </div>
            <div class="lg:hidden ml-3 h-12 w-24 bg-[#72358E]
            rounded-br-full rounded-bl-full "></div>
        </div>
    </x-slot>
</x-guest-layout>