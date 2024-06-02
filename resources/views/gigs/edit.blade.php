<x-app-layout>
    <x-slot name="header">
        <div class="md:flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Service') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 px-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full">
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-2xl font-semibold mb-4">Edit Service</h3>
                        <form method="POST" action="{{ route('gigs.update', $gig->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Title -->
                            <div>
                                <x-input-label for="title" :value="__('Title')" />
                                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="$gig->title" required autofocus />
                                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                            </div>

                            <!-- Description -->
                            <div class="mt-4">
                                <x-input-label for="description" :value="__('Description')" />
                                <textarea id="description" class="block mt-1 w-full" name="description" required>{{ $gig->description }}</textarea>
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                            </div>

                            <!-- Category -->
                            <div class="mt-4">
                                <x-input-label for="category" :value="__('Category')" />
                                <select id="category" name="category" class="block w-full p-4 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $gig->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('category')" class="mt-2" />
                            </div>

                            <!-- Price -->
                            <div class="mt-4">
                                <x-input-label for="price" :value="__('Price (IDR)')" />
                                <x-text-input id="price" class="block mt-1 w-full" type="number" name="price" :value="$gig->price" required />
                                <x-input-error :messages="$errors->get('price')" class="mt-2" />
                            </div>

                            <!-- Time Delivery -->
                            <div class="mt-4">
                                <x-input-label for="time_delivery" :value="__('Time Delivery (Days)')" />
                                <x-text-input id="time_delivery" class="block mt-1 w-full" type="number" name="time_delivery" min="1" max="365" :value="$gig->time_delivery" required />
                                <x-input-error :messages="$errors->get('time_delivery')" class="mt-2" />
                            </div>

                            <!-- Revision Time -->
                            <div class="mt-4">
                                <x-input-label for="revision_time" :value="__('Revision Time')" />
                                <x-text-input id="revision_time" class="block mt-1 w-full" type="number" name="revision_time" min="0" max="10" :value="$gig->revision_time" required />
                                <x-input-error :messages="$errors->get('revision_time')" class="mt-2" />
                            </div>

                            <!-- Image -->
                            <div class="mt-4">
                                <x-input-label for="image" :value="__('Image Thumbnail')" />
                                <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" />
                                <x-input-error :messages="$errors->get('image')" class="mt-2" />
                            </div>

                            <x-primary-button class="w-full mt-4">
                                {{ __('Update Service') }}
                            </x-primary-button>
                        </form>

                        <form method="POST" action="{{ route('gigs.destroy', $gig->id) }}" class="mt-4">
                            @csrf
                            @method('DELETE')
                            <x-danger-button class="w-full">
                                {{ __('Delete Service') }}
                            </x-danger-button>
                        </form>
                    </div>
                    <div>
                        <div>
                            <h1 class="text-xl font-semibold my-4">FAQ</h1>

                            <table class="min-w-full divide-y divide-gray-200 mb-4">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Question
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Answer
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($gig->faqs as $faq)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{$faq->question}}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-500">{{$faq->answer}}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <form method="POST" action="{{ route('faqs.destroy', $faq->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <x-danger-button>
                                                    {{ __('Delete') }}
                                                </x-danger-button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <h1 class="text-xl font-semibold my-4">Services Included</h1>

                            <table class="min-w-full divide-y divide-gray-200 mb-4">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Title
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($gig->servicesIncluded as $included)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{$included->title}}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <form method="POST" action="{{ route('services-included.destroy', $included->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <x-danger-button>
                                                    {{ __('Delete') }}
                                                </x-danger-button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Add FAQ -->
                        <div>
                            <h3 class="text-xl font-semibold mb-4">Add FAQ</h3>
                            <form method="POST" action="{{ route('faqs.store') }}">
                                @csrf
                                <input type="hidden" name="service_id" value="{{ $gig->id }}">
                                
                                <div>
                                    <x-input-label for="question" :value="__('Question')" />
                                    <x-text-input id="question" class="block mt-1 w-full" type="text" name="question" required />
                                    <x-input-error :messages="$errors->get('question')" class="mt-2" />
                                </div>
                                
                                <div class="mt-4">
                                    <x-input-label for="answer" :value="__('Answer')" />
                                    <textarea id="answer" class="block mt-1 w-full" name="answer" required></textarea>
                                    <x-input-error :messages="$errors->get('answer')" class="mt-2" />
                                </div>

                                <x-primary-button class="w-full mt-4">
                                    {{ __('Add FAQ') }}
                                </x-primary-button>
                            </form>
                        </div>

                        <!-- Add Service Included -->
                        <div class="mt-10">
                            <h3 class="text-xl font-semibold mb-4">Add Service Included</h3>
                            <form method="POST" action="{{ route('services-included.store') }}">
                                @csrf
                                <input type="hidden" name="service_id" value="{{ $gig->id }}">
                                
                                <div>
                                    <x-input-label for="title" :value="__('Title')" />
                                    <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" required />
                                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                                </div>

                                <x-primary-button class="w-full mt-4">
                                    {{ __('Add Service Included') }}
                                </x-primary-button>
                            </form>
                        </div>
                    </div>

                    <div class="ml-4">
                        <h3 class="text-2xl font-semibold mb-4">Service Preview</h3>
                        <div class="mb-4">
                            <h1 class="text-3xl font-semibold">{{$gig->title}}</h1>

                            <div class="flex items-center gap-3 mt-3">
                                <div class="flex justify-center items-center w-12 h-12 rounded-full border overflow-hidden">
                                    <img src="{{$gig->user->avatar()}}" alt="" class="h-full w-full object-cover object-center">
                                </div>
                                <div>
                                    <h1 class="font-semibold text-lg">{{$gig->user->name}}</h1>
                                    <div class="flex items-center gap-1">
                                        <i class="fa-solid fa-star text-lg"></i>
                                        <p class="font-bold text-lg">4.5 </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Carousel -->
                        <div id="default-carousel" class="relative w-full" data-carousel="slide">
                            <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img src="{{$gig->thumbnail()}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                                </div>
                            </div>
                            <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                                <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                            </div>
                            <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50  group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                                    <svg class="w-4 h-4 text-white  rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
                                    </svg>
                                    <span class="sr-only">Previous</span>
                                </span>
                            </button>
                            <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50  group-focus:ring-4 group-focus:ring-white  group-focus:outline-none">
                                    <svg class="w-4 h-4 text-white  rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                                    </svg>
                                    <span class="sr-only">Next</span>
                                </span>
                            </button>
                        </div>

                        <div class="mt-10">
                            <h1 class="text-xl font-semibold">About this service</h1>
                            <div class="mt-4">
                                <p>{{$gig->description}}</p>
                            </div>
                        </div>
                        <div class="border px-6 py-7 sticky top-24 text-gray-600">
                            <h1 class="font-semibold text-2xl">{{"Rp.".number_format($gig->price)}}</h1>
                            <div class="mt-4">
                                <p class="text-sm">{{$gig->description}}</p>

                                <div class="mt-4 flex flex-col gap-3">
                                    @foreach($gig->servicesIncluded as $feature)
                                    <div class="flex items-center gap-2">
                                        <i class="fa-solid fa-circle-check"></i>
                                        <p class="text-sm">{{$feature->title}}</p>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="mt-6 flex justify-between items-center">
                                    <div class="flex items-center gap-2">
                                        <i class="fa-solid fa-clock text-lg"></i>
                                        <p class="font-medium text-sm">{{$gig->time_delivery}}-day delivery</p>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <i class="fa-solid fa-rotate-left"></i>
                                        <p class="font-medium text-sm">{{$gig->revision_time}} Revisions</p>
                                    </div>
                                </div>
                                @if(auth()->user()->user_type == 'buyer')
                                <a href="{{ route('checkout', $gig->id) }}"
                                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 mt-6 rounded-md w-full flex gap-5 items-center justify-center">
                                    <span>Continue</span><i class="fa-solid fa-arrow-right"></i>
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>