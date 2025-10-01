<x-layout >
    <x-slot:title>Search Results for "{{ $query }}"</x-slot:title>
    <section class="px-2">
        <div class="goback max-w-6xl sm:px-16 w-full mt-6">
            @include('components.goback', ['route' => url('/')])
        </div>
        <div class="container mx-auto px-2 py-2 text-center shadow rounderd mt-10 sm:mt-16 max-w-xl">
            @if($products->count())
                <div class="">
                    @foreach($products as $product)
                    <div class="image-zoom-effect bg-white p-1 flex gap-4 text-center items-center">
                        <div class="image-holder">
                            <a href="{{ route('product_detail', $product->id) }}">
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->description }}" class="w-[4.5rem] h-20 object-cover">
                            </a>
                        </div>
                        <a href="{{ route('product_detail', $product->id) }}" class="">
                            <div class="product-button mb-1 space-y-2">
                                <div class="flex space-y-2">
                                    <p class="text-sm">{{ $product->description }}</p>
                                </div>
                                <div class="flex justify-between items-center">
                                    @include('components.sub-view._price-discount')
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
                
                <div class="">
                    {{ $products->links() }}
                </div>
            @else
                <div class="text-center py-4">
                    <p class="text-lg text-gray-600">No products found for "{{ $query }}"</p>
                    <a href="/#shop" class="mt-4 inline-block text-[#895c4f] hover:underline">
                        See all products
                    </a>
                </div>
            @endif
        </div>
    </section>
</x-layout>