<x-app-layout-market>
    <header class="relative overflow-hidden">
        <div
            class="absolute inset-0 bg-cover bg-center"
            style="background-image: url('{{ asset('images/hero-bg.webp') }}')">
        </div>
        <div class="absolute inset-0 bg-cream/30"></div>

        <div class="relative mx-auto flex min-h-[85vh] max-w-6xl items-center justify-center px-6 py-14 sm:py-16">
            <div class="w-full max-w-4xl text-center">
                <div class="hidden items-center gap-2 rounded-full border border-primary/20 bg-white px-5 py-2 text-sm font-semibold text-primary shadow-soft md:inline-flex">
                    <span class="h-2 w-2 rounded-full bg-primary"></span>
                    Les vrais avis beauté des femmes marocaines
                </div>

                <h1 class="mt-8 font-display text-5xl font-bold leading-tight text-ink md:text-6xl lg:text-7xl">
                    Jarrabtiha ? Avant d'acheter...
                    <br>
                    <span class="text-primary">
                        découvre les vrais avis.
                    </span>
                </h1>

                <p class="mx-auto mt-4 max-w-2xl text-lg leading-8 text-ink-soft md:text-xl">
                    Recherche un produit, découvre les expériences de vraies utilisatrices marocaines et partage ton propre avis.
                </p>

                <form
                    action="{{ route('products.index') }}"
                    method="GET"
                    class="mx-auto mt-10 grid max-w-4xl gap-3 rounded-[2rem] border border-border bg-white p-3 shadow-card md:grid-cols-[1.4fr_1fr_1fr_auto]">

                    <input
                        type="search"
                        name="q"
                        placeholder="Nom du produit..."
                        class="h-12 rounded-pill border border-border-soft bg-cream px-5 text-sm text-ink placeholder:text-ink-light outline-none transition focus:border-primary focus:ring-0">

                    <select
                        id="category"
                        name="category"
                        autocomplete="off">
                        <option value="">Toutes les catégories</option>

                        @foreach ($categories as $category)
                        <option value="{{ $category->slug }}">
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>

                    <select
                        id="brand"
                        name="brand"
                        class="h-12 rounded-pill border border-border-soft bg-cream px-5 text-sm text-ink outline-none transition focus:border-primary focus:ring-0">
                        <option value="">Toutes les marques</option>

                        @foreach ($marques as $marque)
                        <option value="{{ $marque->brand }}">
                            {{ $marque->brand }}
                        </option>
                        @endforeach
                    </select>

                    <button
                        type="submit"
                        class="rounded-pill bg-primary px-6 py-3 font-semibold text-white shadow-soft transition-all duration-300 hover:scale-[1.03] hover:bg-primary-hover hover:shadow-card">
                        Rechercher
                    </button>
                </form>
            </div>
        </div>
    </header>

    <main class="mx-auto max-w-7xl px-6 py-16">
        <section>
            <div class="mb-12 flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.18em] text-primary">Explorer</p>
                    <h2 class="mt-3 font-display text-4xl font-bold text-ink">
                        Catégories
                    </h2>
                    <p class="mt-4 max-w-2xl text-lg text-ink-soft">
                        Trouve rapidement le type de produit que tu cherches.
                    </p>
                </div>
                <a href="{{ route('categories.index') }}" class="inline-flex items-center justify-center rounded-pill border border-primary px-5 py-3 text-sm font-semibold text-primary transition hover:bg-primary hover:text-white">
                    Voir toutes les catégories
                </a>
            </div>

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($parentCategories as $category)
                <a
                    href="{{ route('products.index', ['category' => $category->children->first()?->slug]) }}"
                    class="group relative overflow-hidden rounded-card border border-border bg-white p-6 shadow-soft transition-all duration-300 hover:-translate-y-1 hover:border-primary/30 hover:shadow-card">

                    <div class="absolute -right-10 -top-10 h-28 w-28 rounded-full bg-primary-soft transition-all duration-300 group-hover:scale-125"></div>

                    <div class="relative flex items-center gap-4">
                        <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-pink-soft text-primary transition group-hover:bg-primary group-hover:text-white">
                            <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M7.5 4.75C7.5 3.78 8.28 3 9.25 3h5.5c.97 0 1.75.78 1.75 1.75v2.5A4.75 4.75 0 0 1 21.25 12v4A5.75 5.75 0 0 1 15.5 21h-7a5.75 5.75 0 0 1-5.75-5.75V12A4.75 4.75 0 0 1 7.5 7.25v-2.5Z" stroke="currentColor" stroke-width="1.5" />
                                <path d="M8 12.25h8M8 16h5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-ink transition-colors group-hover:text-primary">
                                {{ $category->name }}
                            </h3>
                            <p class="mt-1 text-sm text-ink-soft">
                                Découvrir les produits
                            </p>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </section>

        <section class="mt-24">
            <div class="mb-12 flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.18em] text-primary">Tendance</p>
                    <h2 class="mt-3 font-display text-4xl font-bold text-ink">
                        Les produits dont tout le monde parle
                    </h2>
                    <p class="mt-4 max-w-2xl text-lg text-ink-soft">
                        Découvre les produits les plus consultés par la communauté.
                    </p>
                </div>
                <a href="{{ route('products.index') }}" class="inline-flex items-center justify-center rounded-pill border border-blue px-5 py-3 text-sm font-semibold text-blue transition hover:bg-blue-soft">
                    Tous les produits
                </a>
            </div>

            <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
                @forelse ($popularProducts as $product)
                <article class="group overflow-hidden rounded-card border border-border bg-white shadow-soft transition-all duration-300 hover:-translate-y-1 hover:shadow-card">
                    <a href="{{ route('products.show', $product->slug) }}" class="block">
                        <div class="aspect-[1/1] overflow-hidden bg-pink-light h-52 w-full transition duration-500 group-hover:scale-105">
                            <img
                                src="{{$product->image ? asset('storage/' . $product->image):asset('icon.png') }}"
                                alt="{{ $product->name }}"
                                class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                        </div>
                    </a>

                    <div class="p-5">
                        <div class="flex items-start justify-between gap-3">
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-[0.16em] text-primary">
                                    {{ $product->brand ?: 'Marque' }}
                                </p>
                                <h3 class="mt-2 line-clamp-2 text-lg font-semibold text-ink">
                                    {{ $product->name }}
                                </h3>
                            </div>
                            <span class="rounded-full bg-blue-soft px-3 py-1 text-xs font-semibold text-blue">
                                {{ $product->category?->name ?: 'Beaute' }}
                            </span>
                        </div>

                        <div class="mt-4 flex items-center justify-between gap-3">
                            <div class="flex items-center gap-2 text-sm">
                                <span class="text-primary text-xl">{{ str_repeat('★', (int) round($product->rating_avg ?? 0)) }}</span>
                                <span class="font-semibold text-ink">{{ number_format($product->rating_avg ?? 0, 1) }}</span>
                                <span class="text-ink-soft">({{ $product->rating_count ?? 0 }} avis)</span>
                            </div>
                        </div>

                        <a
                            href="{{ route('products.show', $product->slug) }}"
                            class="mt-5 inline-flex w-full items-center justify-center rounded-pill bg-primary px-5 py-3 text-sm font-semibold text-white transition hover:bg-primary-hover">
                            Voir les avis
                        </a>
                    </div>
                </article>
                @empty
                <div class="rounded-card border border-border bg-white p-8 text-center shadow-soft sm:col-span-2 lg:col-span-3">
                    <h3 class="font-display text-2xl font-bold text-ink">Les produits populaires arrivent bientot</h3>
                    <p class="mt-3 text-ink-soft">Ajoute les premiers produits approuves pour alimenter cette section.</p>
                </div>
                @endforelse
            </div>
        </section>

        <section class="mt-24">
            <div class="mb-12 text-start">
                <p class="text-sm font-semibold uppercase tracking-[0.18em] text-primary">Communaute</p>
                <h2 class="mt-3 font-display text-4xl font-bold text-ink">
                    Elles ont testé, elles racontent.
                </h2>
                <p class="mt-4 max-w-2xl text-lg text-ink-soft">
                    Découvre les expériences partagées par la communauté.
                </p>
            </div>

            <div class="grid gap-6 md:grid-cols-3">
                @forelse ($communityReviews as $review)
                <article class="rounded-card border border-border bg-white p-6 shadow-soft transition-all duration-300 hover:-translate-y-1 hover:shadow-card">
                    <div class="flex items-center gap-3">
                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-primary-soft text-lg font-bold text-primary">
                            {{ mb_substr($review->user?->name ?? $review->guest_name ?? 'M', 0, 1) }}
                        </div>
                        <div>
                            <h3 class="font-semibold text-ink">
                                {{ explode(' ', $review->user?->name ?? $review->guest_name ?? 'Membre')[0] }}
                            </h3>
                            <div class="mt-1 text-sm text-primary">
                                {{ str_repeat('★', (int) $review->rating) }}<span class="text-ink-light">{{ str_repeat('★', max(0, 5 - (int) $review->rating)) }}</span>
                            </div>
                        </div>
                    </div>

                    <p class="mt-5 text-sm font-semibold text-ink">
                        {{ $review->product?->name }}
                    </p>
                    <p class="mt-3 line-clamp-4 text-sm leading-6 text-ink-soft">
                        {{ $review->body ?: $review->title ?: 'Une expérience partagee avec la communauté Jarrabtiha.' }}
                    </p>

                    @if ($review->skin_type || $review->hair_type)
                    <div class="mt-5 flex flex-wrap gap-2">
                        @if ($review->skin_type)
                        <span class="rounded-full bg-pink-soft px-3 py-1 text-xs font-semibold text-primary">{{ $review->skin_type }}</span>
                        @endif
                        @if ($review->hair_type)
                        <span class="rounded-full bg-blue-soft px-3 py-1 text-xs font-semibold text-blue">{{ $review->hair_type }}</span>
                        @endif
                    </div>
                    @endif

                    <a href="{{ route('products.show', $review->product?->slug) }}" class="mt-6 inline-flex text-sm font-semibold text-primary transition hover:text-primary-hover">
                        Voir l'avis
                    </a>
                </article>
                @empty
                <div class="rounded-card border border-border bg-white p-8 text-center shadow-soft md:col-span-3">
                    <h3 class="font-display text-2xl font-bold text-ink">Les premiers avis arrivent bientot</h3>
                    <p class="mt-3 text-ink-soft">Les avis approuves de la communauté apparaitront ici.</p>
                </div>
                @endforelse
            </div>
        </section>

        <section class="mt-24 overflow-hidden rounded-card border border-border bg-pink-light p-6 shadow-soft md:p-10">
            <div class="grid gap-10 lg:grid-cols-[0.95fr_1.05fr] lg:items-center">
                <div class="relative">
                    <div class="absolute -left-6 -top-6 h-28 w-28 rounded-full bg-blue-soft"></div>
                    <div class="absolute -bottom-6 -right-6 h-32 w-32 rounded-full bg-primary-soft"></div>
                    <!-- Temporary editorial image: replace with a dedicated Jarrabtiha community/beauty image when available. -->
                    <img
                        src="{{ asset('images/hero-bg.webp') }}"
                        alt="Routine beauté Jarrabtiha"
                        class="relative aspect-[4/3] w-full rounded-card object-cover shadow-card">
                </div>

                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.18em] text-primary">Notre promesse</p>
                    <h2 class="mt-3 font-display text-4xl font-bold text-ink">
                        Pourquoi Jarrabtiha ?
                    </h2>

                    <div class="mt-8 space-y-5">
                        <div class="flex gap-4 rounded-2xl border border-border bg-white p-5">
                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-primary-soft text-primary">
                                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <path d="M7 11.5 10.2 15 17 8" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Z" stroke="currentColor" stroke-width="1.5" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-ink">Des avis de vraies utilisatrices</h3>
                                <p class="mt-1 text-sm leading-6 text-ink-soft">Des expériences authentiques pour mieux choisir.</p>
                            </div>
                        </div>

                        <div class="flex gap-4 rounded-2xl border border-border bg-white p-5">
                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-blue-soft text-blue">
                                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <path d="M4.75 8.75h14.5v10.5H4.75V8.75Z" stroke="currentColor" stroke-width="1.5" />
                                    <path d="M8 8.75a4 4 0 0 1 8 0M8 13h8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-ink">Des produits disponibles au Maroc</h3>
                                <p class="mt-1 text-sm leading-6 text-ink-soft">Découvre des produits que tu peux réellement trouver.</p>
                            </div>
                        </div>

                        <div class="flex gap-4 rounded-2xl border border-border bg-white p-5">
                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-primary-soft text-primary">
                                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <path d="M5 6.5h14M5 12h14M5 17.5h8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                    <path d="M16 15.5 18 17.5 22 13.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-ink">Choisis avant d'acheter</h3>
                                <p class="mt-1 text-sm leading-6 text-ink-soft">Compare les avis et évite les achats qui ne te conviennent pas.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="mt-24">
            <div class="mb-10 flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.18em] text-primary">Marques</p>
                    <h2 class="mt-3 font-display text-4xl font-bold text-ink">
                        Les marques recherchées en ce moment
                    </h2>
                </div>
                <a href="{{ route('brands.index') }}" class="inline-flex items-center justify-center rounded-pill border border-blue px-5 py-3 text-sm font-semibold text-blue transition hover:bg-blue-soft">
                    Voir les marques
                </a>
            </div>

            <div class="grid gap-3 sm:grid-cols-2 lg:grid-cols-6">
                @forelse ($popularBrands as $brand)
                <a
                    href="{{ route('products.index', ['brand' => $brand->brand]) }}"
                    class="rounded-2xl border border-border bg-white px-5 py-4 text-center shadow-soft transition hover:-translate-y-1 hover:border-primary/30 hover:shadow-card">
                    <span class="block font-semibold text-ink">{{ $brand->brand }}</span>
                    <span class="mt-1 block text-xs text-ink-soft">{{ $brand->products_count }} produits</span>
                </a>
                @empty
                @foreach (['CeraVe', 'The Ordinary', 'La Roche-Posay', "L'Oreal", 'Garnier', 'Maybelline'] as $brandName)
                <a
                    href="{{ route('products.index', ['brand' => $brandName]) }}"
                    class="rounded-2xl border border-border bg-white px-5 py-4 text-center shadow-soft transition hover:-translate-y-1 hover:border-primary/30 hover:shadow-card">
                    <span class="block font-semibold text-ink">{{ $brandName }}</span>
                    <span class="mt-1 block text-xs text-ink-soft">Marque populaire</span>
                </a>
                @endforeach
                @endforelse
            </div>
        </section>

        <section class="mt-24 rounded-card border border-border bg-white p-6 shadow-soft md:p-8">
            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                <div class="rounded-2xl bg-pink-light p-5">
                    <p class="font-display text-4xl font-bold text-ink">{{ number_format($stats['products']) }}</p>
                    <p class="mt-1 text-sm font-semibold text-ink-soft">Produits</p>
                </div>
                <div class="rounded-2xl bg-blue-soft p-5">
                    <p class="font-display text-4xl font-bold text-ink">{{ number_format($stats['reviews']) }}</p>
                    <p class="mt-1 text-sm font-semibold text-ink-soft">Avis</p>
                </div>
                <div class="rounded-2xl bg-pink-soft p-5">
                    <p class="font-display text-4xl font-bold text-ink">{{ number_format($stats['categories']) }}</p>
                    <p class="mt-1 text-sm font-semibold text-ink-soft">Catégories</p>
                </div>
                <div class="rounded-2xl bg-cream-dark p-5">
                    <p class="font-display text-4xl font-bold text-ink">{{ number_format($stats['users']) }}</p>
                    <p class="mt-1 text-sm font-semibold text-ink-soft">Membres</p>
                </div>
            </div>
        </section>

        <section class="mt-24">
            <div class="mb-12 text-start">
                <p class="text-sm font-semibold uppercase tracking-[0.18em] text-primary">Simple et utile</p>
                <h2 class="mt-3 font-display text-4xl font-bold text-ink">
                    Comment ça marche ?
                </h2>
                <p class="mt-4 max-w-2xl text-lg text-ink-soft">
                    Trouver le bon produit beauté n'a jamais été aussi simple.
                </p>
            </div>

            <div class="grid gap-6 md:grid-cols-3">
                <div class="group rounded-card border border-border bg-white p-8 shadow-soft transition-all duration-300 hover:-translate-y-1 hover:shadow-card">
                    <div class="mb-8 flex h-16 w-16 items-center justify-center rounded-2xl bg-primary-soft text-primary">
                        <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M11 19.25a8.25 8.25 0 1 0 0-16.5 8.25 8.25 0 0 0 0 16.5ZM20.5 20.5l-3.2-3.2" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                        </svg>
                    </div>

                    <span class="text-sm font-semibold uppercase tracking-widest text-primary">Étape 01</span>
                    <h3 class="mt-3 text-2xl font-semibold text-ink">Cherche un produit</h3>
                    <p class="mt-4 leading-7 text-ink-soft">
                        Recherche par nom, marque ou catégorie pour trouver rapidement le produit que tu souhaites.
                    </p>
                </div>

                <div class="group rounded-card border border-border bg-white p-8 shadow-soft transition-all duration-300 hover:-translate-y-1 hover:shadow-card">
                    <div class="mb-8 flex h-16 w-16 items-center justify-center rounded-2xl bg-blue-soft text-blue">
                        <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M5.75 4.75h12.5v14.5H5.75V4.75Z" stroke="currentColor" stroke-width="1.5" />
                            <path d="M8.5 8.5h7M8.5 12h7M8.5 15.5h4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                        </svg>
                    </div>

                    <span class="text-sm font-semibold uppercase tracking-widest text-primary">Étape 02</span>
                    <h3 class="mt-3 text-2xl font-semibold text-ink">Lis les avis</h3>
                    <p class="mt-4 leading-7 text-ink-soft">
                        Découvre les expériences de vraies utilisatrices avant de prendre ta décision.
                    </p>
                </div>

                <div class="group rounded-card border border-border bg-white p-8 shadow-soft transition-all duration-300 hover:-translate-y-1 hover:shadow-card">
                    <div class="mb-8 flex h-16 w-16 items-center justify-center rounded-2xl bg-primary-soft text-primary">
                        <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M12 4.75 14.15 9.1l4.85.7-3.5 3.4.85 4.8L12 15.75 7.65 18l.85-4.8L5 9.8l4.85-.7L12 4.75Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                        </svg>
                    </div>

                    <span class="text-sm font-semibold uppercase tracking-widest text-primary">Étape 03</span>
                    <h3 class="mt-3 text-2xl font-semibold text-ink">Partage ton avis</h3>
                    <p class="mt-4 leading-7 text-ink-soft">
                        Aide la communauté en partageant ton expérience après avoir essaye le produit.
                    </p>
                </div>
            </div>
        </section>

        <section class="mt-24 overflow-hidden rounded-card border border-primary/20 bg-primary-soft p-8 text-center shadow-soft md:p-12">
            <div class="mx-auto max-w-3xl">
                <p class="text-sm font-semibold uppercase tracking-[0.18em] text-primary">À ton tour</p>
                <h2 class="mt-3 font-display text-4xl font-bold text-ink md:text-5xl">
                    Tu as déjà testé un produit ?
                </h2>
                <p class="mx-auto mt-4 max-w-xl text-lg leading-8 text-ink-soft">
                    Ton expérience peut aider une autre femme a mieux choisir.
                </p>
                <div class="mt-8 flex flex-col justify-center gap-3 sm:flex-row">
                    <a href="{{ route('products.index') }}" class="inline-flex items-center justify-center rounded-pill bg-primary px-6 py-3 font-semibold text-white shadow-soft transition hover:bg-primary-hover">
                        Partager mon avis
                    </a>
                    <a href="{{ route('products.index') }}" class="inline-flex items-center justify-center rounded-pill border border-primary bg-white px-6 py-3 font-semibold text-primary transition hover:bg-primary hover:text-white">
                        Découvrir les produits
                    </a>
                </div>
            </div>
        </section>
    </main>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const categorySelect = document.getElementById("category");
            const brandSelect = document.getElementById("brand");

            if (!categorySelect || !brandSelect) return;

            categorySelect.addEventListener("change", async () => {
                const category = categorySelect.value;

                brandSelect.innerHTML = `<option value="">Chargement...</option>`;

                if (!category) {
                    brandSelect.innerHTML = `<option value="">Toutes les marques</option>`;
                    return;
                }

                const response = await fetch(`/brands-by-category?category=${encodeURIComponent(category)}`);
                const brands = await response.json();

                brandSelect.innerHTML = `<option value="">Toutes les marques</option>`;

                brands.forEach((brand) => {
                    const option = document.createElement("option");
                    option.value = brand;
                    option.textContent = brand;
                    brandSelect.appendChild(option);
                });
            });
        });
    </script>
</x-app-layout-market>