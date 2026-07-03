<section>
    <header>
        <h2 class="font-display text-3xl font-bold text-brown">
            Sécurité du compte
        </h2>

        <p class="mt-3 text-sm leading-7 text-brown-soft">
            @if ($user->google_id)
                Ce compte est connecté avec Google. Le mot de passe n'est pas modifiable depuis cette page.
            @else
                Mets à jour ton mot de passe avec une combinaison longue et unique pour garder ton compte protégé.
            @endif
        </p>
    </header>

    @if ($user->google_id)
        <div class="mt-8 rounded-2xl border border-border bg-cream p-5">
            <p class="text-sm leading-7 text-brown-soft">
                Tu te connectes avec Google, donc la gestion du mot de passe se fait directement depuis ton compte Google.
            </p>
        </div>
    @else
        <form method="post" action="{{ route('password.update') }}" class="mt-8 space-y-6">
            @csrf
            @method('put')

            <div>
                <label for="update_password_current_password" class="text-sm font-semibold text-brown">Mot de passe actuel</label>
                <input
                    id="update_password_current_password"
                    name="current_password"
                    type="password"
                    autocomplete="current-password"
                    class="mt-2 block w-full rounded-2xl border border-border bg-cream px-5 py-3 text-sm text-brown outline-none transition focus:border-primary focus:ring-0"
                />
                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
            </div>

            <div>
                <label for="update_password_password" class="text-sm font-semibold text-brown">Nouveau mot de passe</label>
                <input
                    id="update_password_password"
                    name="password"
                    type="password"
                    autocomplete="new-password"
                    class="mt-2 block w-full rounded-2xl border border-border bg-cream px-5 py-3 text-sm text-brown outline-none transition focus:border-primary focus:ring-0"
                />
                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
            </div>

            <div>
                <label for="update_password_password_confirmation" class="text-sm font-semibold text-brown">Confirmer le mot de passe</label>
                <input
                    id="update_password_password_confirmation"
                    name="password_confirmation"
                    type="password"
                    autocomplete="new-password"
                    class="mt-2 block w-full rounded-2xl border border-border bg-cream px-5 py-3 text-sm text-brown outline-none transition focus:border-primary focus:ring-0"
                />
                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center gap-4">
                <button
                    type="submit"
                    class="inline-flex items-center rounded-pill bg-primary px-6 py-3 text-sm font-bold text-white shadow-soft transition hover:bg-primary-hover"
                >
                    Mettre à jour
                </button>

                @if (session('status') === 'password-updated')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm font-medium text-primary"
                    >Mot de passe mis à jour.</p>
                @endif
            </div>
        </form>
    @endif
</section>
