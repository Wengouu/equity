<div class="bg-gray-50 text-gray-800">

    <!-- HEADER / HERO -->
    <div class="relative bg-indigo-600 text-white">
        <div class="max-w-7xl mx-auto px-6 py-20 text-center relative z-10">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">Equity the Board Game Courses</h1>
            <p class="text-lg md:text-xl mb-8">Learn to play and master the game step by step with our simple and
                effective courses.</p>
            <a href="#courses"
                class="bg-white text-indigo-600 px-6 py-3 rounded-full font-semibold hover:bg-gray-100 transition">Discover
                the courses</a>
        </div>
        <img src="{{ asset('assets/images/header-bg.jpg') }}" alt="Header Background"
            class="absolute inset-0 w-full h-full object-cover object-center z-0">
        <div class="absolute inset-0 bg-gradient-to-t from-indigo-900/70 to-indigo-600 opacity-60"></div>
        {{-- <img src="{{ asset('assets/images/logo.png') }}" alt="Logo de Equity The Board Game"
            class="absolute right-10 bottom-10 w-32 opacity-80"> --}}
    </div>

    <!-- COURS DISPONIBLES -->
    <section id="courses" class="max-w-7xl mx-auto px-6 py-20">
        <h2 class="text-3xl font-bold text-center mb-12">Our Courses</h2>

        @if(!$cours->isEmpty())
        <div class="grid md:grid-cols-3 gap-10">
            @foreach ($cours as $coursItem)
            <x-card-cours :cours="$coursItem" />
            @endforeach
        </div>
        <div class="flex justify-center mt-10">
            <x-button outline href="{{ route('courses.list') }}" label="See all courses" />
        </div>
        @else
        <p class="text-center text-gray-600">No courses available at the moment. Please check back later!</p>
        @endif

    </section>

    <!-- TEXTE EXPLICATIF -->
    <section class="bg-gray-100 py-20">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold mb-6">Why this site?</h2>
            <p class="text-lg leading-relaxed">
                Our goal is to support you in learning Equity the Board Game.
                With these courses, you can progress at your own pace and discover all the subtleties of the
                game.
                Whether you are a beginner or an experienced player, our courses will help you make the most of
                your experience.
            </p>
        </div>
    </section>

    <!-- TESTIMONIALS -->
    <section class="max-w-7xl mx-auto px-6 py-20">
        <h2 class="text-3xl font-bold text-center mb-12">They talk about it</h2>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white shadow-md rounded-2xl p-6">
                <p class="italic">"Super clear and motivating! I finally understood the rules without getting
                    overwhelmed."</p>
                <div class="mt-4 font-bold">— Marie L.</div>
            </div>
            <div class="bg-white shadow-md rounded-2xl p-6">
                <p class="italic">"The courses helped me improve my strategies and win more often."</p>
                <div class="mt-4 font-bold">— Julien R.</div>
            </div>
            <div class="bg-white shadow-md rounded-2xl p-6">
                <p class="italic">"A must-have for anyone who really wants to enjoy the game!"</p>
                <div class="mt-4 font-bold">— Clara B.</div>
            </div>
        </div>
    </section>
</div>