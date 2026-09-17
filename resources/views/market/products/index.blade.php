<x-app-layout-market>
    <main class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:py-14">
        <section>
            <div class="mb-8 flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.18em] text-primary">Catalogue beauté</p>
                    <h2 class="mt-3 font-display text-4xl font-bold text-ink sm:text-5xl">Produits à découvrir</h2>
                    <p class="mt-3 max-w-2xl text-base leading-7 text-ink-soft sm:text-lg">
                        Compare les avis, filtre par catégorie ou marque, et trouve le produit qui mérite vraiment sa place dans ta routine.
                    </p>
                </div>

                <div class="inline-flex w-fit items-center rounded-pill border border-border bg-white px-4 py-2 text-sm font-semibold text-ink-soft shadow-soft">
                    <span class="mr-2 h-2 w-2 rounded-full bg-primary"></span>
                    {{ $products->total() }} produits trouvés
                </div>
            </div>

            <div class="mb-5 overflow-x-auto pb-2 [-ms-overflow-style:none] [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">
                <div class="flex min-w-max gap-2">
                    <a
                        href="{{ route('products.index', array_filter(['q' => $searchTerm, 'brand' => $selectedBrand])) }}"
                        class="{{ $selectedCategory === '' ? 'border-primary bg-primary text-white' : 'border-border bg-white text-ink-soft hover:border-primary/40 hover:text-primary' }} rounded-pill border px-4 py-2 text-sm font-semibold shadow-soft transition">
                        Tous
                    </a>

                    @foreach ($categories as $category)
                    <a
                        href="{{ route('products.index', array_filter(['q' => $searchTerm, 'category' => $category->slug, 'brand' => $selectedBrand])) }}"
                        class="{{ $selectedCategory === $category->slug ? 'border-primary bg-primary text-white' : 'border-border bg-white text-ink-soft hover:border-primary/40 hover:text-primary' }} rounded-pill border px-4 py-2 text-sm font-semibold shadow-soft transition">
                        {{ $category->name }}
                    </a>
                    @endforeach
                </div>
            </div>

            <form
                action="{{ route('products.index') }}"
                method="GET"
                x-data="{
                    filtersOpen: false,
                    isDesktop: window.matchMedia('(min-width: 1024px)').matches,
                    init() {
                        window.matchMedia('(min-width: 1024px)').addEventListener('change', event => {
                            this.isDesktop = event.matches;
                        });
                    }
                }"
                class="mb-10 rounded-card border border-border bg-white p-3 shadow-soft">
                <div class="grid gap-3 lg:grid-cols-[1.4fr_1fr_1fr_auto]">
                    <div>
                        <label for="q" class="sr-only">Rechercher un produit</label>
                        <input
                            id="q"
                            type="search"
                            name="q"
                            value="{{ $searchTerm }}"
                            placeholder="Rechercher un produit..."
                            class="h-12 w-full rounded-2xl border border-border-soft bg-cream px-4 text-sm text-ink placeholder:text-ink-light outline-none transition focus:border-primary focus:ring-0">
                    </div>

                    <button
                        type="button"
                        class="inline-flex h-12 items-center justify-center rounded-2xl border border-border bg-cream px-4 text-sm font-semibold text-ink lg:hidden"
                        @click="filtersOpen = !filtersOpen">
                        Filtres
                    </button>

                    <div x-show="filtersOpen || isDesktop" x-transition class="lg:block">
                        <label for="category" class="sr-only">Catégorie</label>
                        <select
                            id="category"
                            name="category"
                            class="h-12 w-full rounded-2xl border border-border-soft bg-cream px-4 text-sm text-ink outline-none transition focus:border-primary focus:ring-0">
                            <option value="">Toutes les catégories</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->slug }}" @selected($selectedCategory === $category->slug)>
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div x-show="filtersOpen || isDesktop" x-transition class="lg:block">
                        <label for="brand" class="sr-only">Marque</label>
                        <select
                            id="brand"
                            name="brand"
                            class="h-12 w-full rounded-2xl border border-border-soft bg-cream px-4 text-sm text-ink outline-none transition focus:border-primary focus:ring-0">
                            <option value="">Toutes les marques</option>
                            @foreach ($brands as $brand)
                            <option value="{{ $brand }}" @selected($selectedBrand === $brand)>
                                {{ $brand }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <button
                        type="submit"
                        x-show="filtersOpen || isDesktop"
                        x-transition
                        class="h-12 rounded-2xl bg-primary px-6 text-sm font-semibold text-white shadow-soft transition hover:bg-primary-hover lg:inline-flex lg:items-center lg:justify-center">
                        Rechercher
                    </button>
                </div>
            </form>

            @if ($products->isEmpty())
            <div class="rounded-card border border-dashed border-border bg-white px-6 py-14 text-center shadow-soft">
                <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-primary-soft text-primary">
                    <svg class="h-8 w-8" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="M11 19.25a8.25 8.25 0 1 0 0-16.5 8.25 8.25 0 0 0 0 16.5ZM20.5 20.5l-3.2-3.2" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                    </svg>
                </div>
                <h3 class="mt-5 font-display text-3xl font-bold text-ink">Aucun produit trouvé</h3>
                <p class="mx-auto mt-3 max-w-xl text-ink-soft">
                    Essaie de modifier tes filtres ou demande l'ajout du produit.
                </p>
                <div class="mt-7 flex flex-col justify-center gap-3 sm:flex-row">
                    <a href="{{ route('products.index') }}" class="inline-flex items-center justify-center rounded-pill border border-border bg-white px-5 py-3 text-sm font-semibold text-ink transition hover:border-primary/40 hover:text-primary">
                        Réinitialiser les filtres
                    </a>
                    <a href="#product-request-form" class="inline-flex items-center justify-center rounded-pill bg-primary px-5 py-3 text-sm font-semibold text-white transition hover:bg-primary-hover">
                        Ajouter ce produit
                    </a>
                </div>
            </div>
            @else
            <div class="grid grid-cols-1 gap-3 min-[420px]:grid-cols-2 sm:gap-4 lg:grid-cols-3 xl:grid-cols-4">
                @foreach ($products as $product)
                <a
                    href="{{ route('products.show', $product->slug) }}"
                    class="group flex h-full flex-col overflow-hidden rounded-2xl border border-border bg-white shadow-soft transition-all duration-300 hover:-translate-y-1 hover:border-primary/30 hover:shadow-card">

                    <div class="relative aspect-square bg-pink-light p-4">
                        @if ($product->image)
                        <img
                            src="{{ asset('storage/' . $product->image) }}"
                            alt="{{ $product->name }}"
                            class="h-full w-full object-contain transition duration-500 group-hover:scale-105">
                        @else
                        <div class="flex h-full w-full flex-col items-center justify-center rounded-2xl border border-dashed border-primary/20 bg-white/70 text-center">
                            <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-primary-soft text-primary">
                               <img src="{{asset('icon.png')}}" alt="" srcset="">
                            </div>
                            <span class="mt-3 text-xs font-semibold text-ink-soft">Image à venir</span>
                        </div>
                        @endif

                        <div class="absolute left-3 top-3 max-w-[calc(100%-1.5rem)] truncate rounded-full bg-white/95 px-3 py-1 text-[11px] font-semibold text-primary shadow-soft">
                            {{ $product->category?->name ?? 'Produit beauté' }}
                        </div>
                    </div>

                    <div class="flex flex-1 flex-col p-4">
                        <p class="truncate text-xs font-semibold uppercase tracking-[0.12em] text-primary">
                            {{ $product->brand ?: 'Marque non précisée' }}
                        </p>

                        <h3 class="mt-2 line-clamp-2 min-h-[44px] text-sm font-semibold leading-5 text-ink sm:text-base">
                            {{ $product->name }}
                        </h3>

                        <div class="mt-4 flex items-center gap-2 text-sm">
                            @if (($product->rating_count ?? 0) > 0)
                            <span class="text-primary">★</span>
                            <span class="font-semibold text-ink">{{ number_format($product->rating_avg ?? 0, 1) }}</span>
                            <span class="text-ink-soft">{{ $product->rating_count }} avis</span>
                            @else
                            <span class="text-ink-soft">Pas encore d'avis</span>
                            @endif
                        </div>

                        <span class="mt-auto pt-5 text-sm font-semibold text-primary transition group-hover:text-primary-hover">
                            Voir les avis →
                        </span>
                    </div>
                </a>
                @endforeach
            </div>

            <div class="mt-10 rounded-card border border-border bg-white p-3 shadow-soft sm:p-4">
                {{ $products->links() }}
            </div>
            @endif
        </section>

        <section class="mt-14">
            <x-product-request-form :categories="$categories" />
        </section>

        <section class="mt-20">
            <div class="mb-10 text-start">
                <p class="text-sm font-semibold uppercase tracking-[0.18em] text-primary">Navigation rapide</p>
                <h2 class="mt-3 font-display text-4xl font-bold text-ink">Explorer par catégorie</h2>
                <p class="mt-3 max-w-2xl text-base leading-7 text-ink-soft sm:text-lg">
                    Pars d'abord de la catégorie qui t'intéresse pour gagner du temps.
                </p>
            </div>

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($parentCategories as $category)
                <a
                    href="{{ route('products.index', ['category' => $category->children->first()?->slug]) }}"
                    class="group rounded-card border border-border bg-white p-5 shadow-soft transition-all duration-300 hover:-translate-y-1 hover:border-primary/30 hover:shadow-card">
                    <div class="flex items-center gap-4">
                        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-blue-soft text-blue transition group-hover:bg-primary-soft group-hover:text-primary">
                            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M5 7.75A2.75 2.75 0 0 1 7.75 5h8.5A2.75 2.75 0 0 1 19 7.75v8.5A2.75 2.75 0 0 1 16.25 19h-8.5A2.75 2.75 0 0 1 5 16.25v-8.5Z" stroke="currentColor" stroke-width="1.5" />
                                <path d="M8.5 9h7M8.5 12h7M8.5 15h4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-ink transition-colors group-hover:text-primary">
                                {{ $category->name }}
                            </h3>
                            <p class="mt-1 text-sm text-ink-soft">
                                {{ $category->children_count }} sous-catégorie(s) à parcourir
                            </p>
                        </div>
                    </div>
                </a>
                @endforeach
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
                const selectedBrand = @json($selectedBrand);

                brandSelect.innerHTML = `<option value="">Chargement...</option>`;

                if (!category) {
                    brandSelect.innerHTML = `<option value="">Toutes les marques</option>`;
                    @foreach($brands as $brand)
                    brandSelect.innerHTML += `<option value="{{ $brand }}">{{ $brand }}</option>`;
                    @endforeach
                    if (selectedBrand) brandSelect.value = selectedBrand;
                    return;
                }

                const response = await fetch(`/brands-by-category?category=${encodeURIComponent(category)}`);
                const brands = await response.json();

                brandSelect.innerHTML = `<option value="">Toutes les marques</option>`;

                brands.forEach((brand) => {
                    const option = document.createElement("option");
                    option.value = brand;
                    option.textContent = brand;
                    if (brand === selectedBrand) {
                        option.selected = true;
                    }
                    brandSelect.appendChild(option);
                });
            });
        });
    </script>
</x-app-layout-market>
