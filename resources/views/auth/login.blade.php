<x-guest-layout>

    <div class="login-page w-full bg-cover bg-center">

        <img src="/assets/images/login-background.webp" alt="Login background" class="w-full h-full absolute top-0 left-0 z-[-2]">

        <div class="bck-filter w-full h-full bg-black opacity-30 absolute top-0 left-0 z-[-1]"></div>

        <x-slot name="additionnalStyles">
            <link rel="stylesheet" href="/assets/css/form.css">
        </x-slot>

        <div class="mt-20 mb-20 mx-auto w-max">
            <a href="/" class="block">
                <x-application-logo-white class="w-32 p-4 rounded-lg border border-solid border-white" />
            </a>
        </div>
        
        <x-auth-card>            
 
            <h1 class="mb-10 text-3xl text-center">Log in</h1>
    
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />
    
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
    
            <form method="POST" action="{{ route('login') }}" class="mx-auto">
                @csrf
    
                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
    
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                </div>
    
                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
    
                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />
                </div>
    
                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>
    
                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
    
                    <x-primary-button class="ml-3">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
        </x-auth-card>

    </div>


</x-guest-layout>
