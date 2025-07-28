<x-guest-layout>
<div class="space-y-8">
    <!-- Header -->
    <div class="text-center">
        <h2 class="text-4xl font-bold text-white tracking-tight">Créer un Compte</h2>
        <p class="text-gray-400 mt-3 text-lg">Rejoignez-nous et commencez votre voyage dès aujourd'hui</p>
    </div>

    <!-- Registration Form -->
    <form method="POST" action="{{ route('register') }}" class="space-y-6">
        @csrf
        
        <!-- Full Name -->
        <div class="form-control">
            <label class="label">
                <span class="label-text font-semibold text-gray-200">Nom Complet</span>
            </label>
            <div class="relative">
                <input 
                    id="name" 
                    type="text" 
                    name="name" 
                    value="{{ old('name') }}"
                    class="input w-full pl-12 pr-4 py-3 bg-slate-900/50 border border-slate-700/50 rounded-xl text-white placeholder-gray-500 focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-300 hover:bg-slate-800/50 shadow-sm"
                    placeholder="Entrez votre nom complet"
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
                    <span class="label-text-alt text-red-400">{{ $message }}</span>
                </label>
            @enderror
        </div>

        <!-- Email Address -->
        <div class="form-control">
            <label class="label">
                <span class="label-text font-semibold text-gray-200">Adresse Email</span>
            </label>
            <div class="relative">
                <input 
                    id="email" 
                    type="email" 
                    name="email" 
                    value="{{ old('email') }}"
                    class="input w-full pl-12 pr-4 py-3 bg-slate-900/50 border border-slate-700/50 rounded-xl text-white placeholder-gray-500 focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-300 hover:bg-slate-800/50 shadow-sm"
                    placeholder="Entrez votre email"
                    required 
                    autocomplete="username"
                >
                <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                </svg>
            </div>
            @error('email')
                <label class="label">
                    <span class="label-text-alt text-red-400">{{ $message }}</span>
                </label>
            @enderror
        </div>

        <!-- Password -->
        <div class="form-control">
            <label class="label">
                <span class="label-text font-semibold text-gray-200">Mot de Passe</span>
            </label>
            <div class="relative">
                <input 
                    id="password" 
                    type="password" 
                    name="password"
                    class="input w-full pl-12 pr-4 py-3 bg-slate-900/50 border border-slate-700/50 rounded-xl text-white placeholder-gray-500 focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-300 hover:bg-slate-800/50 shadow-sm"
                    placeholder="Créez un mot de passe sécurisé"
                    required 
                    autocomplete="new-password"
                >
                <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                </svg>
            </div>
            @error('password')
                <label class="label">
                    <span class="label-text-alt text-red-400">{{ $message }}</span>
                </label>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="form-control">
            <label class="label">
                <span class="label-text font-semibold text-gray-200">Confirmer le Mot de Passe</span>
            </label>
            <div class="relative">
                <input 
                    id="password_confirmation" 
                    type="password" 
                    name="password_confirmation"
                    class="input w-full pl-12 pr-4 py-3 bg-slate-900/50 border border-slate-700/50 rounded-xl text-white placeholder-gray-500 focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-300 hover:bg-slate-800/50 shadow-sm"
                    placeholder="Confirmez votre mot de passe"
                    required 
                    autocomplete="new-password"
                >
                <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            @error('password_confirmation')
                <label class="label">
                    <span class="label-text-alt text-red-400">{{ $message }}</span>
                </label>
            @enderror
        </div>

        <!-- Terms and Conditions -->
        <div class="form-control">
            <label class="label cursor-pointer justify-start space-x-3">
                <input type="checkbox" class="checkbox checkbox-primary checkbox-sm border-gray-500 checked:bg-indigo-500" required>
                <span class="label-text text-gray-400">
                    J'accepte les 
                    <a href="#" class="link text-indigo-400 hover:text-indigo-300 transition-colors duration-300">Conditions d'Utilisation</a> 
                </span>
            </label>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn w-full bg-indigo-600 text-white font-semibold rounded-xl hover:bg-indigo-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
            </svg>
            Créer un Compte
        </button>
    </form>

    <!-- Divider -->
    <div class="divider text-gray-400 before:bg-gray-700 after:bg-gray-700">ou</div>

    <!-- Login Link -->
    <div class="text-center">
        <p class="text-gray-400">
            Vous avez déjà un compte ?
            <a href="{{ route('login') }}" class="link font-semibold text-indigo-400 hover:text-indigo-300 transition-colors duration-300">
                Connectez-vous à la place
            </a>
        </p>
    </div>
</div>
</x-guest-layout>