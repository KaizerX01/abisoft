<section class="max-w-2xl mx-auto space-y-8 py-8">
    <header class="text-center pb-6 border-b border-gray-200">
        <div class="flex items-center justify-center mb-4">
            <div class="w-14 h-14 bg-gradient-to-br from-emerald-500 to-green-600 rounded-full flex items-center justify-center shadow-lg">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                </svg>
            </div>
        </div>
        <h2 class="text-3xl font-bold bg-gradient-to-r from-gray-900 to-emerald-700 bg-clip-text text-transparent">
            Mettre à jour le mot de passe
        </h2>
        <p class="text-gray-500 mt-2 text-base">
            Assurez-vous que votre compte utilise un mot de passe long et aléatoire pour rester sécurisé.
        </p>
    </header>

    <!-- Enhanced Password Security Tips -->
    <div class="bg-white border border-gray-100 rounded-xl p-6 shadow-sm hover:shadow-md transition-shadow duration-300">
        <div class="flex items-start space-x-4">
            <div class="w-10 h-10 bg-gradient-to-br from-emerald-500 to-green-600 rounded-lg flex items-center justify-center flex-shrink-0">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <div class="flex-1">
                <h4 class="font-semibold text-emerald-900 text-lg mb-3">Conseils pour la sécurité du mot de passe</h4>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-sm text-gray-600">
                    <div class="flex items-center space-x-2">
                        <svg class="w-4 h-4 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span>Au moins 8 caractères</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <svg class="w-4 h-4 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span>Mélange de majuscules et minuscules</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <svg class="w-4 h-4 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span>Inclure des chiffres et symboles</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <svg class="w-4 h-4 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span>Éviter les informations personnelles</span>
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
                    Mot de passe actuel
                </span>
            </label>
            <div class="relative">
                <input 
                    id="update_password_current_password" 
                    name="current_password" 
                    type="password" 
                    class="input input-bordered w-full h-12 pl-12 pr-4 bg-white border-gray-200 hover:border-emerald-300 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 transition-all duration-300 text-gray-900 placeholder-gray-400 rounded-lg shadow-sm" 
                    autocomplete="current-password"
                    placeholder="Entrez votre mot de passe actuel"
                />
                <div class="absolute left-3 top-1/2 transform -translate-y-1/2">
                    <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                </div>
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

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <!-- New Password -->
            <div class="form-control">
                <label class="label justify-start pb-2">
                    <span class="label-text font-semibold text-gray-700 text-base">
                        Nouveau mot de passe
                    </span>
                </label>
                <div class="relative">
                    <input 
                        id="update_password_password" 
                        name="password" 
                        type="password" 
                        class="input input-bordered w-full h-12 pl-12 pr-4 bg-white border-gray-200 hover:border-emerald-300 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 transition-all duration-300 text-gray-900 placeholder-gray-400 rounded-lg shadow-sm" 
                        autocomplete="new-password"
                        placeholder="Entrez le nouveau mot de passe"
                    />
                    <div class="absolute left-3 top-1/2 transform -translate-y-1/2">
                        <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
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
                        Confirmer le mot de passe
                    </span>
                </label>
                <div class="relative">
                    <input 
                        id="update_password_password_confirmation" 
                        name="password_confirmation" 
                        type="password" 
                        class="input input-bordered w-full h-12 pl-12 pr-4 bg-white border-gray-200 hover:border-emerald-300 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 transition-all duration-300 text-gray-900 placeholder-gray-400 rounded-lg shadow-sm" 
                        autocomplete="new-password"
                        placeholder="Confirmez le nouveau mot de passe"
                    />
                    <div class="absolute left-3 top-1/2 transform -translate-y-1/2">
                        <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
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
            <button type="submit" class="btn h-12 px-8 bg-gradient-to-r from-emerald-600 to-green-600 hover:from-emerald-700 hover:to-green-700 border-none shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 text-white font-semibold rounded-lg">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                Mettre à jour le mot de passe
            </button>

            @if (session('status') === 'password-updated')
                <div class="alert alert-success alert-sm shadow-md bg-emerald-50 border border-emerald-200 rounded-lg">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-5 w-5 text-emerald-600" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="ml-2 text-emerald-800 font-medium">Mot de passe mis à jour avec succès !</span>
                    </div>
                </div>
            @endif
        </div>
    </form>
</section>