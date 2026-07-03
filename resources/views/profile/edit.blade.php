<x-app-layout>
    <main class="mx-auto max-w-7xl px-6 py-12">
        <section class="relative overflow-hidden rounded-card border border-border bg-white p-8 shadow-soft sm:p-10">
            <div class="absolute -right-16 -top-16 h-40 w-40 rounded-full bg-primary/10 blur-2xl"></div>

            <div class="relative flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
                <div class="flex items-center gap-4">
                    <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-full bg-primary-soft text-2xl font-bold text-primary">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>

                    <div>
                        <p class="text-sm font-semibold uppercase tracking-[0.18em] text-brown-light">
                            Espace personnel
                        </p>
                        <h1 class="mt-2 font-display text-3xl font-bold text-brown sm:text-4xl">
                            Mon profil
                        </h1>
                        <p class="mt-3 max-w-2xl text-sm leading-7 text-brown-soft sm:text-base">
                            Gère tes informations de compte et vérifie rapidement quelles données peuvent être modifiées.
                        </p>
                    </div>
                </div>

                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('dashboard') }}"
                        class="rounded-pill border border-border bg-white px-6 py-3 text-sm font-semibold text-brown transition hover:border-primary/30 hover:text-primary">
                        Tableau de bord
                    </a>

                    <a href="{{ route('products.index') }}"
                        class="rounded-pill bg-primary px-6 py-3 text-sm font-bold text-white shadow-soft transition hover:bg-primary-hover">
                        Explorer les produits
                    </a>
                </div>
            </div>
        </section>

        <section class="mt-8 grid gap-4 md:grid-cols-3">
            <div class="rounded-2xl border border-border bg-white p-6 shadow-soft">
                <p class="text-sm text-brown-soft">Nom affiché</p>
                <p class="mt-2 text-xl font-semibold text-brown">{{ $user->name }}</p>
            </div>

            <div class="rounded-2xl border border-border bg-white p-6 shadow-soft">
                <p class="text-sm text-brown-soft">Connexion</p>
                <p class="mt-2 text-xl font-semibold text-brown">
                    {{ $user->google_id ? 'Google' : 'Email et mot de passe' }}
                </p>
            </div>

            <div class="rounded-2xl border border-border bg-white p-6 shadow-soft">
                <p class="text-sm text-brown-soft">Adresse e-mail</p>
                <p class="mt-2 break-all text-xl font-semibold text-brown">{{ $user->email }}</p>
            </div>
        </section>

        <section class="mt-8 grid gap-6 xl:grid-cols-[1.3fr_0.9fr]">
            <div class="rounded-card border border-border bg-white p-6 shadow-soft sm:p-8">
                @include('profile.partials.update-profile-information-form')
            </div>

            <div class="space-y-6">
                <div class="rounded-card border border-border bg-white p-6 shadow-soft sm:p-8">
                    @include('profile.partials.update-password-form')
                </div>

            </div>
        </section>
    </main>
</x-app-layout>
