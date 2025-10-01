<x-layout class="mx-auto max-w-full sticky top-0 z-50">
    <x-slot:heading></x-slot:heading>

    <div class=" min-h-screen flex items-center bg-[#fffcfa] justify-center py-12">
        <div class=" w-full justify-center md:justify-between flex-col flex md:flex-row items-center">
            <div class="lg:ml-[4rem] md:ml-[2rem] md:w-1/2 space-y-4 text-center md:text-left
                flex flex-col justify-center md:items-baseline items-center max-sm:mx-4">
                <div class="md:w-1/2 max-md:mt-4 md:hidden flex justify-center text-center items-center flex-col">
                    <img class="" 
                    src="{{ URL('images/home/4.png') }}" alt="">
                </div>
                <h1 class="text-2xl lg:text-5xl font-bold leading-tight">
                    Get Your <br>
                    <span class="text-gray-800">Dream Style Today</span>
                </h1>
                <div class="text-[#311c14] max-sm:text-[14px]">
                    At <span class="font-medium text-[#d6af97] text-left">YumeWear</span>, we believe that fashion is more than just what you wear — it’s a reflection of your identity, your lifestyle, and your confidence. Our mission is to empower individuals from all walks of life to express themselves through modern, comfortable, and affordable fashion.
                </div>
                <a href="/#shop" class="hidden md:block">
                    <button class="max-md:text-[14px] uppercase py-2 pl-2 pr-4 border rounded-md text-xl text-white font-medium bg-[#d6af97] " type="button">
                        <span class=" text-[#fffcfa] rounded-full p-2">▶</span>
                        shop now
                    </button>
                </a>
                
            </div>
            <div class="md:w-1/2 max-md:mt-4 hidden md:block justify-center text-center items-center flex-col">
                <img class="" 
                src="{{ URL('images/home/4.png') }}" alt="">
            </div>
            <a href="/#shop" class="md:hidden flex max-md:mt-8">
                <button class="max-md:text-[14px] items-center uppercase pb-1 pt-[.7rem] pl-2 pr-4 border rounded-md text-xl text-white font-medium bg-[#d6af97] " type="button">
                    <span class=" text-[#fffcfa] rounded-full p-2">▶</span>
                    shop now
                </button>
            </a>
        </div>
    </div>
    @include('shop')
    @include('/components/service')
    @include('/components/contact')

    <style>
        .my-3wmp {
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 1.25rem;
            padding: 0rem;
        }

        .my-g {
            box-sizing: border-box;
            display: grid;
            grid-template-columns: repeat(2, minmax(0px, 1fr));
            gap: 1rem;
        }

        @media screen and (max-width: 768px) {
            .my-g {
                grid-template-columns: repeat(1, minmax(0px, 1fr));
                gap: 1rem;
            }
        }
    </style>

</x-layout>