<x-guest-layout>

    <div class="mb-8 text-center">

        {{-- Logo --}}
        <div class="mb-8 text-center">
            <a href="/">
                <img
                    src="{{ asset('logo.png') }}"
                    alt="Jarrabtiha"
                    class="mx-auto h-20 w-auto transition duration-300 hover:scale-105">
            </a>
        </div>
        <p class="mt-2 text-brown-soft">
            Rejoignez Jarrabtiha pour partager vos avis beauté.
        </p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-6">
        @csrf

        {{-- Name --}}
        <div>
            <x-input-label for="name" value="Nom ou pseudo" class="mb-2" />

            <x-text-input
                id="name"
                type="text"
                name="name"
                :value="old('name')"
                required
                autofocus
                autocomplete="name"
                class="w-full" />

            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        {{-- Email --}}
        <div>
            <x-input-label for="email" value="Adresse e-mail" class="mb-2" />

            <x-text-input
                id="email"
                type="email"
                name="email"
                :value="old('email')"
                required
                autocomplete="username"
                class="w-full" />

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        {{-- Password --}}
        <div>
            <x-input-label for="password" value="Mot de passe" class="mb-2" />

            <x-text-input
                id="password"
                type="password"
                name="password"
                required
                autocomplete="new-password"
                class="w-full" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        {{-- Confirm Password --}}
        <div>
            <x-input-label for="password_confirmation" value="Confirmer le mot de passe" class="mb-2" />

            <x-text-input
                id="password_confirmation"
                type="password"
                name="password_confirmation"
                required
                autocomplete="new-password"
                class="w-full" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <button
            type="submit"
            class="w-full rounded-xl bg-primary py-3 font-semibold text-white transition hover:bg-brown">
            Créer mon compte
        </button>
        <!-- retour -->
        <a
            href="/"
            class="block text-center text-sm font-medium text-primary hover:underline">
            Retour à l'accueil
        </a>
    </form>

    <div class="my-8 flex items-center">
        <div class="h-px flex-1 bg-border"></div>
        <span class="mx-4 text-sm text-brown-soft">ou</span>
        <div class="h-px flex-1 bg-border"></div>
    </div>

    <p class="text-center text-sm text-brown-soft">
        Vous avez déjà un compte ?

        <a
            href="{{ route('login') }}"
            class="font-semibold text-primary hover:underline">
            Se connecter
        </a>

    </p>

</x-guest-layout>