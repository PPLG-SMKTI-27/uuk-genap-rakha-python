<x-guest-layout>
    <style>
        .auth-title {
            font-family: 'Syne', sans-serif;
            letter-spacing: 0.04em;
            font-size: clamp(1.35rem, 3.6vw, 1.9rem);
            margin-bottom: 0.25rem;
        }

        .auth-subtitle {
            color: #a1a1aa;
            font-size: 0.8rem;
            margin-bottom: 1.2rem;
        }

        .cyber-label {
            color: #00ff41;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            font-size: 0.76rem;
        }

        .cyber-input {
            width: 100%;
            margin-top: 0.45rem;
            background: rgba(0, 0, 0, 0.65) !important;
            border: 1.5px solid #3f3f46 !important;
            border-radius: 0 !important;
            color: #f4f4f5 !important;
            box-shadow: none !important;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .cyber-input:focus {
            border-color: #00ff41 !important;
            box-shadow: 0 0 0 3px rgba(0, 255, 65, 0.17) !important;
            outline: none !important;
        }

        .cyber-check {
            border-radius: 0 !important;
            border-color: #52525b !important;
            background-color: rgba(0, 0, 0, 0.6) !important;
            color: #00ff41 !important;
        }

        .cyber-check:focus {
            box-shadow: 0 0 0 2px rgba(0, 255, 65, 0.2) !important;
        }

        .auth-link {
            color: #a1a1aa !important;
            text-decoration: none !important;
            border-bottom: 1px dashed #3f3f46;
            transition: 0.2s ease;
        }

        .auth-link:hover {
            color: #00ff41 !important;
            border-color: #00ff41;
        }

        .cyber-btn {
            border-radius: 0 !important;
            background: #00ff41 !important;
            color: #000 !important;
            border: 1px solid #00ff41 !important;
            box-shadow: 4px 4px 0 #ff006e;
            font-family: 'Syne', sans-serif;
            letter-spacing: 0.06em;
            transition: transform 0.15s ease, box-shadow 0.15s ease, background 0.15s ease;
        }

        .cyber-btn:hover {
            background: #00dd38 !important;
            transform: translate(1px, 1px);
            box-shadow: 3px 3px 0 #ff006e;
        }
    </style>

    <div class="mb-4">
        <h1 class="auth-title text-white uppercase">Login System</h1>
        <p class="auth-subtitle">// Secure access for dashboard control</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4 text-sm text-green-400" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="cyber-label" />
            <x-text-input id="email" class="block mt-1 w-full cyber-input" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" class="cyber-label" />

            <x-text-input id="password" class="block mt-1 w-full cyber-input"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="cyber-check rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-zinc-300">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="auth-link text-sm rounded-md focus:outline-none focus:ring-2 focus:ring-offset-0 focus:ring-green-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3 cyber-btn">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
