<footer class="mt-24 border-t border-border bg-white">

    <div class="mx-auto max-w-7xl px-6 py-16">

        <div class="grid gap-12 md:grid-cols-4">

            <div>

                <img
                    src="{{ asset('logo.png') }}"
                    class="h-12">

                <p class="mt-5 text-sm leading-7 text-ink-soft">

                    D&eacute;couvrez les vrais avis des femmes marocaines avant d'acheter vos produits beaut&eacute;.

                </p>

            </div>

            <div>

                <h4 class="mb-4 font-semibold text-ink">

                    D&eacute;couvrir

                </h4>

                <ul class="space-y-3 text-ink-soft">

                    <li><a href="{{ route('products.index') }}">Produits</a></li>
                    <li><a href="{{ route('categories.index') }}">Cat&eacute;gories</a></li>
                    <li><a href="{{ route('brands.index') }}">Marques</a></li>

                </ul>

            </div>

            <div>

                <h4 class="mb-4 font-semibold text-ink">

                    Communaut&eacute;

                </h4>

                <ul class="space-y-3 text-ink-soft">

                    <li><a href="#">Ajouter un avis</a></li>
                    <li><a href="#">Connexion</a></li>
                    <li><a href="#">Cr&eacute;er un compte</a></li>

                </ul>

            </div>

            <div>

                <h4 class="mb-4 font-semibold text-ink">

                    Jarrabtiha

                </h4>

                <p class="text-ink-soft">

                    Suivez-nous

                </p>

                <div class="mt-4 flex gap-4">

                    <a href="#">Instagram</a>

                    <a href="#">TikTok</a>

                </div>

            </div>

        </div>

        <div class="mt-12 flex flex-col items-center justify-between gap-4 border-t border-border pt-8 text-sm text-ink-soft md:flex-row">

            <p>

                &copy; {{ date('Y') }} Jarrabtiha.ma

            </p>

            <div class="flex gap-6">

                <a href="#">Confidentialit&eacute;</a>

                <a href="#">Conditions</a>

                <a href="#">Contact</a>

            </div>

        </div>

    </div>

</footer>
