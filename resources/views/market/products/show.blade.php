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

            <div class="space-y-6">

                {{-- Header --}}
                <div class="rounded-[2rem] border border-border bg-white p-6 shadow-soft">
                    <div class="flex flex-col gap-5 lg:flex-row lg:items-end lg:justify-between">

                        <div>
                            <span class="inline-flex rounded-full bg-primary-soft px-4 py-2 text-xs font-bold uppercase tracking-wide text-primary">
                                Avis de la communauté
                            </span>
                        </div>


                    </div>

                    {{-- Filters Dropdown --}}
                    <div x-data="{ open: false }" class="sticky top-24 z-20 mt-6">
                        <button
                            type="button"
                            @click="open = !open"
                            class="flex w-full items-center justify-between rounded-3xl border border-border bg-white px-5 py-4 text-left shadow-soft transition hover:border-primary/40">

                            <div>
                                <p class="text-sm font-bold text-brown">Filtrer les avis</p>
                                <p class="mt-1 text-xs text-brown-soft">
                                    Note, tri et recommandations
                                </p>
                            </div>

                            <svg
                                class="h-5 w-5 text-brown-soft transition"
                                :class="{ 'rotate-180': open }"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <form
                            x-show="open"
                            x-transition
                            @click.outside="open = false"
                            method="GET"
                            class="mt-3 rounded-3xl border border-border bg-white p-4 shadow-card sm:p-5 ">
                            {{-- Preserve other query parameters --}}
                            @foreach (request()->query() as $key => $value)
                            @if ($key !== 'rating' && $key !== 'sort')
                            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                            @endif
                            @endforeach

                            <div class="space-y-5">

                                {{-- Rating --}}
                                <div>
                                    <p class="mb-3 text-xs font-semibold uppercase tracking-wide text-brown-soft">
                                        Note
                                    </p>

                                    <div class="grid grid-cols-3 gap-2 sm:grid-cols-6">
                                        <label class="cursor-pointer">
                                            <input type="radio" name="rating" value="" class="peer sr-only" @checked(request('rating')===null)>
                                            <span class="flex justify-center rounded-pill border border-border bg-cream px-4 py-2.5 text-sm font-medium text-brown-soft transition peer-checked:border-primary peer-checked:bg-primary peer-checked:text-white">
                                                Toutes
                                            </span>
                                        </label>

                                        @for ($i = 5; $i >= 1; $i--)
                                        <label class="cursor-pointer">
                                            <input type="radio" name="rating" value="{{ $i }}" class="peer sr-only" @checked(request('rating')==$i)>
                                            <span class="flex justify-center gap-1 rounded-pill border border-border bg-cream px-4 py-2.5 text-sm font-medium text-brown-soft transition peer-checked:border-primary peer-checked:bg-primary peer-checked:text-white">
                                                {{ $i }} <span>★</span>
                                            </span>
                                        </label>
                                        @endfor
                                    </div>
                                </div>

                                {{-- Sort --}}
                                <div>
                                    <p class="mb-3 text-xs font-semibold uppercase tracking-wide text-brown-soft">
                                        Trier
                                    </p>

                                    <div class="grid grid-cols-2 rounded-pill border border-border bg-cream p-1">
                                        @php
                                        $sorts = ['latest' => 'Plus récents', 'oldest' => 'Plus anciens'];
                                        $activeSort = request('sort', 'latest');
                                        @endphp

                                        @foreach ($sorts as $value => $label)
                                        <label class="cursor-pointer">
                                            <input type="radio" name="sort" value="{{ $value }}" class="peer sr-only" @checked($activeSort===$value)>
                                            <span class="flex justify-center rounded-pill px-4 py-2.5 text-sm font-medium text-brown-soft transition peer-checked:bg-primary peer-checked:text-white">
                                                {{ $label }}
                                            </span>
                                        </label>
                                        @endforeach
                                    </div>
                                </div>

                                {{-- Recommend --}}
                                <label class="flex cursor-pointer items-center justify-between rounded-2xl border border-border bg-cream px-4 py-3">
                                    <span class="text-sm font-semibold text-brown">
                                        Recommandé uniquement
                                    </span>

                                    <span class="relative ml-4 inline-flex h-6 w-11 shrink-0 items-center">
                                        <input type="checkbox" name="recommend" value="1" class="peer sr-only" @checked(request('recommend')==='1' )>
                                        <span class="absolute inset-0 rounded-full bg-border transition peer-checked:bg-primary"></span>
                                        <span class="absolute left-0.5 top-0.5 h-5 w-5 rounded-full bg-white shadow transition peer-checked:translate-x-5"></span>
                                    </span>
                                </label>

                                {{-- Actions --}}
                                <div class="flex items-center gap-3 border-t border-border pt-4">
                                    @if (request()->hasAny(['rating', 'sort', 'recommend']))
                                    <a href="{{ url()->current() }}"
                                        class="flex-1 rounded-pill border border-border px-5 py-2.5 text-center text-sm font-semibold text-brown-soft transition hover:border-primary hover:text-primary">
                                        Réinitialiser
                                    </a>
                                    @endif

                                    <button class="flex-1 rounded-pill bg-primary px-6 py-2.5 text-sm font-bold text-white shadow-soft transition hover:bg-primary-hover">
                                        Appliquer
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

                {{-- Reviews --}}
                @forelse ($reviews as $review)
                <article class="group rounded-[1.75rem] border border-border bg-white p-5 shadow-soft transition duration-300 hover:-translate-y-1 hover:shadow-card sm:p-6">

                    <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">

                        <div class="flex gap-4">
                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-primary-soft text-lg font-black text-primary">
                                {{ mb_substr($review->user?->name ?? 'M', 0, 1) }}
                            </div>

                            <div>
                                <div class="flex flex-wrap items-center gap-2">
                                    <h3 class="text-lg font-bold text-brown">
                                        {{ $review->user?->name ?? 'Membre de la communauté' }}
                                    </h3>

                                    @if ($review->verified)
                                    <span class="rounded-full bg-primary-soft px-3 py-1 text-xs font-bold text-primary">
                                        Vérifié
                                    </span>
                                    @endif

                                    @if ($review->would_recommend)
                                    <span class="rounded-full bg-green-50 px-3 py-1 text-xs font-bold text-green-700">
                                        Recommandé
                                    </span>
                                    @endif
                                    <div class="text-lg font-black text-primary bg-cream px-3 py-1 rounded-full">
                                        {{ str_repeat('★', (int) $review->rating) }}
                                    </div>
                                </div>

                                <p class="mt-1 text-sm text-brown-soft">
                                    {{ $review->created_at?->format('d/m/Y') }}
                                </p>
                            </div>
                        </div>
                    </div>


                    <p class="mt-3 text-[15px] leading-7 text-brown-soft">
                        {{ $review->body ?: 'Aucun détail supplémentaire n’a été partagé pour cet avis.' }}
                    </p>

                    <div class="mt-5 flex flex-wrap items-center gap-2">
                        <span class="rounded-full border border-border bg-cream px-4 py-2 text-xs font-semibold text-brown-soft">
                            Durée du test : {{ $review->result_duration_label }}
                        </span>
                    </div>
                </article>
                @empty
                <div class="rounded-[2rem] border border-dashed border-border bg-white px-6 py-14 text-center shadow-soft">
                    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-primary-soft text-3xl">
                        💬
                    </div>

                    <h3 class="mt-5 text-2xl font-bold text-brown">
                        Pas encore d’avis
                    </h3>

                    <p class="mx-auto mt-3 max-w-xl text-brown-soft">
                        Ce produit attend encore ses premiers retours. Soyez la première à partager votre expérience.
                    </p>
                </div>
                @endforelse

                {{-- Pagination --}}
                @if ($reviews->hasPages())
                <div class="pt-2">
                    {{ $reviews->links() }}
                </div>
                @endif

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