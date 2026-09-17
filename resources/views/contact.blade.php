<x-app-layout-market>
    <main class="mx-auto max-w-7xl px-4 py-8 sm:px-6 sm:py-12">
        <div class="mb-6">
            <a
                href="{{ url()->previous() }}"
                class="inline-flex min-h-10 items-center rounded-pill border border-border bg-white px-4 py-2 text-sm font-semibold text-ink shadow-soft transition hover:border-primary/30 hover:text-primary focus:outline-none focus:ring-2 focus:ring-primary/30">
                Retour
            </a>
        </div>

        <section class="rounded-2xl border border-border bg-[#FDF8F5] px-5 py-10 shadow-soft sm:px-8 lg:px-10">
            <div class="mx-auto max-w-3xl text-center">
                <p class="text-xs font-bold uppercase tracking-[0.18em] text-primary">Jarrabtiha</p>
                <h1 class="mt-3 font-display text-4xl font-bold leading-tight text-ink sm:text-5xl">
                    Contactez-nous
                </h1>
                <p class="mt-4 text-base leading-7 text-ink-soft sm:text-lg">
                    Une question, une suggestion ou un problème ?
                    Envoyez-nous un message, l'équipe Jarrabtiha vous répondra dès que possible.
                </p>
            </div>
        </section>

        <section class="mt-8 grid gap-6 lg:grid-cols-[0.9fr_1.1fr] lg:gap-8">
            <div class="rounded-2xl border border-border bg-white p-6 shadow-soft sm:p-8">
                <p class="text-xs font-bold uppercase tracking-[0.18em] text-primary">Nous écrire</p>
                <h2 class="mt-3 text-2xl font-bold text-ink">On est là pour vous aider</h2>
                <p class="mt-4 leading-7 text-ink-soft">
                    Vous avez une suggestion de produit, une question ou vous souhaitez nous signaler un problème ?
                    N'hésitez pas à nous contacter.
                </p>

                <div class="mt-8 space-y-4">
                    <div class="rounded-xl border border-border bg-cream px-4 py-3">
                        <p class="text-xs font-bold uppercase tracking-[0.14em] text-ink-light">Email</p>
                        <a href="mailto:jarrabtihama@gmail.com" class="mt-1 block font-semibold text-ink transition hover:text-primary">
                            jarrabtihama@gmail.com
                        </a>
                    </div>

                    <div class="rounded-xl border border-border bg-cream px-4 py-3">
                        <p class="text-xs font-bold uppercase tracking-[0.14em] text-ink-light">Website</p>
                        <a href="{{ url('/') }}" class="mt-1 block font-semibold text-ink transition hover:text-primary">
                            jarrabtiha.ma
                        </a>
                    </div>

                    <div class="rounded-xl border border-border bg-cream px-4 py-3">
                        <p class="text-xs font-bold uppercase tracking-[0.14em] text-ink-light">Social</p>
                        <p class="mt-1 font-semibold text-ink">@jarrabtiha</p>
                    </div>
                </div>
            </div>

            <div class="rounded-2xl border border-border bg-white p-6 shadow-soft sm:p-8">
                <div class="mb-6">
                    <p class="text-xs font-bold uppercase tracking-[0.18em] text-primary">Message</p>
                    <h2 class="mt-3 text-2xl font-bold text-ink">Envoyer un message</h2>
                </div>

                @if (session('contact_error'))
                <div class="mb-5 rounded-xl border border-danger/25 bg-danger-soft px-4 py-3 text-sm font-semibold text-danger">
                    {{ session('contact_error') }}
                </div>
                @endif

                @if (session('success'))
                <div class="mb-5 rounded-xl border border-primary/20 bg-primary-soft px-4 py-3 text-sm font-semibold text-ink">
                    {{ session('success') }}
                </div>
                @endif

                <form method="POST" action="{{ route('contact.send') }}" x-data="{ submitting: false }" @submit="submitting = true" class="space-y-5">
                    @csrf

                    <div>
                        <label for="name" class="mb-2 block text-sm font-semibold text-ink">Nom</label>
                        <input
                            id="name"
                            name="name"
                            type="text"
                            required
                            value="{{ old('name', auth()->user()?->name) }}"
                            placeholder="Votre nom"
                            class="w-full rounded-xl border border-border bg-cream px-4 py-3 text-sm text-ink placeholder:text-ink-light transition focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary">
                        @error('name')
                        <p class="mt-2 text-sm font-semibold text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="mb-2 block text-sm font-semibold text-ink">Adresse e-mail</label>
                        <input
                            id="email"
                            name="email"
                            type="email"
                            required
                            value="{{ old('email', auth()->user()?->email) }}"
                            placeholder="vous@exemple.com"
                            class="w-full rounded-xl border border-border bg-cream px-4 py-3 text-sm text-ink placeholder:text-ink-light transition focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary">
                        @error('email')
                        <p class="mt-2 text-sm font-semibold text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="subject" class="mb-2 block text-sm font-semibold text-ink">Sujet</label>
                        <input
                            id="subject"
                            name="subject"
                            type="text"
                            required
                            value="{{ old('subject') }}"
                            placeholder="Comment pouvons-nous vous aider ?"
                            class="w-full rounded-xl border border-border bg-cream px-4 py-3 text-sm text-ink placeholder:text-ink-light transition focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary">
                        @error('subject')
                        <p class="mt-2 text-sm font-semibold text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="message" class="mb-2 block text-sm font-semibold text-ink">Message</label>
                        <textarea
                            id="message"
                            name="message"
                            rows="7"
                            required
                            placeholder="Écrivez votre message ici..."
                            class="w-full resize-none rounded-xl border border-border bg-cream px-4 py-3 text-sm text-ink placeholder:text-ink-light transition focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary">{{ old('message') }}</textarea>
                        @error('message')
                        <p class="mt-2 text-sm font-semibold text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <button
                        type="submit"
                        :disabled="submitting"
                        class="inline-flex min-h-12 w-full items-center justify-center rounded-pill bg-primary px-6 py-3 text-sm font-bold text-white shadow-soft transition hover:bg-primary-hover focus:outline-none focus:ring-2 focus:ring-primary/30 disabled:cursor-not-allowed disabled:opacity-70 sm:w-auto">
                        <span x-show="!submitting">Envoyer le message</span>
                        <span x-show="submitting" x-cloak>Envoi en cours...</span>
                    </button>
                </form>
            </div>
        </section>
    </main>
</x-app-layout-market>
