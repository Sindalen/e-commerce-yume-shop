<x-default>
    <div id="login" class="flex items-center justify-center min-h-screen bg-gray-50">
        <div class="flex flex-col justify-between md:flex-row items-center max-w-6xl w-full p-6 md:p-10">
            <!-- Logo Section -->
            <div class="hidden md:flex w-1/2 justify-center mb-8 md:mb-0">
                <a href="" class="transition-transform hover:scale-105">
                    <img src="{{ URL('images/login-logo1.png') }}" alt="Company Logo" class="w-3/4 max-w-xs">
                </a>
            </div>

            <!-- Login Form Section -->
            <section class="w-full md:w-1/2">
                <!-- Session Messages -->
                
                <div class="p-8 pb-12 rounded-lg shadow">
                    <form method="POST" action="{{ route('login.post') }}" class="space-y-4">
                        @csrf

                        <h2 class="font-bold text-center text-xl md:text-2xl pb-0 font-serif text-gray-800">
                            Login
                        </h2>

                        <!-- Email/Phone Field -->
                        <div class="space-y-2">
                            <label for="identifier" class="block  text-gray-700">Email or Phone Number</label>
                            <input 
                                type="text" 
                                id="identifier" 
                                name="identifier" 
                                value="{{ old('identifier') }}"
                                placeholder="Enter your email/phone number" 
                                class="w-full px-4 py-2 input-color border border-color rounded-md focus:outline-none focus:ring-1 focus:ring-gray-200 focus:border-transparent transition"
                                required 
                                autofocus
                            />
                            @error('identifier')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Password Field -->
                        <div class="space-y-2">
                            <label for="password" class="block text-gray-700">Password</label>
                            <input 
                                type="password" 
                                id="password" 
                                name="password" 
                                placeholder="Enter your password" 
                                class="w-full px-4 py-2 input-color border border-color rounded-md focus:outline-none focus:ring-1 focus:ring-gray-200 focus:border-transparent transition"
                                required
                            />
                            @error('password')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Registration Link -->
                        <div class=" flex justify-between flex-row py-2">
                            <p class="text-gray-600">
                                Don't have an account?</p>
                            <a href="{{ route('register') }}" class=" font-bold text-gray-700 hover:text-gray-800">
                                Register
                            </a>
                        </div>

                        <!-- Submit Button -->
                        <button 
                            type="submit" 
                            class="w-full px-6 py-3 input-color border border-color text-gray-700 font-medium rounded-md focus:outline-none focus:ring-0  focus:ring-offset-2 transition">
                            Login
                        </button>

                        
                    </form>
                </div>
            </section>
        </div>
    </div>
    
</x-default>