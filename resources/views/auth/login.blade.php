<x-guest-layout>
<div class="space-y-8">
    <!-- Header -->
    <div class="text-center">
        <h2 class="text-4xl font-bold text-white tracking-tight">Bienvenue à Nouveau</h2>
        <p class="text-gray-400 mt-3 text-lg">Connectez-vous à votre compte pour continuer</p>
    </div>

    <!-- Session Status -->
    @if (session('status'))
        <div class="alert bg-green-500/20 border border-green-500/50 text-green-100 rounded-xl flex items-center gap-3 p-4 animate-fade-in">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>{{ session('status') }}</span>
        </div>
    @endif

    <!-- Login Form -->
    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf
        
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
                    autofocus 
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
                    placeholder="Entrez votre mot de passe"
                    required 
                    autocomplete="current-password"
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

        <!-- Remember Me & Forgot Password -->
        <div class="flex items-center justify-between">
            <div class="form-control">
                <label class="label cursor-pointer justify-start space-x-3">
                    <input 
                        id="remember_me" 
                        type="checkbox" 
                        name="remember"
                        class="checkbox checkbox-primary checkbox-sm border-gray-500 checked:bg-indigo-500"
                    >
                    <span class="label-text text-gray-400">Se souvenir de moi</span>
                </label>
            </div>
            
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="link text-sm text-indigo-400 hover:text-indigo-300 transition-colors duration-300">
                    Mot de passe oublié ?
                </a>
            @endif
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn w-full bg-indigo-600 text-white font-semibold rounded-xl hover:bg-indigo-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
            </svg>
            Se Connecter
        </button>
    </form>

    <!-- Divider -->
    <div class="divider text-gray-400 before:bg-gray-700 after:bg-gray-700">ou</div>

    <!-- Register Link -->
    <div class="text-center">
        <p class="text-gray-400">
            Vous n'avez pas de compte ?
            <a href="{{ route('register') }}" class="link font-semibold text-indigo-400 hover:text-indigo-300 transition-colors duration-300">
                Créez-en un maintenant
            </a>
        </p>
    </div>
</div>
</x-guest-layout>