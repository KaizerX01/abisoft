<x-guest-layout>
    <div class="space-y-6">
        <!-- Header -->
        <div class="text-center">
            <h2 class="text-3xl font-bold text-gray-900">Welcome Back</h2>
            <p class="text-gray-600 mt-2">Sign in to your account to continue</p>
        </div>

        <!-- Session Status -->
        @if (session('status'))
            <div class="alert alert-success">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('status') }}</span>
            </div>
        @endif

        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf
            
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
                        autofocus 
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
                        placeholder="Enter your password"
                        required 
                        autocomplete="current-password"
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

            <!-- Remember Me & Forgot Password -->
            <div class="flex items-center justify-between">
                <div class="form-control">
                    <label class="label cursor-pointer justify-start space-x-3">
                        <input 
                            id="remember_me" 
                            type="checkbox" 
                            name="remember"
                            class="checkbox checkbox-primary checkbox-sm"
                        >
                        <span class="label-text text-gray-600">Remember me</span>
                    </label>
                </div>
                
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="link link-primary text-sm hover:link-hover">
                        Forgot password?
                    </a>
                @endif
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary w-full text-white font-medium">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                </svg>
                Sign In
            </button>
        </form>

        <!-- Divider -->
        <div class="divider text-gray-400">or</div>

        <!-- Register Link -->
        <div class="text-center">
            <p class="text-gray-600">
                Don't have an account?
                <a href="{{ route('register') }}" class="link link-primary font-medium hover:link-hover">
                    Create one now
                </a>
            </p>
        </div>
    </div>
</x-guest-layout>