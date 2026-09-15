<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cat&eacute;gories - Jarrabtiha</title>

    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-cream text-brown font-sans antialiased">
    @include('layouts.navigation')

    <main class="mx-auto max-w-7xl px-6 py-16">
        <section class="rounded-[2rem] border border-border bg-white/80 px-8 py-12 shadow-soft">
            <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.22em] text-primary">Explorer</p>
                    <h1 class="mt-4 font-display text-4xl font-bold text-brown sm:text-5xl">Toutes les cat&eacute;gories</h1>
                    <p class="mt-4 max-w-2xl text-lg text-brown-soft">
                        Commence par l'univers qui t'int&eacute;resse, puis ouvre la sous-cat&eacute;gorie la plus pertinente pour comparer les produits plus vite.
                    </p>
                </div>

                <div class="flex flex-wrap gap-4 text-sm text-brown-soft">
                    <span class="rounded-full border border-border bg-white px-4 py-2 shadow-soft">
                        {{ $parentCategories->count() }} cat&eacute;gories parentes
                    </span>
                    <span class="rounded-full border border-border bg-white px-4 py-2 shadow-soft">
                        {{ $parentCategories->sum('children_count') }} sous-cat&eacute;gories
                    </span>
                </div>
            </div>
        </section>

        <section class="mt-12 grid gap-6 lg:grid-cols-2">
            @forelse ($parentCategories as $parentCategory)
                <article class="overflow-hidden rounded-[2rem] border border-border bg-white shadow-soft">
                    <div class="border-b border-border bg-primary-soft/40 px-8 py-6">
                        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                            <div>
                                <h2 class="font-display text-3xl font-bold text-brown">{{ $parentCategory->name }}</h2>
                                <p class="mt-2 text-sm text-brown-soft">
                                    {{ $parentCategory->children_count }} sous-cat&eacute;gorie(s) &agrave; parcourir
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="p-8">
                        @if ($parentCategory->children->isEmpty())
                            <p class="text-brown-soft">Aucune sous-cat&eacute;gorie disponible pour le moment.</p>
                        @else
                            <div class="grid gap-4 sm:grid-cols-2">
                                @foreach ($parentCategory->children as $childCategory)
                                    <a
                                        href="{{ route('products.index', ['category' => $childCategory->slug]) }}"
                                        class="group rounded-2xl border border-border bg-cream/60 p-5 transition hover:-translate-y-1 hover:border-primary/30 hover:bg-white">
                                        <div class="flex items-start justify-between gap-4">
                                            <div>
                                                <h3 class="text-lg font-semibold text-brown transition group-hover:text-primary">
                                                    {{ $childCategory->name }}
                                                </h3>
                                                <p class="mt-2 text-sm text-brown-soft">
                                                    {{ $childCategory->approved_products_count }} produit(s) approuv&eacute;(s)
                                                </p>
                                            </div>

                                            <span class="rounded-full bg-white px-3 py-1 text-xs font-semibold uppercase tracking-[0.18em] text-primary shadow-soft">
                                                Ouvrir
                                            </span>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </article>
            @empty
                <div class="rounded-[2rem] border border-dashed border-border bg-white px-8 py-16 text-center shadow-soft lg:col-span-2">
                    <h2 class="font-display text-3xl font-bold text-brown">Aucune cat&eacute;gorie trouv&eacute;e</h2>
                    <p class="mx-auto mt-4 max-w-xl text-brown-soft">
                        Les cat&eacute;gories publiques appara&icirc;tront ici d&egrave;s qu'elles seront disponibles.
                    </p>
                </div>
            @endforelse
        </section>
    </main>

    @include('layouts.footer')
</body>

</html>
