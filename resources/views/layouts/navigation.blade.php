<nav
    x-data="{ mobile:false }"
    class="sticky top-0 z-50 border-b border-border/60 bg-white/80 backdrop-blur-xl">

    <div class="mx-auto flex h-20 max-w-7xl items-center justify-between px-6">

        <a href="/" class="flex items-center">
            <img
                src="{{ asset('logo.png') }}"
                class="h-12 w-auto"
                alt="Jarrabtiha">
        </a>

        <div class="hidden items-center gap-10 lg:flex">

            <a href="#"
                class="font-medium text-brown transition hover:text-primary">
                Accueil
            </a>

            <a href="#"
                class="font-medium text-brown-soft transition hover:text-primary">
                Produits
            </a>

            <a href="#"
                class="font-medium text-brown-soft transition hover:text-primary">
                Catégories
            </a>

            <a href="#"
                class="font-medium text-brown-soft transition hover:text-primary">
                Marques
            </a>

        </div>

        <div class="hidden items-center gap-3 lg:flex">

            @guest

            <a
                href="{{ route('login') }}"
                class="rounded-pill px-5 py-3 font-medium text-brown hover:bg-primary-soft">

                Connexion

            </a>

            <a
                href="{{ route('register') }}"
                class="rounded-pill bg-primary px-6 py-3 font-semibold text-white shadow-soft transition hover:bg-primary-hover">

                Rejoindre

            </a>

            @else

            <a
                href="{{ route('dashboard') }}"
                class="rounded-pill bg-primary px-6 py-3 text-white">

                Dashboard

            </a>

            @endguest

        </div>

        <button
            @click="mobile=!mobile"
            class="lg:hidden">

            ☰

        </button>

    </div>

    <div
        x-show="mobile"
        x-transition
        class="border-t bg-white lg:hidden">

        <div class="space-y-4 p-6">

            <a class="block">Accueil</a>
            <a class="block">Produits</a>
            <a class="block">Catégories</a>
            <a class="block">Marques</a>

            <hr>

            @guest

            <a
                href="{{ route('login') }}"
                class="block">

                Connexion

            </a>

            <a
                href="{{ route('register') }}"
                class="block rounded-pill bg-primary py-3 text-center font-semibold text-white">

                Rejoindre

            </a>

            @endguest

        </div>

    </div>

</nav>