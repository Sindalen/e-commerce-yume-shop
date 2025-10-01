<div class="max-lg:hidden block w-full lg:w-1/4 text-center items-center bg-white min-[791px]:p-6 p-5 rounded-lg shadow-md">
    <section class="md:flex hidden mt-4 flex-col items-center space-y-1">
        <a href="/profile" class="w-full text-center flex flex-row items-center">
            <button type="button" class="w-[90%] px-4 py-2 rounded text-left transition-colors"> Profile Info</button>
        </a>
        <a href="/history" class="w-full text-center flex flex-row items-center">
            <button type="button" class="w-[90%] px-4 py-2 rounded text-left transition-colors">History Order</button>
        </a>
        <a href="/address" class="w-full text-center flex flex-row items-center">
            <button type="button" class="w-[90%] px-4 py-2 rounded text-left transition-colors">Address</button>
        </a>
    </section>
    <hr class="my-4 border-t-[1.5px] border-black">
    <a href="/login" class="w-full text-center flex flex-row items-center text-red-500">
        <x-heroicon-o-arrow-right-start-on-rectangle class="w-5 h-5"/> 
        <button class="w-[90%] px-4 py-2 rounded text-left transition-colors">Sign out </button>
    </a>
</div>
<section class="md:hidden">
    <section class="w-full overflow-x-auto scrollbar-hide mt-4 flex flex-row items-center">
        <a href="/profile" class="w-full text-center">
            <button type="button" class="w-[80%] py-1 px-1 text-sm rounded text-center transition-colors">Profile</button>
        </a>
        <a href="/history" class="w-full text-center pl-2">
            <button type="button" class="w-[100%] py-1 px-1 text-sm rounded text-center transition-colors">History</button>
        </a>
        <a href="/address" class="w-full text-center pl-2">
            <button type="button" class="w-[100%] py-1 px-1 text-sm rounded text-center transition-colors">Address</button>
        </a>

        <a href="/login" class="w-full text-center">
            <button type="button" class="w-[80%] py-1 px-1 text-sm rounded text-center transition-colors">Log out</button>
        </a>
    </section>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const buttons = document.querySelectorAll("section button");
        const currentPath = window.location.pathname;
        
        // Set initial active button based on current URL
        buttons.forEach(button => {
            const link = button.closest('a');
            if (link && link.getAttribute('href') === currentPath) {
                button.classList.add("bg-[#d6af97]", "text-white");
            } else {
                button.classList.add("bg-white", "text-black");
            }
            
            button.addEventListener("click", () => {
                // Remove active class from all buttons
                buttons.forEach(btn => {
                    btn.classList.remove("bg-[#d6af97]", "text-white");
                    btn.classList.add("bg-white", "text-black");
                });
                
                // Add active class to the clicked button
                button.classList.remove("bg-white", "text-black");
                button.classList.add("bg-[#d6af97]", "text-white");
            });
        });
        
        // Handle profile image upload
        const profileUpload = document.getElementById('profile-upload');
        if (profileUpload) {
            profileUpload.addEventListener('change', function(e) {
                if (e.target.files && e.target.files[0]) {
                    const reader = new FileReader();
                    const profileImg = document.querySelector('.relative img');
                    
                    reader.onload = function(event) {
                        profileImg.src = event.target.result;
                    };
                    
                    reader.readAsDataURL(e.target.files[0]);
                }
            });
        }
    });
</script>