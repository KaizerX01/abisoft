<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-4">
            <div class="w-12 h-12 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-gray-900">{{ __('Profile Settings') }}</h2>
                <p class="text-gray-600 text-sm">Manage your account settings and preferences</p>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Profile Header Card -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 mb-8">
                <div class="flex items-center space-x-6">
                    <div class="w-20 h-20 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-2xl flex items-center justify-center">
                        <span class="text-2xl font-bold text-white">
                            {{ substr(auth()->user()->name, 0, 1) }}
                        </span>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900">{{ auth()->user()->name }}</h3>
                        <p class="text-gray-600">{{ auth()->user()->email }}</p>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 mt-2">
                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            Active Account
                        </span>
                    </div>
                </div>
            </div>

            <!-- Tabs Navigation -->
            <div class="tabs tabs-lifted mb-6">
                <input type="radio" name="profile_tabs" role="tab" class="tab" aria-label="Profile Info" checked />
                <div role="tabpanel" class="tab-content bg-white border-base-300 rounded-2xl p-8">
                    @include('profile.partials.update-profile-information-form')
                </div>

                <input type="radio" name="profile_tabs" role="tab" class="tab" aria-label="Security" />
                <div role="tabpanel" class="tab-content bg-white border-base-300 rounded-2xl p-8">
                    @include('profile.partials.update-password-form')
                </div>

                <input type="radio" name="profile_tabs" role="tab" class="tab" aria-label="Danger Zone" />
                <div role="tabpanel" class="tab-content bg-white border-base-300 rounded-2xl p-8">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>