<x-app-layout>
    <x-slot name="header">
        <div class="md:flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Detail Service') }}
            </h2>
        </div>

    </x-slot>

    <div class="py-12 px-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full">
                <div class="grid md:grid-cols-2">
                    <div>

                        {{-- Header --}}
                        <div class="mb-4">
                            <h1 class="text-3xl font-semibold">{{$service->title}}</h1>

                            <div class="flex items-center gap-3 mt-3">
                                <div
                                    class="flex justify-center items-center w-12 h-12 rounded-full border overflow-hidden">
                                    <img src="{{$service->user->avatar()}}"
                                        alt="" class="h-full w-full object-cover object-center">
                                </div>
                                <div>
                                    <h1 class="font-semibold text-lg">{{$service->user->name}}</h1>
                                    <div class="flex items-center gap-1">
                                        <i class="fa-solid fa-star text-lg"></i>
                                        <p class="font-bold text-lg">4.5 </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Carousel --}}
                        <div id="default-carousel" class="relative w-full" data-carousel="slide">
                            <!-- Carousel wrapper -->
                            <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                                <!-- Item 1 -->
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img src="{{$service->thumbnail()}}"
                                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                        alt="...">
                                </div>
                            </div>
                            <!-- Slider indicators -->
                            <div
                                class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                                <button type="button" class="w-3 h-3 rounded-full" aria-current="true"
                                    aria-label="Slide 1" data-carousel-slide-to="0"></button>
                            </div>
                            <!-- Slider controls -->
                            <button type="button"
                                class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                data-carousel-prev>
                                <span
                                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50  group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                                    <svg class="w-4 h-4 text-white  rtl:rotate-180" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M5 1 1 5l4 4" />
                                    </svg>
                                    <span class="sr-only">Previous</span>
                                </span>
                            </button>
                            <button type="button"
                                class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                data-carousel-next>
                                <span
                                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50  group-focus:ring-4 group-focus:ring-white  group-focus:outline-none">
                                    <svg class="w-4 h-4 text-white  rtl:rotate-180" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 9 4-4-4-4" />
                                    </svg>
                                    <span class="sr-only">Next</span>
                                </span>
                            </button>
                        </div>

                        <div class="mt-10">
                            <h1 class="text-xl font-semibold">About this service</h1>
                            <div class="mt-4">
                                <p> {{$service->description}} </p>
                                </p>
                            </div>
                        </div>

                        <div>
                            <h1 class="text-xl font-semibold my-4">FAQ</h1>

                            <div id="accordion-collapse" data-accordion="collapse">
                                @foreach($service->faqs as $faq)
                                <h2 id="accordion-collapse-heading-{{$loop->index + 1}}">
                                    <button type="button"
                                        class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl  hover:bg-gray-100  gap-3"
                                        data-accordion-target="#accordion-collapse-body-1" aria-expanded="true"
                                        aria-controls="accordion-collapse-body-1">
                                        <span>{{$faq->question}}</span>
                                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                                        </svg>
                                    </button>
                                </h2>
                                <div id="accordion-collapse-body-1" class="hidden"
                                    aria-labelledby="accordion-collapse-heading-1">
                                    <div class="p-5 border border-b-0 border-gray-200 ">
                                        <p class="mb-2 text-gray-500 ">{{$faq->question}}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="ml-16">
                        <div class="border px-6 py-7 sticky top-24 text-gray-600">
                            <h1 class="font-semibold text-2xl">{{"Rp.".number_format($service->price)}}</h1>
                            <div class="mt-4">
                                <p class="text-sm">{{$service->description}}</p>

                                <div class="mt-4 flex flex-col gap-3">
                                    @foreach($service->servicesIncluded as $feature)
                                    <div class="flex items-center gap-2">
                                        <i class="fa-solid fa-circle-check"></i>
                                        <p class="text-sm">{{$feature->title}}</p>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="mt-6 flex justify-between items-center">
                                    <div class="flex items-center gap-2">
                                        <i class="fa-solid fa-clock text-lg"></i>
                                        <p class="font-medium text-sm">{{$service->time_delivery}}-day delivery</p>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <i class="fa-solid fa-rotate-left"></i>
                                        <p class="font-medium text-sm">{{$service->revision_time}} Revisions</p>
                                    </div>
                                </div>
                                @if(Auth::check())
                                    @if(auth()->user()->user_type == 'buyer')
                                    <a href="{{ route('checkout', $service->id) }}"
                                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 mt-6 rounded-md w-full flex gap-5 items-center justify-center">
                                        <span>Continue</span><i class="fa-solid fa-arrow-right"></i>
                                    </a>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
