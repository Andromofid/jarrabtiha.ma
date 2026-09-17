<x-app-layout-market>
    <main class="mx-auto  max-w-7xl  px-4 pb-24 pt-6 sm:px-6 sm:pb-12 sm:pt-10">
        @php
        $avg = round($product->rating_avg ?? 0);
        @endphp

        <section
            class="relative overflow-hidden rounded-2xl border border-border bg-ink shadow-soft">

            {{-- Background image --}}
            <div class="absolute inset-0">
                <img
                    src="{{ $product->image ? asset('storage/' . $product->image) : asset('icon.png') }}"
                    alt="Photo du produit {{ $product->name }}"
                    class="h-full w-full object-cover">

                {{-- Overlay --}}
                <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/45 to-black/15"></div>

                {{-- Soft pink overlay --}}
                <div class="absolute inset-0 bg-primary/10"></div>
            </div>


            {{-- Content --}}
            <div class="relative flex min-h-[220px] items-end p-5 sm:min-h-[180px] sm:p-7 lg:min-h-[320px] lg:p-10">

                <div class="w-full max-w-3xl">

                    {{-- Meta --}}
                    <div class="flex flex-wrap items-center gap-2">

                        <span class="rounded-pill border border-white/20 bg-white/15 px-3 py-1 text-xs font-bold uppercase tracking-[0.16em] text-white backdrop-blur-sm">
                            {{ $product->brand ?: 'Marque non précisée' }}
                        </span>

                        <span class="rounded-pill border border-white/20 bg-white/15 px-3 py-1 text-xs font-semibold text-white/90 backdrop-blur-sm">
                            {{ $product->category?->parent?->name ?? 'Beauté' }}
                        </span>

                        @if($product->category)
                        <span class="rounded-pill border border-white/20 bg-white/15 px-3 py-1 text-xs font-semibold text-white/90 backdrop-blur-sm">
                            {{ $product->category->name }}
                        </span>
                        @endif

                    </div>


                    {{-- Title --}}
                    <h1 class="mt-4 max-w-2xl font-display text-3xl font-bold leading-tight text-white sm:text-4xl lg:text-5xl">
                        {{ $product->name }}
                    </h1>


                    {{-- Rating --}}
                    <div class="mt-4 flex flex-wrap items-center gap-3">

                        <div
                            class="flex items-center gap-0.5 text-lg"
                            aria-label="{{ number_format($product->rating_avg ?? 0, 1) }} sur 5">
                            @for ($i = 1; $i <= 5; $i++)
                                <span class="{{ $i <= $avg ? 'text-[#F4C46A]' : 'text-white/35' }}">
                                &#9733;
                                </span>
                                @endfor
                        </div>

                        <span class="text-sm font-bold text-white">
                            {{ number_format($product->rating_avg ?? 0, 1) }}/5
                        </span>

                        <a
                            href="#reviews"
                            class="text-sm font-semibold text-white/85 underline-offset-4 transition hover:text-white hover:underline focus:outline-none focus:ring-2 focus:ring-white/50">
                            {{ $product->rating_count }} avis
                        </a>

                    </div>


                    {{-- Actions --}}
                    <div class="mt-6 flex flex-col gap-3 sm:flex-row sm:flex-wrap">

                        <a
                            href="#review-form"
                            onclick="openReviewForm(event)"
                            class="
                        inline-flex min-h-12 items-center justify-center
                        rounded-pill bg-primary px-6 py-3
                        text-sm font-bold text-white
                        shadow-soft transition
                        hover:bg-primary-hover
                        focus:outline-none focus:ring-2 focus:ring-white/50
                    ">
                            Jarrabti ce produit ?
                        </a>


                        <a
                            href="{{ $product->where_to_buy ?? '#' }}"
                            target="_blank"
                            rel="noreferrer"
                            class="
                            inline-flex min-h-12 items-center justify-center
                            rounded-pill border border-white/30
                            bg-white/15 px-6 py-3
                            text-sm font-bold text-white
                            backdrop-blur-sm
                            transition
                            hover:bg-white/25
                            focus:outline-none focus:ring-2 focus:ring-white/50
                        ">
                            Où acheter ?
                        </a>


                        <a
                            href="#reviews"
                            class="
                        inline-flex min-h-12 items-center justify-center
                        rounded-pill border border-white/30
                        bg-black/10 px-6 py-3
                        text-sm font-bold text-white
                        backdrop-blur-sm
                        transition
                        hover:bg-white/15
                        focus:outline-none focus:ring-2 focus:ring-white/50
                    ">
                            Voir les avis
                        </a>

                    </div>

                </div>

            </div>

        </section>

        <section class=" mt-8 grid gap-8 lg:grid-cols-[minmax(0,2fr)_minmax(280px,1fr)]">
            <div class="min-w-0 space-y-5">
                <section id="reviews" class="scroll-mt-24 rounded-2xl border border-border bg-white p-5 shadow-soft sm:p-6">

                    <div class="flex flex-col gap-5 lg:flex-row lg:items-start lg:justify-between">
                        <div>
                            <p class="text-xs font-bold uppercase tracking-[0.18em] text-primary">
                                Avis de la communauté
                            </p>

                            <h2 class="mt-2 font-display text-3xl font-bold text-ink sm:text-4xl">
                                Ce que la communauté en pense
                            </h2>
                        </div>
                    </div>

                    <div
                        x-data="{ open: false }"
                        class="mt-6 rounded-2xl border border-border bg-cream">

                        {{-- Filter toggle --}}
                        <button
                            type="button"
                            @click="open = !open"
                            class="flex w-full items-center justify-between gap-4 px-4 py-4 text-left sm:px-5"
                            :aria-expanded="open">
                            <div>
                                <p class="text-sm font-bold text-ink">
                                    Filtrer les avis
                                </p>
                            </div>

                            <div class="flex items-center gap-3">

                                {{-- Active filter indicator --}}
                                @if (request()->hasAny(['rating', 'sort', 'recommend']))
                                <span class="rounded-full bg-primary px-2.5 py-1 text-xs font-bold text-white">
                                    Filtres actifs
                                </span>
                                @endif

                                {{-- Arrow --}}
                                <svg
                                    class="h-5 w-5 text-ink-soft transition-transform duration-200"
                                    :class="{ 'rotate-180': open }"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                    aria-hidden="true">
                                    <path
                                        fill-rule="evenodd"
                                        d="M5.23 7.21a.75.75 0 011.06.02L10 11.17l3.71-3.94a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                        clip-rule="evenodd" />
                                </svg>

                            </div>
                        </button>

                        {{-- Filter content --}}
                        <div
                            x-show="open"
                            x-collapse
                            class="border-t border-border">
                            <form method="GET" class="space-y-4 p-4 sm:p-5">

                                @foreach (request()->query() as $key => $value)
                                @if ($key !== 'rating' && $key !== 'sort' && $key !== 'recommend')
                                <input
                                    type="hidden"
                                    name="{{ $key }}"
                                    value="{{ $value }}">
                                @endif
                                @endforeach


                                <div class="flex flex-col gap-4">

                                    {{-- Rating --}}
                                    <div>
                                        <p class="mb-3 text-xs font-bold uppercase tracking-wide text-ink-soft">
                                            Note
                                        </p>

                                        <div class="flex flex-wrap gap-2">

                                            <label class="cursor-pointer">
                                                <input
                                                    type="radio"
                                                    name="rating"
                                                    value=""
                                                    class="peer sr-only"
                                                    @checked(request('rating')===null)>

                                                <span class="
                                    inline-flex min-h-10 items-center justify-center
                                    rounded-pill border border-border bg-white
                                    px-4 py-2 text-sm font-semibold text-ink-soft
                                    transition
                                    peer-checked:border-primary
                                    peer-checked:bg-primary
                                    peer-checked:text-white
                                ">
                                                    Tous
                                                </span>
                                            </label>


                                            @for ($i = 5; $i >= 1; $i--)

                                            <label class="cursor-pointer">

                                                <input
                                                    type="radio"
                                                    name="rating"
                                                    value="{{ $i }}"
                                                    class="peer sr-only"
                                                    @checked(request('rating')==$i)>

                                                <span class="
                                        inline-flex min-h-10 items-center justify-center gap-1
                                        rounded-pill border border-border bg-white
                                        px-4 py-2 text-sm font-semibold text-ink-soft
                                        transition
                                        peer-checked:border-primary
                                        peer-checked:bg-primary
                                        peer-checked:text-white
                                    ">
                                                    {{ $i }}
                                                    <span>★</span>
                                                </span>

                                            </label>

                                            @endfor

                                        </div>
                                    </div>


                                    {{-- Sort --}}
                                    <div>

                                        <p class="mb-3 text-xs font-bold uppercase tracking-wide text-ink-soft">
                                            Trier par
                                        </p>

                                        @php
                                        $sorts = [
                                        'latest' => 'Plus récents',
                                        'oldest' => 'Plus anciens',
                                        ];

                                        $activeSort = request('sort', 'latest');
                                        @endphp


                                        <div class="flex flex-col gap-3 sm:flex-row sm:items-center">

                                            <div class="grid grid-cols-2 rounded-pill border border-border bg-white p-1">

                                                @foreach ($sorts as $value => $label)

                                                <label class="cursor-pointer">

                                                    <input
                                                        type="radio"
                                                        name="sort"
                                                        value="{{ $value }}"
                                                        class="peer sr-only"
                                                        @checked($activeSort===$value)>

                                                    <span class="
                                            flex min-h-9 items-center justify-center
                                            rounded-pill px-4 py-2
                                            text-xs font-bold text-ink-soft
                                            transition
                                            peer-checked:bg-primary
                                            peer-checked:text-white
                                            sm:text-sm
                                        ">
                                                        {{ $label }}
                                                    </span>

                                                </label>

                                                @endforeach

                                            </div>


                                            {{-- Recommended --}}
                                            <label class="
                                flex min-h-11 cursor-pointer
                                items-center justify-between gap-3
                                rounded-pill border border-border
                                bg-white px-4 py-2
                            ">

                                                <span class="text-sm font-semibold text-ink">
                                                    Recommandés
                                                </span>

                                                <span class="relative inline-flex h-6 w-11 shrink-0 items-center">

                                                    <input
                                                        type="checkbox"
                                                        name="recommend"
                                                        value="1"
                                                        class="peer sr-only"
                                                        @checked(request('recommend')==='1' )>

                                                    <span class="
                                        absolute inset-0 rounded-full
                                        bg-border transition
                                        peer-checked:bg-primary
                                    "></span>

                                                    <span class="
                                        absolute left-0.5 top-0.5
                                        h-5 w-5 rounded-full
                                        bg-white shadow transition
                                        peer-checked:translate-x-5
                                    "></span>

                                                </span>

                                            </label>

                                        </div>

                                    </div>

                                </div>


                                {{-- Actions --}}
                                <div class="
                    flex flex-col gap-2
                    border-t border-border pt-4
                    sm:flex-row sm:items-center sm:justify-end
                ">

                                    @if (request()->hasAny(['rating', 'sort', 'recommend']))

                                    <a
                                        href="{{ url()->current() }}"
                                        class="
                                inline-flex min-h-10 items-center justify-center
                                rounded-pill border border-border
                                bg-white px-5 py-2
                                text-sm font-semibold text-ink-soft
                                transition
                                hover:border-primary hover:text-primary
                                focus:outline-none focus:ring-2 focus:ring-primary/30
                            ">
                                        Réinitialiser
                                    </a>

                                    @endif


                                    <button
                                        type="submit"
                                        class="
                            inline-flex min-h-10 items-center justify-center
                            rounded-pill bg-primary px-6 py-2
                            text-sm font-bold text-white
                            shadow-soft transition
                            hover:bg-primary-hover
                            focus:outline-none focus:ring-2 focus:ring-primary/30
                        ">
                                        Appliquer
                                    </button>

                                </div>

                            </form>
                        </div>

                    </div>

                </section>

                <div class="space-y-4">
                    @forelse ($reviews as $review)
                    <article class="rounded-2xl border border-border bg-white p-4 shadow-soft transition duration-300 hover:border-primary/20 sm:p-5">
                        <div class="flex gap-3 sm:gap-4">
                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-primary-soft text-base font-black text-primary">
                                {{ mb_substr($review->user?->name ?? 'M', 0, 1) }}
                            </div>

                            <div class="min-w-0 flex-1">
                                <div class="flex flex-col gap-2 sm:flex-row sm:items-start sm:justify-between">
                                    <div class="min-w-0">
                                        <div class="flex flex-wrap items-center gap-2">
                                            <h3 class="truncate text-base font-bold text-ink">
                                                {{ $review->user?->name ?? 'Membre de la communauté' }}
                                            </h3>

                                            @if ($review->verified)
                                            <span class="rounded-pill bg-primary-soft px-2.5 py-1 text-xs font-bold text-primary">
                                                V&eacute;rifi&eacute;
                                            </span>
                                            @endif

                                            @if ($review->would_recommend)
                                            <span class="rounded-pill bg-success-soft px-2.5 py-1 text-xs font-bold text-success">
                                                Recommand&eacute;
                                            </span>
                                            @endif
                                        </div>

                                        <div class="mt-1 flex flex-wrap items-center gap-2 text-sm">
                                            <div class="flex text-[#C9956C]" aria-label="{{ $review->rating }} sur 5">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <span class="{{ $i <= (int) $review->rating ? 'text-[#C9956C]' : 'text-border' }}">&#9733;</span>
                                                    @endfor
                                            </div>

                                            <span class="text-xs font-semibold text-ink-soft">
                                                {{ $review->created_at?->format('d/m/Y') }}
                                            </span>
                                        </div>
                                    </div>

                                    <span class="inline-flex w-fit shrink-0 rounded-pill border border-border bg-cream px-3 py-1 text-xs font-semibold text-ink-soft">
                                        {{ $review->likes_count }} utile(s)
                                    </span>
                                </div>

                                <p class="mt-3 text-[15px] leading-7 text-ink-soft">
                                    {{ $review->body ?: 'Aucun détail supplémentaire n’a été partagé pour cet avis.' }}
                                </p>

                                <div class="mt-4 flex flex-wrap items-center gap-2">
                                    <span class="rounded-pill border border-border bg-cream px-3 py-1.5 text-xs font-semibold text-ink-soft">
                                        Dur&eacute;e du test : {{ $review->result_duration_label }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </article>
                    @empty
                    <div class="rounded-2xl border border-dashed border-border bg-white px-6 py-12 text-center shadow-soft">
                        <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-primary-soft text-2xl text-primary">
                            &#10077;
                        </div>

                        <h3 class="mt-5 text-2xl font-bold text-ink">
                            Pas encore d&rsquo;avis
                        </h3>

                        <p class="mx-auto mt-3 max-w-xl text-ink-soft">
                            Ce produit attend encore ses premiers retours. Soyez la premi&egrave;re &agrave; partager votre exp&eacute;rience.
                        </p>
                    </div>
                    @endforelse
                </div>

                @if ($reviews->hasPages())
                <div class="pt-2">
                    {{ $reviews->links() }}
                </div>
                @endif

                <x-review-form :product="$product" />
            </div>

            <aside class="space-y-5 lg:sticky lg:top-24 lg:self-start">
                <section class="rounded-2xl border border-primary/15 bg-[#FDF8F5] p-5 shadow-soft">
                    <p class="text-xs font-bold uppercase tracking-[0.18em] text-primary">Votre exp&eacute;rience compte</p>
                    <h2 class="mt-2 text-2xl font-bold text-ink">Vous avez test&eacute; ce produit ?</h2>
                    <p class="mt-2 text-sm leading-6 text-ink-soft">
                        Partagez votre exp&eacute;rience avec la communaut&eacute;.
                    </p>

                    <a
                        href="#review-form"
                        onclick="openReviewForm(event)"
                        class="mt-5 inline-flex w-full min-h-11 items-center justify-center rounded-pill bg-primary px-5 py-3 text-sm font-bold text-white transition hover:bg-primary-hover focus:outline-none focus:ring-2 focus:ring-primary/30">
                        &Eacute;crire un avis
                    </a>
                </section>

                <section class="rounded-2xl border border-border bg-white p-4 shadow-soft">
                    <div class="mb-4 flex items-end justify-between gap-3">
                        <div>
                            <p class="text-xs font-bold uppercase tracking-[0.16em] text-primary">&Agrave; voir aussi</p>
                            <h2 class="mt-1 text-xl font-bold text-ink">Produits similaires</h2>
                        </div>
                    </div>

                    <div class="space-y-3">
                        @forelse ($relatedProducts as $relatedProduct)
                        <a
                            href="{{ route('products.show', $relatedProduct->slug) }}"
                            class="flex gap-3 rounded-xl border border-border bg-cream p-2.5 transition hover:border-primary/30 hover:bg-white focus:outline-none focus:ring-2 focus:ring-primary/30">

                            <img
                                src="{{$relatedProduct->image ? asset('storage/' . $relatedProduct->image):asset('logo.png') }}"
                                alt="Photo du produit {{ $relatedProduct->name }}"
                                class="h-16 w-16 shrink-0 rounded-xl object-cover">

                            <div class="min-w-0 flex-1">
                                <p class="truncate text-xs font-bold text-primary">
                                    {{ $relatedProduct->brand ?: 'Marque non précisée' }}
                                </p>

                                <h3 class="mt-1 line-clamp-2 text-sm font-semibold leading-5 text-ink">
                                    {{ $relatedProduct->name }}
                                </h3>

                                <p class="mt-1 text-xs font-semibold text-ink-soft">
                                    {{ number_format($relatedProduct->rating_avg ?? 0, 1) }}/5 &middot; {{ $relatedProduct->rating_count }} avis
                                </p>
                            </div>
                        </a>
                        @empty
                        <div class="rounded-xl border border-dashed border-border bg-cream p-4 text-sm text-ink-soft">
                            Aucun produit similaire disponible pour le moment.
                        </div>
                        @endforelse
                    </div>
                </section>
            </aside>
        </section>

        <a
            href="#review-form"
            onclick="openReviewForm(event)"
            id="sticky-review-button"
            class="fixed bottom-4 left-5 right-5 z-50 inline-flex min-h-12 items-center justify-center rounded-pill bg-primary px-5 py-3 text-center text-sm font-bold text-white shadow-card transition hover:bg-primary-hover focus:outline-none focus:ring-2 focus:ring-primary/30 md:hidden">
            Jarrabti ce produit ?
        </a>
    </main>

    <script>
        const formSection = document.getElementById('review-form');
        const stickyButton = document.getElementById('sticky-review-button');

        function openReviewForm(event) {
            if (event) {
                event.preventDefault();
            }

            if (!formSection) return;

            formSection.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }

        function toggleStickyButton() {
            if (!formSection || !stickyButton) return;

            const formRect = formSection.getBoundingClientRect();
            const formHasBeenReached = formRect.top < window.innerHeight * 0.85;

            if (formHasBeenReached) {
                stickyButton.classList.add('hidden');
            } else {
                stickyButton.classList.remove('hidden');
            }
        }

        window.addEventListener('scroll', toggleStickyButton, {
            passive: true
        });
        window.addEventListener('resize', toggleStickyButton);
        window.addEventListener('load', toggleStickyButton);
        toggleStickyButton();
    </script>
</x-app-layout-market>