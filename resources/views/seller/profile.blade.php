<x-app-layout>
    <x-slot name="header">
        <div class="md:flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Services') }}
            </h2>
            <form class="w-full max-w-xl">
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" id="default-search"
                        class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Search for any service..." required />
                    <button type="submit"
                        class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>
                </div>
            </form>
        </div>

    </x-slot>

    <div class="py-12 px-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full">
                @auth
                    <div
                        class="py-12 p-6 shadow-xl bg-blue-800 w-full flex flex-col gap-5 rounded-2xl text-slate-600 overflow-hidden relative">
                        <h1 class="text-3xl font-semibold text-white z-30">Welcome to Fivers, {{ auth()->user()->name }}
                            🎉</h1>
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

                <div class="my-10 grid md:grid-cols-4 gap-8">
                    {{-- Card --}}

                    <a href="{{ route('services.details') }}">
                        <div
                            class="shadow-md w-full flex flex-col overflow-hidden rounded-lg text-slate-600 cursor-pointer hover:scale-105 transition-all duration-200">
                            <div class="relative w-full h-[210px] overflow-hidden">
                                <img src="https://i.pinimg.com/736x/69/1b/f2/691bf22c81101b83312489611da02536.jpg"
                                    alt="" class="w-full h-full object-cover object-center">
                            </div>
                            <div class="p-4 flex flex-col gap-2">
                                <div class="flex items-center gap-2">
                                    <img src="https://i.pinimg.com/564x/63/8d/f2/638df23ded928498b58dfb808f915614.jpg"
                                        alt="" class="w-8 h-8 rounded-full">
                                    <h1 class="font-semibold">Rumah Kreasi</h1>
                                </div>
                                <p>I will design a logo for your business or product</p>
                                <div class="text-black flex items-center gap-2">
                                    <i class="fa-solid fa-star text-xl"></i>
                                    <p class="font-bold text-xl">4.5 </p>
                                </div>
                                <div class="flex justify-between items-center">
                                    <p class="font-semibold">Mulai Dari:</p>
                                    <p>Rp. 5.000.000</p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <div
                        class="shadow-md w-full flex flex-col overflow-hidden rounded-lg text-slate-600 cursor-pointer hover:scale-105 transition-all duration-200">
                        <div class="relative w-full h-[210px] overflow-hidden">
                            <img src="https://i.pinimg.com/564x/e4/3d/8d/e43d8d33c0c56566b9dbf6a05b04524e.jpg"
                                alt="" class="w-full h-full object-cover object-center">
                        </div>
                        <div class="p-4 flex flex-col gap-2">
                            <div class="flex items-center gap-2">
                                <img src="https://i.pinimg.com/564x/63/8d/f2/638df23ded928498b58dfb808f915614.jpg"
                                    alt="" class="w-8 h-8 rounded-full">
                                <h1 class="font-semibold">Rumah Kreasi</h1>
                            </div>
                            <p>I will design a logo for your business or product</p>
                            <div class="text-black flex items-center gap-2">
                                <i class="fa-solid fa-star text-xl"></i>
                                <p class="font-bold text-xl">4.5 </p>
                            </div>
                            <div class="flex justify-between items-center">
                                <p class="font-semibold">Mulai Dari:</p>
                                <p>Rp. 5.000.000</p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="shadow-md w-full flex flex-col overflow-hidden rounded-lg text-slate-600 cursor-pointer hover:scale-105 transition-all duration-200">
                        <div class="relative w-full h-[210px] overflow-hidden">
                            <img src="https://fiverr-res.cloudinary.com/images/t_main1,q_auto,f_auto,q_auto,f_auto/gigs2/120741108/original/5ee091d63f9977182138e2836125a7a1986f47b1/do-amazing-business-logo.jpg"
                                alt="" class="w-full h-full object-cover object-center">
                        </div>
                        <div class="p-4 flex flex-col gap-2">
                            <div class="flex items-center gap-2">
                                <img src="https://i.pinimg.com/564x/63/8d/f2/638df23ded928498b58dfb808f915614.jpg"
                                    alt="" class="w-8 h-8 rounded-full">
                                <h1 class="font-semibold">Rumah Kreasi</h1>
                            </div>
                            <p>I will design a logo for your business or product</p>
                            <div class="text-black flex items-center gap-2">
                                <i class="fa-solid fa-star text-xl"></i>
                                <p class="font-bold text-xl">4.5 </p>
                            </div>
                            <div class="flex justify-between items-center">
                                <p class="font-semibold">Mulai Dari:</p>
                                <p>Rp. 5.000.000</p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="shadow-md w-full flex flex-col overflow-hidden rounded-lg text-slate-600 cursor-pointer hover:scale-105 transition-all duration-200">
                        <div class="relative w-full h-[210px] overflow-hidden">
                            <img src="https://i.pinimg.com/564x/fe/2d/83/fe2d839c8ccb165acebb6bc24313516d.jpg"
                                alt="" class="w-full h-full object-cover object-center">
                        </div>
                        <div class="p-4 flex flex-col gap-2">
                            <div class="flex items-center gap-2">
                                <img src="https://i.pinimg.com/564x/63/8d/f2/638df23ded928498b58dfb808f915614.jpg"
                                    alt="" class="w-8 h-8 rounded-full">
                                <h1 class="font-semibold">Rumah Kreasi</h1>
                            </div>
                            <p>I will design a logo for your business or product</p>
                            <div class="text-black flex items-center gap-2">
                                <i class="fa-solid fa-star text-xl"></i>
                                <p class="font-bold text-xl">4.5 </p>
                            </div>
                            <div class="flex justify-between items-center">
                                <p class="font-semibold">Mulai Dari:</p>
                                <p>Rp. 5.000.000</p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="shadow-md w-full flex flex-col overflow-hidden rounded-lg text-slate-600 cursor-pointer hover:scale-105 transition-all duration-200">
                        <div class="relative w-full h-[210px] overflow-hidden">
                            <img src="https://i.pinimg.com/564x/00/8e/d3/008ed3ecc4859739a5c209dc36aa61a1.jpg"
                                alt="" class="w-full h-full object-cover object-center">
                        </div>
                        <div class="p-4 flex flex-col gap-2">
                            <div class="flex items-center gap-2">
                                <img src="https://i.pinimg.com/564x/63/8d/f2/638df23ded928498b58dfb808f915614.jpg"
                                    alt="" class="w-8 h-8 rounded-full">
                                <h1 class="font-semibold">Rumah Kreasi</h1>
                            </div>
                            <p>I will design a logo for your business or product</p>
                            <div class="text-black flex items-center gap-2">
                                <i class="fa-solid fa-star text-xl"></i>
                                <p class="font-bold text-xl">4.5 </p>
                            </div>
                            <div class="flex justify-between items-center">
                                <p class="font-semibold">Mulai Dari:</p>
                                <p>Rp. 5.000.000</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
