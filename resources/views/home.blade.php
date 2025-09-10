<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formations Equity the Board Game</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body class="bg-gray-50 text-gray-800">

    <!-- HEADER / HERO -->
    <header class="relative bg-indigo-600 text-white">
        <div class="max-w-7xl mx-auto px-6 py-20 text-center z-50 relative">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">Formations Equity the Board Game</h1>
            <p class="text-lg md:text-xl mb-8">Apprenez à jouer et à maîtriser le jeu pas à pas grâce à nos cours simples et efficaces.</p>
            <a href="#courses" class="bg-white text-indigo-600 px-6 py-3 rounded-full font-semibold hover:bg-gray-100 transition">Découvrir les cours</a>
        </div>
        <img src="{{ asset('assets/images/header-bg.jpg') }}" alt="Header Background" 
            class="absolute inset-0 w-full h-full object-cover object-center z-0">
        <div class="absolute inset-0 bg-gradient-to-t from-indigo-900/70 to-indigo-600 opacity-60"></div>
        {{-- <img src="{{ asset('assets/images/logo.png') }}" alt="Logo de Equity The Board Game" class="absolute right-10 bottom-10 w-32 opacity-80"> --}}
    </header>

    <!-- COURS DISPONIBLES -->
    <section id="courses" class="max-w-7xl mx-auto px-6 py-20">
        <h2 class="text-3xl font-bold text-center mb-12">Nos Formations</h2>
        
        <div class="grid md:grid-cols-3 gap-10">
            <!-- Exemple de bloc cours -->
            <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition">
                <h3 class="text-xl font-bold mb-4">Introduction au Jeu</h3>
                <p class="mb-4">Découvrez les bases et commencez à jouer étape par étape.</p>
                <a href="#" class="bg-indigo-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-indigo-700 transition">Commencer</a>
            </div>

            <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition">
                <h3 class="text-xl font-bold mb-4">Stratégies Avancées</h3>
                <p class="mb-4">Apprenez les meilleures tactiques pour améliorer vos performances.</p>
                <a href="#" class="bg-indigo-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-indigo-700 transition">Commencer</a>
            </div>

            <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition">
                <h3 class="text-xl font-bold mb-4">Analyse des Parties</h3>
                <p class="mb-4">Étudiez des parties réelles pour progresser rapidement.</p>
                <a href="#" class="bg-indigo-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-indigo-700 transition">Commencer</a>
            </div>
        </div>
    </section>

    <!-- TEXTE EXPLICATIF -->
    <section class="bg-gray-100 py-20">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold mb-6">Pourquoi ce site ?</h2>
            <p class="text-lg leading-relaxed">
                Notre objectif est de vous accompagner dans l’apprentissage d’Equity the Board Game. 
                Grâce à ces formations, vous pourrez progresser à votre rythme et découvrir toutes les subtilités du jeu.
                Que vous soyez débutant ou joueur confirmé, nos cours vous aideront à profiter pleinement de l’expérience.
            </p>
        </div>
    </section>

    <!-- TESTIMONIALS -->
    <section class="max-w-7xl mx-auto px-6 py-20">
        <h2 class="text-3xl font-bold text-center mb-12">Ils en parlent</h2>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white shadow-md rounded-2xl p-6">
                <p class="italic">"Super clair et motivant ! J’ai enfin compris les règles sans me prendre la tête."</p>
                <div class="mt-4 font-bold">— Marie L.</div>
            </div>
            <div class="bg-white shadow-md rounded-2xl p-6">
                <p class="italic">"Les cours m’ont aidé à améliorer mes stratégies et gagner plus souvent."</p>
                <div class="mt-4 font-bold">— Julien R.</div>
            </div>
            <div class="bg-white shadow-md rounded-2xl p-6">
                <p class="italic">"Un must-have pour tous ceux qui veulent vraiment profiter du jeu !"</p>
                <div class="mt-4 font-bold">— Clara B.</div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-indigo-600 text-white py-10">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <p>&copy; {{ date('Y') }} Equity the Board Game - Tous droits réservés.</p>
        </div>
    </footer>

</body>
</html>