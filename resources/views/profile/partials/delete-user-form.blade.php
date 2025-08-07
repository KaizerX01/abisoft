<section class="max-w-2xl mx-auto space-y-8 py-8">
    <header class="text-center pb-6 border-b border-gray-200">
        <div class="flex items-center justify-center mb-4">
            <div class="w-14 h-14 bg-gradient-to-br from-red-600 to-rose-700 rounded-full flex items-center justify-center shadow-lg">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.464 0L3.34 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                </svg>
            </div>
        </div>
        <h2 class="text-3xl font-bold bg-gradient-to-r from-red-600 to-rose-700 bg-clip-text text-transparent">
            Supprimer le compte
        </h2>
        <p class="text-gray-500 mt-2 text-base">
            Supprimez définitivement votre compte et toutes les données associées.
        </p>
    </header>

    <!-- Warning Information -->
    <div class="bg-white border border-gray-100 rounded-xl p-6 shadow-sm hover:shadow-md transition-shadow duration-300">
        <div class="flex items-start space-x-4">
            <div class="w-10 h-10 bg-gradient-to-br from-red-600 to-rose-700 rounded-lg flex items-center justify-center flex-shrink-0">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.464 0L3.34 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                </svg>
            </div>
            <div class="flex-1">
                <h4 class="font-semibold text-red-900 text-lg mb-3">⚠️ Avertissement important</h4>
                <div class="space-y-2 text-sm text-gray-600">
                    <p class="font-medium">Une fois votre compte supprimé, toutes ses ressources et données seront définitivement effacées.</p>
                    <p>Veuillez télécharger toutes les données ou informations que vous souhaitez conserver avant de supprimer votre compte.</p>
                </div>
                <div class="mt-4 p-4 bg-red-50 rounded-lg border border-red-100">
                    <h5 class="font-semibold text-red-900 mb-2 text-sm">Ce qui sera supprimé :</h5>
                    <ul class="text-xs text-gray-600 space-y-1">
                        <li class="flex items-center">
                            <svg class="w-3 h-3 mr-2 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                            Vos informations de profil et paramètres
                        </li>
                        <li class="flex items-center">
                            <svg class="w-3 h-3 mr-2 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                            Tout votre contenu et fichiers téléchargés
                        </li>
                        <li class="flex items-center">
                            <svg class="w-3 h-3 mr-2 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                            Historique du compte et journaux d'activité
                        </li>
                        <li class="flex items-center">
                            <svg class="w-3 h-3 mr-2 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                            Accès à tous les services associés
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Account Button -->
    <div class="flex justify-center pt-4">
        <button
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
            class="btn h-12 px-8 bg-gradient-to-r from-red-600 to-rose-700 hover:from-red-700 hover:to-rose-800 border-none shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 text-white font-semibold rounded-lg"
        >
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
            </svg>
            Supprimer le compte
        </button>
    </div>

    <!-- Enhanced Modal -->
    <div x-data="{ show: false }" x-on:open-modal.window="$event.detail == 'confirm-user-deletion' ? show = true : null" x-on:close.stop="show = false" x-on:keydown.escape.window="show = false" x-show="show" class="fixed inset-0 overflow-y-auto px-4 py-6 sm:px-0 z-50" style="display: none;">
        <div x-show="show" class="fixed inset-0 transform transition-all" x-on:click="show = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
            <div class="absolute inset-0 bg-gray-500 opacity-75 backdrop-blur-sm"></div>
        </div>

        <div x-show="show" class="mb-6 bg-white rounded-xl overflow-hidden shadow-xl transform transition-all sm:w-full sm:max-w-lg sm:mx-auto" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
            <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                @csrf
                @method('delete')
                
                <!-- Modal Header -->
                <div class="text-center mb-6">
                    <div class="w-14 h-14 bg-gradient-to-br from-red-600 to-rose-700 rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.464 0L3.34 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-2">
                        Êtes-vous sûr de vouloir supprimer votre compte ?
                    </h2>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Une fois votre compte supprimé, toutes ses ressources et données seront définitivement effacées. Veuillez entrer votre mot de passe pour confirmer la suppression définitive de votre compte.
                    </p>
                </div>

                <!-- Password Input -->
                <div class="mb-6">
                    <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                        Entrez votre mot de passe pour confirmer
                    </label>
                    <div class="relative">
                        <input
                            id="password"
                            name="password"
                            type="password"
                            class="input input-bordered w-full h-12 pl-12 pr-4 bg-white border-gray-200 hover:border-red-400 focus:border-red-500 focus:ring-2 focus:ring-red-100 transition-all duration-300 text-gray-900 placeholder-gray-400 rounded-lg shadow-sm"
                            placeholder="Mot de passe"
                            required
                        />
                        <div class="absolute left-3 top-1/2 transform -translate-y-1/2">
                            <svg class="h-5 w-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                    </div>
                    @if($errors->userDeletion->get('password'))
                        <p class="mt-2 text-sm text-red-600 font-medium">
                            <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $errors->userDeletion->get('password')[0] }}
                        </p>
                    @endif
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col-reverse sm:flex-row sm:justify-end space-y-3 space-y-reverse sm:space-y-0 sm:space-x-3">
                    <button type="button" x-on:click="show = false" class="btn h-12 px-6 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold rounded-lg transition-all duration-300">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        Annuler
                    </button>
                    <button type="submit" class="btn h-12 px-6 bg-gradient-to-r from-red-600 to-rose-700 hover:from-red-700 hover:to-rose-800 border-none shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 text-white font-semibold rounded-lg">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                        Supprimer le compte
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>