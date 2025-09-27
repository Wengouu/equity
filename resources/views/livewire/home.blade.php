@section('title', 'Home | Equity the Board Game Courses')

<div class="bg-gray-50 text-gray-800">

    <!-- HERO -->
    <header class="relative bg-indigo-600 text-white">
        <div class="max-w-5xl mx-auto px-6 py-24 text-center relative z-10">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">Master Equity: The Finance Board Game</h1>
            <p class="text-lg md:text-xl mb-8">
                Learn the rules, sharpen your strategies, and enjoy the game step by step with our guided courses.
            </p>
            <a href="#courses"
                class="bg-white text-indigo-600 px-6 py-3 rounded-full font-semibold hover:bg-gray-100 transition">
                Explore Courses
            </a>
        </div>
        <img src="{{ asset('assets/images/header-bg.jpg') }}" alt="Header Background"
            class="absolute inset-0 w-full h-full object-cover object-center z-0">
        <div class="absolute inset-0 bg-indigo-900/60"></div>
    </header>

    <!-- COURSES -->
    <section id="courses" class="max-w-7xl mx-auto px-6 py-20">
        <h2 class="text-3xl font-bold text-center mb-12">Available Courses</h2>

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

    <!-- ABOUT -->
    <section class="bg-gray-100 py-20">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold mb-6">Why this site?</h2>
            <p class="text-lg leading-relaxed">
                This site is here to help you learn and enjoy <strong>Equity: The Board Game</strong>,
                a unique strategy game based on finance.
                Our courses guide you step by step, so you can build a strong understanding of the rules,
                discover advanced tactics, and play with confidence.
                Whether you're a beginner or an experienced player, you’ll find the right resources to progress.
            </p>
        </div>
    </section>
</div>