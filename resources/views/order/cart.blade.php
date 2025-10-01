<x-layout>
    <x-slot name="heading"></x-slot>

    <div class="flex justify-center mt-4 min-h-screen">
        <div class="flex flex-col max-w-6xl w-full bg-white rounded-lg py-2 px-20 max-[768px]:px-4">
            @include('/components/goback')
            <div class="right w-full mx-auto">
                <h4 class="text-2xl text-center font-semibold my-6">Shopping Cart</h4>
                <!-- Add this somewhere in your view -->
                <tbody class="">
                    @foreach ($cartitems as $cartitem)
                    @php
                    $itemPrice = $cartitem->Product->discount
                    ? $cartitem->Product->price - ($cartitem->Product->price * $cartitem->Product->Discount->discount_percent / 100)
                    : $cartitem->Product->price;
                    $formattedPrice = number_format($itemPrice, 2);
                    @endphp
                    <!-- Laptop -->
                    <div class="flex pb-2 relative border-b mt-2 cart-item" data-item-id="{{ $cartitem->id }}">
                        <img src="{{ asset('storage/' . $cartitem->Product->image) }}" alt="Product" class="w-20 h-28 min-[425px]:w-28 min-[425px]:h-36 object-cover">
                        <div class="ml-4 flex-1 text-left space-y-3 max-[500px]:space-y-2">
                            <div class="flex justify-between items-start"> <!-- Changed to items-start -->
                                <p class="text-[16px] flex-1 pr-2"> <!-- Added flex-1 and padding -->
                                    {{ $cartitem->Product->description }}
                                </p>
                                <x-heroicon-o-trash
                                    class="delete-item text-gray-500 w-4 h-4 shrink-0 mt-1 cursor-pointer"
                                    data-item-id="{{ $cartitem->id }}" />
                            </div>
                            <span class="text-gray-600 flex text-[12px] ">{{$cartitem->color}} / {{$cartitem->size}}</span>
                            <div class="flex justify-between">
                                <section class="flex items-center justify-between">
                                    <div class="flex items-center space-x-4 col-span-2 max-w-80">
                                        <div class="border text-gray-500 rounded-md bg-[#fdf7f3]">
                                            <button class="decrease px-2 pb-[1px] py-0 border-r">−</button>
                                            <input min="1" value="{{$cartitem->quantity}}" class="quantity-input pb-[3px] w-6 text-[.8rem] text-center outline-none border-0 bg-transparent" data-price="{{ $itemPrice }}">
                                            <button class="increase px-2 pb-[1px] py-0 border-l">+</button>
                                        </div>
                                    </div>
                                </section>
                                <div class="text-md items-center mt-2 sm:mt-0">$<span class="item-total">{{ $formattedPrice }}</span></div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </div>
            <!-- Footer -->
            <section class="mt-2 mx-auto max-lg:px-4 flex flex-row items-center justify-between fixed bottom-0 left-0 right-0 z-50 bg-white py-2 border-gray-200">
                <div class="mx-10">
                    <div class="select-control">
                        {{-- <label class="pointer hidden sm:flex text-gray-600 text-center items-center justify-center flex-row">
                            <input class="checkbox w-5 h-4" type="checkbox">
                            <span class="text-gray-600 ml-2"></span>
                        </label> --}}
                    </div>
                </div>

                <div class="flex mx-8 space-x-12 items-center">
                    <div class="text-gray-700 font-semibold max-[425px]:textp5">
                        <span class="text-orange-400">Total:</span> $<span class="grand-total">0.00</span>
                    </div>
                    <!-- Checkout -->
                    <div class="flex justify-center">
                        <a href="/checkout">
                            <button class="py-1 px-2 border-2 bg-[#f9ebe7] rounded-md hover:bg-[#fdf7f3] text-gray-700 max-[425px]:textp5" type="button">
                                Checkout
                            </button>
                        </a>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            
            // Initialize cart totals
            updateGrandTotal();

            // Add event listeners to all quantity controls
            document.querySelectorAll('.cart-item').forEach(item => {
                const decreaseBtn = item.querySelector('.decrease');
                const increaseBtn = item.querySelector('.increase');
                const quantityInput = item.querySelector('.quantity-input');
                const itemTotal = item.querySelector('.item-total');
                const price = parseFloat(quantityInput.dataset.price);
                const itemId = item.dataset.itemId;

                // Set initial item total
                updateItemTotal(quantityInput, itemTotal, price);

                // Decrease quantity
                decreaseBtn.addEventListener('click', async function(e) {
                    e.preventDefault();
                    let currentValue = parseInt(quantityInput.value);
                    if (currentValue > 1) {
                        quantityInput.value = currentValue - 1;
                        await updateCartItem(itemId, quantityInput.value);
                        updateItemTotal(quantityInput, itemTotal, price);
                        updateGrandTotal();
                    }
                });

                // Increase quantity
                increaseBtn.addEventListener('click', async function(e) {
                    e.preventDefault();
                    let currentValue = parseInt(quantityInput.value);
                    quantityInput.value = currentValue + 1;
                    await updateCartItem(itemId, quantityInput.value);
                    updateItemTotal(quantityInput, itemTotal, price);
                    updateGrandTotal();
                });

                // Handle manual input changes
                quantityInput.addEventListener('change', async function() {
                    if (this.value < 1) this.value = 1;
                    await updateCartItem(itemId, quantityInput.value);
                    updateItemTotal(quantityInput, itemTotal, price);
                    updateGrandTotal();
                });
            });

            // Function to update individual item total
            function updateItemTotal(inputElement, totalElement, unitPrice) {
                const quantity = parseInt(inputElement.value);
                const totalPrice = (unitPrice * quantity).toFixed(2);
                totalElement.textContent = totalPrice;
            }

            // Function to update grand total
            function updateGrandTotal() {
                let grandTotal = 0;
                document.querySelectorAll('.cart-item').forEach(item => {
                    const quantity = parseInt(item.querySelector('.quantity-input').value);
                    const price = parseFloat(item.querySelector('.quantity-input').dataset.price);
                    grandTotal += quantity * price;
                });
                document.querySelector('.grand-total').textContent = grandTotal.toFixed(2);
            }

            // Function to update cart item in database
            async function updateCartItem(itemId, quantity) {
                try {
                    const response = await fetch(`/cart/${itemId}`, {
                        method: 'PUT',
                        headers: {
                            'X-CSRF-TOKEN': token,
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                        },
                        body: JSON.stringify({
                            quantity: quantity
                        })
                    });

                    if (!response.ok) {
                        throw new Error('Failed to update cart item');
                    }
                } catch (error) {
                    console.error('Error updating cart item:', error);
                    // You might want to show an error message to the user here
                }
            }

            // Delete item functionality
            document.querySelectorAll('.delete-item').forEach(btn => {
                btn.addEventListener('click', function() {
                    const itemId = this.dataset.itemId;
                    const cartItemElement = this.closest('.cart-item');

                    if (confirm('Are you sure you want to remove this item?')) {
                        fetch(`/cart/${itemId}`, {
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': token,
                                    'Accept': 'application/json',
                                }
                            })
                            .then(response => {
                                if (response.ok) {
                                    cartItemElement.remove();
                                    updateGrandTotal();
                                } else {
                                    alert('Failed to delete the item.');
                                }
                        });
                    }
                });
            });
        });
    </script>

</x-layout>