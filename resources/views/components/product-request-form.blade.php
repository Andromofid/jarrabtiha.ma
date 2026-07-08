<section id="product-request-form" class="scroll-mt-24 rounded-[2rem] border border-border bg-white p-5 shadow-soft sm:p-6 lg:p-8">
    <div class="flex flex-col gap-4 lg:flex-row lg:items-start lg:justify-between">
        <div class="max-w-2xl">
            <span class="inline-flex rounded-full bg-primary-soft px-4 py-2 text-xs font-bold uppercase tracking-wide text-primary">
                Produit introuvable ?
            </span>
            <h2 class="mt-4 font-display text-3xl font-bold text-brown">
                Ajoute le produit pour qu'on puisse le vérifier
            </h2>
            <p class="mt-3 text-sm leading-6 text-brown-soft">
                Si tu ne trouves pas ton produit, envoie ses informations ici. Il sera ajouté avec le statut en attente de validation avant d'apparaître publiquement.
            </p>
        </div>
    </div>

    @guest
    <div class="mt-8 rounded-2xl border border-[#F2D0C4] bg-[#FDF8F5] p-5 text-center sm:p-6">
        <h3 class="text-xl font-bold text-brown">Connecte-toi pour proposer un produit</h3>
        <p class="mx-auto mt-3 max-w-xl text-sm text-brown-soft">
            Crée un compte ou connecte-toi pour envoyer un produit à notre équipe de modération.
        </p>

        <div class="mt-6 flex flex-col gap-3 sm:flex-row sm:justify-center">
            <a
                href="{{ route('login', ['redirect' => url()->current() . '#product-request-form']) }}"
                class="w-full rounded-xl bg-[#C9956C] px-6 py-3 text-center font-semibold text-white transition hover:bg-[#3D1F1F] sm:w-auto">
                Se connecter
            </a>
            <a
                href="{{ route('register', ['redirect' => url()->current() . '#product-request-form']) }}"
                class="w-full rounded-xl border border-[#C9956C] px-6 py-3 text-center font-semibold text-[#C9956C] transition hover:bg-[#C9956C] hover:text-white sm:w-auto">
                Créer un compte
            </a>
        </div>
    </div>
    @else
    <form method="POST" action="{{ route('products.suggestions.store') }}" class="mt-8 space-y-5">
        @csrf

        <div class="grid gap-5 md:grid-cols-2">
            <div>
                <label for="suggested_name" class="mb-2 block text-sm font-semibold text-brown">
                    Nom du produit
                </label>
                <input
                    id="suggested_name"
                    name="name"
                    type="text"
                    value="{{ old('name') }}"
                    required
                    class="w-full rounded-2xl border border-[#F2D0C4] bg-[#FDF8F5] px-4 py-3 text-sm text-brown focus:border-[#C9956C] focus:outline-none focus:ring-1 focus:ring-[#C9956C]"
                    placeholder="Ex: CeraVe Gel Moussant">
            </div>

            <div>
                <label for="suggested_brand" class="mb-2 block text-sm font-semibold text-brown">
                    Marque
                </label>
                <input
                    id="suggested_brand"
                    name="brand"
                    type="text"
                    value="{{ old('brand') }}"
                    class="w-full rounded-2xl border border-[#F2D0C4] bg-[#FDF8F5] px-4 py-3 text-sm text-brown focus:border-[#C9956C] focus:outline-none focus:ring-1 focus:ring-[#C9956C]"
                    placeholder="Ex: CeraVe">
            </div>
        </div>

        <div class="grid gap-5 md:grid-cols-2">
            <div>
                <label for="suggested_category_id" class="mb-2 block text-sm font-semibold text-brown">
                    Catégorie
                </label>
                <select
                    id="suggested_category_id"
                    name="category_id"
                    required
                    class="w-full rounded-2xl border border-[#F2D0C4] bg-[#FDF8F5] px-4 py-3 text-sm text-brown focus:border-[#C9956C] focus:outline-none focus:ring-1 focus:ring-[#C9956C]">
                    <option value="">Choisir une catégorie</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected((string) old('category_id')===(string) $category->id)>
                        {{ $category->parent?->name ? $category->parent->name . ' > ' : '' }}{{ $category->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="suggested_where_to_buy" class="mb-2 block text-sm font-semibold text-brown">
                    Lien du produit
                </label>
                <input
                    id="suggested_where_to_buy"
                    name="where_to_buy"
                    type="url"
                    value="{{ old('where_to_buy') }}"
                    class="w-full rounded-2xl border border-[#F2D0C4] bg-[#FDF8F5] px-4 py-3 text-sm text-brown focus:border-[#C9956C] focus:outline-none focus:ring-1 focus:ring-[#C9956C]"
                    placeholder="https://...">
            </div>
        </div>

        <div>
            <label for="suggested_description" class="mb-2 block text-sm font-semibold text-brown">
                Détails ou mini review
            </label>
            <textarea
                id="suggested_description"
                name="description"
                rows="4"
                class="w-full rounded-2xl border border-[#F2D0C4] bg-[#FDF8F5] px-4 py-3 text-sm text-brown focus:border-[#C9956C] focus:outline-none focus:ring-1 focus:ring-[#C9956C]"
                placeholder="Ajoute des détails utiles pour reconnaître le produit ou partager un premier retour.">{{ old('description') }}</textarea>
        </div>

        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <p class="max-w-2xl text-sm text-brown-soft">
                Le produit sera enregistré comme non approuvé jusqu'à validation par l'équipe.
            </p>

            <button
                type="submit"
                class="w-full rounded-2xl bg-[#C9956C] px-6 py-3 text-sm font-semibold text-white shadow-md transition hover:bg-[#3D1F1F] sm:w-auto">
                Envoyer le produit
            </button>
        </div>
    </form>
    @endguest
</section>

<button
    type="button"
    id="sticky-product-request-button"
    onclick="scrollToProductRequestForm()"
    class="fixed bottom-4 left-4 right-4 z-50 rounded-full bg-primary px-5 py-3 text-center text-sm font-bold text-white shadow-card transition hover:bg-primary-hover md:left-auto md:w-[300px]">
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