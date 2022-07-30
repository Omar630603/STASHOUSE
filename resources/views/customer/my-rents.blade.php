<x-app-layout>
    <x-slot name="header">
        <div class="mt-8">
            <h1 class="text-4xl text-[#3F1652] font-bold">Daftar Penyewan Saya @if (!isset($rents) || $rents->count() ==
                0)
                <span class="text-sm text-gray-600">Kamu belum sewa <a class="text-blue-500"
                        href="{{ route('daftarUnitPenyimpanan') }}">Klik
                        di sini
                        untuk lihat dafta unit
                        penyimpanan</a></span>
                @else
                <span class="text-sm text-gray-600">sudah sewa {{count($rents)}} unit</span>
                @endif
            </h1>
        </div>
    </x-slot>

    <x-slot name="slot">
        <x-validation-errors class="mb-4" :errors="$errors" />
        <form class="max-w-7xl mx-auto px-4 sm:px-4 lg:pl-8">
            <div class="relative">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input id="inputString" autocomplete="off"
                    class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Cari di persewaan...">
            </div>
        </form>
        <div class="max-w-7xl py-3 mx-auto px-4 sm:px-6 lg:px-8">
            @if (isset($rents))
            <div class="mt-8 container mx-auto">
                <h1 class="text-2xl font-bold">Hasil Pencarian : {{$rents->count()}}</h1>
                <div id="grid" class="min-w-full mt-5 rounded lg:grid lg:grid-cols-3">
                    {{-- side-bar --}}
                    <div id="sideBar" class="unitlist lg:col-span-1">
                        <ul id="unitlist" class="overflow-auto h-fit mb-3 max-h-[40rem] pr-3">
                            @if (!isset($rents) || $rents->count() == 0)
                            <div>
                                <img src="{{ asset('storage/images/stockImages/noUnitFound.svg') }}" alt="">
                                <h1 class="mt-5 text-xl font-bold text-[#5A2871]">Tidak bisa nemu persewaan </h1>
                            </div>
                            @else
                            @foreach ($rents as $unit)

                            @if ($unit->unit->storageOwner->is_active)
                            @if (isset($selectedUnit) && $selectedUnit->id == $unit->unit->id)
                            <li id="selectedUnit" class="border-2 border-[#3F1652] mb-2 rounded-xl p-3 ">
                                @else
                            <li class="border-2 border-[#E7E7E7] mb-2 rounded-xl p-3 ">
                                @endif
                                <a href="{{route('customer.rents', ['unit_id'=> $unit->unit->id])}}"
                                    class="flex items-center px-4 py-5 text-sm transition duration-150 ease-in-out
                                     border-gray-300 cursor-pointer hover:bg-[#FFF6E4] rounded-xl focus:outline-none relative">
                                    <div class="absolute bottom-1 right-0 flex gap-1 items-center">
                                        @foreach ($unit->unit->rents->sortBy('created_at')->groupBy('status') as
                                        $statusRent)
                                        @if ($loop->last)
                                        @if ($statusRent->first()->status == \App\Models\RentStatus::SUBMITTED)
                                        <span class="flex gap-1 items-center bg-[#E8F5FF] text-[#13354E] text-xs 
                                                font-semibold mr-2 px-2.5 py-0.5 rounded-lg"><svg width="13"
                                                height="13" viewBox="0 0 13 13" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4.5 6.75L6 8.25L8.5 5.25" stroke="#13354E"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path
                                                    d="M6.5 11.5C9.26142 11.5 11.5 9.26142 11.5 6.5C11.5 3.73858 9.26142 1.5 6.5 1.5C3.73858 1.5 1.5 3.73858 1.5 6.5C1.5 9.26142 3.73858 11.5 6.5 11.5Z"
                                                    stroke="#13354E" />
                                            </svg> Terkirim
                                        </span>
                                        @elseif ($statusRent->first()->status == \App\Models\RentStatus::APPROVED)
                                        <span class="flex gap-1 items-center bg-[#E8FFE9] text-[#134E1D] text-xs 
                                                font-semibold mr-2 px-2.5 py-0.5 rounded-lg"><svg width="13"
                                                height="13" viewBox="0 0 13 13" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4.5 6.75L6 8.25L8.5 5.25" stroke="#13354E"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path
                                                    d="M6.5 11.5C9.26142 11.5 11.5 9.26142 11.5 6.5C11.5 3.73858 9.26142 1.5 6.5 1.5C3.73858 1.5 1.5 3.73858 1.5 6.5C1.5 9.26142 3.73858 11.5 6.5 11.5Z"
                                                    stroke="#13354E" />
                                            </svg> Disetujui
                                        </span>
                                        @elseif ($statusRent->first()->status == \App\Models\RentStatus::DISAPPROVED)
                                        <span class="flex gap-1 items-center bg-[#FFE8E8] text-[#4E1313] text-xs 
                                                font-semibold mr-2 px-2.5 py-0.5 rounded-lg"><svg width="13"
                                                height="13" viewBox="0 0 13 13" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6.49967 1.0835C3.50426 1.0835 1.08301 3.50475 1.08301 6.50016C1.08301 9.49558 3.50426 11.9168 6.49967 11.9168C9.49509 11.9168 11.9163 9.49558 11.9163 6.50016C11.9163 3.50475 9.49509 1.0835 6.49967 1.0835ZM6.49967 10.8335C4.11092 10.8335 2.16634 8.88891 2.16634 6.50016C2.16634 4.11141 4.11092 2.16683 6.49967 2.16683C8.88842 2.16683 10.833 4.11141 10.833 6.50016C10.833 8.88891 8.88842 10.8335 6.49967 10.8335ZM8.44426 3.79183L6.49967 5.73641L4.55509 3.79183L3.79134 4.55558L5.73592 6.50016L3.79134 8.44475L4.55509 9.2085L6.49967 7.26391L8.44426 9.2085L9.20801 8.44475L7.26342 6.50016L9.20801 4.55558L8.44426 3.79183Z"
                                                    fill="#4E1313" />
                                            </svg>
                                            Ditolak
                                        </span>
                                        @elseif ($statusRent->first()->status ==
                                        \App\Models\RentStatus::INTRANSACTION)
                                        <span class="flex gap-1 items-center bg-[#F1E8FF] text-[#975BF8] text-xs 
                                                font-semibold mr-2 px-2.5 py-0.5 rounded-lg"><svg width="13"
                                                height="13" viewBox="0 0 13 13" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6.8898 5.8498C6.6298 5.7848 6.3698 5.6548 6.1748 5.4598C5.9798 5.3948 5.9148 5.1998 5.9148 5.0698C5.9148 4.9398 5.9798 4.7448 6.1098 4.6798C6.3048 4.5498 6.4998 4.4198 6.6948 4.4848C7.0848 4.4848 7.4098 4.6798 7.6048 4.9398L8.1898 4.1598C7.9948 3.9648 7.7998 3.8348 7.6048 3.7048C7.4098 3.5748 7.1498 3.5098 6.8898 3.5098V2.5998H6.1098V3.5098C5.7848 3.5748 5.4598 3.7698 5.1998 4.0298C4.9398 4.3548 4.7448 4.7448 4.8098 5.1348C4.8098 5.5248 4.9398 5.9148 5.1998 6.1748C5.5248 6.4998 5.9798 6.6948 6.3698 6.8898C6.5648 6.9548 6.8248 7.0848 7.0198 7.2148C7.1498 7.3448 7.2148 7.5398 7.2148 7.7348C7.2148 7.9298 7.1498 8.1248 7.0198 8.3198C6.8248 8.5148 6.5648 8.5798 6.3698 8.5798C6.1098 8.5798 5.7848 8.5148 5.5898 8.3198C5.3948 8.1898 5.1998 7.9948 5.0698 7.7998L4.4198 8.5148C4.6148 8.7748 4.8098 8.9698 5.0698 9.1648C5.3948 9.3598 5.7848 9.5548 6.1748 9.5548V10.3998H6.8898V9.4248C7.2798 9.3598 7.6048 9.1648 7.8648 8.9048C8.1898 8.5798 8.3848 8.0598 8.3848 7.6048C8.3848 7.2148 8.2548 6.7598 7.9298 6.4998C7.6048 6.1748 7.2798 5.9798 6.8898 5.8498V5.8498ZM6.4998 1.2998C3.6398 1.2998 1.2998 3.6398 1.2998 6.4998C1.2998 9.3598 3.6398 11.6998 6.4998 11.6998C9.3598 11.6998 11.6998 9.3598 11.6998 6.4998C11.6998 3.6398 9.3598 1.2998 6.4998 1.2998ZM6.4998 10.9848C4.0298 10.9848 2.0148 8.9698 2.0148 6.4998C2.0148 4.0298 4.0298 2.0148 6.4998 2.0148C8.9698 2.0148 10.9848 4.0298 10.9848 6.4998C10.9848 8.9698 8.9698 10.9848 6.4998 10.9848V10.9848Z"
                                                    fill="#975BF8" />
                                            </svg>
                                            Sedang Transaksi
                                        </span>
                                        @elseif ($statusRent->first()->status == \App\Models\RentStatus::INDELIVERY)
                                        <span class="flex gap-1 items-center bg-[#F8C35B30] text-[#C96A1C] text-xs 
                                        font-semibold mr-2 px-2.5 py-0.5 rounded-lg"><svg width="13" height="13"
                                                viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M5.375 2.4375H3.75V0.8125H2.9375V2.4375H1.3125V3.25H2.9375V4.875H3.75V3.25H5.375V2.4375Z"
                                                    fill="#C96A1C" />
                                                <path
                                                    d="M12.6546 6.74619L11.4358 3.90244C11.4046 3.82934 11.3525 3.76705 11.2861 3.72328C11.2198 3.67951 11.142 3.65621 11.0625 3.65625H9.84375V2.84375C9.84375 2.73601 9.80095 2.63267 9.72476 2.55649C9.64858 2.4803 9.54524 2.4375 9.4375 2.4375H6.59375V3.25H9.03125V8.35087C8.84613 8.45837 8.68413 8.60144 8.55458 8.77185C8.42503 8.94226 8.3305 9.13663 8.27644 9.34375H5.72356C5.63519 8.99509 5.43308 8.68585 5.14922 8.46496C4.86535 8.24407 4.51593 8.12414 4.15625 8.12414C3.79657 8.12414 3.44715 8.24407 3.16328 8.46496C2.87942 8.68585 2.67731 8.99509 2.58894 9.34375H2.125V5.6875H1.3125V9.75C1.3125 9.85774 1.3553 9.96108 1.43149 10.0373C1.50767 10.1134 1.61101 10.1562 1.71875 10.1562H2.58894C2.67731 10.5049 2.87942 10.8141 3.16328 11.035C3.44715 11.2559 3.79657 11.3759 4.15625 11.3759C4.51593 11.3759 4.86535 11.2559 5.14922 11.035C5.43308 10.8141 5.63519 10.5049 5.72356 10.1562H8.27644C8.36481 10.5049 8.56692 10.8141 8.85078 11.035C9.13465 11.2559 9.48407 11.3759 9.84375 11.3759C10.2034 11.3759 10.5529 11.2559 10.8367 11.035C11.1206 10.8141 11.3227 10.5049 11.4111 10.1562H12.2812C12.389 10.1562 12.4923 10.1134 12.5685 10.0373C12.6447 9.96108 12.6875 9.85774 12.6875 9.75V6.90625C12.6875 6.85121 12.6763 6.79675 12.6546 6.74619V6.74619ZM4.15625 10.5625C3.99555 10.5625 3.83846 10.5148 3.70485 10.4256C3.57123 10.3363 3.46709 10.2094 3.4056 10.0609C3.3441 9.91247 3.32801 9.7491 3.35936 9.59149C3.39071 9.43388 3.4681 9.28911 3.58173 9.17548C3.69536 9.06185 3.84013 8.98446 3.99774 8.95311C4.15535 8.92176 4.31872 8.93785 4.46718 8.99935C4.61565 9.06084 4.74254 9.16498 4.83182 9.2986C4.9211 9.43221 4.96875 9.5893 4.96875 9.75C4.96843 9.96539 4.88272 10.1719 4.73042 10.3242C4.57811 10.4765 4.37164 10.5622 4.15625 10.5625V10.5625ZM9.84375 4.46875H10.7944L11.6654 6.5H9.84375V4.46875ZM9.84375 10.5625C9.68305 10.5625 9.52596 10.5148 9.39235 10.4256C9.25873 10.3363 9.15459 10.2094 9.0931 10.0609C9.0316 9.91247 9.01551 9.7491 9.04686 9.59149C9.07821 9.43388 9.1556 9.28911 9.26923 9.17548C9.38286 9.06185 9.52763 8.98446 9.68524 8.95311C9.84285 8.92176 10.0062 8.93785 10.1547 8.99935C10.3031 9.06084 10.43 9.16498 10.5193 9.2986C10.6086 9.43221 10.6562 9.5893 10.6562 9.75C10.656 9.96542 10.5704 10.172 10.418 10.3243C10.2657 10.4766 10.0592 10.5623 9.84375 10.5625ZM11.875 9.34375H11.4111C11.3216 8.99577 11.1191 8.68732 10.8355 8.46676C10.5519 8.2462 10.2031 8.126 9.84375 8.125V7.3125H11.875V9.34375Z"
                                                    fill="#C96A1C" />
                                            </svg>
                                            Sedang Delivery
                                        </span>
                                        @elseif ($statusRent->first()->status == \App\Models\RentStatus::DELETED)
                                        <span class="flex gap-1 items-center bg-[#E8EBFF] text-[#5B6BF8] text-xs 
                                                font-semibold mr-2 px-2.5 py-0.5 rounded-lg"> <svg width="13"
                                                height="13" viewBox="0 0 13 13" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4.5 6.75L6 8.25L8.5 5.25" stroke="#5B6BF8"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path
                                                    d="M6.5 11.5C9.26142 11.5 11.5 9.26142 11.5 6.5C11.5 3.73858 9.26142 1.5 6.5 1.5C3.73858 1.5 1.5 3.73858 1.5 6.5C1.5 9.26142 3.73858 11.5 6.5 11.5Z"
                                                    stroke="#5B6BF8" />
                                            </svg> Sudah Selesai
                                        </span>
                                        @endif
                                        @endif
                                        @endforeach
                                    </div>
                                    <div class="absolute top-1 right-0 flex gap-1 items-center">
                                        @if ($unit->unit->storageOwner->is_trusted)
                                        <span class="flex gap-1 items-center bg-[#E8F5FF] text-[#13354E] text-xs 
                                        font-semibold mr-2 px-2.5 py-0.5 rounded-lg"><svg width="13" height="13"
                                                viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4.5 6.75L6 8.25L8.5 5.25" stroke="#13354E"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path
                                                    d="M6.5 11.5C9.26142 11.5 11.5 9.26142 11.5 6.5C11.5 3.73858 9.26142 1.5 6.5 1.5C3.73858 1.5 1.5 3.73858 1.5 6.5C1.5 9.26142 3.73858 11.5 6.5 11.5Z"
                                                    stroke="#13354E" />
                                            </svg> Terpercaya
                                        </span>
                                        @endif
                                        @if (isset($unit->unit->storageOwner->deliveryDrivers))
                                        @php
                                        $is_there_driver = false;
                                        foreach ($unit->unit->storageOwner->deliveryDrivers as $deliveryDriver) {
                                        if(!$deliveryDriver->status && $deliveryDriver->pivot->status){
                                        $is_there_driver = true;
                                        break;
                                        }
                                        }
                                        @endphp
                                        @if ($is_there_driver)
                                        <span class="flex gap-1 items-center bg-[#F8C35B30] text-[#C96A1C] text-xs 
                                        font-semibold mr-2 px-2.5 py-0.5 rounded-lg"><svg width="13" height="13"
                                                viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4.5 6.75L6 8.25L8.5 5.25" stroke="#C96A1C"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path
                                                    d="M6.5 11.5C9.26142 11.5 11.5 9.26142 11.5 6.5C11.5 3.73858 9.26142 1.5 6.5 1.5C3.73858 1.5 1.5 3.73858 1.5 6.5C1.5 9.26142 3.73858 11.5 6.5 11.5Z"
                                                    stroke="#C96A1C" />
                                            </svg> Delivery
                                        </span>
                                        @endif
                                        @endif
                                    </div>
                                    <img class="object-fit w-16 h-16 rounded-lg mt-2"
                                        src="{{ asset('storage/'. $unit->unit->unitCategory->image) }}"
                                        alt="unitImage" />
                                    <div class="w-full mt-2">
                                        <div class="flex flex-col justify-between">
                                            <span
                                                class="block ml-3 text-base font-bold text-black">{{$unit->unit->storageOwner->storage_name}}</span>

                                            <span
                                                class="block ml-3 text-sm font-semibold text-black">{{$unit->unit->unitCategory->name}}</span>
                                        </div>
                                        <span class="flex items-center gap-1 ml-3 text-sm text-gray-600">
                                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6.00004 1C3.79454 1 2.00004 2.7945 2.00004 4.9975C1.98554 8.22 5.84804 10.892 6.00004 11C6.00004 11 10.0145 8.22 10 5C10 2.7945 8.20554 1 6.00004 1ZM6.00004 7C4.89504 7 4.00004 6.105 4.00004 5C4.00004 3.895 4.89504 3 6.00004 3C7.10504 3 8.00004 3.895 8.00004 5C8.00004 6.105 7.10504 7 6.00004 7Z"
                                                    fill="#B1B1B1" />
                                            </svg>
                                            {{$unit->unit->city}}</span>
                                    </div>
                                </a>
                            </li>
                            @endif
                            @endforeach
                            @endif
                        </ul>
                    </div>
                    {{-- detail --}}
                    @if ($rents->count() > 0)

                    <div id="detail" class="lg:col-span-2 lg:block">
                        <div class="w-full lg:ml-3 rounded-xl border-2 relative">
                            <div class="absolute -top-5 -right-3 p-5 bg-gray-100 rounded-full">
                                <a id="close" onclick="closeSideBar()">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6 6L18 6M6 18L18 18M6 12L18 12" stroke="#5B6BF8" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                                <a id="open" class="hidden" onclick="OpenSideBar()">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M18 6L6 18" stroke="#5B6BF8" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </div>
                            @if (isset($selectedUnit))
                            <div class="px-5 py-6">
                                <div class="flex flex-wrap space-y-2 justify-between items-center mb-2">
                                    <h1 class="text-2xl font-bold text-black">
                                        {{$selectedUnit->storageOwner->storage_name}}
                                    </h1>
                                    @if (!$selectedUnit->is_rented)
                                    <a href="{{route('daftarUnitPenyimpanan', ['unit_id' =>
                                        $selectedUnit->id])}}"
                                        class="justify-self-end	self-end relative inline-flex items-center justify-center p-0.5 overflow-hidden text-base font-bold text-[#3F1652]] 
                                        rounded-full group bg-gradient-to-br from-[#E52878] to-[#F8C35B] hover:text-black">
                                        <span
                                            class="relative px-8 py-2.5 transition-all ease-in duration-75 bg-white rounded-full hover:text-gray-600">
                                            Cek di daftar unit
                                        </span>
                                    </a>
                                    @endif
                                </div>
                                <div class="flex justify-between items-center mb-2 mr-4">
                                    <div>
                                        <span class="text-sm text-[#BBB9B9]">Pemilik</span>
                                        <div class="flex gap-2 items-center mt-2">
                                            <img class="object-fit w-8 h-8 rounded-full"
                                                src="{{ asset('storage/'. $selectedUnit->storageOwner->image) }}"
                                                alt="ownerImage" />
                                            <a href="{{route('daftarUnitPenyimpanan', ['storage_owner_id' =>
                                                    $selectedUnit->storageOwner->id])}}"><span
                                                    class="text-base text-black underline underline-offset-2">{{$selectedUnit->storageOwner->user->name}}</span></a>
                                        </div>
                                    </div>
                                    <div class="self-end">
                                        <span class="text-xl font-bold text-black">
                                            {{"Rp." . number_format($selectedUnit->price_per_day , 0, ',', '.') . " / hari"}}
                                        </span>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center mt-5 mb-2  mr-4">
                                    <div>
                                        <span class="text-sm text-[#BBB9B9]">Lokasi</span>
                                        <div class="flex gap-2 mt-2">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M12 1.5C9.81276 1.50258 7.71584 2.3726 6.16923 3.91922C4.62261 5.46584 3.75259 7.56276 3.75001 9.75C3.74739 11.5374 4.33124 13.2763 5.41201 14.7C5.41201 14.7 5.63701 14.9963 5.67376 15.039L12 22.5L18.3293 15.0353C18.3623 14.9955 18.588 14.7 18.588 14.7L18.5888 14.6978C19.669 13.2747 20.2526 11.5366 20.25 9.75C20.2474 7.56276 19.3774 5.46584 17.8308 3.91922C16.2842 2.3726 14.1873 1.50258 12 1.5ZM12 12.75C11.4067 12.75 10.8266 12.5741 10.3333 12.2444C9.83995 11.9148 9.45543 11.4462 9.22837 10.8981C9.00131 10.3499 8.9419 9.74667 9.05765 9.16473C9.17341 8.58279 9.45913 8.04824 9.87869 7.62868C10.2982 7.20912 10.8328 6.9234 11.4147 6.80764C11.9967 6.69189 12.5999 6.7513 13.1481 6.97836C13.6962 7.20542 14.1648 7.58994 14.4944 8.08329C14.8241 8.57664 15 9.15666 15 9.75C14.999 10.5453 14.6826 11.3078 14.1202 11.8702C13.5578 12.4326 12.7954 12.749 12 12.75Z"
                                                    fill="black" />
                                            </svg>
                                            <span class="text-base text-black">{{$selectedUnit->address}}</span>
                                        </div>
                                    </div>
                                    <div class="self-end">
                                        <span class="text-sm text-[#BBB9B9]">Kategori Ukuran</span>
                                        <div class="flex gap-2 items-center mt-2">
                                            <img class="object-fit w-8 h-8 rounded-full"
                                                src="{{ asset('storage/'. $selectedUnit->unitCategory->image) }}"
                                                alt="categoryImage" />
                                            @if (isset(explode(" ", $selectedUnit->unitCategory->name)[1]))
                                            <span
                                                class="text-base text-black">{{explode(" ", $selectedUnit->unitCategory->name)[1]}}</span>
                                            @else
                                            <span
                                                class="text-base text-black">{{$selectedUnit->unitCategory->name}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="my-5">
                                    <span class="text-xl font-bold text-black mb-2">Masa Sewa unit ini</span>
                                    @foreach ($selectedUnit->rents->sortBy('starts_from')->groupBy(
                                    'starts_from',
                                    'ends_at') as
                                    $unitRents)
                                    @php
                                    $startTimeStamp = strtotime($unitRents->first()->starts_from);
                                    $endTimeStamp = strtotime($unitRents->first()->ends_at);

                                    $timeDiff = abs($endTimeStamp - $startTimeStamp);

                                    $numberDays = $timeDiff/86400;
                                    $numberDays = intval($numberDays);

                                    $today = strtotime(date("Y-m-d"));

                                    $daysLeft = ($endTimeStamp - $today);
                                    $daysLeft = intval($daysLeft/86400);

                                    $daysWent = ($today - $startTimeStamp);
                                    $daysWent = intval($daysWent/86400);

                                    if ($numberDays == 0) {
                                    $percentage = 0;
                                    }else{
                                    $percentage = round(($daysWent / $numberDays) * 100);
                                    }
                                    $haveStarted = $daysWent >= 0;
                                    $haveEnded = 0 >= $daysLeft;
                                    @endphp
                                    <div class="py-4 my-2 px-2  border-b-4">
                                        <div class="flex justify-between w-full mb-2">
                                            <span>{{date('d M Y', strtotime($unitRents->first()->starts_from))}}</span>
                                            @if ($unitRents->first()->status == \App\Models\RentStatus::SUBMITTED)
                                            <span class="flex gap-1 items-center bg-[#E8F5FF] text-[#13354E] text-xs 
                                                    font-semibold mr-2 px-2.5 py-0.5 rounded-lg"><svg width="13"
                                                    height="13" viewBox="0 0 13 13" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M4.5 6.75L6 8.25L8.5 5.25" stroke="#13354E"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path
                                                        d="M6.5 11.5C9.26142 11.5 11.5 9.26142 11.5 6.5C11.5 3.73858 9.26142 1.5 6.5 1.5C3.73858 1.5 1.5 3.73858 1.5 6.5C1.5 9.26142 3.73858 11.5 6.5 11.5Z"
                                                        stroke="#13354E" />
                                                </svg> Terkirim
                                            </span>
                                            @elseif ($unitRents->first()->status == \App\Models\RentStatus::APPROVED)
                                            <span class="flex gap-1 items-center bg-[#E8FFE9] text-[#134E1D] text-xs 
                                                    font-semibold mr-2 px-2.5 py-0.5 rounded-lg"><svg width="13"
                                                    height="13" viewBox="0 0 13 13" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M4.5 6.75L6 8.25L8.5 5.25" stroke="#13354E"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path
                                                        d="M6.5 11.5C9.26142 11.5 11.5 9.26142 11.5 6.5C11.5 3.73858 9.26142 1.5 6.5 1.5C3.73858 1.5 1.5 3.73858 1.5 6.5C1.5 9.26142 3.73858 11.5 6.5 11.5Z"
                                                        stroke="#13354E" />
                                                </svg> Disetujui
                                            </span>
                                            @elseif ($unitRents->first()->status == \App\Models\RentStatus::DISAPPROVED)
                                            <span class="flex gap-1 items-center bg-[#FFE8E8] text-[#4E1313] text-xs 
                                                    font-semibold mr-2 px-2.5 py-0.5 rounded-lg"><svg width="13"
                                                    height="13" viewBox="0 0 13 13" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M6.49967 1.0835C3.50426 1.0835 1.08301 3.50475 1.08301 6.50016C1.08301 9.49558 3.50426 11.9168 6.49967 11.9168C9.49509 11.9168 11.9163 9.49558 11.9163 6.50016C11.9163 3.50475 9.49509 1.0835 6.49967 1.0835ZM6.49967 10.8335C4.11092 10.8335 2.16634 8.88891 2.16634 6.50016C2.16634 4.11141 4.11092 2.16683 6.49967 2.16683C8.88842 2.16683 10.833 4.11141 10.833 6.50016C10.833 8.88891 8.88842 10.8335 6.49967 10.8335ZM8.44426 3.79183L6.49967 5.73641L4.55509 3.79183L3.79134 4.55558L5.73592 6.50016L3.79134 8.44475L4.55509 9.2085L6.49967 7.26391L8.44426 9.2085L9.20801 8.44475L7.26342 6.50016L9.20801 4.55558L8.44426 3.79183Z"
                                                        fill="#4E1313" />
                                                </svg>
                                                Ditolak
                                            </span>
                                            @elseif ($unitRents->first()->status ==
                                            \App\Models\RentStatus::INTRANSACTION)
                                            <span class="flex gap-1 items-center bg-[#F1E8FF] text-[#975BF8] text-xs 
                                                    font-semibold mr-2 px-2.5 py-0.5 rounded-lg"><svg width="13"
                                                    height="13" viewBox="0 0 13 13" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M6.8898 5.8498C6.6298 5.7848 6.3698 5.6548 6.1748 5.4598C5.9798 5.3948 5.9148 5.1998 5.9148 5.0698C5.9148 4.9398 5.9798 4.7448 6.1098 4.6798C6.3048 4.5498 6.4998 4.4198 6.6948 4.4848C7.0848 4.4848 7.4098 4.6798 7.6048 4.9398L8.1898 4.1598C7.9948 3.9648 7.7998 3.8348 7.6048 3.7048C7.4098 3.5748 7.1498 3.5098 6.8898 3.5098V2.5998H6.1098V3.5098C5.7848 3.5748 5.4598 3.7698 5.1998 4.0298C4.9398 4.3548 4.7448 4.7448 4.8098 5.1348C4.8098 5.5248 4.9398 5.9148 5.1998 6.1748C5.5248 6.4998 5.9798 6.6948 6.3698 6.8898C6.5648 6.9548 6.8248 7.0848 7.0198 7.2148C7.1498 7.3448 7.2148 7.5398 7.2148 7.7348C7.2148 7.9298 7.1498 8.1248 7.0198 8.3198C6.8248 8.5148 6.5648 8.5798 6.3698 8.5798C6.1098 8.5798 5.7848 8.5148 5.5898 8.3198C5.3948 8.1898 5.1998 7.9948 5.0698 7.7998L4.4198 8.5148C4.6148 8.7748 4.8098 8.9698 5.0698 9.1648C5.3948 9.3598 5.7848 9.5548 6.1748 9.5548V10.3998H6.8898V9.4248C7.2798 9.3598 7.6048 9.1648 7.8648 8.9048C8.1898 8.5798 8.3848 8.0598 8.3848 7.6048C8.3848 7.2148 8.2548 6.7598 7.9298 6.4998C7.6048 6.1748 7.2798 5.9798 6.8898 5.8498V5.8498ZM6.4998 1.2998C3.6398 1.2998 1.2998 3.6398 1.2998 6.4998C1.2998 9.3598 3.6398 11.6998 6.4998 11.6998C9.3598 11.6998 11.6998 9.3598 11.6998 6.4998C11.6998 3.6398 9.3598 1.2998 6.4998 1.2998ZM6.4998 10.9848C4.0298 10.9848 2.0148 8.9698 2.0148 6.4998C2.0148 4.0298 4.0298 2.0148 6.4998 2.0148C8.9698 2.0148 10.9848 4.0298 10.9848 6.4998C10.9848 8.9698 8.9698 10.9848 6.4998 10.9848V10.9848Z"
                                                        fill="#975BF8" />
                                                </svg>
                                                Sedang Transaksi
                                            </span>
                                            @elseif ($unitRents->first()->status == \App\Models\RentStatus::INDELIVERY)
                                            <span class="flex gap-1 items-center bg-[#F8C35B30] text-[#C96A1C] text-xs 
                                            font-semibold mr-2 px-2.5 py-0.5 rounded-lg"><svg width="13" height="13"
                                                    viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M5.375 2.4375H3.75V0.8125H2.9375V2.4375H1.3125V3.25H2.9375V4.875H3.75V3.25H5.375V2.4375Z"
                                                        fill="#C96A1C" />
                                                    <path
                                                        d="M12.6546 6.74619L11.4358 3.90244C11.4046 3.82934 11.3525 3.76705 11.2861 3.72328C11.2198 3.67951 11.142 3.65621 11.0625 3.65625H9.84375V2.84375C9.84375 2.73601 9.80095 2.63267 9.72476 2.55649C9.64858 2.4803 9.54524 2.4375 9.4375 2.4375H6.59375V3.25H9.03125V8.35087C8.84613 8.45837 8.68413 8.60144 8.55458 8.77185C8.42503 8.94226 8.3305 9.13663 8.27644 9.34375H5.72356C5.63519 8.99509 5.43308 8.68585 5.14922 8.46496C4.86535 8.24407 4.51593 8.12414 4.15625 8.12414C3.79657 8.12414 3.44715 8.24407 3.16328 8.46496C2.87942 8.68585 2.67731 8.99509 2.58894 9.34375H2.125V5.6875H1.3125V9.75C1.3125 9.85774 1.3553 9.96108 1.43149 10.0373C1.50767 10.1134 1.61101 10.1562 1.71875 10.1562H2.58894C2.67731 10.5049 2.87942 10.8141 3.16328 11.035C3.44715 11.2559 3.79657 11.3759 4.15625 11.3759C4.51593 11.3759 4.86535 11.2559 5.14922 11.035C5.43308 10.8141 5.63519 10.5049 5.72356 10.1562H8.27644C8.36481 10.5049 8.56692 10.8141 8.85078 11.035C9.13465 11.2559 9.48407 11.3759 9.84375 11.3759C10.2034 11.3759 10.5529 11.2559 10.8367 11.035C11.1206 10.8141 11.3227 10.5049 11.4111 10.1562H12.2812C12.389 10.1562 12.4923 10.1134 12.5685 10.0373C12.6447 9.96108 12.6875 9.85774 12.6875 9.75V6.90625C12.6875 6.85121 12.6763 6.79675 12.6546 6.74619V6.74619ZM4.15625 10.5625C3.99555 10.5625 3.83846 10.5148 3.70485 10.4256C3.57123 10.3363 3.46709 10.2094 3.4056 10.0609C3.3441 9.91247 3.32801 9.7491 3.35936 9.59149C3.39071 9.43388 3.4681 9.28911 3.58173 9.17548C3.69536 9.06185 3.84013 8.98446 3.99774 8.95311C4.15535 8.92176 4.31872 8.93785 4.46718 8.99935C4.61565 9.06084 4.74254 9.16498 4.83182 9.2986C4.9211 9.43221 4.96875 9.5893 4.96875 9.75C4.96843 9.96539 4.88272 10.1719 4.73042 10.3242C4.57811 10.4765 4.37164 10.5622 4.15625 10.5625V10.5625ZM9.84375 4.46875H10.7944L11.6654 6.5H9.84375V4.46875ZM9.84375 10.5625C9.68305 10.5625 9.52596 10.5148 9.39235 10.4256C9.25873 10.3363 9.15459 10.2094 9.0931 10.0609C9.0316 9.91247 9.01551 9.7491 9.04686 9.59149C9.07821 9.43388 9.1556 9.28911 9.26923 9.17548C9.38286 9.06185 9.52763 8.98446 9.68524 8.95311C9.84285 8.92176 10.0062 8.93785 10.1547 8.99935C10.3031 9.06084 10.43 9.16498 10.5193 9.2986C10.6086 9.43221 10.6562 9.5893 10.6562 9.75C10.656 9.96542 10.5704 10.172 10.418 10.3243C10.2657 10.4766 10.0592 10.5623 9.84375 10.5625ZM11.875 9.34375H11.4111C11.3216 8.99577 11.1191 8.68732 10.8355 8.46676C10.5519 8.2462 10.2031 8.126 9.84375 8.125V7.3125H11.875V9.34375Z"
                                                        fill="#C96A1C" />
                                                </svg>
                                                Sedang Delivery
                                            </span>
                                            @elseif ($unitRents->first()->status == \App\Models\RentStatus::DELETED)
                                            <span class="flex gap-1 items-center bg-[#E8EBFF] text-[#5B6BF8] text-xs 
                                                    font-semibold mr-2 px-2.5 py-0.5 rounded-lg"> <svg width="13"
                                                    height="13" viewBox="0 0 13 13" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M4.5 6.75L6 8.25L8.5 5.25" stroke="#5B6BF8"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path
                                                        d="M6.5 11.5C9.26142 11.5 11.5 9.26142 11.5 6.5C11.5 3.73858 9.26142 1.5 6.5 1.5C3.73858 1.5 1.5 3.73858 1.5 6.5C1.5 9.26142 3.73858 11.5 6.5 11.5Z"
                                                        stroke="#5B6BF8" />
                                                </svg> Sudah Selesai
                                            </span>
                                            @endif
                                            <span>{{date('d M Y', strtotime($unitRents->first()->ends_at))}}</span>
                                        </div>
                                        @if ($haveStarted && !$haveEnded)
                                        <div class="w-full bg-gray-200 rounded-full"
                                            data-tooltip-target="tooltipDate{{$unitRents->first()->id}}">
                                            <div class="bg-blue-600 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full"
                                                style="width: {{$percentage}}%">{{$percentage}}%</div>
                                        </div>
                                        <div id="tooltipDate{{$unitRents->first()->id}}" role="tooltip"
                                            class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                                            Hari tersisa: {{$daysLeft}} Hari
                                            <br>
                                            Hari berlalu: {{$daysWent}} Hari
                                            <br>
                                            Masa sewa {{$numberDays}} Hari
                                            <div class="tooltip-arrow" data-popper-arrow></div>
                                        </div>
                                        @else
                                        @if ($haveEnded)
                                        <div class="w-full bg-gray-200 rounded-full"
                                            data-tooltip-target="tooltipDate{{$unitRents->first()->id}}">
                                            <div class="bg-red-600 text-xs font-medium text-red-100 text-center p-0.5 leading-none rounded-full"
                                                style="width: 100%">Sudah selesai</div>
                                        </div>
                                        <div id="tooltipDate{{$unitRents->first()->id}}" role="tooltip"
                                            class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                                            Sudah selesai <br>
                                            Masa sewa {{$numberDays}} Hari
                                            <div class="tooltip-arrow" data-popper-arrow></div>
                                        </div>
                                        @else
                                        <div class="w-full bg-gray-200 rounded-full"
                                            data-tooltip-target="tooltipDate{{$unitRents->first()->id}}">
                                            <div class="bg-yellow-100 text-xs font-medium text-black text-center p-0.5 leading-none rounded-full"
                                                style="width: 100%">Belum mulai</div>
                                        </div>
                                        @endif
                                        <div id="tooltipDate{{$unitRents->first()->id}}" role="tooltip"
                                            class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                                            Belum mulai <br>
                                            Masa sewa {{$numberDays}} Hari
                                            <div class="tooltip-arrow" data-popper-arrow></div>
                                        </div>
                                        @endif
                                        <div class="flex justify-end my-2">
                                            <span class="p-2 bg-green-100 text-green-500 rounded-xl text-sm "> Total
                                                Harga :
                                                {{"Rp." . number_format($unitRents->first()->total_price , 0, ',', '.')}}</span>
                                        </div>
                                        <div>
                                            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                                                <table class="w-full text-sm text-left text-gray-500">
                                                    <caption
                                                        class="p-5 text-lg font-semibold text-left text-gray-900 bg-white">
                                                        Transkasi Pembayaran
                                                        <p class="mt-1 text-sm font-normal text-gray-500">
                                                            Terkait sewa unit {{$selectedUnit->name}} dari tanggal
                                                            {{date('d M Y', strtotime($unitRents->first()->starts_from))}}
                                                            sampai tanggal
                                                            {{date('d M Y', strtotime($unitRents->first()->ends_at))}}.
                                                        </p>
                                                    </caption>
                                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                                        <tr>
                                                            <th scope="col" class="py-3 px-4">
                                                                Bank
                                                            </th>
                                                            <th scope="col" class="py-3 px-4">
                                                                Keterangan
                                                            </th>
                                                            <th scope="col" class="py-3 px-4">
                                                                Total Harga
                                                            </th>
                                                            <th scope="col" class="py-3 px-4">
                                                                Status
                                                            </th>
                                                            <th scope="col" class="py-3 px-4">
                                                                Bukti
                                                            </th>
                                                            <th scope="col" class="py-3 px-4">
                                                                Action
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($unitRents->first()->transactions as $transaction)
                                                        @if($transaction->customer_id != Auth::user()->customer->id)
                                                        @else
                                                        <tr class="bg-white border-b">
                                                            <th scope="row" class="py-4 px-4">
                                                                @if ($transaction->storage_owner_bank_id == null)
                                                                <span class="text-red-500">
                                                                    Belum bayar
                                                                </span>
                                                                @else
                                                                {{$transaction->storageOwnerBank->bank->name}}
                                                                @endif
                                                            </th>
                                                            <td class="py-4 px-4">
                                                                @if ($transaction->description == null)
                                                                <span class="text-red-500">
                                                                    Tidak ada keterangan
                                                                </span>
                                                                @else
                                                                {{$transaction->description}}
                                                                @endif
                                                            </td>
                                                            <td class="py-4 px-4">
                                                                {{"Rp." . number_format($transaction->total_price , 0, ',', '.')}}
                                                            </td>
                                                            <td class="py-4 px-4 w-32">
                                                                @if ($transaction->status ==
                                                                \App\Models\TransactionStatus ::NOTPAID)
                                                                <span
                                                                    class="p-1 text-xs text-red-500 bg-red-100 rounded-2xl">
                                                                    Belum Bayar
                                                                </span>
                                                                @elseif ($transaction->status ==
                                                                \App\Models\TransactionStatus ::PAID)
                                                                <span
                                                                    class="p-1 text-xs text-green-500 bg-green-100 rounded-2xl">
                                                                    Sudah Bayar
                                                                </span>
                                                                @elseif ($transaction->status ==
                                                                \App\Models\TransactionStatus ::APPROVED)
                                                                <span
                                                                    class="p-1 text-xs text-green-500 bg-green-100 rounded-2xl">
                                                                    Sudah Diterima
                                                                </span>
                                                                @elseif ($transaction->status ==
                                                                \App\Models\TransactionStatus ::DISAPPROVED)
                                                                <span
                                                                    class="p-1 text-xs text-red-500 bg-red-100 rounded-2xl">
                                                                    Ditolak
                                                                </span>
                                                                @elseif ($transaction->status ==
                                                                \App\Models\TransactionStatus ::DELETED)
                                                                <span
                                                                    class="p-1 text-xs text-red-500 bg-red-100 rounded-2xl">
                                                                    Dihapus
                                                                </span>
                                                                @endif
                                                            </td>
                                                            <td class="py-4 px-4">
                                                                @if ($transaction->proof == null)
                                                                <span class="text-red-500">
                                                                    Belum ada bukti
                                                                </span>
                                                                @else
                                                                <a class="hover:underline" target="_blank"
                                                                    rel="noopener noreferrer"
                                                                    href="{{ asset('storage/'.$transaction->proof) }}">Lihat
                                                                    bukti</a>
                                                                @endif
                                                            </td>
                                                            <td class="py-4 px-6 flex flex-col items-start gap-1">
                                                                @if ($transaction->status ==
                                                                \App\Models\TransactionStatus ::NOTPAID)
                                                                <button data-modal-toggle="pay{{$transaction->id}}"
                                                                    class="text-sm text-blue-500 hover:text-blue-700">
                                                                    Bayar
                                                                </button>

                                                                <!-- Main modal -->
                                                                <div id="pay{{$transaction->id}}" tabindex="-1"
                                                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center flex"
                                                                    aria-modal="true" role="dialog"
                                                                    data-modal-placement="top-left">
                                                                    <div
                                                                        class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                                                                        <!-- Modal content -->
                                                                        <form
                                                                            action="{{ route('customer.payTransaction', ['transaction'=>$transaction]) }}"
                                                                            enctype="multipart/form-data" method="POST">
                                                                            @method('PUT')
                                                                            @csrf
                                                                            <div
                                                                                class="relative bg-white rounded-lg shadow">
                                                                                <!-- Modal header -->
                                                                                <div
                                                                                    class="flex justify-between items-start p-4 rounded-t border-b">
                                                                                    <h3
                                                                                        class="text-xl font-semibold text-gray-900 ">
                                                                                        Pembayaran untuk <br>
                                                                                        <small>{{$transaction->description}}</small>
                                                                                    </h3>
                                                                                    <button type="button"
                                                                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                                                                                        data-modal-toggle="pay{{$transaction->id}}">
                                                                                        <svg aria-hidden="true"
                                                                                            class="w-5 h-5"
                                                                                            fill="currentColor"
                                                                                            viewBox="0 0 20 20"
                                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                                            <path fill-rule="evenodd"
                                                                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                                                clip-rule="evenodd">
                                                                                            </path>
                                                                                        </svg>
                                                                                        <span class="sr-only">Close
                                                                                            modal</span>
                                                                                    </button>
                                                                                </div>
                                                                                <!-- Modal body -->
                                                                                <div class="p-6 space-y-6">
                                                                                    <div class="mt-1">
                                                                                        <div
                                                                                            class="flex justify-between items-center mb-2">
                                                                                            <label
                                                                                                class="block text-lg font-bold text-gray-900 mb-2"
                                                                                                for="">Memilih rekening
                                                                                                bank</label>
                                                                                            <span
                                                                                                class="p-2 bg-green-100 text-green-500 rounded-xl text-sm ">
                                                                                                Total
                                                                                                Harga :
                                                                                                {{"Rp." . number_format($transaction->total_price , 0, ',', '.')}}
                                                                                            </span>

                                                                                        </div>
                                                                                        @if(!isset($selectedUnit->storageOwner->storageOwnerBank))
                                                                                        <div
                                                                                            class="flex flex-col items-center justify-center">
                                                                                            <div
                                                                                                class="w-full text-center">
                                                                                                <div
                                                                                                    class="text-gray-600 text-lg">
                                                                                                    Belum ada rekening
                                                                                                    bank
                                                                                                    yang tersedia
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        @else
                                                                                        <ul
                                                                                            class="grid grid-2 gap-6 w-full md:grid-cols-2">
                                                                                            @foreach($selectedUnit->storageOwner->storageOwnerBank
                                                                                            as $bank)
                                                                                            @php
                                                                                            $ind = 0;
                                                                                            @endphp
                                                                                            @if(!$bank->is_verified)
                                                                                            @else
                                                                                            @php
                                                                                            $ind = 1;
                                                                                            @endphp
                                                                                            <li>
                                                                                                <input type="radio"
                                                                                                    id="bank_account-{{$bank->id}}-{{$transaction->id}}"
                                                                                                    name="bank_account"
                                                                                                    value="bank_account-{{$bank->id}}-{{$transaction->id}}"
                                                                                                    class="hidden peer">
                                                                                                <label
                                                                                                    for="bank_account-{{$bank->id}}-{{$transaction->id}}"
                                                                                                    class="inline-flex justify-between items-center p-5 w-full text-gray-500 bg-white relative 
                                                                                            rounded-lg drop-shadow border-2 peer-checked:border-2 border-white cursor-pointer peer-checked:border-[#72358E] peer-checked:text-[#72358E] hover:text-gray-600 hover:bg-[#FFF6E4]">
                                                                                                    <div
                                                                                                        class="w-full text-lg font-semibold flex gap-2 felx-wrap ">
                                                                                                        <img class="rounded-full ring-2 ring-offset-2 ring-[#72358E]"
                                                                                                            width="50"
                                                                                                            height="50"
                                                                                                            src="{{ asset('storage/'.$bank->bank->image) }}"
                                                                                                            alt="bank{{$bank->bank->name}}">
                                                                                                        <div
                                                                                                            class="self-start flex flex-col">
                                                                                                            <span
                                                                                                                class="font-bold text-sm">{{$bank->bank->name}}</span>
                                                                                                            <span
                                                                                                                class="text-sm">{{$bank->account_number}}</span>
                                                                                                        </div>

                                                                                                    </div>
                                                                                                    <span
                                                                                                        class="absolute bottom-1 right-1 flex gap-1 items-center bg-[#E8F5FF] text-[#13354E] text-xs 
                                                                                            font-semibold  px-2.5 py-0.5 rounded-lg">
                                                                                                        <svg width="13"
                                                                                                            height="13"
                                                                                                            viewBox="0 0 13 13"
                                                                                                            fill="none"
                                                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                                                            <path
                                                                                                                d="M4.5 6.75L6 8.25L8.5 5.25"
                                                                                                                stroke="#13354E"
                                                                                                                stroke-linecap="round"
                                                                                                                stroke-linejoin="round" />
                                                                                                            <path
                                                                                                                d="M6.5 11.5C9.26142 11.5 11.5 9.26142 11.5 6.5C11.5 3.73858 9.26142 1.5 6.5 1.5C3.73858 1.5 1.5 3.73858 1.5 6.5C1.5 9.26142 3.73858 11.5 6.5 11.5Z"
                                                                                                                stroke="#13354E" />
                                                                                                        </svg> Verified
                                                                                                    </span>
                                                                                                    @if($bank->is_primary)
                                                                                                    <span
                                                                                                        class="absolute top-1 right-1 bg-blue-300 text-blue-500 text-xs font-semibold px-2.5 py-0.5 rounded-lg">Primary</span>
                                                                                                    @endif
                                                                                                </label>
                                                                                            </li>
                                                                                            @endif
                                                                                            @endforeach
                                                                                        </ul>
                                                                                        @if ($ind == 0)
                                                                                        <div
                                                                                            class="flex flex-col items-center justify-center">
                                                                                            <div
                                                                                                class="w-full text-center text-gray-500">
                                                                                                <div
                                                                                                    class="text-xl font-bold">
                                                                                                    Belum ada rekening
                                                                                                    bank
                                                                                                </div>
                                                                                                <div class="text-sm">
                                                                                                    Silahkan hubungi
                                                                                                    owner
                                                                                                    unit untuk
                                                                                                    mengaktifkan
                                                                                                    rekening bank
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        @endif
                                                                                        @endif
                                                                                        <div class="mt-2">
                                                                                            <label
                                                                                                class="block text-lg font-bold text-gray-900 mt-5 mb-5"
                                                                                                for="">Unggah bukti
                                                                                                pembayaran</label>
                                                                                            <div
                                                                                                class="flex flex-col gap-4">
                                                                                                <small
                                                                                                    class="p-2 border-l-2 border-[#F8C35B] bg-[#F8C35B50] text-black">Pilih
                                                                                                    salah satu bank dari
                                                                                                    daftar di atas dan
                                                                                                    kirimkan jumlah di
                                                                                                    bawah
                                                                                                    ini ke rekening
                                                                                                    tersebut.</small>
                                                                                            </div>
                                                                                            <input
                                                                                                class="mt-3 block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer"
                                                                                                id="file_input"
                                                                                                type="file" name="proof"
                                                                                                accept="image/*">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <!-- Modal footer -->
                                                                                <div
                                                                                    class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200">
                                                                                    <button type="submit"
                                                                                        class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                                                                        Bayar</button>
                                                                                    <button
                                                                                        data-modal-toggle="pay{{$transaction->id}}"
                                                                                        type="button"
                                                                                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Batal</button>
                                                                                </div>
                                                                            </div>
                                                                        </form>

                                                                    </div>
                                                                </div>
                                                                @endif
                                                                @if ($transaction->status !=
                                                                \App\Models\TransactionStatus ::DELETED)
                                                                <button
                                                                    data-modal-toggle="deletePayment{{$transaction->id}}"
                                                                    class="font-medium text-blue-600 hover:underline">Hapus</button>
                                                                <div id="deletePayment{{$transaction->id}}"
                                                                    tabindex="-1"
                                                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full justify-center items-center flex"
                                                                    aria-modal="true" role="dialog">
                                                                    <div
                                                                        class="relative p-4 w-full max-w-md h-full md:h-auto">
                                                                        <div
                                                                            class="relative bg-white rounded-lg shadow">
                                                                            <button type="button"
                                                                                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                                                                                data-modal-toggle="deletePayment{{$transaction->id}}">
                                                                                <svg aria-hidden="true" class="w-5 h-5"
                                                                                    fill="currentColor"
                                                                                    viewBox="0 0 20 20"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <path fill-rule="evenodd"
                                                                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                                        clip-rule="evenodd"></path>
                                                                                </svg>
                                                                                <span class="sr-only">Close modal</span>
                                                                            </button>
                                                                            <div class="p-6 text-center">
                                                                                <svg aria-hidden="true"
                                                                                    class="mx-auto mb-4 w-14 h-14 text-gray-400"
                                                                                    fill="none" stroke="currentColor"
                                                                                    viewBox="0 0 24 24"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <path stroke-linecap="round"
                                                                                        stroke-linejoin="round"
                                                                                        stroke-width="2"
                                                                                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                                                                    </path>
                                                                                </svg>
                                                                                <h3
                                                                                    class="mb-5 text-lg font-normal text-gray-500">
                                                                                    Apakah Anda yakin ingin menghapus
                                                                                    transaksi ini?
                                                                                    <small>itu tidak akan dihapus
                                                                                        sepenuhnya
                                                                                        sampai Anda menghapus
                                                                                        sewa</small>
                                                                                </h3>
                                                                                <form
                                                                                    action="{{ route('customer.deleteTransaction', ['transaction'=>$transaction]) }}"
                                                                                    method="POST">
                                                                                    @method('DELETE')
                                                                                    @csrf
                                                                                    <button
                                                                                        data-modal-toggle="deletePayment{{$transaction->id}}"
                                                                                        type="submit"
                                                                                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                                                        Iya, saya yakin
                                                                                    </button>
                                                                                    <button
                                                                                        data-modal-toggle="deletePayment{{$transaction->id}}"
                                                                                        type="button"
                                                                                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 ">Tidak,
                                                                                        batal aja</button>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @empty
                                                        <tr class="bg-white border-b">
                                                            <td class="py-4 px-4" colspan="6">
                                                                <span class="text-red-500">
                                                                    Belum ada transaksi
                                                                </span>
                                                            </td>
                                                        </tr>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="my-2">
                                            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                                                <button data-modal-toggle="addDelivery"
                                                    class="absolute top-0 right-0 p-3 bg-gray-100 rounded-tr-lg">
                                                    <svg width="26" height="26" viewBox="0 0 32 32" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M12 6H8V2H6V6H2V8H6V12H8V8H12V6Z" fill="#5B6BF8" />
                                                        <path
                                                            d="M29.919 16.606L26.919 9.606C26.842 9.42608 26.7139 9.27273 26.5505 9.165C26.3871 9.05727 26.1957 8.99989 26 9H23V7C23 6.73478 22.8946 6.48043 22.7071 6.29289C22.5196 6.10536 22.2652 6 22 6H15V8H21V20.556C20.5443 20.8206 20.1456 21.1728 19.8267 21.5922C19.5078 22.0117 19.2751 22.4902 19.142 23H12.858C12.6405 22.1418 12.143 21.3806 11.4442 20.8368C10.7455 20.2931 9.88538 19.9979 9 19.9979C8.11462 19.9979 7.25452 20.2931 6.55578 20.8368C5.85703 21.3806 5.35953 22.1418 5.142 23H4V14H2V24C2 24.2652 2.10536 24.5196 2.29289 24.7071C2.48043 24.8946 2.73478 25 3 25H5.142C5.35953 25.8582 5.85703 26.6194 6.55578 27.1632C7.25452 27.7069 8.11462 28.0021 9 28.0021C9.88538 28.0021 10.7455 27.7069 11.4442 27.1632C12.143 26.6194 12.6405 25.8582 12.858 25H19.142C19.3595 25.8582 19.857 26.6194 20.5558 27.1632C21.2545 27.7069 22.1146 28.0021 23 28.0021C23.8854 28.0021 24.7455 27.7069 25.4442 27.1632C26.143 26.6194 26.6405 25.8582 26.858 25H29C29.2652 25 29.5196 24.8946 29.7071 24.7071C29.8946 24.5196 30 24.2652 30 24V17C30 16.8645 29.9725 16.7305 29.919 16.606V16.606ZM9 26C8.60444 26 8.21776 25.8827 7.88886 25.6629C7.55996 25.4432 7.30362 25.1308 7.15224 24.7654C7.00087 24.3999 6.96126 23.9978 7.03843 23.6098C7.1156 23.2219 7.30608 22.8655 7.58579 22.5858C7.86549 22.3061 8.22186 22.1156 8.60982 22.0384C8.99778 21.9613 9.39991 22.0009 9.76537 22.1522C10.1308 22.3036 10.4432 22.56 10.6629 22.8889C10.8827 23.2178 11 23.6044 11 24C10.9992 24.5302 10.7882 25.0384 10.4133 25.4133C10.0384 25.7882 9.53019 25.9992 9 26V26ZM23 11H25.34L27.484 16H23V11ZM23 26C22.6044 26 22.2178 25.8827 21.8889 25.6629C21.56 25.4432 21.3036 25.1308 21.1522 24.7654C21.0009 24.3999 20.9613 23.9978 21.0384 23.6098C21.1156 23.2219 21.3061 22.8655 21.5858 22.5858C21.8655 22.3061 22.2219 22.1156 22.6098 22.0384C22.9978 21.9613 23.3999 22.0009 23.7654 22.1522C24.1308 22.3036 24.4432 22.56 24.6629 22.8889C24.8827 23.2178 25 23.6044 25 24C24.9995 24.5303 24.7886 25.0387 24.4136 25.4136C24.0387 25.7886 23.5303 25.9995 23 26ZM28 23H26.858C26.6377 22.1434 26.1394 21.3842 25.4412 20.8413C24.743 20.2983 23.8844 20.0025 23 20V18H28V23Z"
                                                            fill="#5B6BF8" />
                                                    </svg>
                                                </button>
                                                <!-- Main modal -->
                                                <div id="addDelivery" tabindex="-1"
                                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center flex"
                                                    aria-modal="true" role="dialog" data-modal-placement="top-left">
                                                    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                                                        <!-- Modal content -->
                                                        <form
                                                            action="{{ route('customer.addDelivery', ['unit'=>$selectedUnit, 'rent_id'=>$unitRents->first()->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            <div class="relative bg-white rounded-lg shadow">
                                                                <!-- Modal header -->
                                                                <div
                                                                    class="flex justify-between items-start p-4 rounded-t border-b">
                                                                    <h3 class="text-xl font-semibold text-gray-900 ">
                                                                        Requesting new delivery
                                                                    </h3>
                                                                    <button type="button"
                                                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                                                                        data-modal-toggle="addDelivery">
                                                                        <svg aria-hidden="true" class="w-5 h-5"
                                                                            fill="currentColor" viewBox="0 0 20 20"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path fill-rule="evenodd"
                                                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                                clip-rule="evenodd">
                                                                            </path>
                                                                        </svg>
                                                                        <span class="sr-only">Close
                                                                            modal</span>
                                                                    </button>
                                                                </div>
                                                                <!-- Modal body -->
                                                                <div class="p-6 space-y-6">
                                                                    <div id="delivery_section" class="mt-1">
                                                                        @if(!isset($selectedUnit->storageOwner->deliveryDrivers))
                                                                        <div
                                                                            class="flex flex-col items-center justify-center">
                                                                            <div
                                                                                class="w-full text-center text-gray-500">
                                                                                <div class="text-xl font-bold">
                                                                                    Belum ada delivery service
                                                                                </div>
                                                                                <div class="text-sm">
                                                                                    Silahkan hubungi owner unit untuk
                                                                                    mengaktifkan delivery service
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        @else
                                                                        <label class="text-lg font-bold text-gray-900"
                                                                            for="">Delivery</label>
                                                                        <div class="flex gap-2 my-2">
                                                                            <div
                                                                                class="flex items-center gap-2 bg-gray-100 text-black font bold p-2 rounded-lg">
                                                                                <input name="delivered_to_location"
                                                                                    value="from" type="radio">Dari unit
                                                                            </div>
                                                                            <div
                                                                                class="flex items-center gap-2 bg-gray-100 text-black font bold p-2 rounded-lg">
                                                                                <input name="delivered_to_location"
                                                                                    value="to" type="radio">Ke unit
                                                                            </div>
                                                                        </div>
                                                                        <label
                                                                            class="text-lg font-bold text-gray-900 mb-2"
                                                                            for="">Lokasi Anda</label>
                                                                        <div class="relative mb-6 mt-2">
                                                                            <div
                                                                                class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                                                                <svg width="20" height="20"
                                                                                    viewBox="0 0 20 20" fill="none"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <path
                                                                                        d="M10 1.25C8.1773 1.25215 6.42987 1.97717 5.14102 3.26602C3.85218 4.55486 3.12716 6.3023 3.12501 8.125C3.12282 9.61452 3.60937 11.0636 4.51001 12.25C4.51001 12.25 4.69751 12.4969 4.72813 12.5325L10 18.75L15.2744 12.5294C15.3019 12.4963 15.49 12.25 15.49 12.25L15.4906 12.2481C16.3908 11.0623 16.8771 9.61383 16.875 8.125C16.8729 6.3023 16.1478 4.55486 14.859 3.26602C13.5701 1.97717 11.8227 1.25215 10 1.25V1.25ZM10 10.625C9.50555 10.625 9.0222 10.4784 8.61108 10.2037C8.19996 9.92897 7.87953 9.53852 7.69031 9.08171C7.50109 8.62489 7.45158 8.12223 7.54804 7.63727C7.64451 7.15232 7.88261 6.70686 8.23224 6.35723C8.58187 6.0076 9.02733 5.7695 9.51228 5.67304C9.99723 5.57657 10.4999 5.62608 10.9567 5.8153C11.4135 6.00452 11.804 6.32495 12.0787 6.73607C12.3534 7.1472 12.5 7.63055 12.5 8.125C12.4992 8.78779 12.2355 9.42319 11.7669 9.89185C11.2982 10.3605 10.6628 10.6242 10 10.625V10.625Z"
                                                                                        fill="#E52878" />
                                                                                </svg>
                                                                            </div>
                                                                            <input type="text" id="address_input"
                                                                                name="picked_up_location"
                                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                                                                                placeholder="Lokasi Anda...">
                                                                            <div
                                                                                class="absolute inset-y-0 right-0 flex items-center pr-3">
                                                                                <input id="default-address"
                                                                                    type="checkbox"
                                                                                    class="w-4 h-4 text-blue-600 bg-[#FFF6E4] rounded border-gray-300 focus:ring-[#E52878] focus:ring-2 ">
                                                                                <label for="default-checkbox"
                                                                                    class="ml-2 text-sm font-medium text-gray-900">Gunakan
                                                                                    alamat saya</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="grid gap-6 w-full md:grid-cols-1">
                                                                            <div>
                                                                                <label
                                                                                    class="text-lg font-bold text-gray-900"
                                                                                    for="">Memilih layanan
                                                                                    pengiriman</label>
                                                                                <ul class="mt-2">
                                                                                    @foreach($selectedUnit->storageOwner->deliveryDrivers
                                                                                    as $deliveryDriver)
                                                                                    @php
                                                                                    $ind = 0;
                                                                                    @endphp
                                                                                    @if(!$deliveryDriver->status &&
                                                                                    $deliveryDriver->pivot->status)
                                                                                    @php
                                                                                    $ind = 1;
                                                                                    @endphp
                                                                                    <li class="mb-5">
                                                                                        <input type="radio"
                                                                                            id="delivery_service-{{$deliveryDriver->id}}"
                                                                                            name="delivery_service"
                                                                                            value="delivery_service-{{$deliveryDriver->id}}"
                                                                                            class="hidden peer">
                                                                                        <input hidden
                                                                                            value="{{$deliveryDriver->price_per_km}}">
                                                                                        <label
                                                                                            for="delivery_service-{{$deliveryDriver->id}}"
                                                                                            class="inline-flex justify-between items-center p-5 w-full text-gray-500 bg-white 
                                                                                            rounded-lg drop-shadow border-2 peer-checked:border-2 border-white peer-checked:border-[#72358E] peer-checked:text-[#72358E] hover:text-gray-600 hover:bg-[#FFF6E4]">
                                                                                            <div class="flex gap-10">
                                                                                                <div
                                                                                                    class="relative w-1/2">
                                                                                                    <img width="100"
                                                                                                        height="100"
                                                                                                        class=""
                                                                                                        src="{{ asset('storage/'.$deliveryDriver->deliveryCompany->image) }}"
                                                                                                        alt="">
                                                                                                    <img width="30"
                                                                                                        height="30"
                                                                                                        class="absolute bottom-0 -right-5 ring-2 ring-offset-1 ring-[#72358E] rounded-full"
                                                                                                        src="{{ asset('storage/'.$deliveryDriver->image) }}"
                                                                                                        alt="">
                                                                                                </div>
                                                                                                <div
                                                                                                    class="block w-1/2">
                                                                                                    <div
                                                                                                        class="w-full text-lg font-semibold">
                                                                                                        {{$deliveryDriver->deliveryCompany->name}}
                                                                                                    </div>
                                                                                                    <small
                                                                                                        class="w-full">{{$deliveryDriver->driver_name}}</small>
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
                                                                            <div id="delivery_section-description">
                                                                                <label for="description"
                                                                                    class="block mb-2 text-lg font-bold text-gray-900">Keterangan
                                                                                    pengiriman</label>
                                                                                <textarea name="delivery_description"
                                                                                    id="description" cols="30" rows="10"
                                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-[#72358E] focus:border-[#72358E] block w-full pr-10 p-2.5">Tulis sesuatu untuk pengemudi pengiriman</textarea>
                                                                            </div>
                                                                            <input id="user-address" hidden
                                                                                value="{{Auth::user()->customer->address}}">

                                                                        </div>
                                                                        @if ($ind == 0)
                                                                        <div
                                                                            class="flex flex-col items-center justify-center">
                                                                            <div
                                                                                class="w-full text-center text-gray-500">
                                                                                <div class="text-xl font-bold">
                                                                                    Belum ada delivery service
                                                                                </div>
                                                                                <div class="text-sm">
                                                                                    Silahkan hubungi owner unit untuk
                                                                                    mengaktifkan delivery service
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        @endif
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <!-- Modal footer -->
                                                                <div
                                                                    class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200">
                                                                    <button type="submit"
                                                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                                                        Minta delivery</button>
                                                                    <button data-modal-toggle="addDelivery"
                                                                        type="button"
                                                                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Batal</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <table class="w-full text-sm text-left text-gray-500">
                                                    <caption
                                                        class="p-5 text-lg font-semibold text-left text-gray-900 bg-white">
                                                        Delivery
                                                        <p class="mt-1 text-sm font-normal text-gray-500">
                                                            Delivery dari dan ke unit {{$selectedUnit->name}} dari
                                                            tanggal
                                                            {{date('d M Y', strtotime($unitRents->first()->starts_from))}}
                                                            sampai tanggal
                                                            {{date('d M Y', strtotime($unitRents->first()->ends_at))}}.
                                                        </p>
                                                    </caption>
                                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                                        <tr>
                                                            <th scope="col" class="py-3 px-4">
                                                                Pengemudi
                                                            </th>
                                                            <th scope="col" class="py-3 px-4">
                                                                Keterangan
                                                            </th>
                                                            <th scope="col" class="py-3 px-4">
                                                                Lokasi Pickup
                                                            </th>
                                                            <th scope="col" class="py-3 px-4">
                                                                Lokasi Delivery
                                                            </th>
                                                            <th scope="col" class="py-3 px-4">
                                                                Harga
                                                            </th>
                                                            <th scope="col" class="py-3 px-4">
                                                                Status
                                                            </th>
                                                            <th scope="col" class="py-3 px-4">
                                                                Action
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($unitRents->first()->rentDeliveries as $deliveries)
                                                        <tr class="bg-white border-b">
                                                            <th scope="row" class="py-4 px-4">
                                                                @if ($deliveries->delivery_driver_id == null)
                                                                <span class="text-red-500">
                                                                    Belum bayar
                                                                </span>
                                                                @else
                                                                {{$deliveries->deliveryDriver->deliveryCompany->name}}
                                                                @endif
                                                            </th>
                                                            <td class="py-4 px-4">
                                                                @if ($deliveries->description == null)
                                                                <span class="text-red-500">
                                                                    Tidak ada keterangan
                                                                </span>
                                                                @else
                                                                {{$deliveries->description}}
                                                                @endif
                                                            </td>
                                                            <td class="py-4 px-4">
                                                                {{$deliveries->picked_up_location}}
                                                            </td>
                                                            <td class="py-4 px-4">
                                                                {{$deliveries->delivered_to_location}}
                                                            </td>
                                                            <td class="py-4 px-4">
                                                                {{"Rp." . number_format($deliveries->deliveryDriver->price_per_km , 0, ',', '.')}}
                                                            </td>
                                                            <td class="py-4 px-2 w-44">
                                                                @if ($deliveries->status ==
                                                                \App\Models\RentDeliveryStatus ::REQUESTED)
                                                                <span
                                                                    class="p-1 text-xs text-blue-500 bg-blue-100 rounded-2xl">
                                                                    Sedang diproses
                                                                </span>
                                                                @elseif ($deliveries->status ==
                                                                \App\Models\RentDeliveryStatus ::ACCEPTED)
                                                                <span
                                                                    class="p-1 text-xs text-green-500 bg-green-100 rounded-2xl">
                                                                    Diterima
                                                                </span>
                                                                @elseif ($deliveries->status ==
                                                                \App\Models\RentDeliveryStatus ::ONTHEROAD)
                                                                <span
                                                                    class="p-1 text-xs text-orange-500 bg-orange-100 rounded-2xl">
                                                                    Sedang diantar
                                                                </span>
                                                                @elseif ($deliveries->status ==
                                                                \App\Models\RentDeliveryStatus ::DONE)
                                                                <span
                                                                    class="p-1 text-xs text-green-500 bg-green-100 rounded-2xl">
                                                                    Selesai
                                                                </span>
                                                                @elseif ($deliveries->status ==
                                                                \App\Models\RentDeliveryStatus ::DELETED)
                                                                <span
                                                                    class="p-1 text-xs text-red-500 bg-red-100 rounded-2xl">
                                                                    Dibatalkan
                                                                </span>
                                                                @endif
                                                            </td>
                                                            <td class="py-4 px-6 flex flex-col items-start gap-1">
                                                                @if($deliveries->status !=
                                                                \App\Models\RentDeliveryStatus ::DELETED)
                                                                @php
                                                                $driver_id = $deliveries->deliveryDriver->user->id;
                                                                $chat = \App\Models\Chat::where([
                                                                ['sender_user_id', Auth::user()->id],
                                                                ['receiver_user_id', $driver_id]
                                                                ])->orWhere([
                                                                ['sender_user_id', $driver_id],
                                                                ['receiver_user_id', Auth::user()->id]
                                                                ])->first();
                                                                @endphp
                                                                <a href="{{ route('customer.chats', ['chat_id'=>$chat->id]) }}"
                                                                    class="text-sm text-blue-500 hover:text-blue-700">
                                                                    Hubungi Pengemudi
                                                                </a>
                                                                <button
                                                                    data-modal-toggle="delete-rent-delivery{{$deliveries->id}}"
                                                                    class="font-medium text-blue-600 hover:underline">Hapus</button>
                                                                <div id="delete-rent-delivery{{$deliveries->id}}"
                                                                    tabindex="-1"
                                                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full justify-center items-center flex"
                                                                    aria-modal="true" role="dialog">
                                                                    <div
                                                                        class="relative p-4 w-full max-w-md h-full md:h-auto">
                                                                        <div
                                                                            class="relative bg-white rounded-lg shadow">
                                                                            <button type="button"
                                                                                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                                                                                data-modal-toggle="delete-rent-delivery{{$deliveries->id}}">
                                                                                <svg aria-hidden="true" class="w-5 h-5"
                                                                                    fill="currentColor"
                                                                                    viewBox="0 0 20 20"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <path fill-rule="evenodd"
                                                                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                                        clip-rule="evenodd"></path>
                                                                                </svg>
                                                                                <span class="sr-only">Close modal</span>
                                                                            </button>
                                                                            <div class="p-6 text-center">
                                                                                <svg aria-hidden="true"
                                                                                    class="mx-auto mb-4 w-14 h-14 text-gray-400"
                                                                                    fill="none" stroke="currentColor"
                                                                                    viewBox="0 0 24 24"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <path stroke-linecap="round"
                                                                                        stroke-linejoin="round"
                                                                                        stroke-width="2"
                                                                                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                                                                    </path>
                                                                                </svg>
                                                                                <h3
                                                                                    class="mb-5 text-lg font-normal text-gray-500">
                                                                                    Apakah Anda yakin ingin menghapus
                                                                                    delivery ini?
                                                                                    <small>itu tidak akan dihapus
                                                                                        sepenuhnya
                                                                                        sampai Anda menghapus
                                                                                        sewa</small>
                                                                                </h3>
                                                                                <form
                                                                                    action="{{ route('customer.deleteDelivery', ['delivery'=>$deliveries]) }}"
                                                                                    method="POST">
                                                                                    @method('DELETE')
                                                                                    @csrf
                                                                                    <button
                                                                                        data-modal-toggle="delete-rent-delivery{{$deliveries->id}}"
                                                                                        type="submit"
                                                                                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                                                        Iya, saya yakin
                                                                                    </button>
                                                                                    <button
                                                                                        data-modal-toggle="delete-rent-delivery{{$deliveries->id}}"
                                                                                        type="button"
                                                                                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 ">Tidak,
                                                                                        batal aja</button>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        @empty
                                                        <tr class="bg-white border-b">
                                                            <td class="py-4 px-4" colspan="7">
                                                                <span class="text-red-500">
                                                                    Belum ada deliveries
                                                                </span>
                                                            </td>
                                                        </tr>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="my-8">
                                    <p>
                                        {{$selectedUnit->description}}
                                    </p>
                                </div>
                                <div class="my-4">
                                    <span class="text-xl font-bold text-black">Detail Deskripsi</span>
                                    @php
                                    $ind = 1;
                                    @endphp
                                    <div class="mt-6">
                                        @foreach(explode("\n", $selectedUnit->detail) as $detail)
                                        <div class="flex gap-2 items-center">
                                            <span>{{$ind++}}</span>
                                            <li>{{$detail}}</li>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <span class="flex gap-3 text-xl font-bold text-black">Ulasan
                                        @if($selectedUnit->reviews->count() > 0)
                                        @php
                                        $totalRating = 0;
                                        foreach ($selectedUnit->reviews as $rating){
                                        $totalRating += $rating->rating;
                                        }
                                        $avgRating = $totalRating / $selectedUnit->reviews->count();
                                        $avgRating = round($avgRating);
                                        @endphp
                                        <div class="flex items-center">
                                            @for ($i = 0; $i < $avgRating; $i++) <svg aria-hidden="true"
                                                class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <title>First star</title>
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                </path>
                                                </svg>
                                                @endfor
                                                @for ($i = 0; $i < 5 - $avgRating; $i++) <svg aria-hidden="true"
                                                    class="w-5 h-5 text-gray-300" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <title>Fifth star</title>
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                    </path>
                                                    </svg>
                                                    @endfor
                                        </div>
                                        {{$avgRating}} / 5
                                        sudah disewakan {{$selectedUnit->rented}} kali
                                        @endif
                                    </span>
                                    @if($selectedUnit->reviews->count() > 0) <div
                                        class="my-4 max-h-[15rem] overflow-auto">
                                        @foreach($selectedUnit->reviews->sortByDesc('created_at') as $review)
                                        @if($review->is_published)
                                        <div class="flex gap-2 border-b-2 rounded py-2 mb-1">
                                            <img class="object-fit w-8 h-8 rounded-full ml-2"
                                                src="{{ asset('storage/'. $review->customer->image) }}"
                                                alt="ownerImage" />
                                            <div class="flex flex-col ml-2">
                                                <span
                                                    class="text-base text-black font-bold">{{$review->customer->user->name}}</span>
                                                <span class="text-sm text-black">
                                                    {{date('d M Y', strtotime($review->created_at))}}
                                                </span>
                                                <div class="flex items-center">
                                                    @for ($i = 0; $i < $review->rating; $i++)
                                                        <svg aria-hidden="true" class="w-5 h-5 text-yellow-400"
                                                            fill="currentColor" viewBox="0 0 20 20"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <title>First star</title>
                                                            <path
                                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                            </path>
                                                        </svg>
                                                        @endfor
                                                        @for ($i = 0; $i < 5 - $review->rating; $i++)
                                                            <svg aria-hidden="true" class="w-5 h-5 text-gray-300"
                                                                fill="currentColor" viewBox="0 0 20 20"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <title>Fifth star</title>
                                                                <path
                                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                                </path>
                                                            </svg>
                                                            @endfor
                                                </div>
                                                @if ($review->review)
                                                <span
                                                    class="text-sm text-black p-2 border-l-2 border-[#F8C35B] mt-2 mr-2">{{$review->review}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                    @else
                                    <div class="flex flex-col justify-center items-center">
                                        <img class="object-scale-down"
                                            src="{{ asset('storage/images/stockImages/noReviewsFound.svg') }}" alt="">
                                        <span class="mt-5 text-gray-400 font-semibold text-lg text-center">Belum ada
                                            Ulasan</span>
                                    </div>
                                    @endif
                                    @if (Auth::check() && Auth::user()->role_id == \App\Models\Role::CUSTOMER)

                                    <span class="text-lg font-bold text-black">Kirim Ulasan</span>
                                    <div class="mt-6 border-2 border-gray p-2 rounded-xl">
                                        <div class="flex flex-col">
                                            <form action="{{ route('customer.review', ['unit'=>$selectedUnit]) }}"
                                                method="POST">
                                                @csrf
                                                <div class="flex justify-between">
                                                    <div class="flex self-start gap-2">
                                                        <img class="object-fit w-8 h-8 rounded-full"
                                                            src="{{ asset('storage/'. Auth::user()->customer->image) }}"
                                                            alt="ownerImage" />
                                                        <div class="self-end flex flex-col">
                                                            <span
                                                                class="text-sm text-black">{{Auth::user()->name}}</span>
                                                            <span class="text-sm text-black">{{date('d M Y')}}</span>
                                                        </div>
                                                    </div>
                                                    <span class="text-sm text-black">
                                                        <label for="message"
                                                            class="text-right block text-sm font-medium text-gray-900">
                                                            Rating Anda</label>
                                                        <div class="rating">
                                                            <label>
                                                                <input type="radio" name="rating" value="1" />
                                                                <span class="icon">★</span>
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="rating" value="2" />
                                                                <span class="icon">★</span>
                                                                <span class="icon">★</span>
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="rating" value="3" />
                                                                <span class="icon">★</span>
                                                                <span class="icon">★</span>
                                                                <span class="icon">★</span>
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="rating" value="4" />
                                                                <span class="icon">★</span>
                                                                <span class="icon">★</span>
                                                                <span class="icon">★</span>
                                                                <span class="icon">★</span>
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="rating" value="5" />
                                                                <span class="icon">★</span>
                                                                <span class="icon">★</span>
                                                                <span class="icon">★</span>
                                                                <span class="icon">★</span>
                                                                <span class="icon">★</span>
                                                            </label>
                                                        </div>
                                                    </span>
                                                </div>
                                                <div class="relative">
                                                    @if (Auth::user()->customer->rents->where('unit_id',
                                                    $selectedUnit->id)->first())
                                                    <span class="text-sm text-black">
                                                        <textarea id="review" rows="4" name="review"
                                                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                                            placeholder="Ulasan Anda..."></textarea>
                                                    </span>
                                                    <span class="absolute bottom-2 right-2 text-sm text-black">
                                                        <button type="submit"
                                                            class="text-white bg-[#4D275F] hover:bg-[#3E1D4E] focus:ring-4 focus:outline-none focus:ring-[#F8C35B50] font-medium rounded-lg text-sm px-4 py-2">
                                                            Kirim
                                                        </button>
                                                    </span>
                                                    @else
                                                    <span class="text-sm text-black">
                                                        <textarea disabled id="review" rows="4"
                                                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-200 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                                            placeholder="Harus sewa terlebih dahulu..."></textarea>
                                                    </span>
                                                    <span class="absolute bottom-2 right-2 text-sm text-black">
                                                        <button onclick="event.preventDefault();"
                                                            class="text-white bg-[#4D275F] hover:bg-[#3E1D4E] focus:ring-4 focus:outline-none focus:ring-[#F8C35B50] font-medium rounded-lg text-sm px-4 py-2">
                                                            TIdak bisa beri ulasan. Harus sewa terlebih dahulu.
                                                        </button>
                                                    </span>
                                                    @endif
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <div>
                                    <span class="text-xl font-bold text-black">Galeri</span>
                                    @if (count($selectedUnit->assets) > 0)
                                    <div id="controls-carousel" class="relative mt-5" data-carousel="static">
                                        <div id="carouselOffsett"
                                            class="overflow-hidden crelative h-48 rounded-lg md:h-56">
                                            @foreach ($selectedUnit->assets as $key => $asset)
                                            <div class="duration-700 ease-in-out w-1/3" data-carousel-item{{$key==0
                                                ? '="active"' : '' }}>
                                                <img src="{{ asset('storage/' . $asset->image) }}"
                                                    class="p-1 object-fit h-48 rounded-2xl md:h-56 absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2"
                                                    alt="...">
                                            </div>
                                            @endforeach
                                        </div>
                                        <button type="button"
                                            class="flex absolute top-0 left-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none"
                                            data-carousel-prev>
                                            <span
                                                class="inline-flex justify-center items-center w-10 h-10 rounded-full bg-[#F8C35B] group-hover:bg-[#D3961F] group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                                                <svg aria-hidden="true" class="w-6 h-6 text-white" fill="none"
                                                    stroke="#3F1652" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M15 19l-7-7 7-7">
                                                    </path>
                                                </svg>
                                                <span class="sr-only">Previous</span>
                                            </span>
                                        </button>
                                        <button type="button"
                                            class="flex absolute top-0 right-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none"
                                            data-carousel-next>
                                            <span
                                                class="inline-flex justify-center items-center w-10 h-10 rounded-full bg-[#F8C35B] group-hover:bg-[#D3961F] group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                                                <svg aria-hidden="true" class="w-6 h-6 text-white" fill="none"
                                                    stroke="#3F1652" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M9 5l7 7-7 7">
                                                    </path>
                                                </svg>
                                                <span class="sr-only">Next</span>
                                            </span>
                                        </button>
                                    </div>
                                    @else
                                    <div class="flex flex-col justify-center items-center">
                                        <img src="{{ asset('storage/images/stockImages/noUnitFound.svg') }}" alt="">
                                        <span class="mt-5 text-gray-400 font-semibold text-lg text-center">Tidak
                                            ada gambar</span>
                                    </div>
                                    @endif
                                </div>
                                <form class="mt-8" method="POST" action="{{ route('customer.sendChat') }}">
                                    @csrf
                                    <label for="default-search"
                                        class="mb-2 text-sm font-medium text-gray-900 sr-only">Hubungi
                                        Penjual</label>
                                    <div class="relative">
                                        <div
                                            class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <rect width="24" height="24" fill="url(#pattern0)" />
                                                <defs>
                                                    <pattern id="pattern0" patternContentUnits="objectBoundingBox"
                                                        width="1" height="1">
                                                        <use xlink:href="#image0_942_284"
                                                            transform="scale(0.0416667)" />
                                                    </pattern>
                                                    <image id="image0_942_284" width="24" height="24"
                                                        xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABmJLR0QA/wD/AP+gvaeTAAABX0lEQVRIie3UP0scURSG8d9GE1iwWTBFNhYWgmBga4vtQlImVbqk1dJCwWo7C8HaIoXN2tqlCCbpki+QlKkEs+ISsFALUda12DMwGddx9k8j5MDAvfe8533uHGYO/+PfqGIFO+M0LeMdPuEKXayOavoIdXzEaZgmTwfPhzWuYQutlOE1vmM/9l8GNU36+iNz0wNsYi50Sf59EdN+fe3iRK8tdZRS+tl4k3NM3WU6gVdo4ixleoE9vMGTlH4Sz2LdCO1u3q2bbvd1CZU+2io2AgK/o+51HqCMbyFsY/4O3Uv8CggsRk1Lrwu5UcbXKDjGQipXwjouMzfdDv3WfeZ5kGl8jrNGSvsYf+O8VhSQhRzhT6z39X6yJN7G+c9BzPtBujjE04xmL3JrwwCykGO8SOUqep9wBzPDAvIgy4YcDUUhyWj4MA5AFtJWYDSMCrl3NIwDkjsaRoU0FRgNDz9uAPkYbMs+wjJbAAAAAElFTkSuQmCC" />
                                                </defs>
                                            </svg>
                                        </div>
                                        <input name="receiver" hidden value="{{$selectedUnit->storageOwner->user->id}}">
                                        <input name="message"
                                            class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-100 focus:ring-[#4F8C35B50] focus:border-[#F8C35B50]"
                                            placeholder="Hubungi Penjual" required>
                                        <button type="submit"
                                            class="text-white absolute right-2.5 bottom-2.5 bg-[#4D275F] hover:bg-[#3E1D4E] focus:ring-4 focus:outline-none focus:ring-[#F8C35B50] font-medium rounded-lg text-sm px-4 py-2">Kirim</button>
                                    </div>
                                </form>
                            </div>
                            @else
                            <div class="flex flex-col items-center align-center justify-items-center p-20">
                                <img src="{{ asset('storage/images/stockImages/noUnitFound.svg') }}" alt="">
                                <h1 class="mt-6 text-xl font-bold text-[#5A2871]">Kamu belum memilih gudang</h1>
                                <p class="mt-10 text-gray-400 font-semibold text-lg text-center">Pilih salah satu
                                    gudang
                                    atau kamu
                                    bisa mencari berdasarkan kota dan kategori
                                    ukuran</p>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            @endif
        </div>
        <script>
            function closeSideBar(){
                $('#grid').removeClass("lg:grid-cols-3");
                $('#sideBar').addClass('hidden');
                $('#close').addClass("hidden");
                $('#open').removeClass("hidden");
            }
            function OpenSideBar(){
                $('#grid').addClass("lg:grid-cols-3");
                $('#sideBar').removeClass("hidden");
                $('#close').removeClass("hidden");
                $('#open').addClass("hidden");
            }
            $("document").ready(function(){
                $('input[type=radio][name=bank_account]').on('change', function(){
                    if ($(this).val() == null) {
                        $('#payment_section-uploadProof').hide('slow');
                    }else{
                        $('#payment_section-uploadProof').show('slow');
                    }
                });
                selectedUnit = $("#selectedUnit");
                if (selectedUnit.length > 0 && selectedUnit.offset() != null) {
                    $('#unitlist').animate({
                    scrollTop: selectedUnit.offset().top - selectedUnit.parent().offset().top
                    }, 1000);              
                }
                carouselOffsett = $("#carouselOffsett").children();
                if (carouselOffsett.length > 0) {
                    carouselOffsett.each(function(i, element) {
                        $(element).attr('data-carousel-item', i);
                        element.children[0].style.transform = "translateX(50%) translateY(-50%)";
                    });
                }
                $("#inputString").keyup(function () {
                var filter = jQuery(this).val();
                    $(".unitlist ul li").each(function () {
                        if (jQuery(this).text().search(new RegExp(filter, "i")) < 0) {
                            jQuery(this).hide();
                        } else {
                            jQuery(this).show()
                        }
                    });
                });
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
</x-app-layout>