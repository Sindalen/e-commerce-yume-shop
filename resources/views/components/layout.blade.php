<!DOCTYPE html>
<html lang="en" class="h-full ">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body h-full>
  <div class="min-h-full select-none" style="font-family:Arial, Helvetica, sans-serif;">
    <nav class="pt-4 ">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
          <div class="flex items-center">
            <a href="/">
              <img class="size-[4rem] max-md:size-[3rem]" src=" {{ URL('images/logo.png') }} " alt="Your Company">
            </a>
          </div>
          <div class="hidden md:block">
            <div class="ml-4 flex items-center md:ml-6 uppercase">
              <div class=" flex items-baseline space-x-4 text-bold mr-[1.25rem]">
                <a href="/" class="rounded-md px-3 py-2 text-sm font-medium hover:bg-[#f9ebe7] hover:text-black hover:border-2" aria-current="page">home</a>
                <a href="/shop" class="rounded-md px-3 py-2 text-sm font-medium hover:bg-[#f9ebe7] hover:text-black hover:border-2">shop</a>
                <a href="/promotion" class="rounded-md px-3 py-2 text-sm font-medium hover:bg-[#f9ebe7] hover:text-black hover:border-2">Promotion</a>
                <!-- <a href="#service" class="rounded-md px-3 py-2 text-sm font-medium hover:bg-[#f9ebe7] hover:text-black hover:border-2">service</a> -->
                <a href="/#contact" class="rounded-md px-3 py-2 text-sm font-medium hover:bg-[#f9ebe7] hover:text-black hover:border-2 ">contact</a>
              </div>
              <button type="button" class="relative rounded-full bg-[#f9ebe7] p-1 text-gray-700 hover:text-white focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-200 focus:outline-hidden">
                <span class="absolute -inset-1.5"></span>
                <span class="sr-only">View notifications</span>
                <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                </svg>
              </button>

              <!-- Profile dropdown -->
              <div class="relative ml-3">
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
          <div class="-mr-2 flex md:hidden">
            <!-- Mobile menu button -->
            <button id="menu-button" type="button" class="relative inline-flex items-center justify-center rounded-md bg-[#f9ebe7] p-2 text-gray-400 hover:bg-[#d6af97] hover:text-white focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-[#f9ebe7] focus:outline-hidden" aria-controls="mobile-menu" aria-expanded="false">
              <span class="absolute -inset-0.5"></span>
              <span class="sr-only">Open main menu</span>
              <!-- Menu open: "hidden", Menu closed: "block" -->
              <svg id="menu-icon" class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
              </svg>
              <!-- Menu open: "block", Menu closed: "hidden" -->
              <svg id="close-icon" class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
        </div>
      </div>

      <!-- Mobile menu, show/hide based on menu state. -->
      <div class="md:hidden hidden" id="mobile-menu">
        <div class=" space-y-1 px-2 pt-2 pb-3 sm:px-3">
          <a href="/" class="block rounded-md px-3 py-1 text-sm font-medium hover:bg-[#f9ebe7] hover:text-black hover:border-2" aria-current="page">Home</a>
          <a href="/shop" class="block rounded-md px-3 py-1 text-sm font-medium hover:bg-[#f9ebe7] hover:text-black hover:border-2">Shop</a>
          <!-- <a href="/type" class="block rounded-md px-3 py-2 text-sm font-medium hover:bg-[#f9ebe7] hover:text-black hover:border-2">Type</a> -->
          <a href="/promotion" class="block rounded-md px-3 py-1 text-sm font-medium hover:bg-[#f9ebe7] hover:text-black hover:border-2">Promotion</a>
          <!-- <a href="#service" class="block rounded-md px-3 py-1 text-sm font-medium hover:bg-[#f9ebe7] hover:text-black hover:border-2">Service</a> -->
          <a href="/#contact" class="block rounded-md px-3 py-1 text-sm font-medium hover:bg-[#f9ebe7] hover:text-black hover:border-2">Contact</a>
        </div>
        <div class="border-t border-gray-700 pt-4 pb-3">
          <div class="flex items-center px-5">
            <div class="">
              <img class="size-[3rem]" src=" {{ URL('images/logo.png') }} " alt="Your Company">
            </div>
            <div class="ml-3">
              <div class="text-base font-medium">Tinh Tomninh</div>
              <div class="text-sm font-medium text-gray-400">tinhtomninh@example.com</div>
            </div>
            <button type="button" class="relative ml-auto shrink-0 rounded-full bg-[#f9ebe7] p-1 text-gray-800 hover:text-[#d6af97] focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-200 focus:outline-hidden">
              <span class="absolute -inset-1.5"></span>
              <span class="sr-only">View notifications</span>
              <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
              </svg>
            </button>
          </div>
        </div>
      </div>
    </nav>

    <header class="bg-white shadow-sm">
      <div class="mx-auto max-w-7xl px-4 py-1 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $heading }}</h1>
      </div>
    </header>
    <main>
      <div class="mx-auto max-w-full">
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

</html>