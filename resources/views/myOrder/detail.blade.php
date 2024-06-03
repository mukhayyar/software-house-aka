<!-- resources/views/payment/details.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <div class="md:flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Detail Payment') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 px-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full">
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-3xl font-semibold mb-4">{{ $order->service->title }}</h3>
                        <div class="flex items-center gap-3 mt-3">
                            <div class="flex justify-center items-center w-12 h-12 rounded-full border overflow-hidden">
                                <img src="{{ $order->service->user->avatar() }}" alt="" class="h-full w-full object-cover object-center">
                            </div>
                            <div>
                                <h1 class="font-semibold text-lg">{{ $order->service->user->name }}</h1>
                                <div class="flex items-center gap-1">
                                    <i class="fa-solid fa-star text-lg"></i>
                                    <p class="font-bold text-lg">4.5</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-10">
                            <h1 class="text-xl font-semibold">About this service</h1>
                            <div class="mt-4">
                                <p>{{ $order->service->description }}</p>
                            </div>
                        </div>

                        <div>
                            <h1 class="text-xl font-semibold my-4">Order Note</h1>
                            <div class="mt-4">
                                <p>{{ $order->note }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="ml-16">
                        <div class="border px-6 py-7 sticky top-24 text-gray-600">
                            <h1 class="font-semibold text-2xl">{{"Rp. ".number_format($order->payment->amount,2,',','.')}}</h1>
                            <div class="mt-4">
                                <p class="text-sm">Order Date: {{ $order->order_date }}</p>
                                <p class="text-sm">Payment Status: {{ ucfirst($order->payment->payment_status) }}</p>
                                @if ($order->payment->payment_status === 'pending')
                                    <p class="text-sm text-red-500">Payment is still pending. Wait for seller to verify the transaction.</p>
                                @endif
                            </div>
                            <div class="mt-6">
                                <img src="{{ $order->payment->confirmation_image_url() }}" alt="Confirmation Image" class="w-full h-full object-cover object-center rounded-md">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
