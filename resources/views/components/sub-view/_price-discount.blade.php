<div>
    @if($product->discount)
        <div class="flex items-center justify-between text-center space-x-2"> 
            <span class= "ml-1">${{ number_format($product->price - ($product->price * $product->Discount->discount_percent / 100), 2) }}</span>
            <h5 class="text-gray-400 line-through">${{ $product->price }}</h5>
        </div>
        @else 
        <h5>${{ $product->price }}</h5>
    @endif
</div>