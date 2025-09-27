@section('title', "$cours->titre - Course | ".config('app.name_2'))

<div class="relative w-full">

    @if($cours->image)
    <img src="{{ asset('storage/' . $cours->image) }}" alt="{{ $cours->titre }}"
        class="absolute inset-0 w-full h-full min-h-screen object-cover opacity-10 blur-sm">
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
            @if($cours->total_time > 0)
            <p class="mt-4 text-gray-500 font-semibold text-base">Total Duration: {{ $cours->total_time }} minutes</p>
            @endif
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
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Modules
            @if($isEnrolled)
            <span class="text-xl font-normal">({{ count($completedModules) }} / {{ $modules->count() }}
                completed)</span>
            @endif
        </h2>
        <div class="space-y-6">
            @if($modules->isEmpty())
            <p class="text-gray-600">No modules available for this course. Come back later!</p>
            @else
            @foreach($modules as $ordre => $module)
            <div class="block space-y-6">
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
                        @if($module->time_minutes > 0)
                        <p class="mt-2 text-gray-500 text-xs">Duration: {{ $module->time_minutes }} minutes</p>
                        @endif
                        <p class="mt-2 flex gap-x-1 items-center text-gray-500 text-xs">Completed:
                            {{-- Le module est présent dans le tableau des modules complétés, on met à complete --}}
                            @if(isset($completedModules[$ordre]))
                            <x-heroicon-c-check-circle class="text-green-600 w-4" />
                            @else
                            <x-heroicon-s-minus-circle class="text-gray-400 w-4" />
                            @endif
                        </p>
                    </div>

                    <div class="flex-none mt-auto">
                        <x-button spinner="startModule" primary outline
                            href="{{ route('module.detail', [$cours->slug, $module->slug]) }}" label="View Module" />
                    </div>
                </div>
                </a>
                @endforeach
                @endif
            </div>
        </div>
    </div>