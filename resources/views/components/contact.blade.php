<footer id="contact" class="footer mb-12 bg-[#fdf7f3] mt-6 pt-[4px]">
    <div class="info hidden max-md:flex flex-col justify-center text-left items-center">
        <a href="/">
            <img class="size-[4rem] max-md:size-[3rem] " src=" {{ URL('images/logo1.jpg') }} " alt="Let's Shop">
        </a>
        <p class="max-w-md mx-8">We're business shop that have a lot of closet fashion, furniture good quality with reasonable price.</p>
        <div class="payment flex space-x-2 mt-3 items-center">
            <p>Payment: </p>
            <div class="option flex space-x-2">
                <img class="w-6 h-4" src=" {{ URL('images/khqr.png') }} " alt="Payment">
                <img class="w-6 h-4" src=" {{ URL('images/payment/payment-aba.png') }} " alt="Payment">
            </div>
        </div>
    </div>
    <div class="container md:flex justify-between mt-2 text-[#51362e] max-w-6xl mx-auto px-[1rem] max-[768px]:flex ">
        <div class="info hidden md:flex-col md:flex w-[15rem] justify-center text-left items-center ">
            <a href="/">
                <img class="size-[4rem] max-md:size-[3rem] " src=" {{ URL('images/logo1.jpg') }} " alt="Let's Shop">
            </a>
            <p class="">We're business shop that have a lot of closet fashion, furniture good quality with reasonable price.</p>
            <div class="payment flex space-x-2 mt-6 items-center">
                <p>Payment: </p>
                <div class="option flex space-x-2">
                    <img class="w-6 h-4 max-md:size-[1.5rem]" src=" {{ URL('images/khqr.png') }} " alt="Payment">
                    <img class="w-6 h-4 max-md:size-[1.5rem]" src=" {{ URL('images/payment/payment-aba.png') }} " alt="Payment">
                </div>
            </div>
        </div>
        <div class="quick max-[460px]:hidden ">
            <h3 class="text-lg font-bold pb-2">Quick Links</h3>
            <ul class="flex flex-col text-md space-y-1">
                <a href="/" class="">Home</a>
                <a href="/shop">Shop Now</a>
                <a href="/promotion">Promotion</a>
                <a href="/#about">About</a>
            </ul>
        </div>
        <div class="us ">
            <h3 class="text-lg font-bold pb-2">Follow Us</h3>
            <div class="social flex flex-col text-md space-y-1">
                <a href="https://www.facebook.com/share/15u5gnPcsu/" class="flex text-center items-center">
                    <div class="border border-[#51362e] p-[2px]">
                        <img class="w-3 h-3  " src=" {{ URL('images/socail/facebook.png') }} " alt="Let's Shop">
                    </div>    
                <p class="pl-2">Facebook</p>
                </a>
                <a href="https://www.instagram.com/dalen.s_7?igsh=MXUwYjE2OGUzM3pk" class="text-center items-center flex">
                <div class="border border-[#51362e] p-[2px]">
                        <img class="w-3 h-3  " src=" {{ URL('images/socail/instagram.png') }} " alt="Let's Shop">
                    </div>  
                <p class="pl-2">Instargram</p>
                </a>
            </div>
        </div>
        <div class="contact min-[460px]:w-[13rem]">
            <h3 class="text-lg font-bold max-[460px]:hidden pb-2">Contact Us</h3>
            <div class="text-md space-y-1">
                <!-- <p class="max-[460px]:hidden">Reviews & Feedback </p> -->
                <i class="fa-brands fa-telegram"></i>
                <a href="https://t.me/SinDalen" class="text-center items-center flex">
                    <div class="border border-[#51362e] p-[2px]">
                        <img class="w-3 h-3  " src=" {{ URL('images/socail/telegram.png') }} " alt="Let's Shop">
                    </div>  
                    <p class="pl-2"> t.me/SinDalen</p>
                </a>
                <a href="" class="text-center items-center flex">
                    <div class="text-center items-center flex border border-[#51362e] p-[2px]">
                        <img class="w-3 h-3" src=" {{ URL('images/socail/phone_call.png') }} " alt="Let's Shop">
                    </div>
                    <p class="ml-2">077513258</p>
                </a>
            </div>
        </div>
    </div>
    
    <hr class="border-t-2 border-[#51362e] mt-5 max-w-6xl mx-auto max-lg:px-0 px-2">
    <div class="copyright items-center mt-5 pb-5">
        <p class="text-center">Copyright © 2025 Let's Shop. All rights reserved.</p>
    </div>
</footer>

<style>
    @media screen and (max-width: 460px) {
            .container {
                display: flex;
                flex-direction: column;
                justify-content: center;
                text-align: center;
                align-items: center;
            }

        }
</style>