<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Payment Verification') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-5 md:gap-8">
                @foreach ($OnProgressOrders as $order)
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
                            <h2 class="text-sm text-white">{{ucfirst($order->status)}}</h2>
                        </div>
                    </div>

                    <div>
                        <h1 class="font-semibold text-xl">{{$order->service->title}}</h1>
                        <p class="mt-2">{{"Rp. ".number_format($order->payment->amount,2,',','.')}}</p>
                    </div>
                    
                    <!-- Change to Progress Button -->
                    @if(Auth::user()->user_type == 'seller')
                        @if($order->status == 'pending')
                        <div class="flex gap-3 mt-3">
                            <form method="POST" action="{{ route('orders.changeToProgress', $order->id) }}">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">
                                    Change To Progress
                                </button>
                            </form>
                        </div>
                        @endif
                        
                        <!-- Add Milestone Button -->
                        @if($order->status == 'in progress')
                        <div class="mt-3">
                            <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded" onclick="openModal('addMilestoneModal{{$order->id}}')">
                                Add Milestone
                            </button>
                        </div>
                        @endif
                    @endif
                    @if(Auth::user()->user_type == 'buyer')
                        @if($order->status == 'in progress')
                            <div class="mt-3">
                                <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded" onclick="openModal('addMilestoneModal{{$order->id}}')">
                                    See Milestone
                                </button>
                            </div>
                        @endif
                    @endif
                </div>
                <!-- Milestone Modal -->
                <div id="addMilestoneModal{{$order->id}}" class="fixed z-10 inset-0 overflow-y-auto hidden">
                    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                        </div>
                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">​</span>
                        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-4xl sm:w-full">
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <div class="sm:flex sm:items-start">
                                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                @if(Auth::user()->user_type == 'seller')
                Add Milestone
                @else
                See Milestone
                @endif
                                        </h3>
                                        <div class="mt-2 flex">
                                            <!-- Left Content: Form to Fill Milestone -->
                                            @if(Auth::user()->user_type == 'seller')
                                            <div class="w-1/2 pr-4">
                                                <form method="POST" action="{{ route('milestones.store') }}">
                                                    @csrf
                                                    <input type="hidden" name="order_id" value="{{ $order->id }}">
                                                    <div>
                                                        <x-input-label for="title" :value="__('Milestone Title')" />
                                                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" required />
                                                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                                                    </div>

                                                    <div class="mt-4">
                                                        <x-input-label for="description" :value="__('Milestone Description')" />
                                                        <textarea id="description" class="block mt-1 w-full" name="description" required></textarea>
                                                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                                                    </div>

                                                    <div class="flex items-center justify-end mt-4">
                                                        <x-primary-button>
                                                            {{ __('Save') }}
                                                        </x-primary-button>
                                                    </div>
                                                </form>
                                            </div>
                                            @endif
                                            <!-- Right Content: Details of Each Milestone -->
                                            <div class="w-1/2 pl-4">
                                                <h4 class="text-lg font-medium mb-2">Milestone Details</h4>
                                                @foreach($order->milestones as $milestone)
                                                <div class="mb-4 p-4 border rounded">
                                                    <h5 class="font-semibold">{{$milestone->title}}</h5>
                                                    <p class="text-sm">{{$milestone->description}}</p>
                                                    <p class="text-sm text-gray-600">Date: {{$milestone->created_at}}</p>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" onclick="closeModal('addMilestoneModal{{$order->id}}')">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        function openModal(id) {
            document.getElementById(id).classList.remove('hidden');
        }

        function closeModal(id) {
            document.getElementById(id).classList.add('hidden');
        }
    </script>
</x-app-layout>
