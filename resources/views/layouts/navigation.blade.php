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

            <a href="{{ url('/') }}"
                class="font-medium {{ request()->routeIs('welcome') || request()->is('/') ? 'text-brown' : 'text-brown-soft' }} transition hover:text-primary">
                Accueil
            </a>

            <a href="{{ route('products.index') }}"
                class="font-medium {{ request()->routeIs('products.*') ? 'text-brown' : 'text-brown-soft' }} transition hover:text-primary">
                Produits
            </a>

            <a href="{{ route('categories.index') }}"
                class="font-medium {{ request()->routeIs('categories.*') ? 'text-brown' : 'text-brown-soft' }} transition hover:text-primary">
                Cat&eacute;gories
            </a>

            <a href="{{ route('brands.index') }}"
                class="font-medium {{ request()->routeIs('brands.*') ? 'text-brown' : 'text-brown-soft' }} transition hover:text-primary">
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
            <!-- logout -->
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button
                    type="submit"
                    class="rounded-pill bg-danger px-6 py-3 font-semibold text-white shadow-soft transition hover:bg-danger-hover">
                    D&eacute;connexion
                </button>
            </form>

            @endguest

        </div>

        <button
            @click="mobile=!mobile"
            class="lg:hidden">

            &#9776;

        </button>

    </div>

    <div
        x-show="mobile"
        x-transition
        class="border-t bg-white lg:hidden">

        <div class="space-y-4 p-6">

            <a href="{{ url('/') }}" class="block">Accueil</a>
            <a href="{{ route('products.index') }}" class="block">Produits</a>
            <a href="{{ route('categories.index') }}" class="block">Cat&eacute;gories</a>
            <a href="{{ route('brands.index') }}" class="block">Marques</a>

            <hr>

            @guest
            <div class="flex items-center justify-between gap-3">
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
            </div>

            @else
            <div class="flex items-center justify-between gap-3">
                <a
                    href="{{ route('dashboard') }}"
                    class="block">

                    Dashboard

                </a>
                <!-- logout -->
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button
                        type="submit"
                        class="rounded-pill bg-danger px-6 py-3 font-semibold text-white shadow-soft transition hover:bg-danger-hover">
                        D&eacute;connexion
                    </button>
                </form>

            </div>

            @endguest

        </div>

    </div>

</nav>