<x-layout >
    <x-slot name="heading"></x-slot>
    
    <div class="flex justify-center mt-8 min-h-screen" style="--font-body-family: Calibre, Helvetica, Arial, sans-serif;">
        <div class="justify-between max-w-6xl w-full bg-white rounded-lg p-4">
            <div class="">
                @include('.components.goback')
            </div>
            <div class="md:flex pt-12">
                <div class="right w-1/2 justify-center flex max-md:w-full ">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->description }}" class=" w-[25rem] h-[30rem] object-cover rounded-sm">
                </div>
                <section class="w-full md:w-1/2 px-4 text-left mt-4">
                    <h1 class="text-[#311c14]  font-bold">{{ $product->name }}</h1>
                    <p class="text-[#311c14] text-xl">
                        {{ $product->description }}
                    </p>
                    <div class="product-model-wrapper flex justify-between items-center pt-2">
                        <div class="review-rating-star-wrapper mb-1">
                            <div class="review-rating-star">
                                <abbr class="star-wrapper">
                                    <span class="active-star text-lg" style="width: 100.000000%;"></span>
                                </abbr>
                            </div>
                        </div>
                        @foreach($variations->take(1) as $variation)
                            <span class="opacity-50 text-xs">{{ $variation->code }}</span>
                        @endforeach
                    </div>
                    <hr class="border-t-[1.5px] border-gray-200 my-2">
                    
                    <div class="text-black flex items-center my-3 space-x-2">
                        <!-- Price If Have Discount -->
                        <div class="">
                            @if($product->discount)
                                <div class="flex items-center text-center space-x-2"> 
                                    <span class="ml-1 text-xl" id="unit-price">${{ number_format($product->price - ($product->price * $product->Discount->discount_percent / 100), 2) }}</span>
                                    <h5 class="text-gray-400 line-through text-xl">${{ $product->price }}</h5>
                                    <!-- Precent of Discount -->
                                    <span class="text-xl text-red-600">({{ $product->Discount->discount_name }} OFF)</span>
                                </div>
                            @else 
                                <h5 id="unit-price" class="text-xl">${{ number_format($product->price, 2) }}</h5>
                            @endif
                        </div>
                    </div>
                    <form action="{{ route('order.cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="color" id="selected-color">
                        <input type="hidden" name="size" id="selected-size">
                        <input type="hidden" name="quantity" id="selected-quantity" value="1">
                        
                        <!-- Keep your existing color buttons -->
                        <div class="space-y-1 mt-4">
                            <h1 class="flex flex-col text-xs">Color:</h1>
                            <div id="color-buttons" class="flex text-gray-600">
                                @foreach($variations->whereNotNull('color') as $variation)
                                <button type="button" class="color-btn mr-1 px-3 py-2 text-[.8rem] border rounded-md" data-color="{{ $variation->color }}">
                                    {{ $variation->color }}
                                </button>
                                @endforeach
                            </div>
                        </div>

                        <!-- Same for size -->
                        <div class="space-y-1 mt-4">
                            <h5 class="text-xs">Size:</h5>
                            <div id="size-buttons" class="flex text-gray-600 mt-4">
                                @foreach($variations->whereNotNull('size') as $variation)
                                <button type="button" class="size-btn mr-1 px-[14px] py-2 text-[.8rem] border rounded-md" data-size="{{ $variation->size }}">
                                    {{ $variation->size }}
                                </button>
                                @endforeach
                            </div>
                        </div>

                        <!-- Include quantity component -->
                        <div class="space-y-1 mt-4">
                            <h5 class="text-xs mb-2">Qty:</h5>
                            <section class="flex items-center justify-between mt-4">
                                <div class="flex items-center space-x-4 col-span-2 max-w-80">
                                    <div class="border text-gray-500 rounded-md bg-[#fdf7f3]">
                                        <button id="decrease" class="decrease px-2 pb-[1px] py-0 border-r">−</button>
                                        <input id="counter" min="1" value="1" class="counter pb-[3px] w-6 text-[.8rem] text-center outline-none border-0 bg-transparent">
                                        <button id="increase" class="increase px-2 pb-[1px] py-0 border-l">+</button>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <h5 class="space-y-1 mt-4 text-xs mb-2 justify-between items-center flex">Total: <span class="text-xl max-md:text-[1rem]" id="total-price">${{ $product->discount ? number_format($product->price - ($product->price * $product->Discount->discount_percent / 100), 2) : number_format($product->price, 2) }}</span></h5>

                        <!-- Replace your old Add to Cart button with this -->
                        <div class="pt-4 flex justify-center">
                            <button type="submit" id="add-to-cart" class="w-[13rem] h-[2.3rem] border rounded-md font-medium bg-[#f9ebe7] hover:bg-[#fdf7f3]">
                                Add to Cart
                            </button>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>

    <style>
        @media screen and (max-width: 425px) {
            .decrease {
                padding-inline: 4px;
            }

            .counter {
                width: 12px;
            }

            .increase {
                padding-inline: 4px;
            }
        }
        .review-rating-star-wrapper {
            position: relative;
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: start;
            justify-content: flex-start;
            margin-top: 0px;
            font-size: 1.5rem;
        }
        .review-rating-star {
            -webkit-box-align: center;
            align-items: center;
            flex-direction: row;
            display: inline-flex;
            -webkit-box-pack: start;
            justify-content: flex-start;
        }
        .star-wrapper {
            height: 1.4rem;
            background-size: 4.5rem 1.4rem;
            background-repeat: no-repeat;
            position: relative;
            display: inline-block;
            width: 8rem;
            vertical-align: middle;
            background-image: url(../images/star-shape.svg);
        }
        .active-star {
            height: 1.4rem;
            background-size: 4.5rem 1.4rem;
            background-repeat: no-repeat;
            position: absolute;
            top: 0px;
            left: 0px;
            color: var(--color-primary);
            background-image: url(../images/star-fill.svg);
        }
        .my-3wmp {
            max-width: 50em;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 1.25rem;
            padding: 0rem;
        }

        .my-g {
            box-sizing: border-box;
            grid-template-columns: repeat(2, minmax(0px, 1fr));
            gap: 1rem;
            padding-inline: 1rem;
        }

        @media screen and (max-width: 768px) {
            .my-g {
                grid-template-columns: repeat(1, minmax(0px, 1fr));
                gap: 1rem;
                padding-inline: 1rem;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const decreaseBtn = document.getElementById('decrease');
            const increaseBtn = document.getElementById('increase');
            const counterInput = document.getElementById('counter');
            const totalPriceSpan = document.getElementById('total-price');
            const unitPriceSpan = document.getElementById('unit-price');

            // Extract the numeric value from the unit price (remove "$")
            const unitPrice = parseFloat(unitPriceSpan.textContent.replace('$', ''));

            // Function to update total price
            function updateTotalPrice() {
                const quantity = parseInt(counterInput.value);
                const totalPrice = (unitPrice * quantity).toFixed(2);
                totalPriceSpan.textContent = `$${totalPrice}`;
            }

            // Decrease quantity
            decreaseBtn.addEventListener('click', function(e) {
                e.preventDefault();
                let currentValue = parseInt(counterInput.value);
                if (currentValue > 1) {
                    counterInput.value = currentValue - 1;
                    updateTotalPrice();
                }
            });

            // Increase quantity
            increaseBtn.addEventListener('click', function(e) {
                e.preventDefault();
                let currentValue = parseInt(counterInput.value);
                counterInput.value = currentValue + 1;
                updateTotalPrice();
            });

            // Handle manual input changes
            counterInput.addEventListener('change', function() {
                if (this.value < 1) this.value = 1;
                updateTotalPrice();
            });
            
            // Color selection
            const colorButtons = document.querySelectorAll('.color-btn');
            const colorInput = document.getElementById('selected-color');
            colorButtons.forEach(btn => {
                btn.addEventListener('click', () => {
                    // Remove all active styling from color buttons
                    colorButtons.forEach(b => {
                        b.classList.remove('bg-gray-200', 'border-gray-300');
                        b.classList.add('border-gray-200'); // Add default border if needed
                    });
                    
                    // Add active styling to clicked button
                    btn.classList.add('bg-gray-200', 'border-gray-300');
                    btn.classList.remove('border-gray-200');
                    
                    // Update hidden input value
                    colorInput.value = btn.dataset.color;
                });
            });

            // Size selection
            const sizeButtons = document.querySelectorAll('.size-btn');
            const sizeInput = document.getElementById('selected-size');
            sizeButtons.forEach(btn => {
                btn.addEventListener('click', () => {
                    // Remove all active styling from size buttons
                    sizeButtons.forEach(b => {
                        b.classList.remove('bg-gray-200', 'border-gray-300');
                        b.classList.add('border-gray-200'); // Add default border if needed
                    });
                    
                    // Add active styling to clicked button
                    btn.classList.add('bg-gray-200', 'border-gray-300');
                    btn.classList.remove('border-gray-200');
                    
                    // Update hidden input value
                    sizeInput.value = btn.dataset.size;
                });
            });

            // Quantity sync
            const quantityInput = document.getElementById('selected-quantity');
            const counter = document.getElementById('counter');
            counter.addEventListener('change', () => {
                quantityInput.value = counter.value;
            });

            document.getElementById('increase').addEventListener('click', () => {
                quantityInput.value = counter.value;
            });

            document.getElementById('decrease').addEventListener('click', () => {
                quantityInput.value = counter.value;
            });

            const addToCartBtn = document.getElementById('add-to-cart');

                addToCartBtn.addEventListener('click', function (e) {
                    const selectedColor = colorInput.value;
                    const selectedSize = sizeInput.value;

                    let msg = '';
                    if (!selectedColor && !selectedSize) {
                        msg = "Please select a color and size.";
                    } else if (!selectedColor) {
                        msg = "Please select a color.";
                    } else if (!selectedSize) {
                        msg = "Please select a size.";
                    }

                    if (msg) {
                        e.preventDefault(); // Stop form submission
                        alert(msg);         // Or replace with modal/snackbar
                    }
                });


        });
    </script>
</x-layout>
