<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Customer's Chats") }}
        </h2>
    </x-slot>
    <x-slot name="slot">
        <div class="container mx-auto">
            @if (isset($chats))
            <div class="min-w-full rounded lg:grid lg:grid-cols-3">
                <div class="chats border-r border-gray-300 lg:col-span-1">
                    <div class="mx-3 mt-1 mb-3">
                        <div class="relative text-gray-600">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6 text-gray-300">
                                    <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </span>
                            <input @if(!isset($chats)) @if($chats->count()
                            <= 0) @disabled(true) @endif @elseif($chats->count()
                                <= 0) @disabled(true) @endif id="inputString" type="search"
                                    class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-[#4F8C35B50] focus:border-[#F8C35B50]"
                                    name="search" placeholder="Search" required />
                        </div>
                    </div>

                    <ul id="chatList" class="overflow-auto h-fit mb-3 max-h-[40rem]">
                        @if(isset($chats) && count($chats) > 0)
                        @foreach ($chats->sortByDesc('updated_at') as $chat)
                        @php
                        if ($chat->messages->count() > 0) {
                        $chat_id = 0;
                        if ($chat->receiver_user_id == Auth::user()->id) {
                        $chat_id = $chat->sender_user_id;
                        }else {
                        $chat_id = $chat->receiver_user_id;
                        }
                        $unReadMessages = 0;
                        foreach ($chat->messages as $message) {
                        if ($message->status == 0 && $message->receiver_user_id == Auth::user()->id) {
                        $unReadMessages ++;
                        }
                        }
                        }else{
                        continue;
                        }
                        $chatListPerson = \App\Models\User::where('id', $chat_id)->first();
                        @endphp
                        @if (isset($selectedChat) && $selectedChat->id == $chat->id)
                        <li id="selectedChat" class="p-2 border-2 border-[#3F1652] rounded-xl mb-3 mx-3">
                            @else
                        <li class="p-2 border-2 border-[#E7E7E7] rounded-xl mb-3 mx-3">
                            @endif
                            <a href="{{ route('customer.chats', ['chat_id'=>$chat->id]) }}" class="flex items-center p-6 text-sm transition duration-150 
                                ease-in-out rounded-xl cursor-pointer hover:bg-[#FFF6E4] focus:outline-none relative">
                                @if ($chatListPerson->role_id == \App\Models\Role::ADMIN)
                                <img class="self-start object-cover w-10 h-10 rounded-full"
                                    src="{{ asset('storage/' . $chatListPerson->admin->image) }}" alt="username" />
                                <span class="absolute top-2 right-2 block ml-2 text-sm text-gray-600">
                                    {{date('d M Y h:m', strtotime($chat->messages->sortByDesc('created_at')->first()->updated_at))}}
                                </span>
                                @if ($unReadMessages > 0)
                                <span
                                    class="absolute bottom-2 right-2 h-5 w-5 text-center bg-red-500 rounded-full font-bold text-white text-sm">{{$unReadMessages}}</span>
                                @endif
                                <span
                                    class="absolute bottom-2 right-8 bg-[#C2A2D1] text-[#4D275F] text-xs font-semibold px-2.5 py-0.5 rounded-lg">Admin</span>
                                <div class="w-3/5">
                                    <span
                                        class="block ml-2 font-semibold text-gray-600 truncate">{{$chatListPerson->username}}</span>
                                    <span
                                        class="block ml-2 text-sm text-gray-600 truncate">{{$chat->messages->sortByDesc('created_at')->first()->message}}</span>
                                </div>


                                @elseif ($chatListPerson->role_id == \App\Models\Role::CUSTOMER)
                                <img class="self-start object-cover w-10 h-10 rounded-full"
                                    src="{{ asset('storage/' . $chatListPerson->customer->image) }}" alt="username" />
                                <span class="absolute top-2 right-2 block ml-2 text-sm text-gray-600">
                                    {{date('d M Y h:m', strtotime($chat->messages->sortByDesc('created_at')->first()->updated_at))}}
                                </span>
                                @if ($unReadMessages > 0)
                                <span
                                    class="absolute bottom-2 right-2 h-5 w-5 text-center bg-red-500 rounded-full font-bold text-white text-sm">{{$unReadMessages}}</span>
                                @endif
                                <span
                                    class="absolute bottom-2 right-8 bg-[#E8F5FF] text-[#13354E] text-xs font-semibold px-2.5 py-0.5 rounded-lg">Customer</span>
                                <div class="w-3/5">
                                    <span
                                        class="block ml-2 font-semibold text-gray-600 truncate">{{$chatListPerson->username}}</span>
                                    <span
                                        class="block ml-2 text-sm text-gray-600 truncate">{{$chat->messages->sortByDesc('created_at')->first()->message}}</span>
                                </div>


                                @elseif ($chatListPerson->role_id == \App\Models\Role::STORAGE_OWNER)
                                <img class="self-start object-cover w-10 h-10 rounded-full"
                                    src="{{ asset('storage/' . $chatListPerson->storageOwner->image) }}"
                                    alt="username" />
                                <span class="absolute top-2 right-2 block ml-2 text-sm text-gray-600">
                                    {{date('d M Y h:m', strtotime($chat->messages->sortByDesc('created_at')->first()->updated_at))}}
                                </span>
                                @if ($unReadMessages > 0)
                                <span
                                    class="absolute bottom-2 right-2 h-5 w-5 text-center bg-red-500 rounded-full font-bold text-white text-sm">{{$unReadMessages}}</span>
                                @endif
                                <span
                                    class="absolute bottom-2 right-8 bg-[#F8C35B30] text-[#C96A1C] text-xs font-semibold px-2.5 py-0.5 rounded-lg">Storage
                                    Owner </span>
                                <div class="w-3/5">
                                    <span
                                        class="block ml-2 font-semibold text-gray-600 truncate">{{$chatListPerson->storageOwner->storage_name}}</span>
                                    <span
                                        class="block ml-2 text-sm text-gray-600 truncate">{{$chat->messages->sortByDesc('created_at')->first()->message}}</span>
                                </div>


                                @elseif($chatListPerson->role_id == \App\Models\Role::DELIVERY_DRIVER)
                                <img class="self-start object-cover w-10 h-10 rounded-full"
                                    src="{{ asset('storage/' . $chatListPerson->deliveryDriver->image) }}"
                                    alt="username" />
                                <span class="absolute top-2 right-2 block ml-2 text-sm text-gray-600">
                                    {{date('d M Y h:m', strtotime($chat->messages->sortByDesc('created_at')->first()->updated_at))}}
                                </span>
                                @if ($unReadMessages > 0)
                                <span
                                    class="absolute bottom-2 right-2 h-5 w-5 text-center bg-red-500 rounded-full font-bold text-white text-sm">{{$unReadMessages}}</span>
                                @endif
                                <span
                                    class="absolute bottom-2 right-8 bg-[#FF5688] text-[#420014] text-xs font-semibold px-2.5 py-0.5 rounded-lg">Driver</span>
                                <div class="w-3/5">
                                    <span
                                        class=" block ml-2 font-semibold text-gray-600 truncate">{{$chatListPerson->deliveryDriver->driver_name}}</span>
                                    <span
                                        class="block ml-2 text-sm text-gray-600 truncate">{{$chat->messages->sortByDesc('created_at')->first()->message}}</span>
                                </div>
                                @endif
                            </a>
                        </li>
                        @endforeach
                        @else
                        <div class="flex flex-col justify-center items-center">
                            <img class="object-scale-down"
                                src="{{ asset('storage/images/stockImages/noReviewsFound.svg') }}" alt="">
                            <span class="mt-5 text-gray-400 font-semibold text-lg text-center">Belum ada
                                chat</span>
                        </div>
                        @endif
                    </ul>
                </div>
                @if (isset($selectedChat))
                <div class="lg:col-span-2">
                    <div class="w-full">
                        <div class="relative flex items-center p-3 border-b border-gray-300">
                            @php
                            $selectedChatId = 0;
                            if ($selectedChat->receiver_user_id == Auth::user()->id) {
                            $selectedChatId = $selectedChat->sender_user_id;
                            }else {
                            $selectedChatId = $selectedChat->receiver_user_id;
                            }
                            $selectedChatListPerson = \App\Models\User::where('id', $selectedChatId)->first();
                            @endphp
                            @if ($selectedChatListPerson->role_id == \App\Models\Role::ADMIN)
                            <img class="object-cover w-10 h-10 rounded-full"
                                src="{{ asset('storage/'. $selectedChatListPerson->admin->image) }}" alt="username" />
                            <span
                                class="block ml-2 font-bold text-gray-600">{{$selectedChatListPerson->username}}</span>
                            <span
                                class="ml-auto bg-[#C2A2D1] text-[#4D275F] text-xs font-semibold px-2.5 py-0.5 rounded-lg">Admin</span>
                            @elseif ($selectedChatListPerson->role_id == \App\Models\Role::CUSTOMER)
                            <img class="object-cover w-10 h-10 rounded-full"
                                src="{{ asset('storage/' . $selectedChatListPerson->customer->image) }}"
                                alt="username" />
                            <span
                                class="block ml-2 font-bold text-gray-600">{{$selectedChatListPerson->username}}</span>
                            <span
                                class="ml-auto bg-[#E8F5FF] text-[#13354E] text-xs font-semibold px-2.5 py-0.5 rounded-lg">Customer</span>
                            @elseif ($selectedChatListPerson->role_id == \App\Models\Role::STORAGE_OWNER)
                            <img class="object-cover w-10 h-10 rounded-full"
                                src="{{ asset('storage/' . $selectedChatListPerson->storageOwner->image) }}"
                                alt="username" />
                            <span
                                class="block ml-2 font-bold text-gray-600">{{$selectedChatListPerson->storageOwner->storage_name}}</span>
                            <span
                                class="ml-auto bg-[#F8C35B30] text-[#C96A1C] text-xs font-semibold px-2.5 py-0.5 rounded-lg">Storage
                                Owner </span>
                            @elseif($selectedChatListPerson->role_id == \App\Models\Role::DELIVERY_DRIVER)
                            <img class="object-cover w-10 h-10 rounded-full"
                                src="{{ asset('storage/' . $selectedChatListPerson->deliveryDriver->image) }}"
                                alt="username" />
                            <span
                                class="block ml-2 font-bold text-gray-600">{{$selectedChatListPerson->deliveryDriver->driver_name}}</span>
                            <span
                                class="ml-auto bg-[#FF5688] text-[#420014] text-xs font-semibold px-2.5 py-0.5 rounded-lg">Driver</span>
                            @endif
                        </div>
                        <ul id="scrollSelectedChat"
                            class="relative w-full p-6 overflow-y-auto h-[40rem] bg-gray-100 space-y-2">
                            @foreach ($selectedChat->messages->sortBy('created_at') as $message)
                            @if ($message->receiver_user_id == Auth::user()->id)
                            <li class="flex justify-start">
                                <div
                                    class="relative max-w-xl px-4 py-2 text-gray-700 bg-white rounded-tl-xl rounded-r-xl shadow drop-shadow">
                                    @if($message->message_type == 1)
                                    <img class="w-full h-auto rounded-lg my-2"
                                        src="{{ asset('storage/'. $message->message) }}" alt="">
                                    @elseif($message->message_type == 0)
                                    <span class="block">{{$message->message}}</span>
                                    @endif
                                    <small
                                        class="block text-gray-700 text-right">{{date('d M Y h:m', strtotime($message->created_at))}}</small>
                                </div>
                            </li>
                            @elseif ($message->sender_user_id == Auth::user()->id)
                            <li class="flex justify-end">
                                <div
                                    class="relative max-w-xl px-4 py-2 text-gray-700 bg-[#FFF6E4] rounded-tr-xl rounded-l-xl shadow drop-shadow">
                                    @if($message->message_type == 1)
                                    <img class="w-full h-auto rounded-lg my-2"
                                        src="{{ asset('storage/'. $message->message) }}" alt="">
                                    @elseif($message->message_type == 0)
                                    <span class="block">{{$message->message}}</span>
                                    @endif
                                    <small
                                        class="block text-gray-700 text-right">{{date('d M Y h:m', strtotime($message->created_at))}}</small>
                                </div>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                        <div>
                            <form method="POST" enctype="multipart/form-data"
                                class="flex items-center justify-between w-full p-3 border-t border-gray-300"
                                action="{{ route('customer.sendChat', ['chat_id', $selectedChat->id]) }}">
                                @csrf
                                <input name="receiver" hidden value="{{$selectedChatListPerson->id}}">
                                <input hidden type="file" name="image" id="messageImage" accept="image/*">
                                <a data-tooltip-target="tooltipImage" onclick="$('#messageImage').click()"
                                    class="cursor-pointer">
                                    <svg xmlns=" http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500" fill="none"
                                        viewBox="0 0 24 24" stroke="#4D275F">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                                    </svg>
                                </a>
                                <div id="tooltipImage" role="tooltip"
                                    class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                                    Upload Image
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                                <input id="messageInput" type="text" placeholder="Message"
                                    class="block w-full py-2 pl-4 mx-3 bg-gray-100 rounded-full outline-none focus:text-gray-700"
                                    name="message" required />
                                <button type="submit">
                                    <svg class="w-5 h-5 text-gray-500 origin-center transform rotate-90"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#4D275F">
                                        <path
                                            d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="flex flex-col items-center align-center justify-items-center p-20">
                <img src="{{ asset('storage/images/stockImages/noUnitFound.svg') }}" alt="">
                <h1 class="mt-6 text-xl font-bold text-[#5A2871]">Kamu belum memilih chat</h1>
                <p class="mt-10 text-gray-400 font-semibold text-lg text-center">Pilih salah satu
                    chat</p>
            </div>
            @endif
        </div>
        @else
        <div class="flex flex-col justify-center items-center">
            <img class="object-scale-down" src="{{ asset('storage/images/stockImages/noReviewsFound.svg') }}" alt="">
            <span class="mt-5 text-gray-400 font-semibold text-lg text-center">Belum ada
                chat</span>
        </div>
        @endif
        </div>
        <script>
            function cancel(button) {
                $('#messageInput').val('');
                $('#messageInput').attr('disabled', false);
                $('#messageInput').attr('readonly', false);
                $('#messageInput').removeClass('bg-gray-300');
                $('#messageImage').val('');
                button.remove();
            }
            $("document").ready(function(){
                $('#scrollSelectedChat').animate({
                    scrollTop: $('#scrollSelectedChat li:last-child').offset().top
                   }, 1000);
                $('#messageImage').on('change', function(){
                    $('#messageInput').val('Click the button to send the image');
                    $('#messageInput').attr('disabled', true);
                    $('#messageInput').attr('readonly', true);
                    $('#messageInput').addClass('bg-gray-300');
                    $('#messageInput').parent().append('<a id="cancelSendImage" onclick="cancel(this)" class="cursor-pointer bg-gray-300 rounded-full px-3 py-1 ml-2">Cancel</a>');
                });
                selectedChat = $("#selectedChat");
                if (selectedChat.length > 0) {
                    $('#chatList').animate({
                    scrollTop: selectedChat.offset().top - selectedChat.parent().offset().top
                    }, 1000);              
                }
                $("#inputString").keyup(function () {
                var filter = jQuery(this).val();
                    $(".chats ul li").each(function () {
                        if (jQuery(this).text().search(new RegExp(filter, "i")) < 0) {
                            jQuery(this).hide();
                        } else {
                            jQuery(this).show()
                        }
                    });
                });
            });
        </script>
    </x-slot>
</x-app-layout>