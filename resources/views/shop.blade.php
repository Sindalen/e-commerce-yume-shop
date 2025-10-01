<x-layout>
    <x-slot:heading></x-slot:heading>
    <div id="shop" class="mx-2 max-w-full select-none">
        <div>
            <div class=" hidden md:block text-center text-[#51362e] pt-6 text-3xl font-semibold pb-4">New Arrivals</div>
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
        <section class="product_section layout_padding overflow-hidden flex flex-col items-center pt-5">
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
</x-layout>