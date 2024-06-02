<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Payment Verification') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-5 md:gap-8">

                {{-- Card --}}
                <div class="p-6 shadow-md w-full flex flex-col gap-5 rounded-lg text-slate-600">
                    <div class="flex items-center justify-between w-full">
                        <div class="flex items-center gap-3">
                            <img src="https://i.pinimg.com/564x/9d/45/a4/9d45a4fdcbbce49b533e5f49a5ad21cc.jpg"
                                alt="" class="rounded-full w-10">
                            <h3 class="font-semibold text-lg">KreasiWebku</h3>
                        </div>
                        <div class="flex items-center justify-center p-2 px-3 rounded-full border bg-red-500">
                            <h2 class="text-sm text-white">Belum Dibayar</h2>
                        </div>
                    </div>

                    <div>
                        <h1 class="font-semibold text-xl">Desan UI/UX</h1>
                        <p class="mt-2">Rp. 500.000</p>
                    </div>

                    <button class="bg-blue-500 hover:bg-blue-600 text-white px-5 py-2 rounded-lg">
                        Bayar Sekarang
                    </button>
                </div>

                {{-- Card --}}
                <div class="p-6 shadow-md w-full flex flex-col gap-5 rounded-lg text-slate-600">
                    <div class="flex items-center justify-between w-full">
                        <div class="flex items-center gap-3">
                            <img src="https://i.pinimg.com/564x/63/8d/f2/638df23ded928498b58dfb808f915614.jpg"
                                alt="" class="rounded-full w-10">
                            <h3 class="font-semibold text-lg">KreasiWebku</h3>
                        </div>
                        <div class="flex items-center justify-center p-2 px-3 rounded-full border bg-red-500">
                            <h2 class="text-sm text-white">Belum Dibayar</h2>
                        </div>
                    </div>

                    <div>
                        <h1 class="font-semibold text-xl">Analisa Data Perusahaan</h1>
                        <p class="mt-2">Rp. 5.000.000</p>
                    </div>

                    <button class="bg-blue-500 hover:bg-blue-600 text-white px-5 py-2 rounded-lg">
                        Bayar Sekarang
                    </button>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
