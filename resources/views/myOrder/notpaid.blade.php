<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Payment Verification') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-5 md:gap-8">
                @foreach ($PendingOrders as $order)
                <a href="{{ route('myorders.details', $order->id) }}">
                    <div class="p-6 shadow-md w-full flex flex-col gap-5 rounded-lg text-slate-600">
                        <div class="flex items-center justify-between w-full">
                            <div class="flex items-center gap-3">
                                <img src="{{$order->service->user->avatar()}}"
                                    alt="" class="rounded-full w-10">
                                <h3 class="font-semibold text-lg">{{$order->service->user->name}}</h3>
                            </div>
                            <div class="flex items-center justify-center p-2 px-3 rounded-full border
                            @if($order->payment->payment_status == 'pending')
                                bg-yellow-500
                            @elseif($order->payment->payment_status == 'approved')
                                bg-green-500
                            @else
                                bg-red-500
                            @endif
                             ">
                                <h2 class="text-sm text-white">{{ucfirst($order->payment->payment_status)}}</h2>
                            </div>
                        </div>

                        <div>
                            <h1 class="font-semibold text-xl">{{$order->service->title}}</h1>
                            <p class="mt-2">{{"Rp. ".number_format($order->payment->amount,2,',','.')}}</p>
                            <p class="mt-1 text-sm text-gray-500">Order Date: {{$order->order_date}}</p>
                        </div>
                        
                        <!-- Verify and Reject Buttons -->
                        @if(Auth::user()->user_type == 'seller')
                            @if($order->payment->payment_status == 'pending')
                            <div class="flex gap-3 mt-3">
                                <form method="POST" action="{{ route('payments.verify', $order->payment->id) }}">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">
                                        Verify
                                    </button>
                                </form>
                                <form method="POST" action="{{ route('payments.reject', $order->payment->id) }}">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">
                                        Reject
                                    </button>
                                </form>
                            </div>
                            @endif
                            
                            <!-- Delete Button for Rejected Payments -->
                            @if($order->payment->payment_status == 'rejected')
                            <div class="mt-3">
                                <form method="POST" action="{{ route('payments.destroy', $order->payment->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">
                                        Delete
                                    </button>
                                </form>
                            </div>
                            @endif
                        @endif
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
