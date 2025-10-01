<script src="https://cdn.tailwindcss.com"></script>
<main>
    <div class="container-fluid">
        <div class="nav-link d-inline ">
            <button onclick="goBack()" type="button" class="goback flex px-3 py-2 ml-0 bg-[#f9ebe7] text-md rounded-md hover:bg-[#fdf7f3] text-gray-700 items-center">
                <x-heroicon-s-arrow-left class="icon w-5 h-5" /> 
                <a href="{{ $route ?? url()->previous() }}">Go Back</a>
            </button>
        </div>
    </div>
</main>
<script>
    function goBack() {
        window.history.back();
    }
</script>
<style>
    @media screen and (max-width: 640px){
        .goback{
            padding-inline: 5px;
            padding-block: 5px;
            font-size: 14px;
            align-items: center;
        }
        .icon {
            width: 15px;
            height: 15px;
        }
    }
    
</style>