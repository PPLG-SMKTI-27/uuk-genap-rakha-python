<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard | Rakha')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Space+Mono:wght@400;700&family=JetBrains+Mono:wght@400;600&family=Syne:wght@700;800&display=swap" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --primary-glow: #00ff41;
            --secondary-glow: #ff0055;
            --bg-dark: #040404;
            --panel: rgba(14, 14, 14, 0.92);
            --text-muted: #9ca3af;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'JetBrains Mono', monospace;
            background-color: var(--bg-dark);
            background-image: radial-gradient(rgba(0, 255, 65, 0.13) 1px, transparent 1px);
            background-size: 18px 18px;
            color: #ffffff;
            line-height: 1.6;
            overflow-x: hidden;
        }

        a {
            text-decoration: none;
            color: inherit;
            transition: 0.3s;
        }

        main {
            min-height: calc(100vh - 110px);
            position: relative;
            padding-top: 110px;
        }

        main::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(0, 255, 65, 0.04), transparent 20%);
            opacity: 1;
            pointer-events: none;
            z-index: -1;
        }

        footer {
            background: #000;
            padding: 40px 10%;
            text-align: center;
            border-top: 1px dashed var(--primary-glow);
            color: #666;
            font-family: 'Space Mono', monospace;
        }

        .container { margin-top: 30px; margin-bottom: 30px; }

        .card {
            background: var(--panel);
            border: 1px solid rgba(0, 255, 65, 0.35);
            color: #fff;
            border-radius: 0;
            box-shadow: 6px 6px 0 rgba(255, 0, 85, 0.25);
        }

        .card-header {
            background: rgba(0, 0, 0, 0.55);
            border-bottom: 1px solid rgba(0, 255, 65, 0.3);
        }

        .form-control, .form-control:focus, textarea {
            background: rgba(0, 0, 0, 0.55);
            border: 1px solid rgba(0, 255, 65, 0.5);
            color: #fff;
            border-radius: 0;
        }

        .form-control:focus {
            border-color: var(--primary-glow);
            box-shadow: 0 0 10px rgba(0, 255, 65, 0.3);
            background: rgba(255, 255, 255, 0.08);
        }

        .form-label {
            color: var(--primary-glow);
            font-weight: 600;
        }

        .btn {
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-radius: 0;
            transition: 0.3s;
        }

        .btn-primary {
            background: var(--primary-glow);
            border: 2px solid var(--primary-glow);
            color: #000;
        }

        .btn-primary:hover {
            background: #00dd38;
            box-shadow: 0 0 15px rgba(0, 255, 65, 0.5);
        }

        .btn-secondary {
            background: rgba(255, 0, 85, 0.8);
            border: 2px solid var(--secondary-glow);
            color: #fff;
        }

        .btn-secondary:hover {
            background: var(--secondary-glow);
            box-shadow: 0 0 15px rgba(255, 0, 85, 0.5);
        }

        .btn-danger, .btn-outline-danger {
            background: #dc3545;
            border: 2px solid #dc3545;
            color: #fff;
        }

        .btn-outline-danger {
            background: transparent;
        }

        .btn-danger:hover, .btn-outline-danger:hover {
            background: #c82333;
            border-color: #c82333;
            box-shadow: 0 0 15px rgba(220, 53, 69, 0.5);
        }

        .alert {
            border-radius: 5px;
            border: 1px solid;
        }

        .alert-success {
            background: rgba(40, 167, 69, 0.2);
            border-color: #28a745;
            color: #28a745;
        }

        .alert-danger {
            background: rgba(220, 53, 69, 0.2);
            border-color: #dc3545;
            color: #dc3545;
        }

        .is-invalid {
            border-color: #dc3545;
        }

        .invalid-feedback {
            color: #ff6b6b;
            display: block;
        }

        .neon-text {
            color: var(--primary-glow);
            text-shadow: 0 0 10px rgba(0, 255, 65, 0.5);
        }

        .custom-tab {
            color: var(--text-muted) !important;
            border: 1px solid transparent !important;
            border-bottom: 2px solid transparent !important;
            font-weight: 600;
            transition: 0.3s;
        }

        .custom-tab.active {
            color: var(--primary-glow) !important;
            border-color: var(--primary-glow) !important;
            background: rgba(0, 255, 65, 0.1) !important;
        }

        .custom-tab:hover {
            color: var(--primary-glow) !important;
        }

        .header-hidden {
            transform: translateY(-100%);
            transition: transform 0.28s ease;
        }

        @media (max-width: 768px) {
            main {
                padding-top: 92px;
            }
        }

        @yield('styles')
    </style>
</head>
<body>

@include('components.navbar')

<main>
    @yield('dashboard-content')
</main>

@yield('footer')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script>
    let lastScrollTop = 0;
    const header = document.querySelector('header');
    const scrollThreshold = 10;

    window.addEventListener('scroll', () => {
        let currentScroll = window.pageYOffset || document.documentElement.scrollTop;

        if (Math.abs(lastScrollTop - currentScroll) <= scrollThreshold) return;

        if (currentScroll > lastScrollTop && currentScroll > 100) {
            header.classList.add('header-hidden');
        } else {
            header.classList.remove('header-hidden');
        }

        lastScrollTop = currentScroll <= 0 ? 0 : currentScroll; 
    }, { passive: true });
</script>

@stack('scripts')

</body>
</html>
