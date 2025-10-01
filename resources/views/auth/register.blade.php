<x-default>
    <div id="register" class="flex items-center justify-center min-h-screen bg-gray-50">
        <div class="flex flex-col justify-between min-[853px]:flex-row items-center max-w-6xl w-full md:p-10">
            <div class="right hidden min-[853px]:flex w-1/3 justify-center">
                <a href="" class="">
                    <img src="{{ URL('images/login-logo1.png') }}" alt="" class="w-[75%]">
                </a>
            </div>
            <div class="w-full min-[853px]:w-2/3">
                <div class="p-8 rounded-lg shadow">
                    <form method="POST" action="{{ route('register.post') }}" class="space-y-4 text-gray-600">
                        @csrf
                        <h2 class="font-bold text-2xl pb-3 text-center font-serif">Register</h2>
                        <div class="flex justify-center text-center space-x-4 max-[440px]:space-x-0 text-[#311c14]">
                            <a href="/login">
                                <p>You already have an account? <span class="underline">Login</span></p>
                            </a>
                        </div>
                        
                        <div class="line1 flex max-[515px]:flex-col space-x-6 max-[515px]:space-x-0">
                            <!-- Username -->
                            <div class=" text-left w-full">
                                <label for="username" class="mb-1">Username</label>
                                <input type="text" id="username" name="username" value="{{ old('username') }}" 
                                    class="max-[440px]:py-1 py-2 pl-4 w-[10rem] text-left items-center input-color border border-color rounded-md" style="width: -webkit-fill-available;" >
                                @error('username')
                                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- Gender -->
                            <div class="text-left w-full max-[515px]:mt-4">
                            <label for="gender" class="mb-1">Gender</label>
                            <select id="gender" name="gender" style="width: -webkit-fill-available;"
                                    class="max-[440px]:py-1 py-[10px] pl-1 pr-4 w-[15rem] text-left input-color border border-color rounded-md" style="width: -webkit-fill-available;">
                                <option value="" disabled selected>Select gender</option>
                                @foreach($genders as $gender)
                                    <option value="{{ $gender->name }}" {{ old('gender') == $gender->name ? 'selected' : '' }}>
                                        {{ ucfirst($gender->name) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('gender')
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="line2 flex max-[515px]:flex-col space-x-6 max-[515px]:space-x-0">
                        <!-- Email or Phone -->
                            <div class="text-left w-full">
                                <label for="identifier" class="mb-1">Email or Phone Number</label>
                                <input type="text" id="identifier" name="identifier" value="{{ old('identifier') }}"
                                    class="max-[440px]:py-1 py-2 pl-4 w-[15rem] text-left items-center input-color border border-color rounded-md" style="width: -webkit-fill-available;">
                                @error('identifier')
                                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- Password -->
                            <div class="text-left w-full max-[515px]:mt-4">
                                <label for="password" class="mb-1">Password</label>
                                <input type="password" id="password" name="password" 
                                    class="max-[440px]:py-1 py-2 pl-4 w-[15rem] text-left items-center input-color border border-color rounded-md" style="width: -webkit-fill-available;">
                                @error('password')
                                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="line3 flex max-[515px]:flex-col space-x-6 max-[515px]:space-x-0">
                        <!-- Province -->
                            <div class="text-left w-full ">
                                <label for="province" class="mb-1">Province</label>
                                <select id="province" name="province" 
                                        class="max-[440px]:py-1 py-[10px] pl-1 pr-4 w-[15rem] text-left input-color border border-color rounded-md" style="width: -webkit-fill-available;">
                                    <option value="" disabled selected>Select province</option>
                                    @foreach($provinces as $province)
                                        <option value="{{ $province->name }}" {{ old('province') == $province->name ? 'selected' : '' }}>
                                            {{ $province->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('province')
                                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Address -->
                            <div class="text-left w-full max-[515px]:mt-4">
                                <label for="address" class="mb-1">Address</label>
                                <input type="text" id="address" name="address" value="{{ old('address') }}"
                                    class="max-[440px]:py-1 py-2 pl-4 w-[15rem] text-left items-center input-color border border-color rounded-md" style="width: -webkit-fill-available;">
                                @error('address')
                                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-center">
                            <button type="submit" 
                                    class="px-8 py-2 mt-4 btn-color border border-color text-gray-700 font-medium rounded-md focus:outline-none focus:ring-0  focus:ring-offset-2 transition">
                                Sign Up
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-default>