<x-app-layout>
    <x-slot name="header">
        <div class="md:flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Your Gigs') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 px-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full">
                @auth
                    <div
                        class="py-12 p-6 shadow-xl bg-blue-800 w-full flex flex-col gap-5 rounded-2xl text-slate-600 overflow-hidden relative mb-10">
                        <h1 class="text-3xl font-semibold text-white z-30">Welcome, {{ auth()->user()->name }} 🎉, Let's Thriving!</h1>
                        <div class="w-20 h-20 bg-blue-400 opacity-50 rounded-full absolute -end-4 -bottom-4">
                        </div>
                        <div class="w-28 h-28 bg-blue-400 opacity-20 rounded-full absolute top-0 -left-8">
                        </div>
                        <div class="w-3 h-3 bg-blue-400 opacity-30 rounded-full absolute top-5 left-60">
                        </div>
                        <div class="w-96 h-96 bg-blue-200 opacity-10 rounded-full absolute bottom-2 right-60">
                        </div>
                    </div>
                @endauth

                <!-- Display Gigs -->
                <div class="my-10 grid md:grid-cols-4 gap-8">
                    @foreach($gigs as $gig)
                    <a href="{{ route('gigs.edit',$gig->id) }}">
                        <div
                            class="shadow-md w-full flex flex-col overflow-hidden rounded-lg text-slate-600 cursor-pointer hover:scale-105 transition-all duration-200">
                            <div class="relative w-full h-[210px] overflow-hidden">
                                <img src="{{ $gig->thumbnail() ?? 'default_image_url' }}"
                                    alt="{{ $gig->title }}" class="w-full h-full object-cover object-center">
                            </div>
                            <div class="p-4 flex flex-col gap-2">
                                <div class="flex items-center gap-2">
                                    <img src="{{ auth()->user()->avatar() }}"
                                        alt="{{ auth()->user()->name }}" class="w-8 h-8 rounded-full">
                                    <h1 class="font-semibold">{{ $gig->title }}</h1>
                                </div>
                                <p>{{ $gig->description }}</p>
                                <div class="text-black flex items-center gap-2">
                                    <i class="fa-solid fa-star text-xl"></i>
                                    <p class="font-bold text-xl">4.5 </p>
                                </div>
                                <div class="flex justify-between items-center">
                                    <p class="font-semibold">Starting From:</p>
                                    <p>{{ "Rp. ".number_format($gig->price, 2, ',', '.') }}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>

                <!-- Pagination Links -->
                <div class="mt-4">
                    {{ $gigs->links() }}
                </div>

                <!-- Post a New Gig -->
                <div class="mt-10">
                    <h3 class="font-semibold text-xl text-gray-800 leading-tight mb-4">Post a New Gig</h3>
                    <form method="POST" action="{{ route('gigs.store') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Title -->
                        <div>
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <!-- Description -->
                        <div class="mt-4">
                            <x-input-label for="description" :value="__('Description')" />
                            <textarea id="description" class="block mt-1 w-full" name="description" required>{{ old('description') }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <!-- Category -->
                        <div class="mt-4">
                            <x-input-label for="category" :value="__('Category')" />
                            <select id="category" name="category" class="block w-full p-4 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('category')" class="mt-2" />
                        </div>

                        <!-- Price -->
                        <div class="mt-4">
                            <x-input-label for="price" :value="__('Price (IDR)')" />
                            <x-text-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price')" required />
                            <x-input-error :messages="$errors->get('price')" class="mt-2" />
                        </div>

                        <!-- Time Delivery -->
                        <div class="mt-4">
                            <x-input-label for="time_delivery" :value="__('Time Delivery (Days)')" />
                            <x-text-input id="time_delivery" class="block mt-1 w-full" type="number" min="1" max="365"  name="time_delivery" :value="old('time_delivery')" required />
                            <x-input-error :messages="$errors->get('time_delivery')" class="mt-2" />
                        </div>

                        <!-- Revision Time -->
                        <div class="mt-4">
                            <x-input-label for="revision_time" :value="__('Revision Time')" />
                            <x-text-input id="revision_time" class="block mt-1 w-full" type="number" min="0" max="20"  name="revision_time" :value="old('revision_time')" required />
                            <x-input-error :messages="$errors->get('revision_time')" class="mt-2" />
                        </div>

                        <!-- Image -->
                        <div class="mt-4">
                            <x-input-label for="image" :value="__('Image Thumbnail')" />
                            <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" />
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-4">
                                {{ __('Post Gig') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
