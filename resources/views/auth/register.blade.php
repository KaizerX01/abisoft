<x-guest-layout>
    <div class="space-y-6">
        <!-- Header -->
        <div class="text-center">
            <h2 class="text-3xl font-bold text-gray-900">Create Account</h2>
            <p class="text-gray-600 mt-2">Join us and start your journey today</p>
        </div>

        <!-- Registration Form -->
        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf
            
            <!-- Full Name -->
            <div class="form-control">
                <label class="label">
                    <span class="label-text font-medium text-gray-700">Full Name</span>
                </label>
                <div class="relative">
                    <input 
                        id="name" 
                        type="text" 
                        name="name" 
                        value="{{ old('name') }}"
                        class="input input-bordered w-full pl-12 hover:input-primary focus:input-primary transition-all duration-200" 
                        placeholder="Enter your full name"
                        required 
                        autofocus 
                        autocomplete="name"
                    >
                    <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                @error('name')
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                @enderror
            </div>

            <!-- Email Address -->
            <div class="form-control">
                <label class="label">
                    <span class="label-text font-medium text-gray-700">Email Address</span>
                </label>
                <div class="relative">
                    <input 
                        id="email" 
                        type="email" 
                        name="email" 
                        value="{{ old('email') }}"
                        class="input input-bordered w-full pl-12 hover:input-primary focus:input-primary transition-all duration-200" 
                        placeholder="Enter your email"
                        required 
                        autocomplete="username"
                    >
                    <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                    </svg>
                </div>
                @error('email')
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                @enderror
            </div>

            <!-- Password -->
            <div class="form-control">
                <label class="label">
                    <span class="label-text font-medium text-gray-700">Password</span>
                </label>
                <div class="relative">
                    <input 
                        id="password" 
                        type="password" 
                        name="password"
                        class="input input-bordered w-full pl-12 hover:input-primary focus:input-primary transition-all duration-200" 
                        placeholder="Create a strong password"
                        required 
                        autocomplete="new-password"
                    >
                    <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                </div>
                @error('password')
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="form-control">
                <label class="label">
                    <span class="label-text font-medium text-gray-700">Confirm Password</span>
                </label>
                <div class="relative">
                    <input 
                        id="password_confirmation" 
                        type="password" 
                        name="password_confirmation"
                        class="input input-bordered w-full pl-12 hover:input-primary focus:input-primary transition-all duration-200" 
                        placeholder="Confirm your password"
                        required 
                        autocomplete="new-password"
                    >
                    <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                @error('password_confirmation')
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                @enderror
            </div>

            <!-- Terms and Conditions -->
            <div class="form-control">
                <label class="label cursor-pointer justify-start space-x-3">
                    <input type="checkbox" class="checkbox checkbox-primary checkbox-sm" required>
                    <span class="label-text text-gray-600">
                        I agree to the 
                        <a href="#" class="link link-primary">Terms of Service</a> 
                        and 
                        <a href="#" class="link link-primary">Privacy Policy</a>
                    </span>
                </label>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary w-full text-white font-medium">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                </svg>
                Create Account
            </button>
        </form>

        <!-- Divider -->
        <div class="divider text-gray-400">or</div>

        <!-- Login Link -->
        <div class="text-center">
            <p class="text-gray-600">
                Already have an account?
                <a href="{{ route('login') }}" class="link link-primary font-medium hover:link-hover">
                    Sign in instead
                </a>
            </p>
        </div>
    </div>
</x-guest-layout>