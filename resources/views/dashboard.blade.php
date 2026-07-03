<x-app-layout>
    <main class="mx-auto max-w-7xl px-6 py-12">

        {{-- Welcome header --}}
        <section class="mb-10 flex flex-col gap-6 rounded-card border border-border bg-white p-8 shadow-soft sm:flex-row sm:items-center sm:justify-between">
            <div class="flex items-center gap-4">
                <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-full bg-primary-soft text-2xl font-bold text-primary">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
                <div>
                    <p class="text-sm text-brown-soft">Bienvenue,</p>
                    <h1 class="font-display text-3xl font-bold text-brown">
                        {{ auth()->user()->name }}
                    </h1>
                </div>
            </div>

            <div class="flex flex-wrap gap-3">

                <a href="{{ route('products.index') }}"
                    class="rounded-pill bg-primary px-6 py-3 text-sm font-bold text-white shadow-soft transition hover:bg-primary-hover">
                    Parcourir les produits
                </a>

                <a href="{{ route('profile.edit') }}"
                    class="rounded-pill border border-border bg-white px-6 py-3 text-sm font-semibold text-brown transition hover:border-primary/30 hover:text-primary">
                    Mon profil
                </a>
            </div>
        </section>

        {{-- Stats --}}
        <section class="mb-12 grid grid-cols-1 gap-4 sm:grid-cols-3">
            <div class="rounded-2xl border border-border bg-white p-6 shadow-soft">
                <p class="text-sm text-brown-soft">Avis publiés</p>
                <p class="mt-2 font-display text-4xl font-bold text-primary">
                    {{ $reviewsCount }}
                </p>
            </div>

            <div class="rounded-2xl border border-border bg-white p-6 shadow-soft">
                <p class="text-sm text-brown-soft">Note moyenne donnée</p>
                <div class="mt-2 flex items-baseline gap-2">
                    <p class="font-display text-4xl font-bold text-primary">
                        {{ number_format($avgRating ?? 0, 1) }}
                    </p>
                    <span class="text-brown-soft">/ 5</span>
                </div>
            </div>

            <div class="rounded-2xl border border-border bg-white p-6 shadow-soft">
                <p class="text-sm text-brown-soft">Produits testés</p>
                <p class="mt-2 font-display text-4xl font-bold text-primary">
                    {{ $productsCount }}
                </p>
            </div>
        </section>

        {{-- Recent reviews --}}
        <section>
            <div class="mb-6 flex items-center justify-between">
                <h2 class="font-display text-3xl font-bold text-brown">
                    Mes derniers avis
                </h2>
            </div>

            @forelse ($reviews as $review)

            <a href="{{ route('products.show', $review->product->slug) }}"
                class="mb-4 flex items-center gap-4 rounded-2xl border border-border bg-white p-5 shadow-soft transition hover:-translate-y-1 hover:border-primary/30 hover:shadow-card">

                <img
                    src="{{ $review->product->image ? asset('storage/' . $review->product->image) : asset('logo.png') }}"
                    alt="{{ $review->product->name }}"
                    class="h-16 w-16 shrink-0 rounded-xl object-cover">

                <div class="min-w-0 flex-1">
                    <h3 class="truncate text-base font-semibold text-brown">
                        {{ $review->product->name }}
                    </h3>
                    <p class="mt-1 line-clamp-1 text-sm text-brown-soft">
                        {{ $review->body }}
                    </p>
                    <p class="mt-1 text-xs text-brown-light">
                        {{ $review->created_at->format('d/m/Y') }}
                    </p>
                </div>

                <div class="shrink-0 rounded-xl bg-cream px-3 py-2 text-center">
                    <p class="text-base font-semibold text-primary">{{ $review->stars }}</p>
                </div>
            </a>

            @empty
            <div class="rounded-[2rem] border border-dashed border-border bg-white px-8 py-16 text-center shadow-soft">
                <h3 class="font-display text-2xl font-bold text-brown">Pas encore d'avis</h3>
                <p class="mx-auto mt-3 max-w-md text-brown-soft">
                    Partage ta première expérience et aide la communauté à choisir les bons produits.
                </p>

                <a href="{{ route('products.index') }}"
                    class="mt-6 inline-flex rounded-pill bg-primary px-6 py-3 text-sm font-bold text-white transition hover:bg-primary-hover">
                    Trouver un produit à noter
                </a>
            </div>
            @endforelse
            {{$reviews->links()}}
        </section>
    </main>
</x-app-layout>