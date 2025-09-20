<div class="relative max-w-5xl mx-auto p-6">

    <x-breadcrumb :links="[
        ['label' => 'Homepage', 'url' => route('home')],
        ['label' => 'My courses']
    ]" />

    <h1 class="text-3xl font-bold my-6">My courses</h1>

    @if($courses->isEmpty())
    <p>You are not enrolled in any courses at the moment.</p>
    @else
    <div class="grid grid-cols-1 gap-6">
        @foreach($courses as $course)
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            @if($course->image)
            <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->titre }}"
                class="w-full h-48 object-cover">
            @endif
            <div class="p-4">
                <h2 class="text-xl font-semibold mb-2">{{ $course->titre }}</h2>
                <p class="text-gray-600 mb-4">{{ Str::limit($course->description, 100) }}</p>
                <a href="{{ route('course.detail', $course->slug) }}" class="text-blue-500 hover:underline">View
                    course</a>
            </div>
        </div>
        @endforeach
    </div>
    @endif
    <x-button outline label="View all Courses" href="{{ route('courses.list') }}" class="mt-6" />
</div>