<div class="max-w-5xl mx-auto p-6 space-y-8">

    <x-breadcrumb :links="[
    ['label' => 'Homepage', 'url' => route('home')],
    ['label' => 'Courses']
    ]" />

    <h1 class="text-3xl font-bold text-gray-800 mb-6">Available Courses</h1>

    @if(!$cours->isEmpty())
    <div class="grid md:grid-cols-3 gap-10">
        @foreach ($cours as $coursItem)
        <x-card-cours :cours="$coursItem" />
        @endforeach
    </div>
    @else
    <p class="text-center text-gray-600">No courses available at the moment. Please check back later!</p>
    @endif

</div>