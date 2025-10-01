<x-layout class="mx-auto max-w-full select-none">
    <x-slot:heading></x-slot:heading>
    <div class="hidden md:block md:flex items-center bg-[#fffcfa] h-[33rem] justify-between mx-auto max-w-full">
        <div class="ml-[1rem] xl:ml-[6rem] max-sm:ml-0 space-y-4 text-left items-baseline flex flex-col justify-center ">
            <div class="uppercase font-bold text-[#311c14] text-5xl max-md:text-[1.5rem]">Step into Fashion</div>
            <div class="text-2xl text-[#311c14] max-md:text-sm">Clothing, Shoes, and Accessories at Your Fingertips!</div>
            <a href="/shop">
                <button class="max-md:text-[.7rem] uppercase p-2 border bg-[#f9ebe7] rounded-md text-xl font-medium hover:bg-[#fdf7f3] hover:text-black " type="button">shop now</button>
            </a>
        </div>
        <div class="">
            <img class="mr-[1rem] lg:mr-[6rem] max-sm:mr-0 max-lg:pr-[1rem] size:[5rem] max-2xl:size-[28rem] max-xl:size-[28rem] max-lg:size-[23rem] max-md:size-[20rem] max-sm:size-[15rem]" src="{{ URL('images/cover.png') }}" alt="">
            <div class="text-[#311c14] text-[.8rem] text-center mt-2">Because You Deserve the Best! </div>
        </div>
    </div>
    <!-- Mobile -->
    <div class="md:hidden max-md:flex-col justify-center space-y-4 text-center flex items-center bg-[#fffcfa] h-auto mx-auto max-w-full pb-[2rem]">
        <div class="">
            <img class="size:[25rem] max-md:size-[20rem] max-sm:size-[15rem]" src="{{ URL('images/cover.png') }}" alt="">
        </div>
        <div class="max-sm:ml-0 space-y-2 text-center items-center flex-col justify-center ">
            <div class="uppercase font-bold text-[#311c14] text-4xl max-md:text-[1.5rem]">Step into Fashion</div>
            <div class="text-xl text-[#311c14] max-md:text-sm">Clothing, Shoes, and Accessories at Your Fingertips!</div>
            <a href="/shop">
                <button class="max-md:text-[.7rem] mt-4 uppercase p-2 border bg-[#fdf7f3] rounded-md text font-medium hover:bg-[#f9ebe7] hover:text-black " type="button">shop now</button>
            </a>
        </div>
    </div>
    <div id="shop" class="mx-2 max-w-full ">
        <div>
            <div class="text-center text-[#51362e] max-[426px]:text-xl pt-8 text-3xl font-semibold pb-4">New Arrivals</div>
            <div class="flex justify-center items-center space-y-2">
                <div class="md:flex text-[#895c4f] border-[#d6af97] max-md:space-y-1 btext-center flow">
                    <button class="px-5 py-3 max-md:px-3 max-md:py-2 max-sm:py-1 max-sm:px-2 max-sm:text-xs border border-[#d6af97] rounded-lg hover:bg-[#f9ebe7] text-sm font-bold">ALL</button>
                    <button class="px-2 py-3 max-md:px-3 max-md:py-2 max-sm:py-1 max-sm:px-2 max-sm:text-xs border border-[#d6af97] rounded-lg hover:bg-[#f9ebe7] text-sm font-bold ">WOMEN’S FASHION</button>
                    <button class="px-4 py-3 max-md:px-3 max-md:py-2 max-sm:py-1 max-sm:px-2 max-sm:text-xs border border-[#d6af97] rounded-lg hover:bg-[#f9ebe7] text-sm font-bold">MEN’S FASHION</button>
                    <button class="px-4 py-3 max-md:px-3 max-md:py-2 max-sm:py-1 max-sm:px-2 max-sm:text-xs border border-[#d6af97] rounded-lg hover:bg-[#f9ebe7] text-sm font-bold">ACCESSORIES</button>
                    <button class="px-5 py-3 max-md:px-3 max-md:py-2 max-sm:py-1 max-sm:px-2 max-sm:text-xs border border-[#d6af97] rounded-lg hover:bg-[#f9ebe7] text-sm font-bold">SNEAKERS</button>
                    <button class="px-5 py-3 max-md:px-3 max-md:py-2 max-sm:py-1 max-sm:px-2 max-sm:text-xs border border-[#d6af97] rounded-lg hover:bg-[#f9ebe7] text-sm font-bold">FURNITURE</button>
                </div>
            </div>
        </div>
        <section class="product_section layout_padding overflow-hidden flex flex-col items-center text-center pt-5">
            <div className="container">
                <div class="open-up aos-init aos-animate " data-aos="zoom-out">
                    <div class=" grid grid-cols-2 sm:grid-cols-4 md:grid-cols-4 lg:grid-cols-5 gap-6">
                        <div class="col-md-4">
                            <div class="cat-item image-zoom-effect">
                                <div class="image-holder">
                                    <a href="/product">
                                        <img src=" {{ URL('images/products/dress.png') }} " alt="categories" class="w-full h-48 object-cover rounded-lg">
                                    </a>
                                </div>
                                <div class="category-content">
                                    <div class="product-button">
                                        <a href="\product" class="btn btn-common text-uppercase">Cute Dress Girls</a>
                                        <div class="text-red">10$</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="cat-item image-zoom-effect">
                                <div class="image-holder">
                                    <a href="\product">
                                        <img src=" {{ URL('images/products/scarf.png') }} " alt="categories" class="w-full h-48 object-cover object-cover rounded-lg">
                                    </a>
                                </div>
                                <div class="category-content">
                                    <div class="product-button">
                                        <a href="\product" class="btn btn-common text-uppercase">Cute Dress Girls</a>
                                        <div class="text-red">10$</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="cat-item image-zoom-effect">
                                <div class="image-holder">
                                    <a href="\product">
                                        <img src=" {{ URL('images/products/skirt.png') }} " alt="categories" class="w-full h-48 object-cover object-cover rounded-lg">
                                    </a>
                                </div>
                                <div class="category-content">
                                    <div class="product-button">
                                        <a href="\product" class="btn btn-common text-uppercase">Cute Dress Girls</a>
                                        <div class="text-red">10$</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="cat-item image-zoom-effect">
                                <div class="image-holder">
                                    <a href="\product">
                                        <img src=" {{ URL('images/products/girl-shirt.png') }} " alt="categories" class="w-full h-48 object-cover object-cover rounded-lg">
                                    </a>
                                </div>
                                <div class="category-content">
                                    <div class="product-button">
                                        <a href="\product" class="btn btn-common text-uppercase">Cute Dress Girls</a>
                                        <div class="text-red">10$</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="cat-item image-zoom-effect">
                                <div class="image-holder">
                                    <a href="\product">
                                        <img src=" {{ URL('images/products/small-bag.png') }} " alt="categories" class="w-full h-48 object-cover object-cover rounded-lg">
                                    </a>
                                </div>
                                <div class="category-content">
                                    <div class="product-button">
                                        <a href="/product" class="btn btn-common text-uppercase">Cute Dress Girls</a>
                                        <div class="text-red">10$</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="cat-item image-zoom-effect">
                                <div class="image-holder">
                                    <a href="/product">
                                        <img src=" {{ URL('images/products/dress.png') }} " alt="categories" class="w-full h-48 object-cover rounded-lg">
                                    </a>
                                </div>
                                <div class="category-content">
                                    <div class="product-button">
                                        <a href="\product" class="btn btn-common text-uppercase">Cute Dress Girls</a>
                                        <div class="text-red">10$</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div id="service" class="h-full w-full">
        <div>
            <div class="text-center text-[#51362e] pt-12 max-[426px]:pt-4 max-[426px]:text-xl mb-4  max-[426px]:text-2xl text-3xl font-semibold pb-0">Our Service</div>
            <div class="lg:space-x-1 px-2 max-lg:flex-col flex text-center justify-center items-center max-lg:px-[5rem] max-md:px-[2rem] max-lg:space-y-2">
                <div class="cash max-lg:w-full flex text-center items-center lg:justify-center bg-[#f1e0db] p-4 space-x-2 max-lg:pl-[4rem] max-[426px]:py-2">
                    <x-heroicon-s-building-storefront class="w-10 h-10 text-[#51362e]" />
                    <div class="info text-left">
                        <h6 class="uppercase md:text-[1rem] text-[.8rem] font-medium">BACKUP</h6>
                        <div class="text-[.7rem] md:text-[1rem] text-[#51545f]">Online orders for self-pickup.</div>
                    </div>
                </div>
                <div class="cash max-lg:w-full flex text-center items-center lg:justify-center bg-[#f1e0db] p-4 space-x-2 max-lg:pl-[4rem] max-[426px]:py-2">
                    <x-heroicon-s-truck class="w-10 h-10 text-[#51362e]" />
                    <div class="info text-left">
                        <h6 class="uppercase md:text-[1rem] text-[.8rem] font-medium">Delivery</h6>
                        <div class="text-[.7rem] md:text-[1rem] text-[#51545f]">Delivery with Company or </div>
                    </div>
                </div>
                <div class="return max-lg:w-full flex text-center items-center lg:justify-center bg-[#f1e0db] p-4 space-x-2 max-lg:pl-[4rem] max-[426px]:py-2">
                    <x-heroicon-s-arrow-path class="w-10 h-10 text-[#51362e]" />
                    <div class="info text-left">
                        <div class="uppercase md:text-[1rem] text-[.8rem] font-medium">45 days return</div>
                        <div class="text-[.7rem] md:text-[1rem] text-[#51545f]">Making it Look Like Readable</div>
                    </div>
                </div>
                <div class="open max-lg:w-full flex text-center items-center lg:justify-center bg-[#f1e0db] p-4 space-x-2 max-lg:pl-[4rem] max-[426px]:py-2">
                    <x-heroicon-s-clock class="w-10 h-10 text-[#51362e]" />
                    <div class="info text-left">
                        <div class="uppercase md:text-[1rem] text-[.8rem] font-medium">opening all week</div>
                        <div class="text-[.7rem] md:text-[1rem] text-[#51545f]">8AM - 10PM</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="contact" class="contact pt-10 px-[1rem] max-[426px]:pt-2">
        <div class="text-center text-[#51362e] pt-5 md:pt-12 max-[426px]:text-xl md:text-3xl font-semibold pb-3">Contact Us</div>

        <div class="flex flex-col md:flex-row md:justify-around items-center">
            <div class="social text-center md:text-left">
                <div class="pt-10 max-[456px]:pt-1 items-center pb-1 flex flex-col justify-center">
                    <a href="/">
                        <img class="w-[6rem] md:w-[10rem]" src="{{ URL('images/logo.png') }}" alt="Your Company">
                    </a>
                    <p class="max-sm:text-[.9rem] mt-2">Find Us in Social:</p>
                    <div class="flex space-x-2 pl-[1.2rem] max-sm:pl-[.6rem]">
                        <x-bi-facebook class="w-6 h-6 md:w-7 md:h-7" />
                        <x-bi-messenger class="w-6 h-6 md:w-7 md:h-7" />
                        <x-bi-telegram class="w-6 h-6 md:w-7 md:h-7" />
                    </div>
                </div>
            </div>

            <div class="payment pt-10 max-[456px]:pt-4 text-center">
                <h6 class="font-bold text-[1.2rem] pb-2 max-sm:text-[1rem]">Payment Method</h6>
                <div class="flex space-x-4">
                    <img src="{{url('images/payment-visa.png')}}" alt="Visa" class="w-[4rem] md:w-[6rem] h-[3rem] md:h-[4rem] object-contain rounded-lg">
                    <img src="{{url('images/payment-acleda.png')}}" alt="Acleda" class="w-[4rem] md:w-[6rem] h-[3rem] md:h-[4rem] object-contain rounded-lg">
                    <img src="{{url('images/payment-aba.png')}}" alt="ABA" class="w-[4rem] md:w-[6rem] h-[3rem] md:h-[4rem] object-contain rounded-lg">
                </div>
            </div>
            <div class="info flex justify-center max-sm:text-[.7rem] mt-6">
                <div class="pt-4">
                    <div class="mb-4">
                        <div class="flex space-x-2 items-center">
                            <x-heroicon-s-map-pin class="w-5 h-5 md:w-6 md:h-6 text-[#fe4c50]" />
                            <h6 class="font-bold text-[1.1rem] max-sm:text-[.9rem]">Address</h6>
                        </div>
                        <p class="text-sm md:text-base">1988 Phnom Penh Tremy, Sen Sok, Phnom Penh City.</p>
                    </div>
                    <div class="mb-4">
                        <div class="flex space-x-2 items-center">
                            <x-heroicon-s-phone class="w-5 h-5 md:w-6 md:h-6 text-[#fe4c50]" />
                            <h6 class="font-bold text-[1.1rem] max-sm:text-[.9rem]">Phone</h6>
                        </div>
                        <p class="text-sm md:text-base">+855 16489811 | 77513258</p>
                    </div>
                    <div>
                        <div class="flex space-x-2 items-center">
                            <x-heroicon-s-envelope-open class="w-5 h-5 md:w-6 md:h-6 text-[#fe4c50]" />
                            <h6 class="font-bold text-[1.1rem] max-sm:text-[.9rem]">Email</h6>
                        </div>
                        <p class="text-sm md:text-base">tinhtomninh@email.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            if (window.location.hash === "#contact") {
                const promoSection = document.querySelector("#contact");
                if (promoSection) {
                    setTimeout(() => {
                        promoSection.scrollIntoView({
                            behavior: "smooth"
                        });
                    }, 500); // Delay ensures content is fully loaded before scrolling
                }
            }
        });
    </script>


</x-layout>