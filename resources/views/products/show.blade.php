<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $product->name }} - Jarrabtiha</title>

    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-cream text-brown font-sans antialiased">
    @include('layouts.navigation')
    @include('components.flash-messages')
    <main class="mx-auto max-w-7xl px-4 py-8 sm:px-6 sm:py-12">
        <div class="mb-6">
            <a
                href="{{ route('products.index') }}"
                class="inline-flex items-center rounded-pill border border-border bg-white px-4 py-2 text-sm font-semibold text-brown shadow-soft transition hover:border-primary/30 hover:text-primary">
                Retour aux produits
            </a>
        </div>

        <section class="relative overflow-hidden rounded-[1.5rem] border border-border bg-white shadow-card">
            <div class="absolute inset-0 bg-gradient-to-br from-primary-soft/25 via-white to-cream"></div>

            <div class="relative grid gap-6 p-4 md:p-6 lg:grid-cols-[0.9fr_1.1fr] lg:p-8">
                <div class="overflow-hidden rounded-2xl bg-primary-soft/40">
                    <img
                        src="{{$product->image ? asset('storage/' . $product->image):asset('logo.png') }}"
                        alt="{{ $product->name }}"
                        class="h-56 w-full object-cover sm:h-72 lg:h-80">
                </div>

                <div class="flex flex-col justify-center">
                    <div class="inline-flex w-fit items-center rounded-full border border-primary/20 bg-white px-4 py-2 text-xs font-semibold text-primary shadow-soft">
                        {{ $product->category?->parent?->name ?? 'Beauté' }}
                    </div>

                    <p class="mt-5 text-xs font-semibold uppercase tracking-[0.18em] text-primary">
                        {{ $product->brand ?: 'Marque non précisée' }}
                    </p>

                    <h1 class="mt-2 text-3xl font-bold leading-tight text-brown lg:text-4xl">
                        {{ $product->name }}
                    </h1>

                    <div class="mt-6 grid grid-cols-3 gap-3">
                        <div class="rounded-2xl border border-border bg-cream p-3 text-center">
                            <p class="text-xs text-brown-soft">Note</p>
                            <p class="mt-1 text-2xl font-bold text-primary">
                                {{ number_format($product->rating_avg ?? 0, 1) }}
                            </p>
                        </div>

                        <div class="rounded-2xl border border-border bg-cream p-3 text-center">
                            <p class="text-xs text-brown-soft">Avis</p>
                            <p class="mt-1 text-2xl font-bold text-primary">
                                {{ $product->rating_count }}
                            </p>
                        </div>

                        <div class="rounded-2xl border border-border bg-cream p-3 text-center">
                            <p class="text-xs text-brown-soft">Catégorie</p>
                            <p class="mt-1 line-clamp-2 text-sm font-semibold text-brown">
                                {{ $product->category?->name ?? 'Beauté' }}
                            </p>
                        </div>
                    </div>


                    <div class="mt-6 flex flex-wrap items-center justify-end gap-3">
                        <a
                            href=""
                            target="_blank"
                            rel="noreferrer"
                            class="inline-flex rounded-pill bg-primary px-12 py-3 text-sm font-bold text-white transition hover:bg-primary-hover">
                            Acheter
                        </a>
                    </div>

                </div>
            </div>
        </section>

        <section class="mt-12 grid gap-8 lg:grid-cols-[1.15fr_0.85fr]">
            <div>
                <div class="mb-6">
                    <h2 class="text-3xl font-bold text-brown">Avis de la communauté</h2>
                    <p class="mt-2 text-base text-brown-soft">
                        Des retours utiles et basés sur de vraies expériences.
                    </p>
                </div>

                @forelse ($product->reviews as $review)
                <article class="mb-4 rounded-2xl border border-border bg-white p-5 shadow-soft">
                    <div class="flex flex-wrap items-start justify-between gap-4">
                        <div>
                            <div class="flex items-center gap-3">
                                <h3 class="text-lg font-semibold text-brown">
                                    {{ $review->title ?: 'Avis utilisateur' }}
                                </h3>

                                @if ($review->verified)
                                <span class="rounded-full bg-primary-soft px-3 py-1 text-xs font-semibold text-primary">
                                    Vérifié
                                </span>
                                @endif
                            </div>

                            <p class="mt-1 text-sm text-brown-soft">
                                Par {{ $review->user?->name ?? 'Membre de la communauté' }} • {{ $review->created_at?->format('d/m/Y') }}
                            </p>
                        </div>

                        <div class="rounded-xl bg-cream px-3 py-2 text-right">
                            <p class="text-base font-semibold text-primary">{{ $review->stars }}</p>
                            <p class="text-xs text-brown-soft">{{ $review->likes_count }} j'aime</p>
                        </div>
                    </div>

                    <p class="mt-4 text-[15px] leading-7 text-brown-soft">
                        {{ $review->body ?: 'Aucun détail supplémentaire n’a été partagé pour cet avis.' }}
                    </p>

                    <div class="mt-4 flex flex-wrap gap-2 text-xs">
                        @if ($review->skin_type)
                        <span class="rounded-full border border-border bg-cream px-3 py-2 text-brown-soft">
                            Peau : {{ $review->skin_type }}
                        </span>
                        @endif

                        @if ($review->hair_type)
                        <span class="rounded-full border border-border bg-cream px-3 py-2 text-brown-soft">
                            Cheveux : {{ $review->hair_type }}
                        </span>
                        @endif

                        <span class="rounded-full border border-border bg-cream px-3 py-2 text-brown-soft">
                            Résultats : {{ $review->result_duration_label }}
                        </span>

                        <span class="rounded-full border border-border bg-cream px-3 py-2 {{ $review->would_recommend ? 'text-primary' : 'text-brown-soft' }}">
                            {{ $review->would_recommend ? 'Recommandé' : 'Pas recommandé' }}
                        </span>
                    </div>
                </article>
                @empty
                <div class="rounded-2xl border border-dashed border-border bg-white px-6 py-12 text-center shadow-soft">
                    <h3 class="text-2xl font-bold text-brown">Pas encore d'avis</h3>
                    <p class="mx-auto mt-3 max-w-xl text-brown-soft">
                        Ce produit est encore en attente de ses premiers retours.
                    </p>
                </div>
                @endforelse
                {{-- Write Review --}}
                <div class="my-4 rounded-2xl border border-border bg-white p-6 shadow-soft">
                    <h3 class="text-2xl font-bold text-brown">
                        Écrire un avis
                    </h3>

                    <p class="mt-2 text-sm text-brown-soft">
                        Partagez votre expérience avec ce produit.
                    </p>

                    <form method="POST" action="{{ route('reviews.store', $product) }}" class="mt-6 space-y-5">
                        @csrf
                        <div>
                            <label class="mb-2 block text-sm font-semibold text-brown">Note</label>
                            <select name="rating" required
                                class="w-full rounded-xl border-border focus:border-primary focus:ring-primary">
                                <option value="">Choisir une note</option>
                                <option value="5">★★★★★ - Excellent</option>
                                <option value="4">★★★★☆ - Très bien</option>
                                <option value="3">★★★☆☆ - Moyen</option>
                                <option value="2">★★☆☆☆ - Pas terrible</option>
                                <option value="1">★☆☆☆☆ - Mauvais</option>
                            </select>
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-semibold text-brown">Titre</label>
                            <input type="text" name="title" value="{{ old('title') }}"
                                placeholder="Ex: Très bon produit pour cheveux secs"
                                class="w-full rounded-xl border-border focus:border-primary focus:ring-primary">
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-semibold text-brown">Votre avis</label>
                            <textarea name="body" rows="5" required
                                placeholder="Dites-nous ce que vous avez aimé ou pas..."
                                class="w-full rounded-xl border-border focus:border-primary focus:ring-primary">{{ old('body') }}</textarea>
                        </div>

                        <div class="grid gap-4 md:grid-cols-3">
                            <div>
                                <label class="mb-2 block text-sm font-semibold text-brown">Durée du test</label>
                                <select name="result_duration" required
                                    class="w-full rounded-xl border-border focus:border-primary focus:ring-primary">
                                    <option value="">Choisir</option>
                                    <option value="1week">1 semaine</option>
                                    <option value="2weeks">2 semaines</option>
                                    <option value="1month">1 mois</option>
                                    <option value="3months">3 mois</option>
                                    <option value="more">Plus de 3 mois</option>
                                </select>
                            </div>

                        </div>

                        <label class="flex items-center gap-3 text-sm font-semibold text-brown">
                            <input type="checkbox" name="would_recommend" value="1"
                                class="rounded border-border text-primary focus:ring-primary">
                            Je recommande ce produit
                        </label>

                        <button type="submit"
                            class="rounded-xl bg-primary px-6 py-3 font-semibold text-white shadow-soft transition hover:bg-brown">
                            Publier mon avis
                        </button>
                    </form>
                </div>
            </div>

            <aside class="space-y-6">
                <!-- <section class="rounded-2xl bg-brown p-6 text-white shadow-card">
                    <h2 class="text-2xl font-bold">جربتي شي منتج؟</h2>
                    <p class="mt-3 text-sm leading-6 text-white/70">
                        Partage ton avis et aide la communauté à choisir les bons produits.
                    </p>

                    <a
                        href=""
                        class="mt-6 inline-flex rounded-pill bg-primary px-6 py-3 text-sm font-bold text-white transition hover:bg-primary-hover">
                        Ajouter mon avis
                    </a>
                </section> -->

                <section>
                    <div class="mb-4">
                        <h2 class="text-2xl font-bold text-brown">À voir aussi</h2>
                    </div>

                    <div class="space-y-3">
                        @forelse ($relatedProducts as $relatedProduct)
                        <a
                            href="{{ route('products.show', $relatedProduct->slug) }}"
                            class="flex gap-3 rounded-2xl border border-border bg-white p-3 shadow-soft transition hover:-translate-y-1 hover:border-primary/30 hover:shadow-card">

                            <img
                                src="{{$relatedProduct->image ? asset('storage/' . $relatedProduct->image):asset('logo.png') }}"
                                alt="{{ $relatedProduct->name }}"
                                class="h-20 w-20 shrink-0 rounded-xl object-cover">

                            <div class="min-w-0 flex-1">
                                <p class="truncate text-xs font-semibold text-primary">
                                    {{ $relatedProduct->brand ?: 'Marque non précisée' }}
                                </p>

                                <h3 class="mt-1 line-clamp-2 text-sm font-semibold leading-5 text-brown">
                                    {{ $relatedProduct->name }}
                                </h3>

                                <p class="mt-2 text-xs text-brown-soft">
                                    {{ number_format($relatedProduct->rating_avg ?? 0, 1) }}/5 • {{ $relatedProduct->rating_count }} avis
                                </p>
                            </div>
                        </a>
                        @empty
                        <div class="rounded-2xl border border-dashed border-border bg-white p-5 text-sm text-brown-soft shadow-soft">
                            Aucun produit similaire disponible pour le moment.
                        </div>
                        @endforelse
                    </div>
                </section>
            </aside>
        </section>
    </main>

    @include('layouts.footer')
</body>

</html>