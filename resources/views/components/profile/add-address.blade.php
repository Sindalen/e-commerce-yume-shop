<div class="flex justify-center mt-4 ml-8">
    <div class="w-full max-w-6xl flex flex-col md:flex-row gap-6">
        <!-- Sidebar -->
        <div class="w-full">
            <h1 class="text-xl">Change your Address</h1>
            
            <form method="POST" action="{{ route('address.update.address') }} class="space-y-3">
                @csrf
                <div class="w-full mt-4">
                    <div class="flex items-center">
                        <label class="block text-gray-600">Your Address: </label>
                        <input type="address" value=" {{$customer->address}}" class="ml-4 w-full flex-1 border-b border-gray-400 outline-none">
                    </div>
                </div>
            </form>
            <button class="bg-[#fdf7f3] mt-3 px-8 py-2 border rounded text-[#895c4f] w-full md:w-auto">Save</button>
        </div>
    </div>
</div>