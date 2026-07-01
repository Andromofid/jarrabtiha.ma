<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Jarrabtiha') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gradient-to-br from-primary-soft/30 via-[#FDFBF9] to-primary-soft/10 antialiased">

    <div class="flex min-h-screen items-center justify-center px-6 py-12">

        <div class="w-full max-w-md">


            {{-- Card --}}
            <div class="overflow-hidden rounded-card border border-border bg-white shadow-card">
                <div class="p-8">
                    @include('components.flash-messages')

                    {{ $slot }}
                </div>
            </div>

            {{-- Footer --}}
            <p class="mt-8 text-center text-sm text-brown-soft">
                © {{ now()->year }}
                <span class="font-semibold text-brown">Jarrabtiha.ma</span>
            </p>

        </div>

    </div>

</body>

</html>