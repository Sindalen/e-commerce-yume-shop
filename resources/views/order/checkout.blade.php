<x-layout>
    <x-slot:heading></x-slot:heading>
    <div class="min-h-screen max-w-6xl mx-auto w-full ">
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <div class="header ml-4 mt-6">
            @include('components.goback', ['route' => url('/#shop')])
            <p class="text-2xl max-[426px]:text-xl font-semibold pb-6 pt-4 text-center">Check Out</p>
        </div>
        <div class="controll_left-right justify-center flex max-[760px]:flex-col max-[760px]:pl-12 max-[760px]:pr-8 max-[420px]:pl-4 max-[420px]:pr-0">
            <div class="left min-[760px]:w-1/2 w-full mx-4 pr-4 min-[760px]:border-r-[1px] border-black">
                <div class="method ">
                <form action="{{ route('order.checkout.add') }}" method="POST">
                    @csrf
                        <!-- Hidden inputs to store selected IDs -->
                        <input type="hidden" name="delivery_id" id="selected-delivery-id" value="{{ old('delivery_id') }}">
                        <input type="hidden" name="payment_method_id" id="selected-payment-id" value="{{ old('payment_method_id') }}">
                        
                        <h3 class="text-xl">1. Delivery Method</h3>
                        <div class="controll flex flex-col mt-4">
                            <!-- Delivery Method -->
                            <div id="size-buttons" class="controll flex flex-row space-x-3">
                                @foreach ($deliverys as $delivery)
                                    <button type="button" class="size-btn delivery-btn px-6 py-1.5 border border-gray-200 text-gray-700 font-medium text-sm rounded-md focus:outline-none focus:ring-0  focus:ring-offset-2 transition" data-id="{{ $delivery->id }}">
                                        {{ $delivery->delivery_name }}
                                    </button>
                                @endforeach
                            </div>
                            <!-- Date -->
                            <div class="pt-4 flex gap-3 w-full">
                                {{-- <div class="date w-full">
                                    <label for="" class="text-xs text-gray-500">Delivery Date</label>
                                    <input type="text" id="delivery_date" value="{{ old('delivery_date') }}" name="delivery_date" placeholder="Jan 1st 2025" class="w-full border border-gray-200 p-1.5 rounded text-sm">
                                </div> --}}
                                <div class="city w-full">
                                    <label for="" class="text-[14px] text-gray-500">Phone Number</label>
                                    <input type="text" id="phone_number" value="{{ old('phone_number') }}" name="phone_number" placeholder="077513259" class="w-full border border-gray-200 p-1.5 rounded text-sm ">
                                </div>
                                <div class="address w-full">
                                    <label for="" class="text-[14px] text-gray-500">Address</label>
                                    <input type="text" id="address" value="{{ old('address') }}" name="address" placeholder="509, St 1988, Sen Sok" class="w-full border border-gray-200 p-1.5 rounded text-sm ">
                                </div>
                            </div>
                            
                        </div>
                        <h3 class="mt-5 text-xl">2. Payment Method</h3>
                        <div id="size-buttons" class="controll flex flex-row space-x-3 mt-4">
                            <!-- Delivery Method -->
                            @foreach ($payments as $payment)
                                <button type="button" class="size-btn payment-btn px-6 py-1.5 border border-gray-200 text-gray-700 font-medium text-sm rounded-md " data-id="{{ $payment->id }}">
                                    {{ $payment->payment_method }}
                                </button>
                            @endforeach
                        </div>
                        <div class="pt-6 flex justify-center">
                            <button type="submit" class="py-2 px-6 border rounded-md text-white font-medium bg-[#d6af97] ">Checkout</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="right min-[760px]:w-1/2 w-full">
                <h3 class="mb-4 text-xl">3. Your Order</h3>
                <div class="flex flex-col space-y-2 pr-4 ">
                    @php
                        $subtotal = 0;
                        $shippingCost = 0;
                            
                            if (isset($selectedDelivery) && $selectedDelivery->delivery_name === 'Delivery') {
                            $shippingCost = 0.00;
                            } else {
                                $shippingCost = 0.00;
                            }
                    @endphp

                    @foreach ($cartitems as $cart)
                        @php
                            $itemTotal = $cart->price;
                            $subtotal += $itemTotal;

                            
                        @endphp

                        <div class="flex justify-between pb-4">
                            <a href="" class="flex">
                                <img src="{{ asset('storage/' .$cart->Product->image)}}" alt="{{ $cart->Product->image }}" class="w-20 h-24 object-cover">
                                <h2 class="flex flex-col space-y-2 ml-2 mt-2 text-[14px] text-[#000000] whitespace-nowrap overflow-hidden text-ellipsis"> {{ $cart->Product->description }} 
                                    <span class="mt-2 text-[14px] text-gray-400">{{ $cart->color }} / <span class="text-[14px] text-black">QTY: {{ $cart->quantity }}</span></span>
                                </h2>
                            </a>
                            <h2 class="pr-4 text-center flex items-center text-[14px]"> ${{ $cart->price }}</h2>
                        </div>
                        <hr class="border-b-0.5 border-gray-400">
                        
                    @endforeach
                </div>
                <section class="space-y-2 mt-4">
                    <p class="text-[14px] flex flex-row justify-between pr-8 mt-2">Subtotal 
                        <span id="subtotal-amount" data-subtotal="{{ $subtotal }}">${{ number_format($subtotal, 2) }}</span>
                    </p>

                    <p class="text-[14px] flex flex-row justify-between pr-8 mt-2">Shipping 
                        <span id="shipping-amount">$0.00</span>
                    </p>
                    <p class="text-[14px] flex flex-row justify-between pr-8 mt-2 font-bold">Total 
                        <span id="total-amount">${{ number_format($subtotal + $shippingCost, 2) }}</span>
                    </p>
                </section>
            </div>
            
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // DELIVERY METHOD
            const deliveryButtons = document.querySelectorAll('.delivery-btn');
            const deliveryInput = document.getElementById('selected-delivery-id');
            const shippingAmount = document.getElementById('shipping-amount');
            const totalAmount = document.getElementById('total-amount');
            const subtotalAmount = document.getElementById('subtotal-amount');
            
            deliveryButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    // Remove active class from all buttons
                    deliveryButtons.forEach(b => {
                        b.classList.remove('bg-gray-200', 'border-gray-300');
                        b.classList.add('border-gray-200');
                    });
                    
                    // Add active class to clicked button
                    this.classList.add('bg-gray-200', 'border-gray-300');
                    this.classList.remove('border-gray-200');
                    
                    // Update hidden input
                    deliveryInput.value = this.dataset.id;

                    // Check delivery method text and update shipping
                    const method = this.textContent.trim().toLowerCase();

                    let shippingCost = 0;
                    if (method === 'delivery') {
                        shippingCost = 1.00;
                    }

                    shippingAmount.textContent = `$${shippingCost.toFixed(2)}`;
                    const subtotal = parseFloat(subtotalAmount.dataset.subtotal || 0);
                        totalAmount.textContent = `$${(subtotal + shippingCost).toFixed(2)}`;

                });
            });

            // PAYMENT METHOD
            const paymentButtons = document.querySelectorAll('.payment-btn');
            const paymentInput = document.getElementById('selected-payment-id');
            
            paymentButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    // Remove active class from all buttons
                    paymentButtons.forEach(b => {
                        b.classList.remove('bg-gray-200', 'border-gray-300');
                        b.classList.add('border-gray-200');
                    });
                    
                    // Add active class to clicked button
                    this.classList.add('bg-gray-200', 'border-gray-300');
                    this.classList.remove('border-gray-200');
                    
                    // Update hidden input
                    paymentInput.value = this.dataset.id;
                });
            });
            const checkoutForm = document.querySelector('form[action="{{ route('order.checkout.add') }}"]');

            checkoutForm.addEventListener('submit', function(event) {
                const deliveryId = deliveryInput.value;
                const paymentId = paymentInput.value;
                const deliveryDate = document.getElementById('delivery_date').value.trim();
                const phoneNumber = document.getElementById('phone_number').value.trim();
                const address = document.getElementById('address').value.trim();

                let errors = [];

                if (!deliveryId) {
                    errors.push("Please select a delivery method.");
                }

                if (!paymentId) {
                    errors.push("Please select a payment method.");
                }

                if (!phoneNumber) {
                    errors.push("Please enter your phone number.");
                }

                if (!address) {
                    errors.push("Please enter your address.");
                }

                if (errors.length > 0) {
                    event.preventDefault(); // Stop form submission
                    alert(errors.join('\n')); // Show alert with all errors
                }
            });

            
        });
    </script>

</x-layout>

<style>
    ::placeholder{
        color: black;
    }
    
</style>
