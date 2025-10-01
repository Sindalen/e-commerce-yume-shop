<x-layout class="">
    <x-slot:heading></x-slot:heading>

    <div class="min-h-screen flex justify-center md:pt-10 md:px-4 bg-[#fffcfa] pb-12">
        <div class="w-full max-w-6xl flex flex-col lg:flex-row gap-6 min-h-screen">
            <!-- Sidebar -->
            @include('components.profile._option-userprofile')

            <!-- History Order Section -->
            <div class="w-full lg:w-3/4">
                <h1 class="text-2xl font-bold max-md:text-center">Order History</h1>

                @if($orders->isEmpty())
                    <div class="mt-6 bg-white p-6 sm:p-8 rounded-lg shadow text-center">
                        <p class="text-gray-600">You haven't placed any orders yet.</p>
                        <a href="/#shop" class="mt-4 inline-block border border-[#d7bcab] bg-[#f9ebe7] px-4 sm:px-6 py-2 rounded-md text-[#895c4f]">
                            Start Shopping
                        </a>
                    </div>
                @else
                    <div class="mt-6 space-y-4">
                        @foreach ($orders as $order)
                            <div class="space-y-4">
                                @foreach ($order->items as $item)
                                    <div class="bg-white p-4 rounded shadow flex flex-col sm:flex-row gap-4 justify-between">
                                        <!-- Product Image -->
                                        <div class="flex md:justify-center justify-between items-center">
                                            <img src="{{ asset('storage/' . $item->Product->image) }}"
                                                 alt="Product"
                                                 class="w-24 h-24 object-cover">
                                            <div class="flex-1 space-y-2 pl-4">
                                                <p class="text-sm sm:text-base">{{ $item->Product->description }}</p>
                                                <p class="text-gray-500 text-sm">Qty: {{ $item->quantity }} / {{ $item->color }}</p>
                                                <p class="text-red-500 text-sm">Price: {{ $item->price }}$</p>
                                            </div>
                                        </div>

                                        <!-- Date & Price -->
                                        <div class="sm:text-center max-md:hidden">
                                            <p class="text-gray-500 text-xs sm:text-sm">Purchased on</p>
                                            <p class="text-gray-700 text-sm sm:text-md">{{ $order->created_at->format('d M Y') }}</p>
                                        </div>

                                        <div class="sm:text-center max-md:hidden">
                                            <p class="text-gray-500 text-xs sm:text-sm">Payment Status</p>
                                            <p class="text-gray-700 text-sm sm:text-md">{{ $order->status }}</p>
                                        </div>

                                        <div class="flex md:hidden justify-between items-center space-x-4">
                                            <div class="sm:text-center">
                                                <p class="text-gray-500 text-xs sm:text-sm">Purchased on</p>
                                                <p class="text-gray-700 text-sm sm:text-md">{{ $order->created_at->format('d M Y') }}</p>
                                            </div>

                                            <div class="sm:text-center ">
                                                <p class="text-gray-500 text-xs sm:text-sm">Payment Status</p>
                                                <p class="text-gray-700 text-sm sm:text-md">{{ $order->status }}</p>
                                            </div>
                                        </div>

                                        <!-- Price and Action -->
                                        <div class="text-center flex flex-row items-end justify-end gap-2">
                                            <a href="{{ route('product_detail', $item->Product->id) }}">
                                                <button class="border border-[#d7bcab] bg-[#f9ebe7] max-md:text-[14px] px-3 py-[0.5] md:px-4 md:py-1 rounded-md text-[#895c4f]">
                                                    Order Again
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-layout>
