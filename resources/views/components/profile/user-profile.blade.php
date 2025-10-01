<x-layout>
    <x-slot:heading></x-slot:heading>

    <div id="user-profile" class="min-h-screen flex justify-center md:pt-10 pt-0 md:px-4 bg-[#fffcfa]">
        <div class="w-full max-w-6xl flex flex-col md:flex-row gap-6">
            <!-- Sidebar -->
            @include('.components.profile._option-userprofile')

            <!-- Main Content -->
            <div class="w-full md:w-3/4 space-y-2">
                <h1 class="text-2xl font-bold text-center md:text-left">User Profile</h1>
                <p class="text-gray-600 text-center md:text-left">Manage your details and view your tier status.</p>
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
                <div class="bg-white p-6 rounded-lg shadow-md flex justify-center flex-col md:flex-row items-center gap-6 lg:gap-12">
                    <!-- Profile Info -->
                    <div class="flex flex-col items-center text-center">
                        <form action="{{ route('profile.uploadAvatar') }}" method="POST" enctype="multipart/form-data" class="flex flex-col items-center">
                            @csrf
                            <div class="relative group">
                                <!-- Display current avatar or default -->
                                <img src="{{ $customer->user_avatar ? asset('storage/' . $customer->user_avatar) : asset('images/default-avatar.jpg') }}" 
                                    alt="Profile Avatar"
                                    class="rounded-full w-28 h-28 object-cover border-2 border-gray-200 group-hover:opacity-75 transition-opacity">
                                
                                <!-- Upload overlay -->
                                <div class="absolute inset-[3px] flex items-end justify-end opacity-70 group-hover:opacity-100 transition-opacity">
                                    <span class="bg-black bg-opacity-50 text-white p-1 rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </span>
                                </div>
                                
                                <!-- File input -->
                                <input type="file" 
                                    id="avatar-upload" 
                                    name="avatar" 
                                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                                    accept="image/jpeg,image/png,image/jpg,image/gif"
                                    onchange="this.form.submit()">
                            </div>
                        </form>
                        <p class="font-semibold mt-2">{{ $customer->username }}</p>
                        <p class="text-gray-600 flex flex-col text-center items-center">{{ $customer->phone_number }} {{ $customer->email }}</p>
                    </div>


                    <!-- General Information -->
                    <div class="w-full lg:w-1/2">
                        <h2 class="font-semibold pb-2">General Information</h2>
                        <form form method="POST" action="{{ route('profile.update.general') }}" class="space-y-3">
                            @csrf
                            <div class="w-full ">
                                <label class="block text-gray-600">Username</label>
                                <input type="text" name="username" value="{{ old('username', $customer->username) }}" 
                                        class="w-full border p-2 rounded @error('username') border-red-500 @enderror">
                                    @error('username')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                            </div>
                            <!-- line2 -->
                            <div class="flex gap-3 w-full">
                                <div class="w-2/3 max-md:w-full">
                                    <label class="block text-gray-600">Gender</label>
                                    <select name="gender_id" class="w-full border p-2 rounded">
                                        @foreach($genders as $gender)
                                            <option value="{{ $gender->id }}" {{ $customer->gender_id == $gender->id ? 'selected' : '' }}>
                                                {{ $gender->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="w-full ">
                                    <label class="block text-gray-600">Province</label>
                                    <select name="province_id" class="w-full border p-2 rounded">
                                        @foreach($provinces as $province)
                                            <option value="{{ $province->id }}" {{ $customer->province_id == $province->id ? 'selected' : '' }}>
                                                {{ $province->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <button class="bg-[#f9ebe7] px-6 py-2 border rounded text-[#895c4f] w-full md:w-auto">Update</button>
                        </form>
                    </div>
                </div>
                
                <!-- Security Section -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="font-semibold pb-2">Security</h2>
                    <form method="POST" action="{{ route('profile.update.contact') }}" class="space-y-3">
                        @csrf
                        
                        <div class="grid md:grid-cols-2 gap-3">
                            <div class="w-full ">
                                <label class="block text-gray-600">Email</label>
                                <input type="email" id="email" name="email" value="{{ old('email', $customer->email) }}" 
                                class="w-full border p-2 rounded">
                                @error('email')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full" >
                                <label class="block text-gray-600">Phone Number</label>
                                <input type="text" id="phone_number" name="phone_number" value="{{ old('phone_number', $customer->phone_number) }}" 
                                class="w-full border p-2 rounded">
                                @error('phone_number')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="bg-[#f9ebe7] mt-3 px-8 py-2 border rounded text-[#895c4f] w-full md:w-auto">Save</button>
                    </form>
                    <!-- <form method="POST" action="{{ route('profile.update.password') }} class="space-y-3 pt-3">
                        @csrf
                        <div class="grid md:grid-cols-2 gap-3">
                            <div class="w-full ">
                                <label class="block text-gray-600">Current Password</label>
                                <input type="password" value="" class="w-full border p-2 rounded">
                            </div>
                            <div class="w-full ">
                                <label class="block text-gray-600">New Password</label>
                                <input type="password" value="" class="w-full border p-2 rounded">
                            </div>
                        </div>
                    </form> -->
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('avatar-upload').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file.size > 2 * 1024 * 1024) { // 2MB
                alert('File is too large (max 2MB)');
                this.value = ''; // clear selection
            }
        });
    </script>
</x-layout>
