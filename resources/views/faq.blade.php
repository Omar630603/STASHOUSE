<x-guest-layout>
    <x-slot name="header"> </x-slot>

    <section class="bg-white">
        <div class="container px-6 py-12 mx-auto">
            <h1 class="text-3xl font-bold text-center mb-6">
                {{ __('FAQ') }}
            </h1>
            @if (isset($faqs))
            <h1 class="text-2xl font-semibold text-center text-gray-800 lg:text-4xl">Ada pertanyaan?
            </h1>
            <div class="mt-8 xl:mt-16 lg:flex lg:-mx-12">
                <div class="lg:mx-12">
                    <h1 class="text-xl font-semibold text-gray-800">Daftar Isi</h1>
                    <div class="tabs-menu mt-4 space-y-4 lg:mt-8">
                        @forelse ($faqs as $faq)
                        @if ($loop->first)
                        <a href="#tab-{{$faq->id}}" class="block text-blue-500 hover:underline">{{$faq->title}}</a>
                        @else
                        <a href="#tab-{{$faq->id}}" class="block text-gray-500 hover:underline">{{$faq->title}}</a>
                        @endif
                        @empty
                        <p>Tidak ada pertanyaan</p>
                        @endforelse
                    </div>
                </div>
                @forelse ($faqs as $faq)
                @if ($loop->first)
                <div id="tab-{{$faq->id}}" class="tab-content flex-1 mt-8 lg:mx-12 lg:mt-0">
                    @foreach ($faq->faqQuestions as $faqQuestion)
                    <div>
                        <button onclick="openClose(this)" class="flex items-center focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4" />
                            </svg>
                            <svg class="hidden w-6 h-6 text-blue-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4">
                                </path>
                            </svg>
                            <h1 class="mx-4 text-xl text-gray-700">{{$faqQuestion->question}}
                            </h1>
                        </button>
                        <div class="hidden flex mt-8 md:mx-10">
                            <span class="border border-blue-500"></span>
                            <p class="max-w-3xl px-4 text-gray-500">
                                {{$faqQuestion->answer}}
                            </p>
                        </div>
                    </div>
                    <hr class="my-8 border-gray-200">
                    @endforeach
                </div>
                @else
                <div id="tab-{{$faq->id}}" class="hidden tab-content flex-1 mt-8 lg:mx-12 lg:mt-0">
                    @foreach ($faq->faqQuestions as $faqQuestion)
                    <div>
                        <button onclick="openClose(this)" class="flex items-center focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4" />
                            </svg>
                            <svg class="hidden w-6 h-6 text-blue-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4">
                                </path>
                            </svg>
                            <h1 class="mx-4 text-xl text-gray-700">{{$faqQuestion->question}}
                            </h1>
                        </button>
                        <div class="hidden flex mt-8 md:mx-10">
                            <span class="border border-blue-500"></span>
                            <p class="max-w-3xl px-4 text-gray-500">
                                {{$faqQuestion->answer}}
                            </p>
                        </div>
                    </div>
                    <hr class="my-8 border-gray-200">
                    @endforeach
                </div>
                @endif
                @empty
                <p>Tidak ada pertanyaan</p>
                @endforelse
                @else
                <div class="text-center">
                    <p class="text-gray-600">
                        {{ __('No FAQ found.') }}
                    </p>
                </div>
                @endif
            </div>
        </div>
    </section>
    <script>
        function openClose(button){
            button.children[0].classList.toggle('hidden');
            button.children[1].classList.toggle('hidden');
            button.nextSibling.nextElementSibling.classList.toggle('hidden');
        }
        // function on click change link class from text-gray-500 to text-blue-500
        $(document).ready(function(){
            $('.tabs-menu a').click(function(event) {
            event.preventDefault();

            // Toggle active class on tab buttons
            $(this).addClass("text-blue-500");
            $(this).siblings().removeClass("text-blue-500");
            $(this).siblings().addClass("text-gray-500");

            // display only active tab content
            var activeTab = $(this).attr("href");
            $('.tab-content').not(activeTab).css("display","none");
            $(activeTab).fadeIn();
            });
        });
    </script>
</x-guest-layout>