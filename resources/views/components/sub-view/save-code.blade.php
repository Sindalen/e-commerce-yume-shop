<x-layout>
    <x-slot:heading></x-slot:heading>

    <div class="flex justify-center mt-10 px-4">
        <div class="w-full max-w-6xl flex flex-col md:flex-row gap-6">
            <!-- Sidebar -->
            @include('.components.profile._option-userprofile')

            <!-- History Order Section -->
            <div class="w-full md:w-3/4">
                <h1 class="text-2xl font-bold">History Order</h1>
                @if($orders->isEmpty())
                    <div class="mt-6 bg-white p-8 rounded-lg shadow text-center">
                        <p class="text-gray-600">You haven't placed any orders yet.</p>
                        <a href="{{ route('products.index') }}" class="mt-4 inline-block border border-[#d7bcab] bg-[#f9ebe7] px-6 py-2 rounded-md text-[#895c4f]">
                            Start Shopping
                        </a>
                    </div>
                <div class="mt-6 space-y-4">
                    <!-- Order Item -->
                    @foreach ($items as $item)
                        <div class="bg-white p-4 rounded-lg shadow flex gap-4 ">
                            <!-- Product Images -->
                            <div class="flex -space-x-4">
                                <img src="{{ asset('storage/' . $item->Product->image) }}" alt="Product" class="w-14 h-auto min-[425px]:w-20 min-[425px]:h-auto object-cover" >
                            </div>

                            <!-- Order Details -->
                            <div class="flex-1 space-y-2 w-8">
                                <p class="text-sm">{{ $item->Product->description }}</p>
                                    <p class="text-gray-600 text-sm">Size: {{ $item->size }}</p>
                                <p class="text-gray-600 text-sm">Total Item: {{ $item->quantity }}</p>
                            </div>

                            <!-- Purchase Date & Price -->
                            <div class="text-right">
                                <p class="text-gray-500 text-sm">Purchased on</p>
                                <p class="text-gray-700 ">{{ $order->created_at->format('M d, Y') }}</p>
                            </div>

                            <div class="flex space-x-4 pl-2" style="align-items: self-end;">
                                <div class="text-right" style="align-items: self-end;">
                                    <p class="text-red-500 mb-1">Price: {{ $item->price }}$</p>
                                </div>

                                <!-- Order Again Button -->
                                 <a href="{{ route('product_detail', $item->Product->id) }}">
                                    <button class="border border-[#d7bcab] bg-[#f9ebe7] px-4 py-1 rounded-md text-[#895c4f]">
                                        Order Again
                                    </button>
                                 </a>
                                
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-layout>
