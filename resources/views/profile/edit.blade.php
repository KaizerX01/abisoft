<x-app-layout>
    <div class="py-10">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Profile Header Card -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6 mb-10 backdrop-blur-sm">
                <div class="flex items-center space-x-6">
                    <div class="w-20 h-20 bg-gradient-to-br from-indigo-600 to-purple-700 rounded-full flex items-center justify-center shadow-md">
                        <span class="text-3xl font-bold text-white">
                            {{ substr(auth()->user()->name, 0, 1) }}
                        </span>
                    </div>
                    <div>
                        <h3 class="text-2xl font-semibold text-gray-900">{{ auth()->user()->name }}</h3>
                        <p class="text-gray-600 text-base">{{ auth()->user()->email }}</p>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-emerald-100 text-emerald-800 mt-2 shadow-sm">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            Compte Actif
                        </span>
                    </div>
                </div>
            </div>

            <!-- Tabs Navigation -->
            <div class="tabs tabs-lifted mb-8">
                <!-- Tab 1: Profile Information -->
                <input type="radio" name="profile_tabs" role="tab"
                    class="tab text-base font-semibold border border-gray-200 rounded-t-lg shadow-sm
                        bg-gradient-to-r from-indigo-500 to-purple-600 text-white
                        hover:from-indigo-600 hover:to-purple-700
                        checked:from-indigo-600 checked:to-purple-700 checked:shadow-md
                        transition-all duration-300 px-6 py-3"
                    aria-label="Informations du Profil" checked />
                <div role="tabpanel" class="tab-content bg-white border border-gray-100 rounded-xl p-6 shadow-sm">
                    @include('profile.partials.update-profile-information-form')
                </div>

                <!-- Tab 2: Security -->
                <input type="radio" name="profile_tabs" role="tab"
                    class="tab text-base font-semibold border border-gray-200 rounded-t-lg shadow-sm
                        bg-gradient-to-r from-emerald-500 to-green-600 text-white
                        hover:from-emerald-600 hover:to-green-700
                        checked:from-emerald-600 checked:to-green-700 checked:shadow-md
                        transition-all duration-300 px-6 py-3"
                    aria-label="Sécurité" />
                <div role="tabpanel" class="tab-content bg-white border border-gray-100 rounded-xl p-6 shadow-sm">
                    @include('profile.partials.update-password-form')
                </div>

                <!-- Tab 3: Danger Zone -->
                <input type="radio" name="profile_tabs" role="tab"
                    class="tab text-base font-semibold border border-gray-200 rounded-t-lg shadow-sm
                        bg-gradient-to-r from-red-500 to-rose-600 text-white
                        hover:from-red-600 hover:to-rose-700
                        checked:from-red-600 checked:to-rose-700 checked:shadow-md
                        transition-all duration-300 px-6 py-3"
                    aria-label="Zone de Danger" />
                <div role="tabpanel" class="tab-content bg-white border border-gray-100 rounded-xl p-6 shadow-sm">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>