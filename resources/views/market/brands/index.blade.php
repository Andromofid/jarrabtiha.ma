<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Marques - Jarrabtiha</title>

    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-cream text-brown font-sans antialiased">
    @include('layouts.navigation')

    <main class="mx-auto max-w-7xl px-6 py-16">
        <section class="rounded-[2rem] border border-border bg-white/80 px-8 py-12 shadow-soft">
            <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.22em] text-primary">Comparer</p>
                    <h1 class="mt-4 font-display text-4xl font-bold text-brown sm:text-5xl">Toutes les marques</h1>
                    <p class="mt-4 max-w-2xl text-lg text-brown-soft">
                        Retrouve les marques disponibles sur la plateforme et ouvre directement leur catalogue pour lire les avis avant achat.
                    </p>
                </div>

                <div class="flex flex-wrap gap-4 text-sm text-brown-soft">
                    <span class="rounded-full border border-border bg-white px-4 py-2 shadow-soft">
                        {{ $brands->count() }} marques r&eacute;f&eacute;renc&eacute;es
                    </span>
                    <span class="rounded-full border border-border bg-white px-4 py-2 shadow-soft">
                        {{ $brands->sum('products_count') }} produits approuv&eacute;s
                    </span>
                </div>
            </div>
        </section>

        <section class="mt-12">
            @if ($brands->isEmpty())
                <div class="rounded-[2rem] border border-dashed border-border bg-white px-8 py-16 text-center shadow-soft">
                    <h2 class="font-display text-3xl font-bold text-brown">Aucune marque trouv&eacute;e</h2>
                    <p class="mx-auto mt-4 max-w-xl text-brown-soft">
                        Les marques publiques appara&icirc;tront ici d&egrave;s que des produits approuv&eacute;s seront disponibles.
                    </p>
                </div>
            @else
                <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-3">
                    @foreach ($brands as $brand)
                        <a
                            href="{{ route('products.index', ['brand' => $brand->brand]) }}"
                            class="group rounded-[1.75rem] border border-border bg-white p-6 shadow-soft transition hover:-translate-y-1 hover:border-primary/30 hover:shadow-card">
                            <div class="flex items-start justify-between gap-4">
                                <div>
                                    <p class="text-xs font-semibold uppercase tracking-[0.22em] text-primary">Marque</p>
                                    <h2 class="mt-3 font-display text-3xl font-bold text-brown transition group-hover:text-primary">
                                        {{ $brand->brand }}
                                    </h2>
                                </div>

                                <span class="rounded-full bg-primary-soft px-3 py-1 text-xs font-semibold uppercase tracking-[0.18em] text-primary">
                                    {{ $brand->products_count }} produit(s)
                                </span>
                            </div>

                            <div class="mt-6 flex items-center justify-between border-t border-border pt-4">
                                <div>
                                    <p class="text-sm text-brown-soft">Note moyenne cache</p>
                                    <p class="mt-1 text-lg font-semibold text-brown">
                                        {{ number_format((float) $brand->average_rating, 1) }}/5
                                    </p>
                                </div>

                                <span class="text-sm font-semibold text-primary">Voir les produits</span>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endif
        </section>
    </main>

    @include('layouts.footer')
</body>

</html>
