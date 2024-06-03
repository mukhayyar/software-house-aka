<x-app-layout>
    <x-slot name="header">
        <div class="md:flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Payment') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 px-4 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-3xl font-semibold">Metode Pembayaran</h1>
            <form id="payment-form" method="POST" action="{{ route('payment.store',$service->id) }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="service_id" value="{{ $service->id }}">
                <input type="hidden" name="amount" value="{{ $service->price }}">
                <input type="hidden" name="payment_method" id="payment-method">
                <div class="w-full">
                    <div class="md:flex gap-5 mt-6">
                        <div class="w-full max-w-[400px]">
                            <div class="flex flex-col gap-6 cursor-pointer">
                                <label for="bca-radio"
                                    class="payment-option flex items-center justify-between border-2 px-5 py-4 w-[400px] h-[100px] overflow-hidden bg-white">
                                    <div class="flex flex-col gap-2">
                                        <div class="flex items-center gap-2">
                                            <input type="radio" id="bca-radio" name="payment_option" value="BCA" class="hidden">
                                            <div class="dot h-4 w-4 rounded-full border-2 border-blue-500"></div>
                                            <h1 class="font-semibold text-lg">BCA</h1>
                                        </div>
                                        <p class="text-sm text-gray-600">Account Number: 1234567890</p>
                                    </div>
                                    <div><img src="{{ asset('images/bca.svg') }}" alt="" class="w-16"></div>
                                </label>
                                <label for="mandiri-radio"
                                    class="payment-option flex items-center justify-between border-2 px-5 py-4 w-[400px] h-[100px] overflow-hidden bg-white">
                                    <div class="flex flex-col gap-2">
                                        <div class="flex items-center gap-2">
                                            <input type="radio" id="mandiri-radio" name="payment_option" value="MANDIRI" class="hidden">
                                            <div class="dot h-4 w-4 rounded-full border-2 border-blue-500"></div>
                                            <h1 class="font-semibold text-lg">MANDIRI</h1>
                                        </div>
                                        <p class="text-sm text-gray-600">Account Number: 0987654321</p>
                                    </div>
                                    <div><img src="{{ asset('images/mandiri.svg') }}" alt="" class="w-16"></div>
                                </label>
                                <label for="bni-radio"
                                    class="payment-option flex items-center justify-between border-2 px-5 py-4 w-[400px] h-[100px] overflow-hidden bg-white">
                                    <div class="flex flex-col gap-2">
                                        <div class="flex items-center gap-2">
                                            <input type="radio" id="bni-radio" name="payment_option" value="BNI" class="hidden">
                                            <div class="dot h-4 w-4 rounded-full border-2 border-blue-500"></div>
                                            <h1 class="font-semibold text-lg">BNI</h1>
                                        </div>
                                        <p class="text-sm text-gray-600">Account Number: 1122334455</p>
                                    </div>
                                    <div><img src="{{ asset('images/bni.svg') }}" alt="" class="w-16"></div>
                                </label>
                            </div>
                        </div>
                        <div class="w-full bg-white p-6 rounded-lg">
                            <div class="flex justify-between items-center">
                                <div class="max-w-xs">
                                    <h1 class="text-lg font-semibold">{{$service->title}}</h1>
                                </div>
                                <div>
                                    <p class="text-xl font-semibold">{{"Rp.".number_format($service->price, 2, ',', '.')}}</p>
                                </div>
                            </div>
                            <div class="space-y-2 mt-3">
                                @foreach($service->servicesIncluded as $feature)
                                <div class="flex items-center gap-2">
                                    <i class="fa-solid fa-circle-check text-green-600"></i>
                                    <p>{{$feature->name}}</p>
                                </div>
                                @endforeach
                            </div>
                            <div class="mt-4">
                                <p>{{$service->description}}</p>
                            </div>
                            <hr class="my-5 border">
                            <div>
                                <!-- Image Upload for Payment Confirmation -->
                                <div class="mt-4">
                                    <x-input-label for="payment_confirmation" :value="__('Upload Payment Confirmation')" />
                                    <x-text-input id="payment_confirmation" class="block mt-1 w-full" type="file" name="payment_confirmation" required />
                                    <x-input-error :messages="$errors->get('payment_confirmation')" class="mt-2" />
                                </div>
                                
                                <!-- Order Note -->
                                <div class="mt-4">
                                    <x-input-label for="order_note" :value="__('Order Note')" />
                                    <textarea id="order_note" class="block mt-1 w-full" name="order_note" required></textarea>
                                    <x-input-error :messages="$errors->get('order_note')" class="mt-2" />
                                </div>
                                
                                <div class="w-full mt-6">
                                    <button class="bg-blue-600 hover:bg-blue-700 w-full text-white px-5 py-4 rounded">Submit Payment</button>
                                    <div class="flex items-center gap-3 mt-4">
                                        <i class="fa-solid fa-clock-rotate-left text-green-600"></i>
                                        <p class="text-sm">30 Day Money Back Guarantee</p>
                                    </div>
                                    <div class="flex items-center gap-3 mt-4">
                                        <i class="fa-solid fa-lock text-green-600"></i>
                                        <p class="text-sm">Secure and Encrypted Payments</p>
                                    </div>
                                    {{-- <p class="mt-4 text-sm">Dengan checkout, Anda setuju dengan <a href="#" class="font-bold text-blue-600 hover:underline">Ketentuan Penggunaan</a> kami dan mengonfirmasi bahwa Anda telah membaca <a href="#" class="font-bold text-blue-600 hover:underline">Kebijakan Privasi</a> kami. Anda dapat membatalkan biaya perpanjangan layanan kapan saja.</p> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.querySelectorAll('.payment-option').forEach(option => {
            option.addEventListener('click', function() {
                const radio = this.querySelector('input[type="radio"]');
                radio.checked = true;
                updateDots();
            });
        });

        function updateDots() {
            document.querySelectorAll('.payment-option').forEach(option => {
                const radio = option.querySelector('input[type="radio"]');
                const dot = option.querySelector('.dot');
                if (radio.checked) {
                    dot.classList.add('bg-blue-500');
                } else {
                    dot.classList.remove('bg-blue-500');
                }
            });
        }

        document.addEventListener('DOMContentLoaded', updateDots);
    </script>
</x-app-layout>
