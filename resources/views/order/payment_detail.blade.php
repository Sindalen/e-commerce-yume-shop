<div class="left min-[760px]:w-1/2 w-full mx-4 pr-4 min-[760px]:border-r-[1px] border-black">
    <div class="method ">
        <form action="{{ route('order.checkout.add') }}" method="POST">
            @csrf

            <h3>1. Delivery Method</h3>
            <div class="controll flex flex-col">
                <!-- Delivery Method -->
                <div class="controll flex flex-row space-x-3">
                    @foreach ($deliverys as $delivery)
                        <div id="color-buttons" class="delivery mt-2 ">
                            <button type="button" class="color-btn px-6 py-1.5 bg-color border border-color text-gray-700 font-medium text-sm rounded-md focus:outline-none focus:ring-0  focus:ring-offset-2 transition"
                            data-color="{{ $delivery->delivery_name}}">
                                {{$delivery->delivery_name}}
                            </button>
                        </div>
                    @endforeach
                </div>
                <!-- Date -->
                <div class="pt-4 flex gap-3 w-full">
                    <div class="date w-full">
                        <label for="" class="text-xs text-gray-500">Delivery Date</label>
                        <input type="text" placeholder="Jan 1st 2025" class="w-full border p-1.5 rounded text-sm ">
                    </div>
                    <div class="city w-full">
                        <label for="" class="text-xs text-gray-500">Phone Number</label>
                        <input type="text" placeholder="077513259" class="w-full border p-1.5 rounded text-sm ">
                    </div>
                </div>
                <div class="address w-full mt-2">
                    <label for="" class="text-xs text-gray-500">Address</label>
                    <input type="text" placeholder="509, St 1988, Sen Sok" class="w-full border p-1.5 rounded text-sm ">
                </div>
            </div>
            <h3 class="mt-4">2. Payment Method</h3>
            <div class="controll flex flex-row space-x-3">
                <!-- Delivery Method -->
                @foreach ($payments as $payment)
                    <div id="color-buttons" class="delivery mt-2 ">
                        <button type="button" class="px-6 py-1.5 bg-color border border-color text-gray-700 font-medium text-sm rounded-md focus:outline-none focus:ring-0  focus:ring-offset-2 transition"
                        data-color="{{ $delivery->delivery_name}}">
                            {{$payment->payment_method}}
                        </button>
                    </div>
                @endforeach
            </div>
    
        </form>
    </div>
</div>