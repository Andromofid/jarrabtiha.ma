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
    @include('layouts.navigation')
    <header class="relative overflow-hidden">

        <!-- Background -->
        <div class="absolute inset-0 bg-gradient-to-b from-primary-soft/40 via-cream to-cream"></div>
        <div class="absolute -top-40 left-1/2 h-96 w-96 -translate-x-1/2 rounded-full bg-primary/10 blur-3xl"></div>

        <div class="relative mx-auto flex min-h-[75vh] max-w-6xl items-center justify-center px-6 py-20">

            <div class="w-full max-w-4xl text-center">

                <!-- Badge -->
                <div class="inline-flex items-center gap-2 rounded-full border border-primary/20 bg-white px-5 py-2 text-sm font-semibold text-primary shadow-soft">
                    🇲🇦 Les vrais avis beauté des femmes marocaines
                </div>

                <!-- Title -->
                <h1 class="mt-8 font-display text-5xl font-bold leading-tight text-brown md:text-6xl lg:text-7xl">
                    Avant d'acheter...
                    <br>

                    <span class="text-primary">
                        découvre les vrais avis.
                    </span>
                </h1>

                <!-- Subtitle -->
                <p class="mx-auto mt-8 max-w-2xl text-lg leading-8 text-brown-soft md:text-xl">
                    Recherche un produit, découvre les expériences de vraies utilisatrices
                    marocaines et partage ton propre avis.
                </p>

                <!-- Search -->
                <form
                    action="#"
                    method="GET"
                    class="mx-auto mt-12 grid max-w-4xl gap-3 rounded-[2rem] border border-border bg-white p-3 shadow-card md:grid-cols-[1.4fr_1fr_1fr_auto]">

                    <input
                        type="search"
                        name="q"
                        placeholder="Nom du produit..."
                        class="h-12 rounded-pill border border-border-soft bg-cream px-5 text-sm text-brown placeholder:text-brown-light outline-none transition focus:border-primary focus:ring-0">

                    <select
                        name="category"
                        class="h-12 rounded-pill border border-border-soft bg-cream px-5 text-sm text-brown outline-none transition focus:border-primary focus:ring-0">
                        <option value="">Toutes les catégories</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->slug }}">
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                    <select
                        name="brand"
                        class="h-12 rounded-pill border border-border-soft bg-cream px-5 text-sm text-brown outline-none transition focus:border-primary focus:ring-0">
                        <option value="">Toutes les marques</option>
                        @foreach ($marques as $marque)
                        <option value="{{ $marque->brand }}">
                            {{ $marque->brand }}
                        </option>
                        @endforeach
                    </select>



                    <button
                        type="submit"
                        class="h-12 rounded-pill bg-primary px-8 text-sm font-bold text-white transition hover:bg-primary-hover">
                        Rechercher
                    </button>
                </form>

                <!-- Trending -->
                <div class="mt-8 flex flex-wrap justify-center gap-3">

                    <span class="rounded-full bg-white px-4 py-2 text-sm text-brown-soft shadow-soft">
                        CeraVe
                    </span>

                    <span class="rounded-full bg-white px-4 py-2 text-sm text-brown-soft shadow-soft">
                        Garnier
                    </span>

                    <span class="rounded-full bg-white px-4 py-2 text-sm text-brown-soft shadow-soft">
                        Mixa
                    </span>

                    <span class="rounded-full bg-white px-4 py-2 text-sm text-brown-soft shadow-soft">
                        Elseve
                    </span>

                    <span class="rounded-full bg-white px-4 py-2 text-sm text-brown-soft shadow-soft">
                        La Roche-Posay
                    </span>

                </div>

                <!-- Stats -->
                <div class="mt-14 flex flex-wrap justify-center gap-10">

                    <div>
                        <p class="font-display text-3xl font-bold text-primary">
                            1 00+
                        </p>
                        <p class="mt-1 text-sm text-brown-soft">
                            Produits
                        </p>
                    </div>


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

    @include('layouts.footer')

</body>

</html>