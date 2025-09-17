<div class="max-w-5xl mx-auto p-6">
    <!-- Course Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">{{ $cours->titre }}</h1>
        <p class="mt-2 text-gray-600">{{ $cours->description }}</p>
    </div>

    <!-- Enrollment Section -->
    <div class="mb-6">
        @if(!$isEnrolled)
        <x-button wire:click="enroll" spinner="enroll" primary label="Enroll in this course" />
        @else
        <p class="text-green-600 font-semibold">You are enrolled in this course ✅</p>
        @endif
    </div>

    <!-- Modules List -->
    <div class="space-y-6">
        @foreach($modules as $module)
        <div class="flex items-start gap-4 bg-white shadow rounded-2xl p-4">
            <!-- Module Image -->
            <img src="{{ $module->image_url }}" alt="{{ $module->titre }}" class="w-28 h-20 object-cover rounded-xl">

            <!-- Module Content -->
            <div class="flex-1">
                <h2 class="text-lg font-semibold text-gray-800">{{ $module->titre }}</h2>
                <p class="text-gray-600 text-sm">{{ $module->description }}</p>
            </div>

            <!-- Progress Indicator -->
            @if($isEnrolled)
            @if($user->hasCompleted($module))
            <span class="text-green-600 text-xl">✔️</span>
            @else
            <span class="text-gray-400 text-xl">•</span>
            @endif
            @endif
        </div>
        @endforeach
    </div>
</div>