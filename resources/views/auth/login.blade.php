<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="min-h-screen flex flex-col items-center justify-center bg-gradient-to-br from-gray-50 to-gray-100 p-4 sm:p-8">
        <!-- Branding with Responsive Image Logo -->
        <div class="text-center mb-4 sm:mb-8 animate-fade-in-down w-full max-w-xs sm:max-w-sm">
            <!-- Responsive Image Logo -->
            <div class="flex justify-center mb-2 sm:mb-3">
                <img src="{{ asset('image/kamoa_logo1.png') }}" 
                     alt="Logo KAMOA" 
                     class="w-auto h-auto max-h-16 sm:max-h-20 md:max-h-24 lg:max-h-28 object-contain transition-transform duration-300 hover:scale-105"
                     style="width: clamp(120px, 40vw, 200px); height: auto;">
            </div>
            <h1 class="text-xl sm:text-2xl md:text-3xl font-bold text-red-600">Système de Paie KAMOA</h1>
            <p class="text-xs sm:text-sm text-gray-500 mt-1">Accès sécurisé au système</p>
        </div>

        <!-- Responsive Login Form -->
        <div class="w-full max-w-xs sm:max-w-sm md:max-w-md bg-white rounded-xl shadow-lg p-4 sm:p-6 md:p-8 animate-fade-in-up">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Matricule Input -->
                <div class="mb-4 sm:mb-5">
                    <label for="matricule" class="block text-sm sm:text-base font-medium text-gray-700 mb-1 sm:mb-1.5">Matricule</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-4 w-4 sm:h-5 sm:w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input id="matricule" 
                               type="text" 
                               name="matricule" 
                               value="{{ old('matricule') }}" 
                               required 
                               autofocus 
                               autocomplete="username"
                               class="block w-full pl-8 sm:pl-10 pr-3 py-2 sm:py-2.5 rounded-lg border border-gray-300 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 text-sm sm:text-base transition duration-200"
                               placeholder="Votre numéro de matricule">
                    </div>
                    @error('matricule')
                        <p class="mt-1 text-xs sm:text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Input -->
                <div class="mb-4 sm:mb-5">
                    <label for="password" class="block text-sm sm:text-base font-medium text-gray-700 mb-1 sm:mb-1.5">Mot de passe</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-4 w-4 sm:h-5 sm:w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        <input id="password" 
                               type="password" 
                               name="password" 
                               required 
                               autocomplete="current-password"
                               class="block w-full pl-8 sm:pl-10 pr-3 py-2 sm:py-2.5 rounded-lg border border-gray-300 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 text-sm sm:text-base transition duration-200"
                               placeholder="Votre mot de passe">
                    </div>
                    @error('password')
                        <p class="mt-1 text-xs sm:text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between mb-4 sm:mb-6">
                    <div class="flex items-center">
                        <input id="remember_me" 
                               name="remember" 
                               type="checkbox" 
                               class="h-3 w-3 sm:h-4 sm:w-4 text-red-600 focus:ring-red-500 border-gray-300 rounded">
                        <label for="remember_me" class="ml-2 block text-xs sm:text-sm text-gray-700">Se souvenir de moi</label>
                    </div>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-xs sm:text-sm text-red-600 hover:text-red-800 hover:underline transition duration-150">
                            Mot de passe oublié?
                        </a>
                    @endif
                </div>

                <!-- Submit Button -->
                <button type="submit" 
                        class="w-full flex justify-center items-center bg-red-600 hover:bg-red-700 text-white font-medium py-2 sm:py-2.5 px-4 rounded-lg transition duration-200 transform hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50 shadow-md active:translate-y-0 text-sm sm:text-base">
                    <svg class="h-4 w-4 sm:h-5 sm:w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                    </svg>
                    Se connecter
                </button>
            </form>
        </div>

        <!-- Footer/Version -->
        <div class="mt-4 sm:mt-8 text-center animate-fade-in-down">
            <p class="text-xs text-gray-500">© {{ date('Y') }} KAMOA - v1.0.0</p>
        </div>
    </div>

    <!-- Animations -->
    <style>
        .animate-fade-in-down {
            animation: fadeInDown 0.6s ease-out forwards;
        }
        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease-out forwards;
        }
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-12px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(12px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</x-guest-layout>