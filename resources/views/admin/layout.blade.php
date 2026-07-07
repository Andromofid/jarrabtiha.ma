<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin') - {{ config('app.name', 'Jarrabtiha') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="min-h-screen bg-cream text-brown font-sans antialiased">
    <div class="relative isolate overflow-hidden">
        <div class="absolute inset-x-0 top-0 -z-10 h-[26rem] bg-[radial-gradient(circle_at_top,_rgba(201,149,108,0.18),_transparent_55%)]"></div>

        <main class="mx-auto max-w-7xl px-4 py-8 sm:px-6 sm:py-10 lg:px-8">
            <section class="mb-8 rounded-card border border-border bg-white/90 p-6 shadow-soft backdrop-blur sm:p-8">
                <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
                    <div>
                        <p class="text-sm font-semibold uppercase tracking-[0.28em] text-primary">Admin workspace</p>
                        <h1 class="mt-3 font-display text-4xl font-bold text-brown sm:text-5xl">Catalog management</h1>
                        <p class="mt-3 max-w-2xl text-sm text-brown-soft sm:text-base">
                            Update products and categories with the same visual system used across the live site.
                        </p>
                    </div>

                    <nav class="flex flex-wrap gap-3">
                        <a
                            href="{{ route('admin.products.index') }}"
                            class="{{ request()->routeIs('admin.products.*') ? 'bg-primary text-white shadow-soft' : 'border border-border bg-white text-brown hover:border-primary/30 hover:text-primary' }} rounded-pill px-5 py-3 text-sm font-semibold transition">
                            Products
                        </a>
                        <a
                            href="{{ route('admin.categories.index') }}"
                            class="{{ request()->routeIs('admin.categories.*') ? 'bg-primary text-white shadow-soft' : 'border border-border bg-white text-brown hover:border-primary/30 hover:text-primary' }} rounded-pill px-5 py-3 text-sm font-semibold transition">
                            Categories
                        </a>
                        <a
                            href="{{ route('admin.users.index') }}"
                            class="{{ request()->routeIs('admin.users.*') ? 'bg-primary text-white shadow-soft' : 'border border-border bg-white text-brown hover:border-primary/30 hover:text-primary' }} rounded-pill px-5 py-3 text-sm font-semibold transition">
                            Users
                        </a>
                    </nav>
                </div>
            </section>

            @if (session('success'))
                <div class="mb-6 rounded-2xl border border-success/30 bg-success-soft px-5 py-4 text-sm font-medium text-brown shadow-soft">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-6 rounded-2xl border border-danger/30 bg-danger-soft px-5 py-4 shadow-soft">
                    <p class="text-sm font-semibold text-brown">Please fix the following errors:</p>
                    <ul class="mt-3 space-y-1 text-sm text-brown-soft">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</body>

</html>
