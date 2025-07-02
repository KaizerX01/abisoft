<section class="max-w-2xl mx-auto space-y-8">
    <header class="text-center pb-6 border-b border-gray-100">
        <div class="flex items-center justify-center mb-4">
            <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center shadow-lg">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
            </div>
        </div>
        <h2 class="text-3xl font-bold bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">
            {{ __('Profile Information') }}
        </h2>
        <p class="text-gray-500 mt-2 text-lg">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
        @csrf
        @method('patch')
        
        <div class="space-y-6">
            <!-- Name Field -->
            <div class="form-control">
                <label class="label justify-start pb-2">
                    <span class="label-text font-semibold text-gray-700 text-base">
                        {{ __('Full Name') }}
                    </span>
                </label>
                <div class="relative">
                    <input 
                        id="name" 
                        name="name" 
                        type="text" 
                        class="input input-bordered w-full h-14 pl-14 pr-4 bg-white border-2 border-gray-200 hover:border-blue-300 focus:border-blue-500 focus:outline-none transition-all duration-300 text-gray-900 placeholder-gray-400 rounded-xl shadow-sm" 
                        value="{{ old('name', $user->name) }}" 
                        required 
                        autofocus 
                        autocomplete="name"
                        placeholder="Enter your full name"
                    />
                    
                </div>
                @if($errors->get('name'))
                    <label class="label pt-2">
                        <span class="label-text-alt text-red-500 font-medium flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $errors->get('name')[0] }}
                        </span>
                    </label>
                @endif
            </div>

            <!-- Email Field -->
            <div class="form-control">
                <label class="label justify-start pb-2">
                    <span class="label-text font-semibold text-gray-700 text-base">
                        {{ __('Email Address') }}
                    </span>
                </label>
                <div class="relative">
                    <input 
                        id="email" 
                        name="email" 
                        type="email" 
                        class="input input-bordered w-full h-14 pl-14 pr-4 bg-white border-2 border-gray-200 hover:border-blue-300 focus:border-blue-500 focus:outline-none transition-all duration-300 text-gray-900 placeholder-gray-400 rounded-xl shadow-sm" 
                        value="{{ old('email', $user->email) }}" 
                        required 
                        autocomplete="username"
                        placeholder="Enter your email address"
                    />
                </div>
                @if($errors->get('email'))
                    <label class="label pt-2">
                        <span class="label-text-alt text-red-500 font-medium flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $errors->get('email')[0] }}
                        </span>
                    </label>
                @endif
            </div>
        </div>

        <!-- Email Verification Alert -->
        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div class="alert alert-warning shadow-md border-l-4 border-yellow-400 bg-gradient-to-r from-yellow-50 to-amber-50 rounded-xl">
                <div class="flex items-start">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6 text-yellow-600" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.464 0L3.34 16.5c-.77.833.192 2.5 1.732 2.5z" />
                    </svg>
                    <div class="ml-3">
                        <h4 class="font-semibold text-yellow-800">{{ __('Email Verification Required') }}</h4>
                        <p class="text-sm text-yellow-700 mt-1">
                            {{ __('Your email address is unverified.') }}
                            <button form="send-verification" class="btn btn-link btn-sm p-0 h-auto min-h-0 text-yellow-800 hover:text-yellow-900 underline font-medium">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </p>
                    </div>
                </div>
            </div>
            
            @if (session('status') === 'verification-link-sent')
                <div class="alert alert-success shadow-md border-l-4 border-green-400 bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="ml-3 text-green-800 font-medium">{{ __('A new verification link has been sent to your email address.') }}</span>
                    </div>
                </div>
            @endif
        @endif

        <!-- Action Buttons -->
        <div class="flex items-center justify-between pt-6 border-t border-gray-100">
            <button type="submit" class="btn btn-primary h-12 px-8 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 border-none shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 text-white font-semibold rounded-xl">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                {{ __('Save Changes') }}
            </button>
            
            @if (session('status') === 'profile-updated')
                <div class="alert alert-success alert-sm shadow-md bg-gradient-to-r from-green-100 to-emerald-100 border border-green-200 rounded-xl">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="ml-2 text-green-800 font-medium">{{ __('Profile updated successfully!') }}</span>
                    </div>
                </div>
            @endif
        </div>
    </form>
</section>