<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jarrabtiha - Avis vrais, produits testés au Maroc</title>

    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-cream text-brown font-sans antialiased">

    <header class="relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-blush-light via-cream to-primary-soft"></div>
        <div class="absolute -top-24 -right-24 h-72 w-72 rounded-full bg-primary/20 blur-3xl"></div>
        <div class="absolute -bottom-24 -left-24 h-72 w-72 rounded-full bg-blush/40 blur-3xl"></div>

        <nav class="relative z-10 mx-auto flex max-w-7xl items-center justify-between px-6 py-5">
            <a href="/" class="flex items-center gap-3">
                <img src="./logo.png" alt="" srcset="" style="width: 200px;">
            </a>

            <div class="flex items-center gap-3">
                @auth
                <a href="{{ url('/dashboard') }}" class="rounded-pill bg-white px-5 py-2.5 text-sm font-semibold text-brown shadow-soft">
                    Dashboard
                </a>
                @else
                <a href="" class="hidden text-sm font-semibold text-brown-soft sm:block">
                    Connexion
                </a>

                <a href="" class="rounded-pill bg-primary px-5 py-2.5 text-sm font-semibold text-white shadow-soft transition hover:bg-primary-hover">
                    Rejoindre
                </a>
                @endauth
            </div>
        </nav>

        <div class="relative z-10 mx-auto grid max-w-7xl gap-12 px-6 pb-20 pt-10 lg:grid-cols-1  lg:pb-28 lg:pt-16">
            <div>
                <div class="mb-5 inline-flex rounded-pill border border-primary/20 bg-white/70 px-4 py-2 text-sm font-semibold text-primary shadow-soft backdrop-blur">
                    🇲🇦 Avis beauté honnêtes au Maroc
                </div>

                <h1 class="font-display text-5xl font-bold leading-tight text-brown sm:text-6xl lg:text-7xl">
                    Avant d’acheter,
                    <span class="text-primary">vérifie l’avis</span>
                    des filles qui ont déjà testé.
                </h1>

                <p class="mt-6 max-w-xl text-lg leading-8 text-brown-soft">
                    Découvre les vrais avis sur les produits beauté disponibles au Maroc :
                    cheveux, visage, maquillage, parfums et plus.
                </p>

                <div class="mt-8 rounded-card bg-white p-3 shadow-card">
                    <form action="#" method="GET" class="flex flex-col gap-3 sm:flex-row">
                        <input
                            type="search"
                            name="q"
                            placeholder="Cherche un produit ou une marque..."
                            class="min-h-14 flex-1 rounded-pill border border-border-soft bg-cream px-5 text-sm outline-none transition focus:border-primary">

                        <button class="rounded-pill bg-primary px-7 py-4 text-sm font-bold text-white transition hover:bg-primary-hover">
                            Rechercher
                        </button>
                    </form>
                </div>

                <div class="mt-6 flex flex-wrap gap-3 text-sm text-brown-soft">
                    <span class="rounded-pill bg-white/70 px-4 py-2">CeraVe</span>
                    <span class="rounded-pill bg-white/70 px-4 py-2">Garnier</span>
                    <span class="rounded-pill bg-white/70 px-4 py-2">Elseve</span>
                    <span class="rounded-pill bg-white/70 px-4 py-2">Mixa</span>
                </div>
            </div>
        </div>
    </header>

    <main class="mx-auto max-w-7xl px-6 py-16">
        <section>
            <div class="mb-8 flex items-end justify-between gap-4">
                <div>
                    <h2 class="font-display text-4xl font-bold text-brown">Catégories</h2>
                    <p class="mt-2 text-brown-soft">Trouve rapidement le type de produit que tu cherches.</p>
                </div>
            </div>

            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-6">
                @php
                $categories = [
                ['icon' => '💇‍♀️', 'name' => 'Cheveux'],
                ['icon' => '✨', 'name' => 'Visage'],
                ['icon' => '💄', 'name' => 'Maquillage'],
                ['icon' => '🌸', 'name' => 'Parfums'],
                ['icon' => '🧴', 'name' => 'Corps'],
                ['icon' => '💅', 'name' => 'Ongles'],
                ];
                @endphp

                @foreach ($categories as $category)
                <a href="#" class="rounded-card border border-border-soft bg-white p-5 text-center shadow-soft transition hover:-translate-y-1 hover:shadow-card">
                    <div class="text-4xl">{{ $category['icon'] }}</div>
                    <div class="mt-3 font-semibold text-brown">{{ $category['name'] }}</div>
                </a>
                @endforeach
            </div>
        </section>

        <section class="mt-20 grid gap-6 lg:grid-cols-3">
            <div class="rounded-card bg-white p-7 shadow-soft">
                <div class="mb-4 text-3xl">🔍</div>
                <h3 class="text-xl font-bold text-brown">Cherche le produit</h3>
                <p class="mt-3 text-sm leading-6 text-brown-soft">
                    Tape le nom d’un produit ou d’une marque avant d’acheter.
                </p>
            </div>

            <div class="rounded-card bg-white p-7 shadow-soft">
                <div class="mb-4 text-3xl">⭐</div>
                <h3 class="text-xl font-bold text-brown">Lis les vrais avis</h3>
                <p class="mt-3 text-sm leading-6 text-brown-soft">
                    Découvre les expériences selon le type de peau ou cheveux.
                </p>
            </div>

            <div class="rounded-card bg-white p-7 shadow-soft">
                <div class="mb-4 text-3xl">💬</div>
                <h3 class="text-xl font-bold text-brown">Partage ton expérience</h3>
                <p class="mt-3 text-sm leading-6 text-brown-soft">
                    Aide les autres filles à éviter les mauvais achats.
                </p>
            </div>
        </section>

        <section class="mt-20 rounded-[2rem] bg-brown p-8 text-center text-white lg:p-12">
            <h2 class="font-display text-4xl font-bold">جربتي شي منتج؟</h2>
            <p class="mx-auto mt-4 max-w-2xl text-white/70">
                Partage ton avis et aide la communauté à choisir les bons produits.
            </p>

            <a href="" class="mt-8 inline-flex rounded-pill bg-primary px-8 py-4 text-sm font-bold text-white transition hover:bg-primary-hover">
                Ajouter mon premier avis
            </a>
        </section>
    </main>

    <footer class="border-t border-border-soft px-6 py-8 text-center text-sm text-brown-soft">
        © {{ date('Y') }} Jarrabtiha.ma — Avis vrais, produits testés au Maroc.
    </footer>

</body>

</html>