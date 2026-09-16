<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Produits - Jarrabtiha</title>

    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-cream text-ink font-sans antialiased">
    @include('market.layouts.navigation')
    @include('components.flash-messages')

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
    @include('market.layouts.footer')
</body>

</html>