<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Produits - Jarrabtiha</title>

    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-cream text-brown font-sans antialiased">
    @include('layouts.navigation')
    <main class="mx-auto max-w-7xl px-6 py-16">

        <section>
            <div class="mb-12 flex flex-col gap-4 lg:flex-row lg:items-end lg:justify-between">
                <div>
                    <h2 class="font-display text-4xl font-bold text-brown">Produits à découvrir</h2>
                    <p class="mt-4 max-w-2xl text-lg text-brown-soft">
                        Une sélection claire, pensée pour comparer rapidement avant de passer à l'achat.
                    </p>
                </div>
                <div class="mt-10 flex flex-wrap gap-4 text-sm text-brown-soft">
                    <span class="rounded-full border border-border bg-white px-4 py-2 shadow-soft">
                        {{ $products->total() }} produits trouvés
                    </span>
                </div>
            </div>

            @if ($products->isEmpty())
            <div class="rounded-[2rem] border border-dashed border-border bg-white px-8 py-16 text-center shadow-soft">
                <h3 class="font-display text-3xl font-bold text-brown">Aucun produit trouvé</h3>
                <p class="mx-auto mt-4 max-w-xl text-brown-soft">
                    Essaie une autre recherche ou enlève un filtre pour voir plus de résultats.
                </p>
            </div>
            @else
            <div class="grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4">
                @foreach ($products as $product)
                <a
                    href="{{ route('products.show', $product->slug) }}"
                    class="group overflow-hidden rounded-2xl border border-border bg-white shadow-soft transition-all duration-300 hover:-translate-y-1 hover:border-primary/30 hover:shadow-card">

                    <div class="relative h-32 overflow-hidden bg-primary-soft/40 sm:h-36 md:h-40">
                        <img
                            src="{{$product->image ? asset('storage/' . $product->image):asset('logo.png') }}"
                            alt="{{ $product->name }}"
                            class="h-full w-full object-cover transition duration-500 group-hover:scale-105">

                        <div class="absolute left-3 top-3 max-w-[85%] truncate rounded-full bg-white/95 px-3 py-1 text-[10px] font-semibold uppercase tracking-[0.14em] text-primary shadow-soft">
                            {{ $product->category?->name ?? 'Produit beauté' }}
                        </div>
                    </div>

                    <div class="p-4">
                        <p class="truncate text-xs font-semibold text-primary">
                            {{ $product->brand ?: 'Marque non précisée' }}
                        </p>

                        <h3 class="mt-1 line-clamp-2 min-h-[40px] text-sm font-semibold leading-5 text-brown md:text-base">
                            {{ $product->name }}
                        </h3>

                        <div class="mt-4 flex items-center justify-between gap-3 border-t border-border pt-3">
                            <div class="rounded-xl bg-primary-soft px-2 py-1.5 text-center">
                                <p class="font-display text-base font-bold leading-none text-primary">
                                    {{ number_format($product->rating_avg ?? 0, 1) }}
                                </p>
                                <p class="mt-1 text-[10px] leading-none text-brown-soft">
                                    {{ $product->rating_count }} avis
                                </p>
                            </div>

                            <span class="text-xs font-semibold text-primary">
                                Détails
                            </span>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>

            <div class="mt-10">
                {{ $products->links() }}
            </div>
            @endif
        </section>

        <section class="mt-24">
            <div class="mb-12 text-start">
                <h2 class="font-display text-4xl font-bold text-brown">Explorer par catégorie</h2>
                <p class="mt-4 max-w-2xl text-lg text-brown-soft">
                    Pars d'abord de la catégorie qui t'intéresse pour gagner du temps.
                </p>
            </div>

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($parentCategories as $category)
                <a
                    href="{{ route('products.index', ['category' => $category->children->first()?->slug]) }}"
                    class="group relative overflow-hidden rounded-card border border-border bg-white p-7 shadow-soft transition-all duration-300 hover:-translate-y-1 hover:border-primary/30 hover:shadow-card">
                    <div class="absolute -right-8 -top-8 h-28 w-28 rounded-full bg-primary/5 transition-all duration-300 group-hover:scale-125"></div>
                    <h3 class="pr-12 text-2xl font-semibold text-brown transition-colors group-hover:text-primary">
                        {{ $category->name }}
                    </h3>
                    <p class="mt-3 text-sm text-brown-soft">
                        {{ $category->children_count }} sous-catégorie(s) à parcourir
                    </p>
                </a>
                @endforeach
            </div>
        </section>
    </main>

    @include('layouts.footer')

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
</body>

</html>