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

        <section class="rounded-3xl border border-border bg-white p-3 shadow-soft sm:p-4">
            <div class="flex gap-3 sm:gap-5">

                {{-- Image --}}
                <div class="shrink-0">
                    <div class="h-28 w-24 overflow-hidden rounded-2xl bg-primary-soft/40 sm:h-36 sm:w-32 md:h-40 md:w-36">
                        <img
                            src="{{ $product->image ? asset('storage/' . $product->image) : asset('logo.png') }}"
                            alt="{{ $product->name }}"
                            class="h-full w-full object-cover">
                    </div>
                </div>

                {{-- Content --}}
                <div class="min-w-0 flex-1">
                    <div class="flex flex-wrap items-center gap-2">

                    </div>

                    <p class="mt-2 text-[10px] font-bold uppercase tracking-[0.18em] text-primary">
                        {{ $product->brand ?: 'Marque non précisée' }}
                        <span class="rounded-full border border-primary/20 bg-white px-2.5 py-1 text-[10px] font-semibold text-primary">
                            {{ $product->category?->parent?->name ?? 'Beauté' }}
                        </span>

                        @if($product->category)
                        <span class="hidden rounded-full bg-cream px-2.5 py-1 text-[10px] font-semibold text-brown-soft sm:inline-flex">
                            {{ $product->category->name }}
                        </span>
                        @endif
                    </p>

                    <h1 class="mt-1 line-clamp-2 text-lg font-bold leading-tight text-brown sm:text-2xl md:text-3xl">
                        {{ $product->name }}

                    </h1>

                    @php
                    $avg = round($product->rating_avg ?? 0);
                    @endphp

                    <div class="mt-2 flex flex-wrap items-center gap-2">
                        <div class="flex text-sm text-yellow-400 sm:text-base">
                            @for ($i = 1; $i <= 5; $i++)
                                <span class="{{ $i <= $avg ? 'text-yellow-400' : 'text-gray-300' }}">★</span>
                                @endfor
                        </div>

                        <span class="text-xs font-bold text-brown">
                            {{ number_format($product->rating_avg ?? 0, 1) }}
                        </span>

                        <span class="text-xs text-brown-soft">
                            ({{ $product->rating_count }} avis)
                        </span>
                    </div>

                    {{-- Buttons --}}
                    <div class="mt-3 flex flex-wrap gap-2">

                        <a
                            href="{{ $product->where_to_buy }}"
                            target="_blank"
                            rel="noreferrer"
                            class="rounded-full bg-primary px-4 py-2 text-[11px] font-bold text-white transition hover:bg-primary-hover">
                            Acheter
                        </a>

                        <button
                            type="button"
                            onclick="openReviewForm()"
                            class="rounded-full border border-primary bg-white px-4 py-2 text-[11px] font-bold text-primary transition hover:bg-primary hover:text-white">
                            Jarrabti le produit ?
                        </button>
                    </div>
                </div>
            </div>
        </section>

        {{-- Sticky mobile button --}}
        <a
            onclick="openReviewForm()"
            id="sticky-review-button"
            class="fixed bottom-4 left-4 right-4 z-50 rounded-full bg-primary py-3 text-center text-sm font-bold text-white shadow-card md:hidden">
            Jarrabti le produit ?
        </a>

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
                                    {{ $review->user?->name ?? 'Membre de la communauté' }}

                                </h3>

                                @if ($review->verified)
                                <span class="rounded-full bg-primary-soft px-3 py-1 text-xs font-semibold text-primary">
                                    Vérifié
                                </span>
                                @endif
                            </div>

                            <p class="mt-1 text-sm text-brown-soft flex items-center gap-2">
                                {{ $review->created_at?->format('d/m/Y') }}
                            </p>
                        </div>

                        <div class="rounded-xl bg-cream px-3 py-2 text-right">
                            <p class="text-base font-semibold text-primary">{{ $review->stars }}</p>
                        </div>
                    </div>

                    <p class="mt-4 text-[15px] leading-7 text-brown-soft">
                        {{ $review->body ?: 'Aucun détail supplémentaire n’a été partagé pour cet avis.' }}
                    </p>

                    <div class="mt-4 flex flex-wrap gap-2 text-xs items-center justify-between">
                        <div>
                            <span class="rounded-full border border-border bg-cream px-3 py-2 text-brown-soft ">
                                Durée du test : {{ $review->result_duration_label }}
                            </span>
                            @if ($review->would_recommend )
                            <span class="rounded-full border border-border bg-cream px-3 py-2 ml-2 text-brown-soft">
                                Recommandé
                            </span>
                            @endif
                        </div>
                        <!-- likes -->
                        <!-- <form action="">
                            <button type="button" class="flex items-center gap-2 rounded-full border border-border bg-cream px-3 py-2 text-brown-soft hover:bg-primary-soft hover:text-primary transition">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5.62436 4.4241C3.96537 5.18243 2.75 6.98614 2.75 9.13701C2.75 11.3344 3.64922 13.0281 4.93829 14.4797C6.00072 15.676 7.28684 16.6675 8.54113 17.6345C8.83904 17.8642 9.13515 18.0925 9.42605 18.3218C9.95208 18.7365 10.4213 19.1004 10.8736 19.3647C11.3261 19.6292 11.6904 19.7499 12 19.7499C12.3096 19.7499 12.6739 19.6292 13.1264 19.3647C13.5787 19.1004 14.0479 18.7365 14.574 18.3218C14.8649 18.0925 15.161 17.8642 15.4589 17.6345C16.7132 16.6675 17.9993 15.676 19.0617 14.4797C20.3508 13.0281 21.25 11.3344 21.25 9.13701C21.25 6.98614 20.0346 5.18243 18.3756 4.4241C16.7639 3.68739 14.5983 3.88249 12.5404 6.02065C12.399 6.16754 12.2039 6.25054 12 6.25054C11.7961 6.25054 11.601 6.16754 11.4596 6.02065C9.40166 3.88249 7.23607 3.68739 5.62436 4.4241ZM12 4.45873C9.68795 2.39015 7.09896 2.10078 5.00076 3.05987C2.78471 4.07284 1.25 6.42494 1.25 9.13701C1.25 11.8025 2.3605 13.836 3.81672 15.4757C4.98287 16.7888 6.41022 17.8879 7.67083 18.8585C7.95659 19.0785 8.23378 19.292 8.49742 19.4998C9.00965 19.9036 9.55954 20.3342 10.1168 20.6598C10.6739 20.9853 11.3096 21.2499 12 21.2499C12.6904 21.2499 13.3261 20.9853 13.8832 20.6598C14.4405 20.3342 14.9903 19.9036 15.5026 19.4998C15.7662 19.292 16.0434 19.0785 16.3292 18.8585C17.5898 17.8879 19.0171 16.7888 20.1833 15.4757C21.6395 13.836 22.75 11.8025 22.75 9.13701C22.75 6.42494 21.2153 4.07284 18.9992 3.05987C16.901 2.10078 14.3121 2.39015 12 4.45873Z" fill="#3B2A27" />
                                </svg>

                                {{ $review->likes_count }}
                            </button>
                        </form> -->

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
                <x-review-form :product="$product" />
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
    <script>
        const formSection = document.getElementById('review-form');
        const stickyButton = document.getElementById('sticky-review-button');

        function openReviewForm() {
            if (!formSection) return;

            formSection.scrollIntoView({
                behavior: 'smooth',
                block: 'center'
            });
        }

        function toggleStickyButton() {
            if (!formSection || !stickyButton) return;

            const formTop = formSection.getBoundingClientRect().top;

            // Hide when the review form reaches the viewport
            if (formTop <= window.innerHeight * 0.4) {
                stickyButton.classList.add('hidden');
            } else {
                stickyButton.classList.remove('hidden');
            }
        }

        window.addEventListener('scroll', toggleStickyButton);
        window.addEventListener('load', toggleStickyButton);
    </script>
</body>

</html>