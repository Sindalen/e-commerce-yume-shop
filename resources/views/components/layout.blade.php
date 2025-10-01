<!DOCTYPE html>
<html lang="en" class="h-full ">

<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>YumeWear</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-full" style="font-family: 'Noto Sans Khmer', sans-serif;">
  <div class="min-h-full">
    <nav class="pt-2 sticky top-0 z-50 bg-white py-2">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-14 items-center justify-between">
          <div class="flex items-center">
            <a href="/">
              <img class="size-[4rem] max-md:size-[3rem]" src=" {{ URL('images/6.png') }} " alt="Let's Shop">
            </a>
          </div>
          <div class="hidden min-[915px]:block">
            <div class="ml-4 flex items-center md:ml-6 uppercase">
              <div class=" flex items-baseline space-x-3 text-bold mr-[.8rem] text-[#311c14]">
                <a href="/" class="rounded-md px-3 py-2 text-sm font-medium hover:bg-[#f9ebe7] hover:text-black hover:border-2" aria-current="page">home</a>
                <a href="/#shop" class="rounded-md px-3 py-2 text-sm font-medium hover:bg-[#f9ebe7] hover:text-black hover:border-2">shop</a>
                <a href="/promotion" class="rounded-md px-3 py-2 text-sm font-medium hover:bg-[#f9ebe7] hover:text-black hover:border-2">Promotion</a>
                <!-- <a href="#service" class="rounded-md px-3 py-2 text-sm font-medium hover:bg-[#f9ebe7] hover:text-black hover:border-2">service</a> -->
                <a href="/#contact" class="rounded-md px-3 py-2 text-sm font-medium hover:bg-[#f9ebe7] hover:text-black hover:border-2 ">contact</a>
              </div>
              <form action="{{ route('.components.search') }}" method="GET" class="flex">
                <input type="text" 
                      name="query" 
                      placeholder="Search products..." 
                      class="px-4 py-2 border rounded-l-md focus:outline-none"
                      value="{{ request('query') }}"
                      required>
                <button type="submit" class="bg-[#9a7368] text-white px-4 py-2 rounded-r-md hover:bg-[#6d4a3f]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
              </form>
              <a href="/cart/">
                <x-heroicon-o-shopping-cart class="ml-4 mr-4 text-gray-500 w-8 h-8 hover:text-[#d6af97]" />
              </a>
              
              <a href="{{ route('profile') }}">  <!-- If you've named your route -->
                <x-heroicon-o-user class="text-gray-500 w-8 h-8 hover:text-[#d6af97]" />
              </a>
              <!-- <button type="button" class="mr-4 relative rounded-full bg-[#f9ebe7] p-1 text-gray-700 hover:text-white focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-200 focus:outline-hidden">
                <span class="absolute -inset-1.5"></span>
                <x-heroicon-s-magnifying-glass class=" text-gray-500 w-6 h-6 hover:text-[#d6af97]" />
              </button>
              <div x-data="{ showAddressForm: false }">
                <a href="#" @click.prevent="showAddressForm = !showAddressForm" class="mr-4 relative ml-auto shrink-0 rounded-full bg-[#f9ebe7] p-1 text-gray-800 hover:text-[#d6af97] focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-200 focus:outline-hidden">
                  <x-heroicon-s-magnifying-glass class=" ttext-gray-500 w-6 h-6 hover:text-[#d6af97]" />
                </a>
              </div> -->
              <!-- Profile dropdown -->
              <div class="relative ml-3 sm:hidden flex">
                <div>
                  <button type="button" class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-200 focus:outline-hidden" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                    <span class="absolute -inset-1.5"></span>
                    <span class="sr-only">Open user menu</span>
                    <img class="size-[3rem] rounded-full" src=" {{ URL('images/cart.png') }} " alt="">
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="-mr-2 flex min-[915px]:hidden text-center items-center">
            <!-- Search -->
            <form action="{{ route('.components.search') }}" method="GET" class="flex max-[608px]:hidden">
              <input type="text" 
                    name="query" 
                    placeholder="Search products..." 
                    class="px-4 py-2 border rounded-l-md focus:outline-none"
                    value="{{ request('query') }}"
                    required>
              <button type="submit" class="bg-[#9a7368] text-white px-4 py-2 rounded-r-md hover:bg-[#6d4a3f]">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                  </svg>
              </button>
            </form>

            <a href="/cart/">
              <x-heroicon-o-shopping-cart class="ml-4 mr-4 text-gray-500 w-8 h-8 hover:text-[#d6af97]" />
            </a>
            
            <a href="{{ route('profile') }}">
              <x-heroicon-o-user class="text-gray-500 w-8 h-8 hover:text-[#d6af97] mr-4" />
            </a>
             <!-- Mobile menu button -->
            <button id="menu-button" type="button" class="relative inline-flex items-center justify-center rounded-md bg-[#f9ebe7] p-2 text-gray-400 hover:bg-[#d6af97] hover:text-white focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-[#f9ebe7] focus:outline-hidden" aria-controls="mobile-menu" aria-expanded="false">
              <span class="absolute -inset-0.5"></span>
              <span class="sr-only">Open main menu</span>
              <svg id="menu-icon" class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
              </svg>
              <svg id="close-icon" class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
        </div>
      </div>

      <!-- Mobile menu, show/hide based on menu state. -->
      <div class="min-[915px]:hidden hidden" id="mobile-menu">
        <div class=" space-y-1 px-2 pt-2 pb-3 sm:px-3">
          <a href="/" class="block rounded-md px-3 py-1 text-sm font-medium hover:bg-[#f9ebe7] hover:text-black hover:border-2" aria-current="page">Home</a>
          <a href="/#shop" class="block rounded-md px-3 py-1 text-sm font-medium hover:bg-[#f9ebe7] hover:text-black hover:border-2">Shop</a>
          <!-- <a href="/type" class="block rounded-md px-3 py-2 text-sm font-medium hover:bg-[#f9ebe7] hover:text-black hover:border-2">Type</a> -->
          <a href="/promotion" class="block rounded-md px-3 py-1 text-sm font-medium hover:bg-[#f9ebe7] hover:text-black hover:border-2">Promotion</a>
          <!-- <a href="#service" class="block rounded-md px-3 py-1 text-sm font-medium hover:bg-[#f9ebe7] hover:text-black hover:border-2">Service</a> -->
          <a href="/#contact" class="block rounded-md px-3 py-1 text-sm font-medium hover:bg-[#f9ebe7] hover:text-black hover:border-2">Contact</a>
          <form action="{{ route('.components.search') }}" method="GET" class="flex min-[608px]:hidden">
              <input type="text" 
                    name="query" 
                    placeholder="Search products..." 
                    class="px-3 py-[4px] border text-sm rounded-l-md focus:outline-none"
                    value="{{ request('query') }}"
                    required>
              <button type="submit" class="bg-[#9a7368] text-white px-3 py-[4px] rounded-r-md hover:bg-[#6d4a3f] ">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                  </svg>
              </button>
          </form>
        </div>
      </div>
    </nav>

    <header class="bg-white ">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900"></h1>
      </div>
    </header>
    <main>
      <div class="mx-auto max-w-full" >
        {{ $slot }}
      </div>
    </main>
  </div>

