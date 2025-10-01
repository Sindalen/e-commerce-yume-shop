<div class="flex mx-4 max-[440px]:mx-0 justify-center items-center space-y-2">
    <div class="w-full overflow-x-auto max-[425px]:flex max-[425px]:whitespace-nowrap max-[425px]:gap-2 max-[425px]:px-2 scrollbar-hide">
        <section class="md:flex text-[#895c4f] border-[#d6af97] text-center flow max-[425px]:flex max-[425px]:flex-nowrap gap-2">
            <button data-category="all" class="px-4 py-3 max-[854px]:px-3 max-[854px]:py-2 max-sm:py-1 max-sm:px-2 max-sm:text-xs bg-[#d6af97] border border-[#d6af97] rounded-md sm:rounded-lg text-sm ">ALL</button>
            <button data-category="1" class="px-5 py-3 max-[854px]:px-3 max-[854px]:py-2 max-sm:py-1 max-sm:px-2 max-sm:text-xs border border-[#d6af97] rounded-md sm:rounded-lg text-sm ">WOMEN’S FASHION</button>
            <button data-category="2" class="px-5 py-3 max-[854px]:px-2 max-[854px]:py-2 max-sm:py-1 max-sm:px-2 max-sm:text-xs border border-[#d6af97] rounded-md sm:rounded-lg text-sm ">MEN’S FASHION</button>
            <button data-category="3" class="px-5 py-3 max-[854px]:px-3 max-[854px]:py-2 max-sm:py-1 max-sm:px-2 max-sm:text-xs border border-[#d6af97] rounded-md sm:rounded-lg text-sm ">SNEAKERS</button>
        </section>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const buttons = document.querySelectorAll("section button");

        buttons.forEach(button => {
            button.addEventListener("click", () => {
                buttons.forEach(btn => {
                    btn.classList.remove("bg-[#d6af97]", "text-white");
                    btn.classList.add("bg-white", "text-[#895c4f]");
                });

                button.classList.remove("bg-white", "text-[#895c4f]");
                button.classList.add("bg-[#d6af97]", "text-white");
            });
        });
    });
</script>
