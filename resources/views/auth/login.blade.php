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
            Connectez-vous pour partager vos avis.
        </p>
    </div>

    <x-auth-session-status
        class="mb-5 rounded-xl bg-green-50 p-3 text-sm text-green-700"
        :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf
        <div>
            <x-input-label
                for="email"
                value="Adresse e-mail"
                class="mb-2" />

            <x-text-input
                id="email"
                class="w-full"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus />

            <x-input-error
                :messages="$errors->get('email')"
                class="mt-2" />
        </div>

        <div>
            <x-input-label
                for="password"
                value="Mot de passe"
                class="mb-2" />

            <x-text-input
                id="password"
                class="w-full"
                type="password"
                name="password"
                required />

            <x-input-error
                :messages="$errors->get('password')"
                class="mt-2" />
        </div>

        <div class="flex items-center justify-between">

            <label class="flex items-center gap-2 text-sm text-brown-soft">
                <input
                    type="checkbox"
                    name="remember"
                    class="rounded border-border text-primary focus:ring-primary">

                Se souvenir de moi
            </label>

            @if (Route::has('password.request'))
            <a
                href="{{ route('password.request') }}"
                class="text-sm font-medium text-primary hover:underline">
                Mot de passe oublié ?
            </a>
            @endif

        </div>
        <!-- submit  -->
        <button
            type="submit"
            class="w-full rounded-xl bg-primary py-3 font-semibold text-white transition hover:bg-brown">
            Se connecter
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
        Pas encore de compte ?

        <a
            href="{{ route('register') }}"
            class="font-semibold text-primary hover:underline">
            Créer un compte
        </a>
    </p>

</x-guest-layout>