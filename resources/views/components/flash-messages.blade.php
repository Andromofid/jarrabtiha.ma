<div class="fixed top-4 right-4 left-4 sm:left-auto sm:right-6 sm:top-6 z-[1100] sm:w-full sm:max-w-sm space-y-3 pointer-events-none">

    {{-- Success --}}
    @if (session('success'))
    <div
        x-data="{ show: true }"
        x-show="show"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-[-8px] sm:translate-y-0 sm:translate-x-8"
        x-transition:enter-end="opacity-100 translate-y-0 sm:translate-x-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        x-init="setTimeout(() => show = false, 5000)"
        class="pointer-events-auto rounded-2xl border border-[#F2D0C4] bg-[#FDF8F5] p-4 shadow-lg">

        <div class="flex items-center gap-3">
            <span class="text-xl">✅</span>
            <p class="flex-1 text-sm font-medium text-[#3D1F1F]">
                {{ session('success') }}
            </p>
            <button @click="show = false" class="text-[#C9956C] hover:text-[#3D1F1F] transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

    </div>
    @endif

    {{-- Erreurs --}}
    @if ($errors->any())
    <div
        x-data="{ show: true }"
        x-show="show"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-[-8px] sm:translate-y-0 sm:translate-x-8"
        x-transition:enter-end="opacity-100 translate-y-0 sm:translate-x-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        x-init="setTimeout(() => show = false, 7000)"
        class="pointer-events-auto rounded-2xl border border-red-200 bg-[#FDF8F5] p-4 shadow-lg">

        <div class="flex items-start gap-3">
            <span class="text-xl mt-0.5">⚠️</span>
            <div class="flex-1">
                @if ($errors->count() === 1)
                <p class="text-sm font-medium text-red-700">{{ $errors->first() }}</p>
                @else
                <p class="text-sm font-medium text-red-700 mb-1">{{ $errors->count() }} erreurs à corriger :</p>
                <ul class="list-disc pl-4 space-y-0.5">
                    @foreach ($errors->all() as $error)
                    <li class="text-xs text-[#3D1F1F]">{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
            <button @click="show = false" class="text-red-400 hover:text-red-700 transition-colors mt-0.5">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

    </div>
    @endif

</div>