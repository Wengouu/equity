<div class="max-w-5xl mx-auto p-6 space-y-8">
    <!-- Module Header -->
    <div class="space-y-2">
        <h1 class="text-3xl font-bold text-gray-800">{{ $module->titre }}</h1>
        <p class="text-gray-600">{{ $module->description }}</p>
    </div>

    <!-- Video Section -->
    <div class="aspect-w-16 aspect-h-9 bg-black rounded-2xl overflow-hidden shadow-lg">
        <video class="w-full h-auto rounded-2xl shadow-lg" controls>
            <source src="{{ asset('storage/' . $video->fichier) }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    <!-- Transcription Section -->
    <div class="bg-white rounded-2xl shadow p-6">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Transcription</h2>
        <div class="prose prose-gray max-w-none">
            {!! Str::markdown($video->transcription) !!}
        </div>
    </div>
</div>