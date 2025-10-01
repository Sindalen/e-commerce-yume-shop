<div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
    <a href="{{ route('products.show', $product->id) }}">
        <div class="relative pb-[100%] overflow-hidden">
            <img src="{{ asset('storage/' . $product->image) }}" 
                 alt="{{ $product->name }}"
                 class="absolute h-full w-full object-cover hover:scale-105 transition-transform">
        </div>
        
        <div class="p-4">
            <h3 class="font-semibold text-lg mb-1 truncate">{{ $product->name }}</h3>
            <div class="flex justify-between items-center">
                <span class="text-[#895c4f] font-bold">${{ number_format($product->price, 2) }}</span>
                @if($product->discount)
                    <span class="text-xs text-gray-500 line-through">${{ number_format($product->original_price, 2) }}</span>
                @endif
            </div>
            
            @if($product->discount)
                <div class="mt-2">
                    <span class="bg-red-100 text-red-800 text-xs px-2 py-1 rounded">
                        {{ $product->discount->percentage }}% OFF
                    </span>
                </div>
            @endif
        </div>
    </a>
</div>