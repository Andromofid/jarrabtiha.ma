<nav
    x-data="{ mobile:false }"
    class="sticky top-0 z-50 border-b border-border/60 bg-white/80 backdrop-blur-xl">

    <div class="mx-auto flex h-20 max-w-7xl items-center justify-between px-6">

        <a href="/" class="flex items-center">
            <img
                src="{{ asset('logo.png') }}"
                class="h-20 w-auto"
                alt="Jarrabtiha">
        </a>

        <div class="hidden items-center gap-10 lg:flex">

            <a href="{{ url('/') }}"
                class="font-medium {{ request()->routeIs('welcome') || request()->is('/') ? 'text-ink' : 'text-ink-soft' }} transition hover:text-primary">
                Accueil
            </a>

            <a href="{{ route('products.index') }}"
                class="font-medium {{ request()->routeIs('products.*') ? 'text-ink' : 'text-ink-soft' }} transition hover:text-primary">
                Produits
            </a>

            <a href="{{ route('categories.index') }}"
                class="font-medium {{ request()->routeIs('categories.*') ? 'text-ink' : 'text-ink-soft' }} transition hover:text-primary">
                Cat&eacute;gories
            </a>

            <a href="{{ route('brands.index') }}"
                class="font-medium {{ request()->routeIs('brands.*') ? 'text-ink' : 'text-ink-soft' }} transition hover:text-primary">
                Marques
            </a>


        </div>

        <div class="hidden items-center gap-3 lg:flex">

            @guest

            <a
                href="{{ route('login') }}"
                class="rounded-pill border-2 border-primary-hover bg-white px-6 py-3 font-semibold text-primary-hover
               transition-all duration-300
                hover:scale-[1.03] flex items-center gap-2">

                <svg
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    class="text-primary-hover"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M12 2.75C6.89137 2.75 2.75 6.89137 2.75 12C2.75 14.6447 3.85938 17.0303 5.64027 18.717C5.89692 17.9002 6.32733 17.1508 7.0564 16.5568C8.1335 15.6793 9.73059 15.25 12 15.25C14.2693 15.25 15.8664 15.6793 16.9435 16.5569C17.6726 17.1509 18.103 17.9003 18.3596 18.717C20.1406 17.0304 21.25 14.6448 21.25 12C21.25 6.89137 17.1086 2.75 12 2.75ZM17.0715 19.7372C16.8988 18.8503 16.5751 18.1915 15.9961 17.7198C15.3062 17.1577 14.1187 16.75 12 16.75C9.88122 16.75 8.69375 17.1577 8.00383 17.7198C7.42482 18.1915 7.10108 18.8503 6.92845 19.7371C8.38458 20.6937 10.1264 21.25 12 21.25C13.8736 21.25 15.6154 20.6937 17.0715 19.7372ZM1.25 12C1.25 6.06294 6.06294 1.25 12 1.25C17.9371 1.25 22.75 6.06294 22.75 12C22.75 15.5718 21.0073 18.7367 18.3289 20.6903C16.5534 21.9855 14.3649 22.75 12 22.75C9.63509 22.75 7.44654 21.9855 5.67095 20.6903C2.99271 18.7366 1.25 15.5718 1.25 12ZM12 7.75C10.7574 7.75 9.75 8.75736 9.75 10C9.75 11.2426 10.7574 12.25 12 12.25C13.2426 12.25 14.25 11.2426 14.25 10C14.25 8.75736 13.2426 7.75 12 7.75ZM8.25 10C8.25 7.92893 9.92893 6.25 12 6.25C14.0711 6.25 15.75 7.92893 15.75 10C15.75 12.0711 14.0711 13.75 12 13.75C9.92893 13.75 8.25 12.0711 8.25 10Z"
                        fill="currentColor" />
                </svg>
                <span>
                    Connexion
                </span>
            </a>

            <a
                href="{{ route('register') }}"
                class="group relative overflow-hidden rounded-pill
               bg-primary hover:bg-primary-hover
               px-6 py-3 font-semibold text-white shadow-soft
               transition-all duration-300
               hover:scale-[1.03] hover:shadow-card flex items-center gap-2">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.25 6C7.25 3.37665 9.37665 1.25 12 1.25C14.6234 1.25 16.75 3.37665 16.75 6C16.75 8.62335 14.6234 10.75 12 10.75C9.37665 10.75 7.25 8.62335 7.25 6ZM12 2.75C10.2051 2.75 8.75 4.20507 8.75 6C8.75 7.79493 10.2051 9.25 12 9.25C13.7949 9.25 15.25 7.79493 15.25 6C15.25 4.20507 13.7949 2.75 12 2.75Z" fill="currentColor" />
                    <path d="M17.75 16.6667C17.75 16.2524 17.4142 15.9167 17 15.9167C16.5858 15.9167 16.25 16.2524 16.25 16.6667V17.25H15.6665C15.2523 17.25 14.9165 17.5858 14.9165 18C14.9165 18.4142 15.2523 18.75 15.6665 18.75H16.25V19.3333C16.25 19.7475 16.5858 20.0833 17 20.0833C17.4142 20.0833 17.75 19.7475 17.75 19.3333V18.75H18.3332C18.7474 18.75 19.0832 18.4142 19.0832 18C19.0832 17.5858 18.7474 17.25 18.3332 17.25H17.75V16.6667Z" fill="currentColor" />
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.8117 13.2537C16.8742 13.2512 16.937 13.25 17 13.25C19.6234 13.25 21.75 15.3766 21.75 18C21.75 20.6234 19.6234 22.75 17 22.75C15.8204 22.75 14.7413 22.32 13.9107 21.6083C13.2991 21.7009 12.6587 21.75 12 21.75C9.96067 21.75 8.07752 21.2792 6.67815 20.4796C5.3 19.6921 4.25 18.4899 4.25 17C4.25 15.5101 5.3 14.3079 6.67815 13.5204C8.07752 12.7208 9.96067 12.25 12 12.25C13.8045 12.25 15.4825 12.6184 16.8117 13.2537ZM17 14.75C15.2051 14.75 13.75 16.2051 13.75 18C13.75 19.7949 15.2051 21.25 17 21.25C18.7949 21.25 20.25 19.7949 20.25 18C20.25 16.2051 18.7949 14.75 17 14.75ZM12.8009 20.2224C12.4492 19.5593 12.25 18.8029 12.25 18C12.25 16.3289 13.113 14.8593 14.4176 14.0127C13.6767 13.8444 12.8611 13.75 12 13.75C10.1733 13.75 8.55649 14.1747 7.42236 14.8228C6.26701 15.483 5.75 16.2807 5.75 17C5.75 17.7193 6.26701 18.517 7.42236 19.1772C8.55649 19.8253 10.1733 20.25 12 20.25C12.2715 20.25 12.5388 20.2406 12.8009 20.2224Z" fill="currentColor" />
                </svg>

                <span class="relative z-10">Rejoindre</span>
            </a>


            @else

            <a
                href="{{ route('dashboard') }}"
                class="group relative overflow-hidden rounded-pill bg-primary hover:bg-primary-hover px-6 py-3 font-semibold text-white shadow-soft transition-all duration-300 hover:scale-[1.03] hover:shadow-card">
                <span class="relative z-10">Dashboard</span>
            </a>

            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf

                <button
                    type="submit"
                    class="group relative overflow-hidden rounded-pill bg-danger hover:bg-red-hover px-6 py-3 font-semibold text-white shadow-soft transition-all duration-300 hover:scale-[1.03] hover:shadow-card">
                    <span class="relative z-10">Déconnexion</span>
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
                    class="rounded-pill px-5 py-3 font-medium text-ink hover:bg-primary-soft">

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