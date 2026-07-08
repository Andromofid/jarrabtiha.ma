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
            <!-- google auth -->
            <!-- Google auth -->
            <a
                href="{{ route('google.redirect', ['redirect' => url()->current() . '#review-form']) }}"
                class="flex md:w-[50%] w-full items-center justify-center gap-2 mx-auto rounded-xl border border-border py-3 font-semibold text-brown-soft transition hover:bg-brown-soft/10">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 48 48">
                    <path fill="#FFC107" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"></path>
                    <path fill="#FF3D00" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"></path>
                    <path fill="#4CAF50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z"></path>
                    <path fill="#1976D2" d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z"></path>
                </svg>
                Se connecter avec Google
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