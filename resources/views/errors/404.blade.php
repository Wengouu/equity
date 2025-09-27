<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>404 — Page introuvable</title>
    @vite(['resources/css/app.css'])
</head>

<body class="bg-gray-50 text-gray-800 flex items-center justify-center min-h-screen">
    <div class="text-center px-6">
        <h1 class="text-6xl font-bold text-indigo-600 mb-4">404</h1>
        <p class="text-lg md:text-xl mb-8">Oups — la page que vous cherchez est introuvable.</p>
        <a href="{{ url('/') }}"
            class="bg-indigo-600 text-white px-6 py-3 rounded-full font-semibold hover:bg-indigo-700 transition">
            Retour à l'accueil
        </a>
    </div>
</body>

</html>