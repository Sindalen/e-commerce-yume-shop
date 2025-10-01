<x-layout>
    <x-slot:heading></x-slot:heading>
    {{-- <div class="ml-6 max-[445px]:ml-1 mt-6">
        @include('.components.goback')
    </div> --}}
    <section id="promotion" class="mx-2 max-w-full ">
        <div class="flex flex-col md:justify-center md:items-center">
            <div class="text-center text-[#51362e] max-[426px]:text-xl pt-8 text-3xl font-semibold pb-6">Promotion</div>
            @include('.components.sub-view._product-type')
        </div>
        <section class="product_section layout_padding overflow-hidden flex flex-col items-center text-left pt-5 mx-2">
            <div className="container">
                <div class="open-up aos-init aos-animate " data-aos="zoom-out">
                <div class="grid max-sm:grid-cols-2 max-[854px]:grid-cols-3 min-[854px]:grid-cols-4 min-[1067px]:grid-cols-5 gap-6">
                        @foreach($products as $product)
                        <div class="col-md-4 cat-item " data-category="{{ $product->product_category_id }}">
                            <div class="image-zoom-effect">
                                <div class="image-holder">
                                    <a href="{{ route('product_detail', $product->id) }}">
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->description }}" class="w-48 h-[13rem] m425_wh object-cover rounded-sm">
                                    </a>
                                </div>
                                <a href="{{ route('product_detail', $product->id) }}" class="">
                                    <div class="product-button mb-1 ">
                                        <!-- Update the href to use the product detail route -->
                                        <div class="btn btn-common mt-2 text-sm text-[#51362e] max-w-44 whitespace-nowrap overflow-hidden text-ellipsis">{{ $product->description }}</div>
                                        <!-- <div class="text-xs text-[#895c4f] ">{{ $product->ProductCategory->name }}</div> -->
                                        <div class="flex justify-between items-center pt-4">
                                            @include('components.sub-view._price-discount')
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </section>
</x-layout>
    


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get all filter buttons
            const filterButtons = document.querySelectorAll('[data-category]');
            const productItems = document.querySelectorAll('.cat-item');

            // Add click event listeners to buttons
            filterButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const category = button.getAttribute('data-category');

                    // Loop through all products and show/hide based on category
                    productItems.forEach(item => {
                        const productCategory = item.getAttribute('data-category');

                        if (category === 'all' || productCategory === category) {
                            item.style.display = 'block'; // Show the product
                        } else {
                            item.style.display = 'none'; // Hide the product
                        }
                    });
                });
            });
        });
    </script>
    <style>
        /* .active {
            background-color: #f9ebe7;
        } */

        .sh-small {
            font-size: small;
            line-height: .5rem;
        }
    </style>
