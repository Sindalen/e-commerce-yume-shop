<x-layout>
    <x-slot:heading></x-slot:heading>

    <div id="address" class="min-h-screen flex justify-center md:pt-10 md:px-4 bg-[#fffcfa]">
        <div class="w-full max-w-6xl flex flex-col md:flex-row gap-6">
            <!-- Sidebar -->
            @include('.components.profile._option-userprofile')
            
            <!-- Main Content -->
            <div class="w-full md:w-3/4 space-y-4">
                <h1 class="text-2xl font-bold text-center md:text-left">Address</h1>
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                        {{ session('success') }}
                    </div>
                @endif
                
                @if(session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                        {{ session('error') }}
                    </div>
                @endif
                <p class="text-gray-600 text-center md:text-left">Manage your Address</p>
                <div x-data="{ showAddressForm: false }">
                    <a href="#" @click.prevent="showAddressForm = !showAddressForm" class="">
                        <div class="flex space-x-2 items-center mt-2">
                            <x-heroicon-s-arrow-left class="w-5 h-5"/>
                            <p>Change Your Address ?</p>
                        </div>
                        <hr class="border-t-[1.5px] border-black my-2 ml-8">
                    </a>
                    <div class="flex space-x-2">
                        <x-heroicon-s-home class="w-6 h-6"/>
                        <p>My Address</p>
                    </div>
                    <div class="flex flex-col mt-4">
                        <p class="flex"><x-heroicon-o-map-pin class="w-6 h-6 mr-2"/>{{$customer->address}}</p>
                        <p class="text-gray-600 ml-8">{{$customer->username}}</p>
                        <hr class="border-t-[1.5px] border-black my-2 ml-8">
                    </div>
                    <!-- Address Form (hidden by default) -->
                    <div class="flex justify-center mt-4 ml-8">
                        <div class="w-full max-w-6xl flex flex-col md:flex-row gap-6">
                            <div class="w-full">
                                <h1 class="text-xl">Change your Address</h1>
                                
                                <form method="POST" action="{{ route('address.update.address') }}" class="space-y-3">
                                    @csrf
                                    <div class="w-full mt-4">
                                        <div class="min-[460px]:flex items-center">
                                            <label class="block w-[10rem] text-gray-600">Your Address: </label>
                                            <input type="text" name="address" value="{{ old('address', $customer->address) }}" class="w-full border p-2 rounded @error('address') @enderror">
                                            
                                        </div>
                                        @error('address')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <button type="submit" class="bg-[#fdf7f3] mt-3 px-8 py-2 border rounded text-[#895c4f] w-full md:w-auto hover:bg-[#f9ebe7] transition-colors">
                                        Save
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
<script src="//unpkg.com/alpinejs" defer></script>