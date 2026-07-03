<x-app-layout>
    <main class="mx-auto max-w-4xl px-6 py-12">
        <section class="relative overflow-hidden rounded-card border border-border bg-white p-8 shadow-soft sm:p-10">
            <div class="absolute -right-16 -top-16 h-40 w-40 rounded-full bg-primary/10 blur-2xl"></div>

            <div class="relative">
                <a href="{{ route('dashboard') }}"
                    class="inline-flex items-center rounded-pill border border-border bg-white px-4 py-2 text-sm font-semibold text-brown shadow-soft transition hover:border-primary/30 hover:text-primary">
                    Retour au tableau de bord
                </a>

                <p class="mt-6 text-sm font-semibold uppercase tracking-[0.18em] text-brown-light">
                    Modifier mon avis
                </p>
                <h1 class="mt-2 font-display text-3xl font-bold text-brown sm:text-4xl">
                    {{ $review->product->name }}
                </h1>
                <p class="mt-3 max-w-2xl text-sm leading-7 text-brown-soft sm:text-base">
                    Mets Ã  jour ton ressenti, ta note et la durÃ©e d'utilisation pour garder ton avis utile Ã  la communautÃ©.
                </p>
            </div>
        </section>

        <section class="mt-8 rounded-card border border-border bg-white p-6 shadow-soft sm:p-8">
            <form method="POST" action="{{ route('reviews.update', $review) }}" class="space-y-6">
                @csrf
                @method('PUT')

                <div x-data="{ rating: {{ old('rating', $review->rating) }} }" class="space-y-6">
                    <input type="hidden" name="rating" :value="rating">

                    <div class="rounded-2xl border border-border bg-cream p-6 text-center">
                        <p class="mb-4 text-sm font-semibold text-brown">
                            Comment notes-tu ce produit aprÃ¨s utilisation ?
                        </p>

                        <div class="flex justify-center gap-3">
                            <template x-for="star in 5" :key="star">
                                <button
                                    type="button"
                                    @click="rating = star"
                                    class="text-5xl transition-transform duration-150 hover:scale-125 focus:outline-none"
                                    :class="star <= rating ? 'text-primary' : 'text-[#F2D0C4]'">
                                    ★
                                </button>
                            </template>
                        </div>

                        @error('rating')
                        <p class="mt-4 text-sm font-medium text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="body" class="mb-2 block text-sm font-semibold text-brown">
                            Ton expÃ©rience
                        </label>
                        <textarea
                            id="body"
                            name="body"
                            rows="5"
                            required
                            class="w-full rounded-2xl border border-border bg-cream px-4 py-3 text-sm text-brown placeholder:text-brown-light focus:border-primary focus:ring-0 focus:outline-none resize-none transition"
                            placeholder="Partage ce qui a changÃ©, ce que tu as aimÃ© et ce qui t'a moins convaincu.">{{ old('body', $review->body) }}</textarea>
                        @error('body')
                        <p class="mt-2 text-sm font-medium text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div>
                            <label for="result_duration" class="mb-2 block text-sm font-semibold text-brown">
                                DurÃ©e d'utilisation
                            </label>
                            <select
                                id="result_duration"
                                name="result_duration"
                                required
                                class="w-full rounded-xl border border-border bg-cream px-4 py-3 text-sm text-brown focus:border-primary focus:ring-0 focus:outline-none transition">
                                <option value="">Choisir...</option>
                                <option value="1week" {{ old('result_duration', $review->result_duration) == '1week' ? 'selected' : '' }}>1 semaine</option>
                                <option value="2weeks" {{ old('result_duration', $review->result_duration) == '2weeks' ? 'selected' : '' }}>2 semaines</option>
                                <option value="1month" {{ old('result_duration', $review->result_duration) == '1month' ? 'selected' : '' }}>1 mois</option>
                                <option value="3months" {{ old('result_duration', $review->result_duration) == '3months' ? 'selected' : '' }}>3 mois</option>
                                <option value="more" {{ old('result_duration', $review->result_duration) == 'more' ? 'selected' : '' }}>+ de 3 mois</option>
                            </select>
                            @error('result_duration')
                            <p class="mt-2 text-sm font-medium text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-semibold text-brown">
                                Recommandation
                            </label>
                            <label class="flex items-center gap-3 rounded-xl border border-border bg-cream px-4 py-3 transition hover:border-primary/30">
                                <input
                                    type="checkbox"
                                    name="would_recommend"
                                    value="1"
                                    {{ old('would_recommend', $review->would_recommend) ? 'checked' : '' }}
                                    class="h-5 w-5 rounded border-border text-primary focus:ring-primary">
                                <span class="text-sm font-semibold text-brown">
                                    Je recommande ce produit
                                </span>
                            </label>
                        </div>
                    </div>

                    <div class="flex flex-col gap-3 sm:flex-row">
                        <button type="submit"
                            class="inline-flex items-center justify-center rounded-pill bg-primary px-6 py-3 text-sm font-bold text-white shadow-soft transition hover:bg-primary-hover">
                            Enregistrer les modifications
                        </button>

                        <a href="{{ route('products.show', $review->product->slug) }}"
                            class="inline-flex items-center justify-center rounded-pill border border-border bg-white px-6 py-3 text-sm font-semibold text-brown transition hover:border-primary/30 hover:text-primary">
                            Voir le produit
                        </a>
                    </div>
                </div>
            </form>
        </section>
    </main>
</x-app-layout>