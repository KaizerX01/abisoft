<section class="max-w-2xl mx-auto space-y-8">
    <header class="text-center pb-6 border-b border-gray-100">
        <div class="flex items-center justify-center mb-4">
            <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl flex items-center justify-center shadow-lg">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                </svg>
            </div>
        </div>
        <h2 class="text-3xl font-bold bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">
            {{ __('Update Password') }}
        </h2>
        <p class="text-gray-500 mt-2 text-lg">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <!-- Enhanced Password Security Tips -->
    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 border-2 border-blue-200 rounded-2xl p-6 shadow-sm">
        <div class="flex items-start space-x-4">
            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center flex-shrink-0">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <div class="flex-1">
                <h4 class="font-bold text-blue-900 text-lg mb-3">Password Security Guidelines</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                    <div class="flex items-center space-x-2">
                        <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-sm text-blue-800">At least 8 characters long</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-sm text-blue-800">Mix of upper & lowercase</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-sm text-blue-800">Include numbers & symbols</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-sm text-blue-800">Avoid personal information</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form method="post" action="{{ route('password.update') }}" class="space-y-6">
        @csrf
        @method('put')
        
        <!-- Current Password -->
        <div class="form-control">
            <label class="label justify-start pb-2">
                <span class="label-text font-semibold text-gray-700 text-base">
                    {{ __('Current Password') }}
                </span>
            </label>
            <div class="relative">
                <input 
                    id="update_password_current_password" 
                    name="current_password" 
                    type="password" 
                    class="input input-bordered w-full h-14 pl-14 pr-4 bg-white border-2 border-gray-200 hover:border-green-300 focus:border-green-500 focus:outline-none transition-all duration-300 text-gray-900 placeholder-gray-400 rounded-xl shadow-sm" 
                    autocomplete="current-password"
                    placeholder="Enter your current password"
                />
                
            </div>
            @if($errors->updatePassword->get('current_password'))
                <label class="label pt-2">
                    <span class="label-text-alt text-red-500 font-medium flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                        </svg>
                        {{ $errors->updatePassword->get('current_password')[0] }}
                    </span>
                </label>
            @endif
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- New Password -->
            <div class="form-control">
                <label class="label justify-start pb-2">
                    <span class="label-text font-semibold text-gray-700 text-base">
                        {{ __('New Password') }}
                    </span>
                </label>
                <div class="relative">
                    <input 
                        id="update_password_password" 
                        name="password" 
                        type="password" 
                        class="input input-bordered w-full h-14 pl-14 pr-4 bg-white border-2 border-gray-200 hover:border-green-300 focus:border-green-500 focus:outline-none transition-all duration-300 text-gray-900 placeholder-gray-400 rounded-xl shadow-sm" 
                        autocomplete="new-password"
                        placeholder="Enter new password"
                    />
                    
                </div>
                @if($errors->updatePassword->get('password'))
                    <label class="label pt-2">
                        <span class="label-text-alt text-red-500 font-medium flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $errors->updatePassword->get('password')[0] }}
                        </span>
                    </label>
                @endif
            </div>

            <!-- Confirm Password -->
            <div class="form-control">
                <label class="label justify-start pb-2">
                    <span class="label-text font-semibold text-gray-700 text-base">
                        {{ __('Confirm Password') }}
                    </span>
                </label>
                <div class="relative">
                    <input 
                        id="update_password_password_confirmation" 
                        name="password_confirmation" 
                        type="password" 
                        class="input input-bordered w-full h-14 pl-14 pr-4 bg-white border-2 border-gray-200 hover:border-green-300 focus:border-green-500 focus:outline-none transition-all duration-300 text-gray-900 placeholder-gray-400 rounded-xl shadow-sm" 
                        autocomplete="new-password"
                        placeholder="Confirm new password"
                    />
                    
                </div>
                @if($errors->updatePassword->get('password_confirmation'))
                    <label class="label pt-2">
                        <span class="label-text-alt text-red-500 font-medium flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $errors->updatePassword->get('password_confirmation')[0] }}
                        </span>
                    </label>
                @endif
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex items-center justify-between pt-6 border-t border-gray-100">
            <button type="submit" class="btn btn-primary h-12 px-8 bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 border-none shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 text-white font-semibold rounded-xl">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                {{ __('Update Password') }}
            </button>

            @if (session('status') === 'password-updated')
                <div class="alert alert-success alert-sm shadow-md bg-gradient-to-r from-green-100 to-emerald-100 border border-green-200 rounded-xl">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="ml-2 text-green-800 font-medium">{{ __('Password updated successfully!') }}</span>
                    </div>
                </div>
            @endif
        </div>
    </form>
</section>