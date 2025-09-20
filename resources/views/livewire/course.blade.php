<div class="relative h-screen w-full">

    @if($cours->image)
    <img src="{{ asset('storage/' . $cours->image) }}" alt="{{ $cours->titre }}"
        class="absolute inset-0 w-full h-full object-cover opacity-10 blur-sm">
    @endif

    <div class="relative max-w-5xl mx-auto p-6 z-10">

        <x-breadcrumb :links="[
    ['label' => 'Homepage', 'url' => route('home')],
    ['label' => 'Courses', 'url' => route('courses.list')],
    ['label' => $cours->titre]
    ]" />


        @if (session('success'))
        <div class="mt-4">
            <x-flash message="{{ session('success') }}" type="success" />
        </div>
        @endif

        @if (session('error'))
        <div class="mt-4">
            <x-flash message="{{ session('error') }}" type="error" />
        </div>
        @endif
        <!-- Course Header -->
        <div class="my-8">
            <h1 class="text-3xl font-bold text-gray-800">{{ $cours->titre }}</h1>
            <p class="mt-2 text-gray-600">{{ $cours->description }}</p>
        </div>

        <!-- Enrollment Section -->
        <div class="mb-6">
            @if(!$isEnrolled)
            <x-button wire:click="enroll({{ $cours->id }})" spinner="enroll" primary label="Enroll in this course" />
            @else
            <p class="text-green-600 font-semibold">You are enrolled in this course ✅</p>
            @endif
        </div>

        <!-- Modules List -->
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Modules</h2>
        <div class="space-y-6">
            @if($modules->isEmpty())
            <p class="text-gray-600">No modules available for this course. Come back later!</p>
            @else
            @foreach($modules as $ordre => $module)
            <a href="{{ route('module.detail', [$cours->slug, $module->slug]) }}" class="block">
                <div class="flex items-start gap-4 bg-white shadow rounded-2xl p-4">
                    <div class="text-2xl font-bold text-gray-600 m-auto w-8">
                        {{ $ordre + 1 }}
                    </div>
                    @if($module->image)
                    <!-- Module Image -->
                    <img src="{{ asset('storage/'.$module->image) }}" alt="{{ $module->titre }}"
                        class="w-28 h-20 object-cover rounded-xl">
                    @endif

                    <!-- Module Content -->
                    <div class="flex-1">
                        <h2 class="text-lg font-semibold text-gray-800">{{ $module->titre }}</h2>
                        <p class="text-gray-600 text-sm">{{ $module->description }}</p>
                    </div>

                    <!-- Progress Indicator -->
                    @if($isEnrolled)
                    {{-- @if($user->hasCompleted($module))
                    <span class="text-green-600 text-xl">✔️</span>
                    @else --}}
                    <span class="text-gray-400 text-xl">•</span>
                    {{-- @endif --}}
                    @endif
                </div>
            </a>
            @endforeach
            @endif
        </div>
    </div>
</div>