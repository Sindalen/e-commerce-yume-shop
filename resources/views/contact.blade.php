<x-layout>
    <x-slot:heading></x-slot:heading>
    <div class="contact pt- select-none">
        <div class="text-center text-[#51362e] pt-12 text-3xl font-semibold pb-4">Contact Us</div>
        <div class="flex justify-around">
            <div class="social ">
                <div class="pt-10 items-center pb-10">
                    <a href="/">
                        <img class="size-[8rem]" src=" {{ URL('images/logo.png') }} " alt="Your Company">
                    </a>
                    <p class="">Find Us in Social:</p>
                    <div class="flex space-x-2 pl-[1.2rem]">
                        <x-bi-facebook class="w-5 h-5 " />
                        <x-bi-messenger class="w-5 h-5 " />
                        <x-bi-telegram class="w-5 h-5 " />
                    </div>
                </div>
            </div>
            <div class="payment text-center pt-10 ">
                <h6 class="font-bold text-[1.2rem] pb-2">Payment Method</h6>
                <div class="flex space-x-4">
                    <img src="{{url('images/payment-visa.png')}}" alt="product" class="w-full h-[4rem] object-cover rounded-lg">
                    <img src="{{url('images/payment-acleda.png')}}" alt="product" class="w-full h-[4rem] object-cover rounded-lg">
                    <img src="{{url('images/payment-aba.png')}}" alt="product" class="w-full h-[4rem] object-cover rounded-lg">
                </div>
            </div>
            <div class="info ">
                <div class="pt-10">
                    <div>
                        <div class="flex space-x-2 items-center">
                            <x-heroicon-s-map-pin class="w-5 h-5 text-[#fe4c50]" />
                            <h6 class="font-bold text-[1.1rem]">Address</h6>
                        </div>
                        <p>1988 Phnom Penh Tremy, Sen Sok, Phnom Penh City.</p>
                    </div>
                    <div>
                        <div class="flex space-x-2 items-center">
                            <x-heroicon-s-phone class="w-5 h-5 text-[#fe4c50]" />
                            <h6 class="font-bold text-[1.1rem]">Phone</h6>
                        </div>
                        <p>+855 16489811 | 77513258</p>
                    </div>
                    <div>
                        <div class="flex space-x-2 items-center">
                            <x-heroicon-s-envelope-open class="w-5 h-5 text-[#fe4c50]" />
                            <h6 class="font-bold text-[1.1rem]">Email</h6>
                        </div>
                        <p>tinhtomninh@email.com</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-layout>