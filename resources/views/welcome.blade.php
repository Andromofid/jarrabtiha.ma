<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jarrabtiha - Avis vrais, produits testés au Maroc</title>

    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-cream text-brown font-sans antialiased">
    @include('layouts.navigation')
    <header class="relative overflow-hidden">

        <!-- Background -->
        <div class="absolute inset-0 bg-gradient-to-b from-primary-soft/40 via-cream to-cream"></div>
        <div class="absolute -top-40 left-1/2 h-96 w-96 -translate-x-1/2 rounded-full bg-primary/10 blur-3xl"></div>

        <div class="relative mx-auto flex min-h-[75vh] max-w-6xl items-center justify-center px-6 py-10 sm:py-8">

            <div class="w-full max-w-4xl text-center">

                <!-- Badge -->
                <div class="inline-flex items-center gap-2 rounded-full border border-primary/20 bg-white px-5 py-2 text-sm font-semibold text-primary shadow-soft">
                    🇲🇦 Les vrais avis beauté des femmes marocaines
                </div>

                <!-- Title -->
                <h1 class="mt-8 font-display text-5xl font-bold leading-tight text-brown md:text-6xl lg:text-7xl">
                    Jarrabtiha?Avant d'acheter...
                    <br>

                    <span class="text-primary">
                        découvre les vrais avis.
                    </span>
                </h1>

                <!-- Subtitle -->
                <p class="mx-auto mt-4 max-w-2xl text-lg leading-8 text-brown-soft md:text-xl">
                    Recherche un produit, découvre les expériences de vraies utilisatrices
                    marocaines et partage ton propre avis.
                </p>

                <!-- Search -->
                <form
                    action="{{ route('products.index') }}"
                    method="GET"
                    class="mx-auto mt-10 grid max-w-4xl gap-3 rounded-[2rem] border border-border bg-white p-3 shadow-card md:grid-cols-[1.4fr_1fr_1fr_auto]">

                    <input
                        type="search"
                        name="q"
                        placeholder="Nom du produit..."
                        class="h-12 rounded-pill border border-border-soft bg-cream px-5 text-sm text-brown placeholder:text-brown-light outline-none transition focus:border-primary focus:ring-0">

                    <select
                        id="category"
                        name="category"
                        autocomplete="off">
                        <option value="">Toutes les catégories</option>

                        @foreach ($categories as $category)
                        <option value="{{ $category->slug }}">
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                    <select
                        id="brand"
                        name="brand"
                        class="h-12 rounded-pill border border-border-soft bg-cream px-5 text-sm text-brown outline-none transition focus:border-primary focus:ring-0">
                        <option value="">Toutes les marques</option>

                        @foreach ($marques as $marque)
                        <option value="{{ $marque->brand }}">
                            {{ $marque->brand }}
                        </option>
                        @endforeach
                    </select>



                    <button
                        type="submit"
                        class="h-12 rounded-pill bg-primary px-8 text-sm font-bold text-white transition hover:bg-primary-hover">
                        Rechercher
                    </button>
                </form>

                <!-- Stats -->
                <div class="mt-10 flex flex-wrap justify-center gap-10">

                    <div>
                        <p class="font-display text-3xl font-bold text-primary">
                            150+
                        </p>
                        <p class="mt-1 text-sm text-brown-soft">
                            Produits
                        </p>
                    </div>
                    <div>
                        <p class="font-display text-3xl font-bold text-primary">
                            30+
                        </p>
                        <p class="mt-1 text-sm text-brown-soft">
                            Catégories
                        </p>
                    </div>


                </div>

            </div>

        </div>

    </header>

    <main class="mx-auto max-w-7xl px-6 py-16">
        <section>
            <div class="mb-12 text-start">
                <h2 class="font-display text-4xl font-bold text-brown">
                    Catégories
                </h2>

                <p class=" mt-4 max-w-2xl text-lg text-brown-soft">
                    Trouve rapidement le type de produit que tu cherches.
                </p>
            </div>

            <div class="grid grid-cols-1 gap-2 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($parentCategories as $category)
                <a
                    href="{{ route('products.index', ['category' => $category->children->first()?->slug]) }}"
                    class="group relative overflow-hidden rounded-card border border-border bg-white p-7 shadow-soft transition-all duration-300 hover:-translate-y-1 hover:border-primary/30 hover:shadow-card">

                    <!-- Decorative background -->
                    <div class="absolute -right-8 -top-8 h-28 w-28 rounded-full bg-primary/5 transition-all duration-300 group-hover:scale-125"></div>
                    <!-- Title -->
                    <h3 class="pr-12 text-2xl font-semibold text-brown transition-colors group-hover:text-primary">
                        {{ $category->name }}
                    </h3>
                </a>
                @endforeach
            </div>
        </section>

        <section class="mt-24">

            <div class="mb-12 text-start">
                <h2 class="font-display text-4xl font-bold text-brown">
                    Comment ça marche ?
                </h2>

                <p class=" mt-4 max-w-2xl text-lg text-brown-soft">
                    Trouver le bon produit beauté n'a jamais été aussi simple.
                </p>
            </div>

            <div class="grid gap-6 md:grid-cols-3">

                <!-- Step 1 -->
                <div class="group rounded-card border border-border bg-white p-8 shadow-soft transition-all duration-300 hover:-translate-y-1 hover:shadow-card">

                    <div class="mb-8 flex h-20 w-20 items-center justify-center rounded-2xl bg-primary-soft">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11 2.75C6.44365 2.75 2.75 6.44365 2.75 11C2.75 15.5563 6.44365 19.25 11 19.25C15.5563 19.25 19.25 15.5563 19.25 11C19.25 6.44365 15.5563 2.75 11 2.75ZM1.25 11C1.25 5.61522 5.61522 1.25 11 1.25C16.3848 1.25 20.75 5.61522 20.75 11C20.75 16.3848 16.3848 20.75 11 20.75C5.61522 20.75 1.25 16.3848 1.25 11ZM20.1579 19.7511C19.9264 19.7335 19.7335 19.9264 19.7511 20.1579C19.7514 20.1592 19.7553 20.1848 19.7746 20.2573C19.7974 20.3424 19.8312 20.4554 19.8828 20.6277C19.9301 20.7857 19.9609 20.8881 19.9862 20.9641C20.0121 21.0419 20.021 21.0568 20.0171 21.0496C20.1225 21.2465 20.3745 21.31 20.5607 21.1867C20.5538 21.1912 20.5688 21.1824 20.6284 21.1261C20.6868 21.0712 20.7624 20.9957 20.8791 20.8791C20.9957 20.7624 21.0712 20.6868 21.1261 20.6284C21.1727 20.579 21.1868 20.5602 21.1877 20.5592C21.3093 20.3736 21.2463 20.1236 21.0511 20.018C21.0499 20.0175 21.0287 20.0077 20.9641 19.9862C20.8881 19.9609 20.7857 19.9301 20.6277 19.8828C20.4554 19.8312 20.3424 19.7974 20.2573 19.7746C20.1848 19.7553 20.1591 19.7514 20.1579 19.7511ZM18.2564 20.2833C18.1612 19.1267 19.1267 18.1612 20.2833 18.2564C20.4833 18.2728 20.7251 18.3457 20.9862 18.4242C21.0101 18.4314 21.0341 18.4387 21.0583 18.4459C21.0801 18.4524 21.1018 18.4589 21.1234 18.4654C21.3632 18.5369 21.5881 18.604 21.7576 18.6948C22.7335 19.2173 23.0485 20.4659 22.4373 21.3889C22.3312 21.5492 22.165 21.715 21.9878 21.8917C21.9719 21.9076 21.9558 21.9236 21.9397 21.9397C21.9236 21.9558 21.9076 21.9719 21.8917 21.9878C21.7149 22.165 21.5492 22.3312 21.3889 22.4373C20.4659 23.0485 19.2173 22.7335 18.6948 21.7576C18.604 21.5881 18.5369 21.3632 18.4654 21.1234C18.4589 21.1018 18.4524 21.0801 18.4459 21.0583C18.4387 21.0341 18.4314 21.0101 18.4242 20.9862C18.3457 20.7252 18.2728 20.4833 18.2564 20.2833Z" fill="#3B2A27" />
                        </svg>

                    </div>

                    <span class="text-sm font-semibold uppercase tracking-widest text-primary">
                        Étape 01
                    </span>

                    <h3 class="mt-3 text-2xl font-semibold text-brown">
                        Cherche un produit
                    </h3>

                    <p class="mt-4 leading-7 text-brown-soft">
                        Recherche par nom, marque ou catégorie pour trouver rapidement le produit que tu souhaites.
                    </p>

                </div>

                <!-- Step 2 -->
                <div class="group rounded-card border border-border bg-white p-8 shadow-soft transition-all duration-300 hover:-translate-y-1 hover:shadow-card">

                    <div class="mb-8 flex h-20 w-20 items-center justify-center rounded-2xl bg-primary-soft">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9426 1.25H12.0574C14.3658 1.24999 16.1748 1.24998 17.5863 1.43975C19.031 1.63399 20.1711 2.03933 21.0659 2.93414C21.9607 3.82895 22.366 4.96897 22.5603 6.41371C22.75 7.82519 22.75 9.63423 22.75 11.9426V12.0574C22.75 14.3658 22.75 16.1748 22.5603 17.5863C22.366 19.031 21.9607 20.1711 21.0659 21.0659C20.1711 21.9607 19.031 22.366 17.5863 22.5603C16.1748 22.75 14.3658 22.75 12.0574 22.75H11.9426C9.63423 22.75 7.82519 22.75 6.41371 22.5603C4.96897 22.366 3.82895 21.9607 2.93414 21.0659C2.03933 20.1711 1.63399 19.031 1.43975 17.5863C1.24998 16.1748 1.24999 14.3658 1.25 12.0574V11.9426C1.24999 9.63423 1.24998 7.82519 1.43975 6.41371C1.63399 4.96897 2.03933 3.82895 2.93414 2.93414C3.82895 2.03933 4.96897 1.63399 6.41371 1.43975C7.82519 1.24998 9.63423 1.24999 11.9426 1.25ZM6.61358 2.92637C5.33517 3.09825 4.56445 3.42514 3.9948 3.9948C3.42514 4.56445 3.09825 5.33517 2.92637 6.61358C2.75159 7.91356 2.75 9.62178 2.75 12C2.75 14.3782 2.75159 16.0864 2.92637 17.3864C3.09825 18.6648 3.42514 19.4355 3.9948 20.0052C4.56445 20.5749 5.33517 20.9018 6.61358 21.0736C7.91356 21.2484 9.62178 21.25 12 21.25C14.3782 21.25 16.0864 21.2484 17.3864 21.0736C18.6648 20.9018 19.4355 20.5749 20.0052 20.0052C20.5749 19.4355 20.9018 18.6648 21.0736 17.3864C21.2484 16.0864 21.25 14.3782 21.25 12C21.25 9.62178 21.2484 7.91356 21.0736 6.61358C20.9018 5.33517 20.5749 4.56445 20.0052 3.9948C19.4355 3.42514 18.6648 3.09825 17.3864 2.92637C16.0864 2.75159 14.3782 2.75 12 2.75C9.62178 2.75 7.91356 2.75159 6.61358 2.92637ZM10.5172 6.4569C10.8172 6.74256 10.8288 7.21729 10.5431 7.51724L7.68596 10.5172C7.5444 10.6659 7.34812 10.75 7.14286 10.75C6.9376 10.75 6.74131 10.6659 6.59975 10.5172L5.4569 9.31724C5.17123 9.01729 5.18281 8.54256 5.48276 8.2569C5.78271 7.97123 6.25744 7.98281 6.5431 8.28276L7.14286 8.9125L9.4569 6.48276C9.74256 6.18281 10.2173 6.17123 10.5172 6.4569ZM12.25 9C12.25 8.58579 12.5858 8.25 13 8.25H18C18.4142 8.25 18.75 8.58579 18.75 9C18.75 9.41421 18.4142 9.75 18 9.75H13C12.5858 9.75 12.25 9.41421 12.25 9ZM10.5172 13.4569C10.8172 13.7426 10.8288 14.2173 10.5431 14.5172L7.68596 17.5172C7.5444 17.6659 7.34812 17.75 7.14286 17.75C6.9376 17.75 6.74131 17.6659 6.59975 17.5172L5.4569 16.3172C5.17123 16.0173 5.18281 15.5426 5.48276 15.2569C5.78271 14.9712 6.25744 14.9828 6.5431 15.2828L7.14286 15.9125L9.4569 13.4828C9.74256 13.1828 10.2173 13.1712 10.5172 13.4569ZM12.25 16C12.25 15.5858 12.5858 15.25 13 15.25H18C18.4142 15.25 18.75 15.5858 18.75 16C18.75 16.4142 18.4142 16.75 18 16.75H13C12.5858 16.75 12.25 16.4142 12.25 16Z" fill="#3B2A27" />
                        </svg>
                    </div>

                    <span class="text-sm font-semibold uppercase tracking-widest text-primary">
                        Étape 02
                    </span>

                    <h3 class="mt-3 text-2xl font-semibold text-brown">
                        Lis les avis
                    </h3>

                    <p class="mt-4 leading-7 text-brown-soft">
                        Découvre les expériences de vraies utilisatrices avant de prendre ta décision.
                    </p>

                </div>

                <!-- Step 3 -->
                <div class="group rounded-card border border-border bg-white p-8 shadow-soft transition-all duration-300 hover:-translate-y-1 hover:shadow-card">

                    <div class="mb-8 flex h-20 w-20 items-center justify-center rounded-2xl bg-primary-soft">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M5.48039 1.90311C5.48038 1.90308 5.48039 1.90314 5.48039 1.90311C5.43387 1.66838 5.2275 1.49919 4.98818 1.5C4.7488 1.50081 4.54359 1.67116 4.49873 1.90628L4.49839 1.908L4.49648 1.91758C4.49467 1.92655 4.49179 1.94056 4.48782 1.95905C4.47987 1.99608 4.46761 2.05092 4.45092 2.11918C4.41742 2.25622 4.3667 2.44478 4.29809 2.65065C4.1534 3.08484 3.95627 3.51076 3.73001 3.73856C3.50374 3.96635 3.07917 4.16636 2.64596 4.31398C2.44056 4.38398 2.25235 4.43597 2.11554 4.4704C2.04739 4.48755 1.99264 4.50018 1.95566 4.50838C1.93719 4.51247 1.9232 4.51545 1.91425 4.51732L1.90468 4.51929L1.90311 4.51961C1.6683 4.56606 1.49919 4.77245 1.5 5.01182C1.50081 5.2512 1.67116 5.45641 1.90628 5.50127L1.908 5.50161L1.91758 5.50352C1.92655 5.50533 1.94056 5.50821 1.95905 5.51218C1.99608 5.52013 2.05092 5.53239 2.11918 5.54908C2.25622 5.58258 2.44478 5.6333 2.65065 5.70191C3.08484 5.8466 3.51076 6.04373 3.73856 6.27C3.96635 6.49626 4.16636 6.92083 4.31398 7.35404C4.38398 7.55944 4.43597 7.74765 4.4704 7.88446C4.48755 7.95261 4.50018 8.00736 4.50838 8.04434C4.51247 8.06281 4.51545 8.0768 4.51732 8.08575L4.51929 8.09532L4.51961 8.09689C4.56606 8.3317 4.77245 8.50081 5.01182 8.5C5.2512 8.49919 5.45641 8.32884 5.50127 8.09372L5.50161 8.092L5.50352 8.08242C5.50533 8.07345 5.50821 8.05944 5.51218 8.04095C5.52013 8.00392 5.53239 7.94908 5.54908 7.88082C5.58258 7.74378 5.6333 7.55522 5.70191 7.34935C5.8466 6.91516 6.04373 6.48924 6.27 6.26144C6.49626 6.03365 6.92083 5.83364 7.35404 5.68602C7.55944 5.61602 7.74765 5.56403 7.88446 5.5296C7.95261 5.51245 8.00736 5.49982 8.04434 5.49162C8.06281 5.48753 8.0768 5.48455 8.08575 5.48268L8.09532 5.48071L8.09689 5.48039C8.09684 5.4804 8.09694 5.48038 8.09689 5.48039C8.33159 5.43385 8.50081 5.22748 8.5 4.98818C8.49919 4.7488 8.32884 4.54359 8.09372 4.49873L8.092 4.49839L8.08242 4.49648C8.07345 4.49467 8.05944 4.49179 8.04095 4.48782C8.00392 4.47987 7.94908 4.46761 7.88082 4.45092C7.74378 4.41742 7.55522 4.3667 7.34935 4.29809C6.91516 4.1534 6.48924 3.95627 6.26144 3.73001C6.03365 3.50374 5.83364 3.07917 5.68602 2.64596C5.61602 2.44056 5.56403 2.25235 5.5296 2.11554C5.51245 2.04739 5.49982 1.99264 5.49162 1.95566C5.48753 1.93719 5.48455 1.9232 5.48268 1.91425L5.48071 1.90468L5.48039 1.90311ZM6.39614 4.99528C6.09334 4.85303 5.78918 4.67039 5.55673 4.4395C5.32428 4.20861 5.13958 3.90569 4.99528 3.60386C4.85303 3.90666 4.67039 4.21082 4.4395 4.44327C4.20861 4.67572 3.90569 4.86042 3.60386 5.00472C3.90666 5.14697 4.21082 5.32961 4.44327 5.5605C4.67572 5.79139 4.86042 6.09431 5.00472 6.39614C5.14697 6.09334 5.32961 5.78918 5.5605 5.55673C5.79139 5.32428 6.09431 5.13958 6.39614 4.99528Z" fill="#3B2A27" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M19 3.25C19.4142 3.25 19.75 3.58579 19.75 4V4.25H20C20.4142 4.25 20.75 4.58579 20.75 5C20.75 5.41421 20.4142 5.75 20 5.75H19.75V6C19.75 6.41421 19.4142 6.75 19 6.75C18.5858 6.75 18.25 6.41421 18.25 6V5.75H18C17.5858 5.75 17.25 5.41421 17.25 5C17.25 4.58579 17.5858 4.25 18 4.25H18.25V4C18.25 3.58579 18.5858 3.25 19 3.25ZM11.9875 6.18028C11.659 6.60921 11.2858 7.27467 10.7353 8.2623L10.4567 8.76198C10.4388 8.79421 10.421 8.82627 10.4033 8.8581C10.1521 9.31057 9.92501 9.71966 9.55768 9.99851C9.18594 10.2807 8.73368 10.3821 8.24389 10.492C8.20945 10.4997 8.17482 10.5075 8.14001 10.5154L7.59912 10.6377C6.52827 10.88 5.81264 11.0441 5.32543 11.2361C4.85236 11.4226 4.78896 11.5612 4.76498 11.6383C4.73845 11.7236 4.71654 11.8899 5.00039 12.3408C5.28934 12.7998 5.77932 13.3758 6.50808 14.228L6.87683 14.6592C6.89985 14.6861 6.92275 14.7128 6.94548 14.7393C7.28266 15.1323 7.58345 15.4829 7.72165 15.9274C7.85893 16.3688 7.81339 16.8314 7.76172 17.3562C7.75824 17.3916 7.75473 17.4273 7.75124 17.4633L7.69549 18.0386C7.58541 19.1745 7.51263 19.9446 7.53721 20.4964C7.56173 21.0469 7.67706 21.1584 7.73036 21.1988C7.77142 21.23 7.8816 21.3108 8.37411 21.1697C8.87625 21.0258 9.54795 20.7189 10.5507 20.2572L11.0571 20.0241C11.0903 20.0087 11.1234 19.9934 11.1563 19.9782C11.6116 19.7675 12.0358 19.5711 12.5 19.5711C12.9642 19.5711 13.3884 19.7675 13.8437 19.9782C13.8766 19.9934 13.9097 20.0087 13.9429 20.0241L14.4494 20.2572C15.452 20.7189 16.1238 21.0258 16.6259 21.1697C17.1184 21.3108 17.2286 21.23 17.2696 21.1988C17.3229 21.1584 17.4383 21.0469 17.4628 20.4964C17.4874 19.9446 17.4146 19.1745 17.3045 18.0386L17.2488 17.4633C17.2453 17.4273 17.2418 17.3916 17.2383 17.3562C17.1866 16.8314 17.1411 16.3688 17.2783 15.9274C17.4166 15.4829 17.7173 15.1323 18.0545 14.7393C18.0773 14.7128 18.1001 14.6861 18.1232 14.6592L18.4919 14.228C19.2207 13.3758 19.7107 12.7998 19.9996 12.3408C20.2835 11.8899 20.2615 11.7236 20.235 11.6383C20.211 11.5612 20.1476 11.4226 19.6746 11.2361C19.1874 11.0441 18.4717 10.88 17.4009 10.6377L16.86 10.5153C16.8252 10.5075 16.7905 10.4997 16.7561 10.492C16.2663 10.3821 15.8141 10.2807 15.4423 9.99851C15.075 9.71966 14.8479 9.31056 14.5967 8.8581C14.579 8.82627 14.5612 8.79421 14.5433 8.76197L14.2647 8.26229C13.7142 7.27467 13.341 6.60921 13.0125 6.18028C12.6844 5.75183 12.5427 5.75 12.5 5.75C12.4573 5.75 12.3156 5.75183 11.9875 6.18028ZM10.7966 5.26828C11.208 4.73103 11.7379 4.25 12.5 4.25C13.2621 4.25 13.792 4.73103 14.2034 5.26828C14.6066 5.79476 15.0321 6.5582 15.5447 7.47781L15.8534 8.03162C16.192 8.63894 16.2654 8.7401 16.3493 8.80376C16.4284 8.86385 16.5324 8.90332 17.191 9.05233L17.794 9.18876C18.7864 9.41326 19.6168 9.60111 20.2245 9.8406C20.859 10.0906 21.4426 10.4702 21.6674 11.1929C21.8895 11.9073 21.6357 12.5575 21.269 13.14C20.9144 13.7033 20.3505 14.3627 19.6716 15.1565L19.2632 15.6341C18.8176 16.1551 18.7454 16.2612 18.7107 16.3728C18.675 16.4875 18.6745 16.6241 18.7418 17.3186L18.8033 17.9537C18.9062 19.0147 18.9912 19.892 18.9613 20.5631C18.9308 21.2481 18.7744 21.9397 18.1766 22.3936C17.5665 22.8567 16.8618 22.7977 16.2127 22.6117C15.5864 22.4322 14.8093 22.0744 13.8803 21.6466L13.3156 21.3866C12.6964 21.1015 12.5919 21.0711 12.5 21.0711C12.4081 21.0711 12.3036 21.1015 11.6844 21.3866L11.1197 21.6466C10.1907 22.0744 9.41362 22.4322 8.78727 22.6117C8.13822 22.7977 7.43346 22.8567 6.82339 22.3936C6.22557 21.9397 6.06921 21.2481 6.03869 20.5631C6.0088 19.892 6.09384 19.0147 6.19668 17.9538L6.25823 17.3186C6.32553 16.6241 6.325 16.4875 6.28931 16.3728C6.25462 16.2612 6.18236 16.1551 5.73683 15.6341L5.32838 15.1565C4.64953 14.3627 4.08562 13.7033 3.73098 13.14C3.36434 12.5575 3.11045 11.9073 3.33264 11.1929C3.55736 10.4702 4.141 10.0906 4.77547 9.8406C5.38317 9.60112 6.21361 9.41326 7.20603 9.18876L7.80899 9.05233C8.46758 8.90332 8.57157 8.86385 8.65072 8.80376C8.73458 8.7401 8.80801 8.63894 9.14655 8.03162L9.45527 7.47781C9.96786 6.5582 10.3934 5.79476 10.7966 5.26828Z" fill="#3B2A27" />
                        </svg>

                    </div>

                    <span class="text-sm font-semibold uppercase tracking-widest text-primary">
                        Étape 03
                    </span>

                    <h3 class="mt-3 text-2xl font-semibold text-brown">
                        Partage ton avis
                    </h3>

                    <p class="mt-4 leading-7 text-brown-soft">
                        Aide la communauté en partageant ton expérience après avoir essayé le produit.
                    </p>

                </div>

            </div>

        </section>

        <section class="mt-20 rounded-[2rem] bg-brown p-8 text-center text-white lg:p-12">
            <h2 class="font-display text-4xl font-bold">جربتي شي منتج؟</h2>
            <p class="mx-auto mt-4 max-w-2xl text-white/70">
                Partage ton avis et aide la communauté à choisir les bons produits.
            </p>

            <a href="" class="mt-8 inline-flex rounded-pill bg-primary px-8 py-4 text-sm font-bold text-white transition hover:bg-primary-hover">
                Ajouter mon premier avis
            </a>
        </section>
    </main>

    @include('layouts.footer')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const categorySelect = document.getElementById("category");
            const brandSelect = document.getElementById("brand");

            if (!categorySelect || !brandSelect) return;

            categorySelect.addEventListener("change", async () => {
                const category = categorySelect.value;

                brandSelect.innerHTML = `<option value="">Chargement...</option>`;

                if (!category) {
                    brandSelect.innerHTML = `<option value="">Toutes les marques</option>`;
                    return;
                }

                const response = await fetch(`/brands-by-category?category=${encodeURIComponent(category)}`);
                const brands = await response.json();

                brandSelect.innerHTML = `<option value="">Toutes les marques</option>`;

                brands.forEach((brand) => {
                    const option = document.createElement("option");
                    option.value = brand;
                    option.textContent = brand;
                    brandSelect.appendChild(option);
                });
            });
        });
    </script>
</body>

</html>
