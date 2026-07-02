<div class="my-4 rounded-2xl border border-border bg-white p-6 shadow-soft" id="review-form">

    <h3 class="text-2xl font-bold text-brown">
        Jarrabti le produit ?
    </h3>

    <p class="mt-2 text-sm text-brown-soft">
        Partagez votre expérience avec ce produit.
    </p>

    @guest

    <div class="mt-8 rounded-2xl border border-[#F2D0C4] bg-[#FDF8F5] p-8 text-center">

        <div class="mx-auto mb-5 flex h-16 w-16 items-center justify-center rounded-full bg-[#F2D0C4]/40 text-3xl">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 1.25C9.37665 1.25 7.25 3.37665 7.25 6C7.25 8.62335 9.37665 10.75 12 10.75C14.6234 10.75 16.75 8.62335 16.75 6C16.75 3.37665 14.6234 1.25 12 1.25ZM8.75 6C8.75 4.20507 10.2051 2.75 12 2.75C13.7949 2.75 15.25 4.20507 15.25 6C15.25 7.79493 13.7949 9.25 12 9.25C10.2051 9.25 8.75 7.79493 8.75 6Z" fill="#3B2A27" />
                <path d="M18 3.25C17.5858 3.25 17.25 3.58579 17.25 4C17.25 4.41421 17.5858 4.75 18 4.75C19.3765 4.75 20.25 5.65573 20.25 6.5C20.25 7.34427 19.3765 8.25 18 8.25C17.5858 8.25 17.25 8.58579 17.25 9C17.25 9.41421 17.5858 9.75 18 9.75C19.9372 9.75 21.75 8.41715 21.75 6.5C21.75 4.58285 19.9372 3.25 18 3.25Z" fill="#3B2A27" />
                <path d="M6.75 4C6.75 3.58579 6.41421 3.25 6 3.25C4.06278 3.25 2.25 4.58285 2.25 6.5C2.25 8.41715 4.06278 9.75 6 9.75C6.41421 9.75 6.75 9.41421 6.75 9C6.75 8.58579 6.41421 8.25 6 8.25C4.62351 8.25 3.75 7.34427 3.75 6.5C3.75 5.65573 4.62351 4.75 6 4.75C6.41421 4.75 6.75 4.41421 6.75 4Z" fill="#3B2A27" />
                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 12.25C10.2157 12.25 8.56645 12.7308 7.34133 13.5475C6.12146 14.3608 5.25 15.5666 5.25 17C5.25 18.4334 6.12146 19.6392 7.34133 20.4525C8.56645 21.2692 10.2157 21.75 12 21.75C13.7843 21.75 15.4335 21.2692 16.6587 20.4525C17.8785 19.6392 18.75 18.4334 18.75 17C18.75 15.5666 17.8785 14.3608 16.6587 13.5475C15.4335 12.7308 13.7843 12.25 12 12.25ZM6.75 17C6.75 16.2242 7.22169 15.4301 8.17338 14.7956C9.11984 14.1646 10.4706 13.75 12 13.75C13.5294 13.75 14.8802 14.1646 15.8266 14.7956C16.7783 15.4301 17.25 16.2242 17.25 17C17.25 17.7758 16.7783 18.5699 15.8266 19.2044C14.8802 19.8354 13.5294 20.25 12 20.25C10.4706 20.25 9.11984 19.8354 8.17338 19.2044C7.22169 18.5699 6.75 17.7758 6.75 17Z" fill="#3B2A27" />
                <path d="M19.2674 13.8393C19.3561 13.4347 19.7561 13.1787 20.1607 13.2674C21.1225 13.4783 21.9893 13.8593 22.6328 14.3859C23.2758 14.912 23.75 15.6352 23.75 16.5C23.75 17.3648 23.2758 18.088 22.6328 18.6141C21.9893 19.1407 21.1225 19.5217 20.1607 19.7326C19.7561 19.8213 19.3561 19.5653 19.2674 19.1607C19.1787 18.7561 19.4347 18.3561 19.8393 18.2674C20.6317 18.0936 21.2649 17.7952 21.6829 17.4532C22.1014 17.1108 22.25 16.7763 22.25 16.5C22.25 16.2237 22.1014 15.8892 21.6829 15.5468C21.2649 15.2048 20.6317 14.9064 19.8393 14.7326C19.4347 14.6439 19.1787 14.2439 19.2674 13.8393Z" fill="#3B2A27" />
                <path d="M3.83935 13.2674C4.24395 13.1787 4.64387 13.4347 4.73259 13.8393C4.82132 14.2439 4.56525 14.6439 4.16065 14.7326C3.36829 14.9064 2.73505 15.2048 2.31712 15.5468C1.89863 15.8892 1.75 16.2237 1.75 16.5C1.75 16.7763 1.89863 17.1108 2.31712 17.4532C2.73505 17.7952 3.36829 18.0936 4.16065 18.2674C4.56525 18.3561 4.82132 18.7561 4.73259 19.1607C4.64387 19.5653 4.24395 19.8213 3.83935 19.7326C2.87746 19.5217 2.0107 19.1407 1.36719 18.6141C0.724248 18.088 0.25 17.3648 0.25 16.5C0.25 15.6352 0.724248 14.912 1.36719 14.3859C2.0107 13.8593 2.87746 13.4783 3.83935 13.2674Z" fill="#3B2A27" />
            </svg>

        </div>

        <h4 class="text-xl font-bold text-[#3D1F1F]">
            Connectez-vous pour laisser votre avis
        </h4>

        <p class="mt-3 text-sm leading-6 text-brown-soft max-w-md mx-auto">
            Rejoignez la communauté Jarrabtiha et partagez votre vraie expérience avec les autres.
        </p>

        <div class="mt-6 flex flex-col sm:flex-row justify-center gap-3">

            <a
                href="{{ route('login', ['redirect' => url()->current() . '#review-form']) }}"
                class="rounded-xl bg-[#C9956C] px-6 py-3 font-semibold text-white transition hover:bg-[#3D1F1F]">
                Se connecter
            </a>

            <a
                href="{{ route('register', ['redirect' => url()->current() . '#review-form']) }}"
                class="rounded-xl border border-[#C9956C] px-6 py-3 font-semibold text-[#C9956C] transition hover:bg-[#C9956C] hover:text-white">
                Créer un compte
            </a>

        </div>

    </div>

    @else
    <form method="POST" action="{{ route('reviews.store', $product) }}" class="mt-8">
        @csrf

        {{-- ÉTAPE 1 — Note --}}
        <div
            x-data="{ rating: {{ old('rating', 0) }} }"
            class="space-y-2">

            <input type="hidden" name="rating" :value="rating">

            {{-- Note étoiles --}}
            <div class="rounded-2xl border border-[#F2D0C4] bg-[#FDF8F5] p-6 text-center">
                <p class="text-sm font-semibold text-[#3D1F1F] mb-4">
                    Comment notez-vous ce produit ?
                </p>

                <div class="flex justify-center gap-3">
                    <template x-for="star in 5" :key="star">
                        <button
                            type="button"
                            @click="rating = star"
                            class="text-5xl transition-transform duration-150 hover:scale-125 focus:outline-none"
                            :class="star <= rating ? 'text-[#C9956C]' : 'text-[#F2D0C4]'">
                            ★
                        </button>
                    </template>
                </div>
            </div>

            {{-- Expérience --}}
            <div>
                <label class="block text-sm font-semibold text-[#3D1F1F] mb-2">
                    Votre expérience
                </label>
                <textarea
                    name="body"
                    rows="4"
                    required
                    placeholder="Partager m3ana tajribtk... Wach nfa3 m3ak? Chnou 3jbk w chnou ma 3jbkch?"
                    class="w-full rounded-2xl border border-[#F2D0C4] bg-[#FDF8F5] px-4 py-3 text-sm text-[#3D1F1F] placeholder-[#C9956C]/50 focus:border-[#C9956C] focus:ring-1 focus:ring-[#C9956C] focus:outline-none resize-none transition">{{ old('body') }}</textarea>
            </div>

            {{-- Durée + Recommande — côte à côte sur desktop --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                {{-- Durée d'utilisation --}}
                <div>
                    <label class="block text-sm font-semibold text-[#3D1F1F] mb-2">
                        Durée d'utilisation
                    </label>
                    <select
                        name="result_duration"
                        required
                        class="w-full rounded-xl border border-[#F2D0C4] bg-[#FDF8F5] px-4 py-3 text-sm text-[#3D1F1F] focus:border-[#C9956C] focus:ring-1 focus:ring-[#C9956C] focus:outline-none transition">
                        <option value="">Choisir...</option>
                        <option value="1week" {{ old('result_duration') == '1week'   ? 'selected' : '' }}>1 semaine</option>
                        <option value="2weeks" {{ old('result_duration') == '2weeks'  ? 'selected' : '' }}>2 semaines</option>
                        <option value="1month" {{ old('result_duration') == '1month'  ? 'selected' : '' }}>1 mois</option>
                        <option value="3months" {{ old('result_duration') == '3months' ? 'selected' : '' }}>3 mois</option>
                        <option value="more" {{ old('result_duration') == 'more'    ? 'selected' : '' }}>+ de 3 mois</option>
                    </select>
                </div>

                {{-- Recommande --}}
                <div>
                    <label class="block text-sm font-semibold text-[#3D1F1F] mb-2">
                        Recommandation
                    </label>
                    <label class="flex items-center gap-3 w-full rounded-xl border border-[#F2D0C4] bg-[#FDF8F5] px-4 py-3 cursor-pointer hover:border-[#C9956C] transition">
                        <input
                            type="checkbox"
                            name="would_recommend"
                            value="1"
                            {{ old('would_recommend') ? 'checked' : '' }}
                            class="h-5 w-5 rounded border-[#F2D0C4] text-[#C9956C] focus:ring-[#C9956C]">
                        <span class="flex items-center gap-2">
                            <span class="text-sm font-semibold text-[#3D1F1F]">
                                Je recommande ce produit
                            </span>
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.4382 2.77841C12.2931 2.73181 12.1345 2.74311 11.9998 2.80804C11.8523 2.87913 11.7548 3.0032 11.7197 3.13821L11.244 4.97206C11.0777 5.61339 10.8354 6.23198 10.5235 6.81599C10.0392 7.72267 9.30632 8.42 8.62647 9.00585L7.18773 10.2456C6.96475 10.4378 6.8474 10.7258 6.87282 11.0198L7.68498 20.4125C7.72601 20.887 8.12244 21.25 8.59635 21.25H13.245C16.3813 21.25 19.0238 19.0677 19.5306 16.1371L20.2361 12.0574C20.3332 11.4959 19.9014 10.9842 19.3348 10.9842H14.1537C13.1766 10.9842 12.4344 10.1076 12.5921 9.14471L13.2548 5.10015C13.3456 4.54613 13.3197 3.97923 13.1787 3.43584C13.1072 3.16009 12.8896 2.92342 12.5832 2.82498L12.4382 2.77841L12.6676 2.06435L12.4382 2.77841ZM11.3486 1.45674C11.8312 1.2242 12.3873 1.18654 12.897 1.35029L13.042 1.39686L12.8126 2.11092L13.042 1.39686C13.819 1.64648 14.4252 2.26719 14.6307 3.0592C14.8241 3.80477 14.8596 4.58256 14.7351 5.34268L14.0724 9.38724C14.0639 9.439 14.1038 9.4842 14.1537 9.4842H19.3348C20.8341 9.4842 21.9695 10.8365 21.7142 12.313L21.0087 16.3928C20.3708 20.081 17.0712 22.75 13.245 22.75H8.59635C7.3427 22.75 6.29852 21.7902 6.19056 20.5417L5.3784 11.149C5.31149 10.3753 5.62022 9.61631 6.20855 9.10933L7.64729 7.86954C8.3025 7.30492 8.85404 6.75767 9.20042 6.10924C9.45699 5.62892 9.65573 5.12107 9.79208 4.59542L10.2678 2.76157C10.417 2.18627 10.8166 1.71309 11.3486 1.45674ZM2.96767 9.4849C3.36893 9.46758 3.71261 9.76944 3.74721 10.1696L4.71881 21.4061C4.78122 22.1279 4.21268 22.75 3.48671 22.75C2.80289 22.75 2.25 22.1953 2.25 21.5127V10.2342C2.25 9.83256 2.5664 9.50221 2.96767 9.4849Z" fill="#3B2A27" />
                            </svg>
                        </span>
                    </label>
                </div>

            </div>

            {{-- Submit --}}
            <button
                type="submit"
                class="w-full rounded-2xl bg-[#C9956C] py-4 text-sm font-semibold text-[#FDF8F5] shadow-md hover:bg-[#3D1F1F] transition-colors duration-200">
                Publier mon avis
            </button>

        </div>
    </form>
    @endguest

</div>