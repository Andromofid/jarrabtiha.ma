<section id="product-request-form" class="scroll-mt-24 rounded-card border border-border bg-white p-5 shadow-soft sm:p-6 lg:p-8">
    <div class="flex flex-col gap-4 lg:flex-row lg:items-start lg:justify-between">
        <div class="max-w-2xl">
            <span class="inline-flex items-center gap-2 rounded-full bg-primary-soft px-4 py-2 text-xs font-bold uppercase tracking-wide text-primary">
                <span class="flex h-5 w-5 items-center justify-center rounded-full bg-white text-primary">+</span>
                Produit introuvable ?
            </span>
            <h2 class="mt-4 font-display text-3xl font-bold text-ink">
                Tu ne trouves pas ton produit ?
            </h2>
            <p class="mt-3 text-sm leading-6 text-ink-soft">
                Envoie-nous ses informations, on l'ajoutera à Jarrabtiha après vérification.
            </p>
        </div>
    </div>

    <form method="POST" action="{{ route('products.suggestions.store') }}" class="mt-7 space-y-5">
        @csrf

        <div class="grid gap-4 md:grid-cols-2">
            <div>
                <label for="suggested_name" class="mb-2 block text-sm font-semibold text-ink">
                    Nom du produit
                </label>
                <input
                    id="suggested_name"
                    name="name"
                    type="text"
                    value="{{ old('name') }}"
                    required
                    class="h-12 w-full rounded-2xl border border-border bg-cream px-4 text-sm text-ink focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary"
                    placeholder="Ex: CeraVe Gel Moussant">
            </div>

            <div>
                <label for="suggested_brand" class="mb-2 block text-sm font-semibold text-ink">
                    Marque
                </label>
                <input
                    id="suggested_brand"
                    name="brand"
                    type="text"
                    value="{{ old('brand') }}"
                    class="h-12 w-full rounded-2xl border border-border bg-cream px-4 text-sm text-ink focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary"
                    placeholder="Ex: CeraVe">
            </div>
        </div>

        <div class="grid gap-4 md:grid-cols-2">
            <div>
                <label for="suggested_category_id" class="mb-2 block text-sm font-semibold text-ink">
                    Catégorie
                </label>
                <select
                    id="suggested_category_id"
                    name="category_id"
                    required
                    class="h-12 w-full rounded-2xl border border-border bg-cream px-4 text-sm text-ink focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary">
                    <option value="">Choisir une catégorie</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected((string) old('category_id')===(string) $category->id)>
                        {{ $category->parent?->name ? $category->parent->name . ' > ' : '' }}{{ $category->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="suggested_where_to_buy" class="mb-2 block text-sm font-semibold text-ink">
                    Lien du produit
                </label>
                <input
                    id="suggested_where_to_buy"
                    name="where_to_buy"
                    type="url"
                    value="{{ old('where_to_buy') }}"
                    class="h-12 w-full rounded-2xl border border-border bg-cream px-4 text-sm text-ink focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary"
                    placeholder="https://...">
            </div>
        </div>

        <div>
            <label for="suggested_description" class="mb-2 block text-sm font-semibold text-ink">
                Détails ou mini review
            </label>
            <textarea
                id="suggested_description"
                name="description"
                rows="4"
                class="w-full rounded-2xl border border-border bg-cream px-4 py-3 text-sm text-ink focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary"
                placeholder="Ajoute des détails utiles pour reconnaître le produit ou partager un premier retour.">{{ old('description') }}</textarea>
        </div>

        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <p class="max-w-2xl text-sm text-ink-soft">
                Le produit sera enregistré comme non approuvé jusqu'à validation par l'équipe.
            </p>

            <button
                type="submit"
                class="w-full rounded-2xl bg-primary px-6 py-3 text-sm font-semibold text-white shadow-md transition hover:bg-primary-hover sm:w-auto">
                Envoyer le produit
            </button>
        </div>
    </form>
</section>

<button
    type="button"
    id="sticky-product-request-button"
    onclick="scrollToProductRequestForm()"
    class="fixed bottom-4 left-4 right-4 z-50 inline-flex items-center justify-center gap-2 rounded-pill bg-primary px-5 py-3 text-sm font-semibold text-white shadow-card transition-all duration-300 hover:scale-[1.03] hover:bg-primary-hover md:bottom-6 md:left-auto md:right-6 md:w-auto">
    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" aria-hidden="true">
        <path d="M12 5v14M5 12h14" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
    </svg>
    Produit introuvable ?
</button>

<script>
    const productRequestSection = document.getElementById('product-request-form');
    const stickyProductRequestButton = document.getElementById('sticky-product-request-button');

    function scrollToProductRequestForm() {
        if (!productRequestSection) return;

        productRequestSection.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    }

    function toggleProductRequestStickyButton() {
        if (!productRequestSection || !stickyProductRequestButton) return;

        const sectionRect = productRequestSection.getBoundingClientRect();
        const isVisible = sectionRect.top <= window.innerHeight * 0.65 && sectionRect.bottom >= 0;

        if (isVisible) {
            stickyProductRequestButton.classList.add('hidden');
        } else {
            stickyProductRequestButton.classList.remove('hidden');
        }
    }

    window.addEventListener('scroll', toggleProductRequestStickyButton);
    window.addEventListener('load', toggleProductRequestStickyButton);
    window.addEventListener('resize', toggleProductRequestStickyButton);
</script>
