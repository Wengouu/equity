@props(['type' => 'success', 'message'])

@php
$classes = match($type) {
'success' => 'bg-green-500 text-white',
'error' => 'bg-red-500 text-white',
default => 'bg-gray-500 text-white',
};
@endphp

<div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 8000)"
    class="{{ $classes }} px-4 py-2 rounded mb-4 shadow">
    {{ $message }}
</div>