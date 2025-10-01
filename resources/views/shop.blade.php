<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <section id="shop" class="mx-2 py-16 max-w-full">
        <div class="flex flex-col md:justify-center md:items-center">
            <div class="text-center text-[#51362e] max-[426px]:text-xl pt-8 text-3xl font-semibold pb-6">New Arrivals</div>
            @include('.components.sub-view._product-type')
        </div>
        <section class="product_section pb-1 layout_padding overflow-hidden flex flex-col items-center text-left pt-8 mx-2">
            <div className="container">
                <div class="open-up aos-init aos-animate " data-aos="zoom-out">
                    <div class="grid max-sm:grid-cols-2 max-[854px]:grid-cols-3 min-[854px]:grid-cols-4 min-[1067px]:grid-cols-5 gap-6 max-[426px]:gap-2">
                        @foreach($products as $product)
                        <div class="col-md-4 cat-item " data-category="{{ $product->product_category_id }}">
                            <div class="image-zoom-effect  bg-white rounded-md shadow overflow-hidden">
                                <div class="image-holder">
                                    <a href="{{ route('product_detail', $product->id) }}">
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->description }}" class="w-48 h-[13rem] m425_wh object-cover rounded-sm">
                                    </a>
                                </div>
                                <a href="{{ route('product_detail', $product->id) }}" >
                                    <div class="product-button mb-1 pl-2">
                                        <div class="btn btn-common mt-2 text-sm text-[#51362e] max-w-44 whitespace-nowrap overflow-hidden text-ellipsis">{{ $product->description }}</div>
                                        <div class="flex justify-between items-center ">
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get all filter buttons and product items
            const filterButtons = document.querySelectorAll('[data-category]');
            const productItems = document.querySelectorAll('.cat-item');
            const productLinks = document.querySelectorAll('.product-link');

            // Function to update active button
            const buttons = document.querySelectorAll("section button");

            buttons.forEach(button => {
                button.addEventListener("click", () => {
                    // Remove active state from all
                    buttons.forEach(btn => {
                        btn.classList.remove("bg-[#d6af97]", "text-white");
                        btn.classList.add("bg-white", "text-[#895c4f]");
                    });

                    // Add active state to clicked
                    button.classList.remove("bg-white", "text-[#895c4f]");
                    button.classList.add("bg-[#d6af97]", "text-white");
                });
            });

            // Add click event listeners to category buttons
            filterButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const category = button.getAttribute('data-category');
                    
                    // Filter products
                    productItems.forEach(item => {
                        const productCategory = item.getAttribute('data-category');
                        item.style.display = (category === 'all' || productCategory === category) ? 'block' : 'none';
                    });
                    
                    // Update active button
                    updateActiveButton(category);
                });
            });

            // Add click event listeners to product links
            productLinks.forEach(link => {
                link.addEventListener('click', (e) => {
                    // Prevent default if you want to handle the navigation manually
                    // e.preventDefault();
                    
                    const category = link.getAttribute('data-category');
                    updateActiveButton(category);
                    
                    // Optional: Filter products to show only this category
                    productItems.forEach(item => {
                        const productCategory = item.getAttribute('data-category');
                        item.style.display = (productCategory === category) ? 'block' : 'none';
                    });
                    
                    // If you prevented default, you would navigate here:
                    // window.location.href = link.href;
                });
            });
        });
    </script>

    <style>
        .sh-small {
            font-size: small;
            line-height: .5rem;
        }
        
        @media screen and (max-width: 425px) {
            .m425_wh {
                width: 100%;
                height: 11rem;
            }
            .bg425 {
                background-color: #fcfaf9;
                border-radius: 10px;
            }
        }
        
        /* Smooth transitions for better UX */
        .cat-item {
            transition: all 0.3s ease;
        }
        
        /* Pointer cursor for clickable elements */
        [data-category], .product-link {
            cursor: pointer;
        }
    </style>
</body>
</html>