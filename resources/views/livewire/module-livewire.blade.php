<div class="max-w-5xl mx-auto p-6 space-y-8">

    <x-breadcrumb :links="[
    ['label' => 'Homepage', 'url' => route('home')],
    ['label' => 'Courses', 'url' => route('courses.list')],
    ['label' => $cours->titre, 'url' => route('course.detail', $cours->slug)],
    ['label' => $module->titre]
    ]" />

    <!-- Module Header -->
    <div class="space-y-2">
        <h1 class="text-3xl font-bold text-gray-800">{{ $module->titre }}</h1>
        <p class="text-gray-600">{{ $module->description }}</p>
        @if($module->time_minutes > 0)
        <p class="text-gray-500 text-sm">Estimated time: {{ $module->time_minutes }} minutes</p>
        @endif
    </div>

    <!-- Video Section -->
    @if($video)
    <div class="aspect-w-16 aspect-h-9 bg-black rounded-2xl overflow-hidden shadow-lg">
        <video class="w-full h-auto rounded-2xl shadow-lg" controls>
            <source src="{{ asset('storage/' . $video->fichier) }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
    @else
    <p class="text-gray-600">No video available for this module.</p>
    @endif

    <!-- Transcription Section -->
    <div class="bg-white rounded-2xl shadow p-6">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Transcription</h2>
        @if($video && $video->transcription)
        <div class="prose prose-gray max-w-none">
            {!! Str::markdown($video->transcription) !!}
        </div>
        @else
        <p class="text-gray-600">No transcription available for this video.</p>
        @endif
    </div>

    <!-- Navigation Buttons -->
    <div class="flex justify-between">
        @if($previousModule)
        <a href="{{ route('module.detail', [$cours->slug, $previousModule->slug]) }}"
            class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300">← Previous Module</a>
        @else
        <div></div>
        @endif
        @if($nextModule)
        <a href="{{ route('module.detail', [$cours->slug, $nextModule->slug]) }}"
            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Next Module →</a>
        @endif
    </div>