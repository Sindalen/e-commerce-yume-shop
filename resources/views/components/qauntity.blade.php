<section class="flex items-center justify-between">
    <div class="flex items-center space-x-4 col-span-2 max-w-80">
        <div class="border text-gray-500 rounded-md bg-[#fdf7f3]">
            <button id="decrease" class="decrease px-2 pb-[1px] py-0 border-r">−</button>
            <input id="counter" min="1" value="1" class="counter pb-[3px] w-6 text-[.8rem] text-center outline-none border-0 bg-transparent">
            <button id="increase" class="increase px-2 pb-[1px] py-0 border-l">+</button>
        </div>
    </div>
</section>

<style>
    @media screen and (max-width: 425px) {
    .decrease {
        padding-inline: 4px;
    }

    .counter {
        width: 12px;
    }

    .increase {
        padding-inline: 4px;
    }
}
</style>