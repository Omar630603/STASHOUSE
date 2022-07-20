<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Customer's Chats") }}
        </h2>
    </x-slot>
    <x-slot name="slot">
        {{-- {{$chats}}
        {{$chats->first()->messages}} --}}
        <div class="container mx-auto">
            <div class="min-w-full border rounded lg:grid lg:grid-cols-3">
                <div class="border-r border-gray-300 lg:col-span-1">
                    <div class="mx-3 my-3">
                        <div class="relative text-gray-600">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6 text-gray-300">
                                    <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </span>
                            <input type="search" class="block w-full py-2 pl-10 bg-gray-100 rounded outline-none"
                                name="search" placeholder="Search" required />
                        </div>
                    </div>

                    <ul class="overflow-auto h-[32rem]">
                        <h2 class="my-2 mb-2 ml-2 text-lg text-gray-600">Chats</h2>
                        @foreach ($chats as $chat)
                        @php
                        $chat_id = $chat->receiver_user_id;
                        $chatListPerson = \App\Models\User::where('id', $chat_id)->first();
                        @endphp
                        <li>
                            <a
                                class="flex items-center px-3 py-2 text-sm transition duration-150 
                                ease-in-out border-b border-gray-300 cursor-pointer hover:bg-gray-100 focus:outline-none">
                                @if ($chatListPerson->role_id == \App\Models\Role::ADMIN)
                                <img class="object-cover w-10 h-10 rounded-full"
                                    src="{{ asset('storage/' . $chatListPerson->admin->image) }}" alt="username" />
                                <div class="w-full pb-2">
                                    <div class="flex justify-between">
                                        <span
                                            class="block ml-2 font-semibold text-gray-600">{{$chatListPerson->admin->name}}</span>
                                        <span class="block ml-2 text-sm text-gray-600">25 minutes</span>
                                    </div>
                                    <span
                                        class="block ml-2 text-sm text-gray-600">{{$chat->message->sortByDesc('created_at')->last()->message}}</span>
                                </div>
                                @elseif ($chatListPerson->role_id == \App\Models\Role::CUSTOMER)
                                <img class="object-cover w-10 h-10 rounded-full"
                                    src="{{ asset('storage/' . $chatListPerson->customer->image) }}" alt="username" />
                                <div class="w-full pb-2">
                                    <div class="flex justify-between">
                                        <span
                                            class="block ml-2 font-semibold text-gray-600">{{$chatListPerson->customer->name}}</span>
                                        <span class="block ml-2 text-sm text-gray-600">25 minutes</span>
                                    </div>
                                    <span class="block ml-2 text-sm text-gray-600">bye</span>
                                </div>
                                @elseif ($chatListPerson->role_id == \App\Models\Role::STORAGE_OWNER)
                                <img class="object-cover w-10 h-10 rounded-full"
                                    src="{{ asset('storage/' . $chatListPerson->storageOwner->image) }}"
                                    alt="username" />
                                <div class="w-full pb-2">
                                    <div class="flex justify-between">
                                        <span
                                            class="block ml-2 font-semibold text-gray-600">{{$chatListPerson->storageOwner->storage_name}}</span>
                                        <span class="block ml-2 text-sm text-gray-600">
                                            {{date('d M Y h:m', strtotime($chat->messages->sortByDesc('created_at')->first()->updated_at))}}
                                        </span>
                                    </div>
                                    <span
                                        class="block ml-2 text-sm text-gray-600">{{$chat->messages->sortByDesc('created_at')->first()->message}}</span>
                                </div>
                                @elseif($chatListPerson->role_id == \App\Models\Role::DELIVERY_DRIVER)
                                <img class="object-cover w-10 h-10 rounded-full"
                                    src="{{ asset('storage/' . $chatListPerson->deliveryDriver->image) }}"
                                    alt="username" />
                                <div class="w-full pb-2">
                                    <div class="flex justify-between">
                                        <span
                                            class="block ml-2 font-semibold text-gray-600">{{$chatListPerson->deliveryDriver->driver_name}}</span>
                                        <span class="block ml-2 text-sm text-gray-600">25 minutes</span>
                                    </div>
                                    <span class="block ml-2 text-sm text-gray-600">bye</span>
                                </div>
                                @endif
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="hidden lg:col-span-2 lg:block">
                    <div class="w-full">
                        <div class="relative flex items-center p-3 border-b border-gray-300">
                            <img class="object-cover w-10 h-10 rounded-full"
                                src="https://cdn.pixabay.com/photo/2018/01/15/07/51/woman-3083383__340.jpg"
                                alt="username" />
                            <span class="block ml-2 font-bold text-gray-600">Emma</span>
                            <span class="absolute w-3 h-3 bg-green-600 rounded-full left-10 top-3">
                            </span>
                        </div>
                        <div class="relative w-full p-6 overflow-y-auto h-[40rem]">
                            <ul class="space-y-2">
                                <li class="flex justify-start">
                                    <div class="relative max-w-xl px-4 py-2 text-gray-700 rounded shadow">
                                        <span class="block">Hi</span>
                                    </div>
                                </li>
                                <li class="flex justify-end">
                                    <div class="relative max-w-xl px-4 py-2 text-gray-700 bg-gray-100 rounded shadow">
                                        <span class="block">Hiiii</span>
                                    </div>
                                </li>
                                <li class="flex justify-end">
                                    <div class="relative max-w-xl px-4 py-2 text-gray-700 bg-gray-100 rounded shadow">
                                        <span class="block">how are you?</span>
                                    </div>
                                </li>
                                <li class="flex justify-start">
                                    <div class="relative max-w-xl px-4 py-2 text-gray-700 rounded shadow">
                                        <span class="block">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                        </span>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="flex items-center justify-between w-full p-3 border-t border-gray-300">
                            <button>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                                </svg>
                            </button>

                            <input type="text" placeholder="Message"
                                class="block w-full py-2 pl-4 mx-3 bg-gray-100 rounded-full outline-none focus:text-gray-700"
                                name="message" required />
                            <button type="submit">
                                <svg class="w-5 h-5 text-gray-500 origin-center transform rotate-90"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path
                                        d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>