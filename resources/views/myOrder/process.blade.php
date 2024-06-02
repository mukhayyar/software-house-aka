<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sedang Dikerjakan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-5 md:gap-8">

                {{-- Card --}}
                <div class="p-6 shadow-md w-full flex flex-col gap-5 rounded-lg text-slate-600">
                    <div class="flex items-center justify-between w-full">
                        <div class="flex items-center gap-3">
                            <img src="{{ asset('images/image2.png') }}" alt="" class="rounded-full w-10">
                            <h3 class="font-semibold text-lg">KreasiWebku</h3>
                        </div>
                        <div class="flex items-center justify-center p-2 px-3 rounded-lg bg-blue-500">
                            <h2 class="text-sm text-white">Sedang Dikerjakan</h2>
                        </div>
                    </div>

                    <div>
                        <h1 class="font-semibold text-xl">Jasa Pembuatan Website Landing Page</h1>
                        <p class="mt-2">Rp. 100.000</p>
                    </div>

                    <button class="bg-blue-500 hover:bg-blue-600 text-white px-5 py-2 rounded-lg disabled:bg-blue-200"
                        disabled>
                        Bayar Sekarang
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
