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
                    <span class="mx-2">Unit</span>
                </a>
            </div>
        </div>
    </x-slot>
    <x-slot name="slot">
        <x-validation-errors class="mb-4" :errors="$errors" />

        <div class="container max-w-7xl py-6 px-4 sm:px-6 lg:px-8 mx-auto flex flex-col">
            <div class="lg:hidden self-end mr-3 h-12 w-24 bg-[#72358E]
            rounded-tr-full rounded-bl-full "></div>
            <div class="w-full rounded-lg border-4 border-solid border-[#72358E] p-4 relative">
                <div class="absolute bottom-0 right-0 z-0 h-24 w-48 bg-[#72358E50]
                rounded-tr-full rounded-tl-full"></div>
                <form method="POST" class="flex flex-col" action="{{ route('customer.rent', ['unit' => $unit]) }}">
                    @csrf
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-1 xl:grid-cols-2">
                        <div class="z-40 mb-4">
                            <label class="block text-lg font-bold text-gray-900">Sewa unit</label>
                            <span class="flex items-center ">
                                <span class="mr-2">{{$unit->unitCategory->name}} di
                                    {{$unit->storageOwner->storage_name}}</span>
                                <img width="30" height="30" src="{{ asset('storage/'.$unit->unitCategory->image) }}"
                                    alt="">
                            </span>
                        </div>
                        <div class="self-start justify-self-end flex gap-2 flex-wrap">
                            <div class="flex flex-col self-center">
                                <label for="total_price" class="block text-lg font-bold text-gray-900">Total
                                    price</label>
                                <small class="text-right">
                                    {{"Rp." . number_format($unit->price_per_day , 0, ',', '.') . " / hari"}}
                                </small>
                            </div>
                            <input id="total_price" name="total_price" type="text" disabled
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-[#72358E] focus:border-[#72358E]"
                                placeholder="Total price">
                            <input id="total_price_hidden" name="total_price" type="text" hidden required>
                            <input id="days_hidden" name="days" type="text" hidden required>
                            <small
                                class="self-center h-fit w-fit p-2 text-center bg-green-500 rounded-full font-bold text-white text-sm"
                                id="days"></small>
                        </div>
                    </div>
                    <label class="block text-lg font-bold text-gray-900 mt-2 mb-2" for="">Masa sewa</label>
                    <div date-rangepicker datepicker-format="d M y"
                        class="grid grid-cols-1 gap-6 md:grid-cols-1 xl:grid-cols-2">
                        <div class="relative">
                            <div class="flex absolute inset-y-0 right-0 items-center pr-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="#E52878" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input id="starts_from_date" name="starts_from" type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-[#72358E] focus:border-[#72358E] block w-full pr-10 p-2.5"
                                placeholder="Tempatkan tanggal mulai di sini....." required>
                        </div>
                        <div class="relative">
                            <div class="flex absolute inset-y-0 right-0 items-center pr-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="#E52878" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input id="ends_at_date" name="ends_at" type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-[#72358E] focus:border-[#72358E] block w-full pr-10 p-2.5"
                                placeholder="Tempatkan tanggal keluar di sini....." required>
                        </div>
                    </div>
                    <div class="mt-8 grid grid-cols-1 gap-6 md:grid-cols-1 xl:grid-cols-2">
                        <div>
                            <label for="discription"
                                class="block mb-2 text-lg font-bold text-gray-900">Discription</label>
                            <textarea name="discription" id="discription" cols="30" rows="10"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-[#72358E] focus:border-[#72358E] block w-full pr-10 p-2.5">Write something for the owner</textarea>
                        </div>
                        <div>
                            <label for="payment_method" class="block mb-2 text-lg font-bold text-gray-900">Payment
                                method</label>
                            <ul class="grid gap-6 w-full md:grid-cols-2">
                                <li>
                                    <input type="radio" id="payment_method-now" name="payment_method"
                                        value="payment_method-now" class="hidden peer">
                                    <label for="payment_method-now"
                                        class="inline-flex justify-between items-center p-5 w-full text-gray-500 bg-white 
                                        rounded-lg drop-shadow border-2 peer-checked:border-2 border-white cursor-pointer peer-checked:border-[#72358E] peer-checked:text-[#72358E] hover:text-gray-600 hover:bg-[#FFF6E4]">
                                        <div class="block">
                                            <div class="w-full text-lg font-semibold">Bayar sekarang</div>
                                            <div class="w-full text-sm">Milih ini untuk bayar sekarang</div>
                                        </div>
                                        <svg aria-hidden="true" class="ml-3 w-6 h-6" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </label>
                                </li>
                                <li>
                                    <input type="radio" id="payment_method-later" name="payment_method"
                                        value="payment_method-later" class="hidden peer">
                                    <label for="payment_method-later"
                                        class="inline-flex justify-between items-center p-5 w-full text-gray-500 bg-white 
                                        rounded-lg drop-shadow border-2 peer-checked:border-2 border-white cursor-pointer peer-checked:border-[#72358E] peer-checked:text-[#72358E] hover:text-gray-600 hover:bg-[#FFF6E4]">
                                        <div class="block">
                                            <div class="w-full text-lg font-semibold">Bayar nanti</div>
                                            <small class="w-full text-sm">Bayar dalam 5 hari
                                            </small>
                                        </div>
                                        <svg aria-hidden="true" class="ml-3 w-6 h-6" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </label>
                                </li>
                            </ul>
                            <label for="delivery_option" class="block my-1 text-lg font-bold text-gray-900">Delivery
                                option</label>
                            <ul class="grid gap-6 w-full md:grid-cols-2">
                                <li>
                                    <input type="radio" id="delivery_option-yes" name="delivery_option"
                                        value="delivery_option-yes" class="hidden peer">
                                    <label for="delivery_option-yes"
                                        class="inline-flex justify-between items-center p-5 w-full text-gray-500 bg-white 
                                            rounded-lg drop-shadow border-2 peer-checked:border-2 border-white cursor-pointer peer-checked:border-[#72358E] peer-checked:text-[#72358E] hover:text-gray-600 hover:bg-[#FFF6E4]">
                                        <div class="block">
                                            <div class="w-full text-lg font-semibold">Ya</div>
                                            <small class="w-full">Memilih delivery services</small>
                                        </div>
                                        <svg aria-hidden="true" class="ml-3 w-6 h-6" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </label>
                                </li>
                                <li>
                                    <input type="radio" id="delivery_option-no" name="delivery_option"
                                        value="delivery_option-no" class="hidden peer">
                                    <label for="delivery_option-no"
                                        class="inline-flex justify-between items-center p-5 w-full text-gray-500 bg-white 
                                            rounded-lg drop-shadow border-2 peer-checked:border-2 border-white cursor-pointer peer-checked:border-[#72358E] peer-checked:text-[#72358E] hover:text-gray-600 hover:bg-[#FFF6E4]">
                                        <div class="block">
                                            <div class="w-full text-lg font-semibold">Tidak</div>
                                            <div class="w-full">Nanti aja</div>
                                        </div>
                                        <svg aria-hidden="true" class="ml-3 w-6 h-6" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div id="delivery_section" class="hidden mt-5">
                        @if (!isset($unit->storageOwner->deliveryDrivers))
                        <div class="flex flex-col items-center justify-center">
                            <div class="w-full text-center text-gray-500">
                                <div class="text-xl font-bold">
                                    Belum ada delivery service
                                </div>
                                <div class="text-sm">
                                    Silahkan hubungi owner unit untuk mengaktifkan delivery service
                                </div>
                            </div>
                        </div>
                        @else
                        <label class="text-lg font-bold text-gray-900" for="">Lokasi Anda</label>
                        <div class="relative mb-6">
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10 1.25C8.1773 1.25215 6.42987 1.97717 5.14102 3.26602C3.85218 4.55486 3.12716 6.3023 3.12501 8.125C3.12282 9.61452 3.60937 11.0636 4.51001 12.25C4.51001 12.25 4.69751 12.4969 4.72813 12.5325L10 18.75L15.2744 12.5294C15.3019 12.4963 15.49 12.25 15.49 12.25L15.4906 12.2481C16.3908 11.0623 16.8771 9.61383 16.875 8.125C16.8729 6.3023 16.1478 4.55486 14.859 3.26602C13.5701 1.97717 11.8227 1.25215 10 1.25V1.25ZM10 10.625C9.50555 10.625 9.0222 10.4784 8.61108 10.2037C8.19996 9.92897 7.87953 9.53852 7.69031 9.08171C7.50109 8.62489 7.45158 8.12223 7.54804 7.63727C7.64451 7.15232 7.88261 6.70686 8.23224 6.35723C8.58187 6.0076 9.02733 5.7695 9.51228 5.67304C9.99723 5.57657 10.4999 5.62608 10.9567 5.8153C11.4135 6.00452 11.804 6.32495 12.0787 6.73607C12.3534 7.1472 12.5 7.63055 12.5 8.125C12.4992 8.78779 12.2355 9.42319 11.7669 9.89185C11.2982 10.3605 10.6628 10.6242 10 10.625V10.625Z"
                                        fill="#E52878" />
                                </svg>
                            </div>
                            <input type="text" id="address_input"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                                placeholder="Lokasi Anda...">
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                <input id="default-address" type="checkbox"
                                    class="w-4 h-4 text-blue-600 bg-[#FFF6E4] rounded border-gray-300 focus:ring-[#E52878] focus:ring-2 ">
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900">Use my
                                    address</label>
                            </div>
                        </div>
                        <div class="grid gap-6 w-full md:grid-cols-2">
                            <div>
                                <label class="text-lg font-bold text-gray-900" for="">Memilih delivery
                                    service</label>
                                <ul class="mt-2">
                                    @foreach ($unit->storageOwner->deliveryDrivers as $deliveryDriver)
                                    @php
                                    $ind = 0;
                                    @endphp
                                    @if(!$deliveryDriver->status && $deliveryDriver->pivot->status)
                                    @php
                                    $ind = 1;
                                    @endphp
                                    <li class="mb-5">
                                        <input type="radio" id="delivery_service-{{$deliveryDriver->id}}"
                                            name="delivery_service" value="delivery_service-{{$deliveryDriver->id}}"
                                            class="hidden peer">
                                        <input hidden value="{{$deliveryDriver->price_per_km}}">
                                        <label for="delivery_service-{{$deliveryDriver->id}}"
                                            class="inline-flex justify-between items-center p-5 w-full text-gray-500 bg-white 
                                            rounded-lg drop-shadow border-2 peer-checked:border-2 border-white peer-checked:border-[#72358E] peer-checked:text-[#72358E] hover:text-gray-600 hover:bg-[#FFF6E4]">
                                            <div class="flex gap-10">
                                                <div class="relative w-1/2">
                                                    <img width="100" height="100" class=""
                                                        src="{{ asset('storage/'.$deliveryDriver->deliveryCompany->image) }}"
                                                        alt="">
                                                    <img width="30" height="30"
                                                        class="absolute bottom-0 -right-5 ring-2 ring-offset-1 ring-[#72358E] rounded-full"
                                                        src="{{ asset('storage/'.$deliveryDriver->image) }}" alt="">
                                                </div>
                                                <div class="block w-1/2">
                                                    <div class="w-full text-lg font-semibold">
                                                        {{$deliveryDriver->deliveryCompany->name}}
                                                    </div>
                                                    <small class="w-full">{{$deliveryDriver->driver_name}}</small>
                                                </div>
                                            </div>
                                            <div class="block">
                                                <span>
                                                    {{"Rp." . number_format($deliveryDriver->price_per_km , 0, ',', '.') . " / Km"}}
                                                </span>
                                            </div>
                                        </label>
                                    </li>
                                    @endif
                                    @endforeach

                                </ul>
                            </div>
                            <div id="delivery_section-discription" class="hidden">
                                <label for="discription" class="block mb-2 text-lg font-bold text-gray-900">Delivery
                                    discription</label>
                                <textarea name="delivery_discription" id="discription" cols="30" rows="10"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-[#72358E] focus:border-[#72358E] block w-full pr-10 p-2.5">Write something for the driver</textarea>
                            </div>
                        </div>
                        @if ($ind == 0)
                        <div class="flex flex-col items-center justify-center">
                            <div class="w-full text-center text-gray-500">
                                <div class="text-xl font-bold">
                                    Belum ada delivery service
                                </div>
                                <div class="text-sm">
                                    Silahkan hubungi owner unit untuk mengaktifkan delivery service
                                </div>
                            </div>
                        </div>
                        @endif
                        @endif
                    </div>
                    <div id="payment_section" class="hidden mt-5 ">
                        <label class="block text-lg font-bold text-gray-900 mb-2" for="">Memilih rekening bank</label>
                        @if (!isset($unit->storageOwner->storageOwnerBank))
                        <div class="flex flex-col items-center justify-center">
                            <div class="w-full text-center">
                                <div class="text-gray-600 text-lg">
                                    Belum ada rekening bank yang tersedia
                                </div>
                            </div>
                        </div>
                        @else
                        <ul
                            class="grid grid-2 gap-6 w-full md:grid-cols-{{$unit->storageOwner->storageOwnerBank->count()}}">
                            @foreach ($unit->storageOwner->storageOwnerBank as $bank)
                            @php
                            $ind = 0;
                            @endphp
                            @if (!$bank->is_verified)
                            @else
                            @php
                            $ind = 1;
                            @endphp
                            <li>
                                <input type="radio" id="bank_account-{{$bank->id}}" name="bank_account"
                                    value="bank_account-{{$bank->id}}" class="hidden peer">
                                <label for="bank_account-{{$bank->id}}"
                                    class="inline-flex justify-between items-center p-5 w-full text-gray-500 bg-white relative 
                                        rounded-lg drop-shadow border-2 peer-checked:border-2 border-white cursor-pointer peer-checked:border-[#72358E] peer-checked:text-[#72358E] hover:text-gray-600 hover:bg-[#FFF6E4]">
                                    <div class="w-full text-lg font-semibold flex gap-2 felx-wrap ">
                                        <img class="rounded-full ring-2 ring-offset-2 ring-[#72358E]" width="50"
                                            height="50" src="{{ asset('storage/'.$bank->bank->image) }}"
                                            alt="bank{{$bank->bank->name}}">
                                        <div class="self-start flex flex-col">
                                            <span class="font-bold text-sm">{{$bank->bank->name}}</span>
                                            <span class="text-sm">{{$bank->account_number}}</span>
                                        </div>

                                    </div>
                                    <span class="absolute bottom-1 right-1 flex gap-1 items-center bg-[#E8F5FF] text-[#13354E] text-xs 
                                        font-semibold  px-2.5 py-0.5 rounded-lg">
                                        <svg width="13" height="13" viewBox="0 0 13 13" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.5 6.75L6 8.25L8.5 5.25" stroke="#13354E" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M6.5 11.5C9.26142 11.5 11.5 9.26142 11.5 6.5C11.5 3.73858 9.26142 1.5 6.5 1.5C3.73858 1.5 1.5 3.73858 1.5 6.5C1.5 9.26142 3.73858 11.5 6.5 11.5Z"
                                                stroke="#13354E" />
                                        </svg> Verified
                                    </span>
                                    @if ($bank->is_primary)
                                    <span
                                        class="absolute top-1 right-1 bg-blue-300 text-blue-500 text-xs font-semibold px-2.5 py-0.5 rounded-lg">Primary</span>
                                    @endif
                                </label>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                        @if ($ind == 0)
                        <div class="flex flex-col items-center justify-center">
                            <div class="w-full text-center text-gray-500">
                                <div class="text-xl font-bold">
                                    Belum ada rekening bank
                                </div>
                                <div class="text-sm">
                                    Silahkan hubungi owner unit untuk mengaktifkan rekening bank
                                </div>
                            </div>
                        </div>
                        @endif
                        @endif
                        {{--Total price--}}
                        <div id="payment_section-uploadProof" class="mt-2 hidden">
                            <label class="block text-lg font-bold text-gray-900 mt-5" for="">Upload proof of
                                payment</label>
                            <span id="beforePaymentTotalPrice" class="text-md text-gray-900"></span>
                            <input
                                class="mt-3 block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer"
                                id="file_input" type="file" name="proof" accept="image/*">
                        </div>
                    </div>
                    <div class="flex justify-between mt-6 z-50">
                        <small class="self-center p-2 border-l-2 border-[#F8C35B] bg-[#F8C35B50] text-black">Fill the
                            form for the renting process</small>
                        <x-button>
                            {{ __('Rent') }}
                        </x-button>
                    </div>
                </form>
            </div>
            <div class="lg:hidden ml-3 h-12 w-24 bg-[#72358E]
            rounded-br-full rounded-bl-full"></div>
            <input id="user-address" value="{{Auth::user()->customer->address}}">
        </div>
        <script>
            var startdate = '';
            var enddate = '';
            var startdateFormated = '';
            var enddateFormated = '';
            var deliveryPrice = 0;
            var formatter = new Intl.NumberFormat('en-US', {
            style: 'currency',
            currency: 'IDR',
            });
            function valdiatePrice(startdateFormated, enddateFormated){
                if (startdateFormated != 'Invalid Date' && startdateFormated != '' && startdateFormated != null && startdateFormated != 'undefined'
                    && startdateFormated != 'NaN' && enddateFormated != 'Invalid Date' && enddateFormated != '' && enddateFormated != null && enddateFormated != 'undefined' ) {
                    var diff = Math.abs(startdateFormated.getTime() - enddateFormated.getTime());
                    var diffDays = Math.ceil(diff / (1000 * 3600 * 24));
                    $('#total_price').val(formatter.format(diffDays * {{ $unit->price_per_day }}));
                    $('#total_price_hidden').val(diffDays * {{ $unit->price_per_day }});
                    $('#beforePaymentTotalPrice').html('Total Payment: '+ formatter.format(diffDays * {{ $unit->price_per_day }}));
                    $('#days').html(diffDays + ' / Hari'); 
                    $('#days_hidden').val(diffDays);
                    if (deliveryPrice != 0 && deliveryPrice != '' && deliveryPrice != null && deliveryPrice != 'undefined') {
                        rentPrice = diffDays * {{ $unit->price_per_day }};
                        rentPrice = Number(rentPrice) + Number(deliveryPrice);
                        $('#total_price').val(formatter.format(rentPrice));
                        $('#total_price_hidden').val(rentPrice);
                        $('#beforePaymentTotalPrice').html('Total Payment: '+ formatter.format(rentPrice));
                    }
                }else{
                    
                    $('#ends_at_date').val('Tempatkan tanggal keluar di sini.....');
                }
            }


            $('#starts_from_date').on('focusout', function(){
                startdate =  $(this).val();
                startdateFormated = new Date(startdate = '' ? new Date() : startdate);
                enddateFormated = new Date(enddate);
                valdiatePrice(startdateFormated, enddateFormated);
            });
            $('#ends_at_date').on('focusout', function(){
                enddate = $(this).val();
                enddateFormated = new Date(enddate);
                startdateFormated = new Date(startdate);
                valdiatePrice(startdateFormated, enddateFormated);
            });
            $('input[type=radio][name=payment_method]').on('change', function(){
                if ($(this).val() == 'payment_method-later') {
                    $('#payment_section').hide('slow');
                    $('#payment_section-uploadProof').hide('slow');
                    $('input[type=radio][name=bank_account]').prop('checked', false);
                }else{
                    $('#payment_section').show('slow');
                }
            });
            $('input[type=radio][name=delivery_option]').on('change', function(){
                if ($(this).val() == 'delivery_option-no') {
                    $('#delivery_section').hide('slow');
                    $('#delivery_section-discription').hide('slow');
                    $('input[type=radio][name=delivery_service]').prop('checked', false);
                }else{
                    $('#delivery_section').show('slow');
                }
            });
            $('input[type=radio][name=bank_account]').on('change', function(){
                if ($(this).val() == null) {
                    $('#payment_section-uploadProof').hide('slow');
                }else{
                    $('#payment_section-uploadProof').show('slow');
                }
            });
            $('input[type=radio][name=delivery_service]').on('change', function(){
                if ($(this).val() == null) {
                    $('#delivery_section-discription').hide('slow');
                }else{
                    startdateFormated = new Date(startdate);
                    enddateFormated = new Date(enddate);
                    deliveryPrice = $(this).next().val();
                    $('#total_price').val(formatter.format(deliveryPrice));
                    $('#total_price_hidden').val(deliveryPrice);
                    $('#beforePaymentTotalPrice').html('Total Payment: '+ formatter.format(deliveryPrice));
                    console.log(deliveryPrice);
                    valdiatePrice(startdateFormated, enddateFormated);
                    $('#delivery_section-discription').show('slow');
                }
            });
            $('#default-address').on('click', function(){
                if ($(this).is(':checked')) {
                    address = $('#user-address').val();
                    if (address != '') {
                        $('#address_input').val(address);                    
                    }else{
                        alert('Silahkan isi alamat terlebih dahulu di profil anda');
                        $('#default-address').prop('checked', false);
                    }
                }else{
                    $('#address_input').val('');
                }
            });
        </script>
    </x-slot>

</x-guest-layout>