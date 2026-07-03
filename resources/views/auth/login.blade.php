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
        <div class="my-4 flex items-center">
            <div class="h-px flex-1 bg-border"></div>
            <span class="mx-4 text-sm text-brown-soft">ou</span>
            <div class="h-px flex-1 bg-border"></div>
        </div>
        <!-- Google auth -->
        <a
            href="{{ route('google.redirect') }}"
            class="flex w-full items-center justify-center gap-2 rounded-xl border border-border py-3 font-semibold text-brown-soft transition hover:bg-brown-soft/10">
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 48 48">
                <path fill="#FFC107" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"></path>
                <path fill="#FF3D00" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"></path>
                <path fill="#4CAF50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z"></path>
                <path fill="#1976D2" d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z"></path>
            </svg>
            Se connecter avec Google
        </a>

    </form>


    <p class="text-center text-sm text-brown-soft mt-4">
        Pas encore de compte ?

        <a
            href="{{ route('register') }}"
            class="font-semibold text-primary hover:underline">
            Créer un compte
        </a>
    </p>

</x-guest-layout>