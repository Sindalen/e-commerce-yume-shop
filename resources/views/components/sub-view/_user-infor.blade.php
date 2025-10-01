<x-layout>
    <x-slot:heading></x-slot:heading>

    <div class="flex justify-center mt-10">
        <div class="w-3/4 flex gap-6">
            <!-- Sidebar -->
            <div class="w-1/4 bg-rose-50 p-6 rounded-lg shadow-md">
                <ul class="space-y-4">
                    <li class="flex items-center gap-2 text-gray-700 font-semibold">
                        <x-heroicon-o-user class="w-5 h-6"/> User Profile
                    </li>
                    <li class="flex items-center gap-2 text-gray-700 font-semibold">
                        <span>🔄</span> History Order
                    </li>
                    <li class="flex items-center gap-2 text-gray-700 font-semibold">
                        <span>📍</span> Address
                    </li>
                </ul>
                <hr class="my-4">
                <button class="text-red-500 flex items-center gap-2 font-semibold">
                    <span>↪</span> Sign out
                </button>
            </div>

            <!-- Main Content -->
            <div class="w-3/4 space-y-6">
                <h1 class="text-2xl font-bold">User Profile</h1>
                <p class="text-gray-600">Manage your details, view your tier status and change your password.</p>

                <div class="bg-white p-6 rounded-lg shadow-md flex items-center gap-6">
                    <!-- Profile Info -->
                    <div class="flex flex-col items-center">
                        <img src="https://via.placeholder.com/80" class="rounded-full" alt="Profile">
                        <p class="font-semibold mt-2">Sinnorita Ichi</p>
                        <p class="text-gray-600">+855 77513258</p>
                    </div>

                    <!-- General Information -->
                    <div class="w-1/2">
                        <h2 class="font-semibold">General Information</h2>
                        <form class="space-y-3">
                            <div class="flex gap-3">
                                <div class="w-1/2">
                                    <label class="block text-gray-600">First name</label>
                                    <input type="text" value="Sinnorita" class="w-full border p-2 rounded">
                                </div>
                                <div class="w-1/2">
                                    <label class="block text-gray-600">Last name</label>
                                    <input type="text" value="Ichi" class="w-full border p-2 rounded">
                                </div>
                            </div>
                            <button class="bg-rose-100 px-4 py-2 rounded text-gray-700">Update</button>
                        </form>
                    </div>
                </div>

                <!-- Security Section -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="font-semibold">Security</h2>
                    <form class="space-y-3">
                        <div class="grid grid-cols-3 gap-3">
                            <div>
                                <label class="block text-gray-600">Email</label>
                                <input type="email" value="Sinnorita@gmail.com" class="w-full border p-2 rounded">
                            </div>
                            <div>
                                <label class="block text-gray-600">Password</label>
                                <input type="password" value="******" class="w-full border p-2 rounded">
                            </div>
                            <div>
                                <label class="block text-gray-600">Phone Number</label>
                                <input type="text" value="+855 077513258" class="w-full border p-2 rounded">
                            </div>
                        </div>
                        <button class="bg-rose-100 px-4 py-2 rounded text-gray-700">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-layout>
<style>
    .main{
        width: 100%;
        height: 100vh;
        background-size: cover;
        background-position: center;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
    }
</style>