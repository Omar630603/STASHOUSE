<x-guest-layout>
    <x-slot name="header">
        <div class="my-8">
            <h1 class="text-4xl text-[#3F1652] font-bold">Daftar Unit Penyimpanan</h1>
        </div>
    </x-slot>

    <x-slot name="slot">
        <div class="max-w-7xl py-6 mx-auto px-4 sm:px-6 lg:px-8">
            <form action="{{ route('daftarUnitPenyimpanan') }}">
                @csrf
                <div class="grid grid-cols-1 gap-6 md:grid-cols-1 xl:grid-cols-3">
                    <div class="flex space-x-1 w-full">
                        <span
                            class="inline-flex items-center px-3 text-sm text-black-900 bg-white rounded-md drop-shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24"
                                viewBox="0 0 24 24" style=" fill:#3F1652;">
                                <path
                                    d="M 12 2.0996094 L 1 12 L 4 12 L 4 21 L 11 21 L 11 15 L 13 15 L 13 21 L 20 21 L 20 12 L 23 12 L 12 2.0996094 z M 12 4.7910156 L 18 10.191406 L 18 11 L 18 19 L 15 19 L 15 13 L 9 13 L 9 19 L 6 19 L 6 10.191406 L 12 4.7910156 z">
                                </path>
                            </svg>
                        </span>
                        <select name="unitCategory" id="unitCategory_id" @if(isset($unitCategory_id))
                            value="{{ $unitCategory_id }}" @endif class="w-full">
                            @if (isset($unitCategories))
                            <option selected disabled>--Pilih Kategori--
                            </option>
                            @if(isset($unitCategory_id) && $unitCategory_id == 'all')
                            <option selected value="all">--Semua Kategori--</option>
                            @else
                            <option value="all">--Semua Kategori--</option>
                            @endif
                            @foreach ($unitCategories as $unitCategory)
                            @if(isset($unitCategory_id) && $unitCategory_id == $unitCategory->id)
                            <option selected value="{{ $unitCategory->id }}">{{ $unitCategory->name }}
                            </option>
                            @else
                            <option value="{{ $unitCategory->id }}">{{ $unitCategory->name }}</option>
                            @endif
                            @endforeach
                            @endif
                        </select>
                        @if (isset($unitCategories))
                        @foreach ($unitCategories as $unitCategory)
                        @if(isset($unitCategory_id) && $unitCategory_id == $unitCategory->id)
                        <span
                            class="inline-flex items-center px-3 text-sm text-black-900 bg-white rounded-md drop-shadow-sm">
                            <img width="24" height="24" src="{{ asset('storage/'.$unitCategory->image) }}" alt="">
                        </span>
                        @endif
                        @endforeach
                        @endif
                    </div>
                    <div class="flex space-x-1 w-full">
                        <span
                            class="inline-flex items-center px-3 text-sm text-black-900 bg-white rounded-md drop-shadow-sm">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M3.75 8.66527V18.1453L8.25 15.3343V5.85277L3.75 8.66527ZM9.75 5.85277V15.3328L14.25 18.1468V8.66527L9.75 5.85277ZM9 16.6348L3.3975 20.1358L2.25 19.4998V8.24977L2.6025 7.61377L8.6025 3.86377H9.3975L15 7.36477L20.6025 3.86377L21.75 4.49977V15.7498L21.3975 16.3858L15.3975 20.1358H14.6025L9 16.6348ZM15.75 8.66527V18.1453L20.25 15.3343V5.85277L15.75 8.66527Z"
                                    fill="#3F1652" />
                            </svg>

                        </span>
                        <select name="city" id="cities" @if(isset($city_name)) value="{{ $city_name }}" @endif
                            class="w-full">
                            @if (isset($cities))
                            <option selected disabled>--Pilih Kota--
                            </option>
                            @if(isset($city_name) && $city_name == "all")
                            <option selected value="all">--Semua Kota--</option>
                            @else
                            <option value="all">--Semua Kota--</option>
                            @endif
                            @foreach ($cities as $city)
                            @if(isset($city_name) && $city_name == $city->city)
                            <option selected value="{{ $city->city }}">{{ $city->city }}</option>
                            @else
                            <option value="{{ $city->city }}">{{ $city->city }}</option>
                            @endif
                            @endforeach
                            @endif
                        </select>
                    </div>
                    <div>
                        <button
                            class="w-full bg-[#F8C35B] hover:bg-[#FFB11B] text-[#3F1652] font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline"
                            type="submit">
                            Cari
                        </button>
                    </div>
                </div>
            </form>

            @if (isset($units))
            <div class="mt-8 container mx-auto">
                @if (isset($storage_owner_id))
                <h1 class="text-2xl font-bold">Profile {{ $storage_owner->storage_name }} : memiliki {{$units->count()}}
                    unit
                </h1>
                @else
                <h1 class="text-2xl font-bold">Hasil Pencarian : {{$units->count()}}</h1>
                @endif
                <div class="min-w-full mt-5 rounded lg:grid lg:grid-cols-3">
                    {{-- side-bar --}}
                    <div class="lg:col-span-1">
                        <ul id="unitlist" class="overflow-auto h-fit mb-3 max-h-[40rem] pr-3">
                            @if (!isset($units) || $units->count() == 0)
                            <div>
                                <img src="{{ asset('storage/images/stockImages/noUnitFound.svg') }}" alt="">
                                <h1 class="mt-5 text-xl font-bold text-[#5A2871]">Tidak bisa nemu unit </h1>
                            </div>
                            @else
                            @foreach ($units as $unit)
                            @if ($unit->storageOwner->is_active)
                            @if (isset($selectedUnit) && $selectedUnit->id == $unit->id)
                            <li id="selectedUnit" class="border-2 border-[#3F1652] mb-2 rounded-xl p-3 ">
                                @else
                            <li class="border-2 border-[#E7E7E7] mb-2 rounded-xl p-3 ">
                                @endif
                                @php
                                if(isset($city_name) && isset($unitCategory_id) && isset($storage_owner_id)){
                                $route = route('daftarUnitPenyimpanan', ['unit_id'=> $unit->id, 'city' => $city_name,
                                'unitCategory' => $unitCategory_id, 'storage_owner_id' => $storage_owner_id]);
                                }
                                else if(isset($city_name) && isset($unitCategory_id)){
                                $route = route('daftarUnitPenyimpanan', ['unit_id'=> $unit->id, 'city' => $city_name,
                                'unitCategory' => $unitCategory_id]);
                                }else if(isset($city_name)){
                                $route = route('daftarUnitPenyimpanan', ['unit_id'=> $unit->id, 'city' => $city_name]);}
                                else if(isset($unitCategory_id)){
                                $route = route('daftarUnitPenyimpanan', ['unit_id'=> $unit->id, 'unitCategory' =>
                                $unitCategory_id]);
                                }else if(isset($storage_owner_id)){
                                $route = route('daftarUnitPenyimpanan', ['unit_id'=> $unit->id, 'storage_owner_id' =>
                                $storage_owner_id]);
                                }
                                else{
                                $route = route('daftarUnitPenyimpanan', ['unit_id'=> $unit->id]);
                                }
                                @endphp
                                <a href="{{ $route }}"
                                    class="flex items-center px-4 py-5 text-sm transition duration-150 ease-in-out
                                     border-gray-300 cursor-pointer hover:bg-[#FFF6E4] rounded-xl focus:outline-none relative">
                                    <div class="absolute top-1 right-0 flex gap-1 items-center">
                                        @if ($unit->storageOwner->is_trusted)
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
                                        @if (isset($unit->storageOwner->deliveryDrivers))
                                        @php
                                        $is_there_driver = false;
                                        foreach ($unit->storageOwner->deliveryDrivers as $deliveryDriver) {
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
                                        src="{{ asset('storage/'. $unit->unitCategory->image) }}" alt="unitImage" />
                                    <div class="w-full mt-2">
                                        <div class="flex flex-col justify-between">
                                            <span
                                                class="block ml-3 text-base font-bold text-black">{{$unit->storageOwner->storage_name}}</span>

                                            <span
                                                class="block ml-3 text-sm font-semibold text-black">{{$unit->unitCategory->name}}</span>
                                        </div>
                                        <span class="flex items-center gap-1 ml-3 text-sm text-gray-600">
                                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6.00004 1C3.79454 1 2.00004 2.7945 2.00004 4.9975C1.98554 8.22 5.84804 10.892 6.00004 11C6.00004 11 10.0145 8.22 10 5C10 2.7945 8.20554 1 6.00004 1ZM6.00004 7C4.89504 7 4.00004 6.105 4.00004 5C4.00004 3.895 4.89504 3 6.00004 3C7.10504 3 8.00004 3.895 8.00004 5C8.00004 6.105 7.10504 7 6.00004 7Z"
                                                    fill="#B1B1B1" />
                                            </svg>
                                            {{$unit->city}}</span>
                                    </div>
                                </a>
                            </li>
                            @endif
                            @endforeach
                            @endif
                        </ul>
                    </div>
                    {{-- detail --}}
                    @if ($units->count() > 0)

                    <div class="lg:col-span-2 lg:block">
                        <div class="w-full lg:ml-3 rounded-xl border-2">
                            @if (isset($selectedUnit))
                            <div class="px-5 py-6">
                                <div class="flex flex-wrap space-y-2 justify-between items-center mb-2">
                                    <h1 class="text-2xl font-bold text-black">
                                        {{$selectedUnit->storageOwner->storage_name}}
                                    </h1>
                                    <button
                                        class="justify-self-end	self-end relative inline-flex items-center justify-center p-0.5 overflow-hidden text-base font-bold text-[#3F1652]] 
                                        rounded-full group bg-gradient-to-br from-[#E52878] to-[#F8C35B] hover:text-black">
                                        <span
                                            class="relative px-8 py-2.5 transition-all ease-in duration-75 bg-white rounded-full hover:text-gray-600">
                                            Sewa Sekarang
                                        </span>
                                    </button>
                                </div>
                                <div class="flex justify-between items-center mb-2 mr-4">
                                    <div>
                                        <span class="text-sm text-[#BBB9B9]">Pemilik</span>
                                        <div class="flex gap-2 items-center mt-2">
                                            <img class="object-fit w-8 h-8 rounded-full"
                                                src="{{ asset('storage/'. $selectedUnit->storageOwner->image) }}"
                                                alt="ownerImage" />
                                            <a href="{{route('daftarUnitPenyimpanan', ['storage_owner_id' =>
                                                $selectedUnit->storageOwner->id])}}">
                                                <span
                                                    class="text-base text-black underline underline-offset-2">{{$selectedUnit->storageOwner->user->name}}</span>
                                            </a>
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
                                                    class="w-5 h-5 text-gray-300 dark:text-gray-500" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <title>Fifth star</title>
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                    </path>
                                                    </svg>
                                                    @endfor
                                        </div>
                                        {{$avgRating}} / 5
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
                                                            <svg aria-hidden="true"
                                                                class="w-5 h-5 text-gray-300 dark:text-gray-500"
                                                                fill="currentColor" viewBox="0 0 20 20"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <title>Fifth star</title>
                                                                <path
                                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                                </path>
                                                            </svg>
                                                            @endfor
                                                </div>
                                                <span
                                                    class="text-sm text-black p-2 border-l-2 border-[#F8C35B] mt-2 mr-2">{{$review->review}}</span>
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
                                            <form action="" method="POST">
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
                                                            class="text-right block text-sm font-medium text-gray-900 dark:text-gray-400">
                                                            Rating Anda</label>
                                                        <div class="rating">
                                                            <label>
                                                                <input type="radio" name="stars" value="1" />
                                                                <span class="icon">★</span>
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="stars" value="2" />
                                                                <span class="icon">★</span>
                                                                <span class="icon">★</span>
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="stars" value="3" />
                                                                <span class="icon">★</span>
                                                                <span class="icon">★</span>
                                                                <span class="icon">★</span>
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="stars" value="4" />
                                                                <span class="icon">★</span>
                                                                <span class="icon">★</span>
                                                                <span class="icon">★</span>
                                                                <span class="icon">★</span>
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="stars" value="5" />
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
                                                        <textarea id="review" rows="4"
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
                                                        stroke-width="2" d="M15 19l-7-7 7-7"></path>
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
                                                        stroke-width="2" d="M9 5l7 7-7 7"></path>
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
                                        @auth
                                        @if (Auth::user()->role_id == \App\Models\Role::CUSTOMER)
                                        <input name="receiver" hidden value="{{$selectedUnit->storageOwner->user->id}}">
                                        <input name="message"
                                            class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-100 focus:ring-[#4F8C35B50] focus:border-[#F8C35B50]"
                                            placeholder="Hubungi Penjual" required>
                                        @else
                                        <input name="message"
                                            class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-100 focus:ring-[#4F8C35B50] focus:border-[#F8C35B50]"
                                            placeholder="Anda Bukan Customer!" required>
                                        @endif
                                        @endauth
                                        @guest
                                        <input name="message"
                                            class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-100 focus:ring-[#4F8C35B50] focus:border-[#F8C35B50]"
                                            placeholder="Hubungi Penjual" required>
                                        @endguest
                                        @auth
                                        @if (Auth::user()->role_id == \App\Models\Role::CUSTOMER)
                                        <button type="submit"
                                            class="text-white absolute right-2.5 bottom-2.5 bg-[#4D275F] hover:bg-[#3E1D4E] focus:ring-4 focus:outline-none focus:ring-[#F8C35B50] font-medium rounded-lg text-sm px-4 py-2">Kirim</button>
                                        @else
                                        <button onclick="event.preventDefault();"
                                            class="text-white absolute right-2.5 bottom-2.5 bg-[#4D275F] hover:bg-[#3E1D4E] focus:ring-4 focus:outline-none focus:ring-[#F8C35B50] font-medium rounded-lg text-sm px-4 py-2">Tidak
                                            bisa kirim</button>
                                        @endif
                                        @endauth
                                        @guest
                                        @php
                                        Session::flash('warning', 'Silahkan login untuk mengirim pesan');
                                        @endphp
                                        <button
                                            onclick="alert('Anda harus login untuk menghubungi penjual'); event.preventDefault();"
                                            class="text-white absolute right-2.5 bottom-2.5 bg-[#4D275F] hover:bg-[#3E1D4E] focus:ring-4 focus:outline-none focus:ring-[#F8C35B50] font-medium rounded-lg text-sm px-4 py-2">Kirim</button>
                                        @endguest
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
            $("document").ready(function(){
                selectedUnit = $("#selectedUnit");
                if (selectedUnit.length > 0) {
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
            });
        </script>
    </x-slot>
</x-guest-layout>