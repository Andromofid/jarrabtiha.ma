<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Login - {{ config('app.name', 'Jarrabtiha') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-cream font-sans text-brown antialiased">
    <div class="relative isolate flex min-h-screen items-center justify-center overflow-hidden px-6 py-12">
        <div class="absolute inset-x-0 top-0 -z-10 h-[28rem] bg-[radial-gradient(circle_at_top,_rgba(201,149,108,0.22),_transparent_55%)]"></div>

        <div class="grid w-full max-w-6xl gap-8 lg:grid-cols-[1.05fr_0.95fr] lg:items-center">
            <section class="hidden rounded-card border border-border bg-white/70 p-8 shadow-soft backdrop-blur lg:block xl:p-10">
                <p class="text-sm font-semibold uppercase tracking-[0.28em] text-primary">Admin access</p>
                <h1 class="mt-4 font-display text-5xl font-bold leading-tight text-brown">
                    Manage products, categories, and user activity in one place.
                </h1>
                <p class="mt-5 max-w-xl text-base leading-7 text-brown-soft">
                    Use the admin workspace to keep the catalog organized, review community activity, and maintain a polished experience across the site.
                </p>

                <div class="mt-8 grid gap-4 sm:grid-cols-3">
                    <div class="rounded-2xl border border-border bg-cream px-5 py-4">
                        <p class="text-xs uppercase tracking-[0.18em] text-brown-light">Catalog</p>
                        <p class="mt-2 text-sm font-semibold text-brown">Products and categories</p>
                    </div>
                    <div class="rounded-2xl border border-border bg-cream px-5 py-4">
                        <p class="text-xs uppercase tracking-[0.18em] text-brown-light">Community</p>
                        <p class="mt-2 text-sm font-semibold text-brown">Users and reviews</p>
                    </div>
                    <div class="rounded-2xl border border-border bg-cream px-5 py-4">
                        <p class="text-xs uppercase tracking-[0.18em] text-brown-light">Control</p>
                        <p class="mt-2 text-sm font-semibold text-brown">Approval and moderation</p>
                    </div>
                </div>
            </section>

            <section class="overflow-hidden rounded-card border border-border bg-white shadow-card">
                <div class="p-8 sm:p-10">
                    <div class="mb-8 text-center">
                        <a href="{{ url('/') }}" class="inline-flex justify-center">
                            <img
                                src="{{ asset('logo.png') }}"
                                alt="Jarrabtiha"
                                class="h-20 w-auto transition duration-300 hover:scale-105">
                        </a>
                        <p class="mt-6 text-sm font-semibold uppercase tracking-[0.24em] text-primary">Admin sign in</p>
                        <h2 class="mt-2 font-display text-4xl font-bold text-brown">Welcome back</h2>
                        <p class="mt-3 text-sm text-brown-soft">
                            Sign in with your admin account to access the management dashboard.
                        </p>
                    </div>

                    @if (session('status'))
                        <div class="mb-5 rounded-2xl border border-success/30 bg-success-soft px-4 py-3 text-sm text-brown shadow-soft">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="mb-5 rounded-2xl border border-danger/30 bg-danger-soft px-4 py-3 text-sm text-brown shadow-soft">
                            <p class="font-semibold">Please check your credentials.</p>
                            <ul class="mt-2 space-y-1 text-brown-soft">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.login.store') }}" class="space-y-6">
                        @csrf

                        <div>
                            <label for="email" class="mb-2 block text-sm font-semibold text-brown">Email address</label>
                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autofocus
                                class="w-full rounded-2xl border border-border bg-cream px-5 py-3 text-sm text-brown placeholder:text-brown-light outline-none transition focus:border-primary focus:ring-0">
                        </div>

                        <div>
                            <label for="password" class="mb-2 block text-sm font-semibold text-brown">Password</label>
                            <input
                                id="password"
                                type="password"
                                name="password"
                                required
                                class="w-full rounded-2xl border border-border bg-cream px-5 py-3 text-sm text-brown placeholder:text-brown-light outline-none transition focus:border-primary focus:ring-0">
                        </div>

                        <label class="flex items-center gap-3 text-sm text-brown-soft">
                            <input
                                type="checkbox"
                                name="remember"
                                class="rounded border-border text-primary focus:ring-primary">
                            Remember this device
                        </label>

                        <button
                            type="submit"
                            class="w-full rounded-pill bg-primary px-6 py-3 text-sm font-bold text-white shadow-soft transition hover:bg-primary-hover">
                            Sign in to admin
                        </button>
                    </form>

                    <p class="mt-8 text-center text-sm text-brown-soft">
                        Back to
                        <a href="{{ url('/') }}" class="font-semibold text-primary transition hover:text-primary-hover">
                            the main website
                        </a>
                    </p>
                </div>
            </section>
        </div>
    </div>
</body>

</html>
