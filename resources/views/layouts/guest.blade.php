<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Syne:wght@700;800&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            :root {
                --neon-green: #00ff41;
                --neon-pink: #ff006e;
                --panel: rgba(9, 9, 9, 0.92);
            }

            body {
                font-family: 'JetBrains Mono', monospace;
                background: #000;
                background-image: radial-gradient(rgba(0, 255, 65, 0.17) 1px, transparent 1px);
                background-size: 18px 18px;
                color: #f4f4f5;
            }

            .auth-shell {
                min-height: 100vh;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                padding: 1.25rem 0.85rem;
            }

            .auth-logo {
                width: 88px;
                height: 88px;
                color: var(--neon-green);
                filter: drop-shadow(0 0 10px rgba(0, 255, 65, 0.35));
                margin-bottom: 1rem;
            }

            .auth-panel {
                width: 100%;
                max-width: 460px;
                background: var(--panel);
                border: 2px solid var(--neon-green);
                box-shadow: 8px 8px 0 rgba(255, 0, 110, 0.85);
                border-radius: 0;
                padding: 1.3rem 1.1rem;
            }

            @media (min-width: 640px) {
                .auth-panel {
                    padding: 1.8rem 1.5rem;
                }
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="auth-shell">
            <div>
                <a href="/">
                    <x-application-logo class="auth-logo fill-current" />
                </a>
            </div>

            <div class="auth-panel">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