</body>
<script>
  document.getElementById("menu-button").addEventListener("click", function() {
    const menu = document.getElementById("mobile-menu");
    const menuIcon = document.getElementById("menu-icon");
    const closeIcon = document.getElementById("close-icon");

    menu.classList.toggle("hidden");
    menuIcon.classList.toggle("hidden");
    closeIcon.classList.toggle("hidden");
  });
  document.addEventListener("DOMContentLoaded", function() {
    if (window.location.hash === "#contact") {
      const promoSection = document.querySelector("#contact");
      if (promoSection) {
        promoSection.scrollIntoView({
          behavior: "smooth"
        });
      }
    }
  });
</script>
<style>
  .sticky {
    position: sticky;
    top: 0;
    left: 0;
    right: 0;
    background-color: white;
    z-index: 50;
    padding: 10px 0;
    box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
  }
  .bg-color {
    background-color: #fffcfa;
  }
  .border-color {
    border-color: #f9ebe7;
  }
  .input-color {
    background-color: #fdf7f3;
  }
  /* input {
    border: 1px solid #f9ebe7;
  } */
  .btn-color {
    background-color: #f9ebe7;
  }

  input:focus-within {
    outline-offset: 2px;
    outline-style: solid;
    outline-width: 0px;
    outline-color: gray;
    box-shadow: none;
  }
</style>
</html>