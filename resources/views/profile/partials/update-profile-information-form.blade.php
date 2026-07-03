<section>
    <header>
        <h2 class="font-display text-3xl font-bold text-brown">
            Informations du profil
        </h2>

        <p class="mt-3 max-w-2xl text-sm leading-7 text-brown-soft">
            Modifie les informations visibles sur ton compte. Les comptes connectés avec Google gardent leur adresse e-mail verrouillée.
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-8 space-y-6">
        @csrf
        @method('patch')

        <div>
            <label for="name" class="text-sm font-semibold text-brown">Nom</label>
            <input
                id="name"
                name="name"
                type="text"
                value="{{ old('name', $user->name) }}"
                required
                autofocus
                autocomplete="name"
                class="mt-2 block w-full rounded-2xl border border-border bg-cream px-5 py-3 text-sm text-brown placeholder:text-brown-light outline-none transition focus:border-primary focus:ring-0"
            />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <div class="flex items-center justify-between gap-3">
                <label for="email" class="text-sm font-semibold text-brown">Adresse e-mail</label>

                @if ($user->google_id)
                    <span class="rounded-full bg-primary-soft px-3 py-1 text-xs font-semibold text-primary">
                        Gérée par Google
                    </span>
                @endif
            </div>

            <input
                id="email"
                name="email"
                type="email"
                value="{{ old('email', $user->email) }}"
                {{ $user->google_id ? 'disabled' : 'required' }}
                autocomplete="username"
                class="mt-2 block w-full rounded-2xl border border-border bg-cream px-5 py-3 text-sm text-brown placeholder:text-brown-light outline-none transition focus:border-primary focus:ring-0 {{ $user->google_id ? 'cursor-not-allowed opacity-60' : '' }}"
            />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user->google_id)
                <p class="mt-2 text-sm text-brown-soft">
                    Cette adresse e-mail est synchronisée avec ton compte Google et ne peut pas être modifiée ici.
                </p>
            @elseif ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="mt-2 text-sm text-brown">
                        Ton adresse e-mail n'est pas encore vérifiée.

                        <button form="send-verification" class="font-semibold text-primary underline transition hover:text-primary-hover focus:outline-none focus:ring-0">
                            Renvoyer l'e-mail de vérification
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-sm font-medium text-primary">
                            Un nouveau lien de vérification a été envoyé.
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <button
                type="submit"
                class="inline-flex items-center rounded-pill bg-primary px-6 py-3 text-sm font-bold text-white shadow-soft transition hover:bg-primary-hover"
            >
                Enregistrer
            </button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm font-medium text-primary"
                >Modifications enregistrées.</p>
            @endif
        </div>
    </form>
</section>
