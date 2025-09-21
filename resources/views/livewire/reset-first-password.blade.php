<div class="max-w-md mx-auto p-4">
    <h2 class="text-xl font-bold mb-4">{{ $user->name }}, set a password</h2>
    <p class="mb-4">Please set a new password for your first login.</p>

    @if (session()->has('success'))
    <x-flash message="{{ session('success') }}" type="success" />
    @elseif(session()->has('error'))
    <x-flash message="{{ session('error') }}" type="error" />
    @endif

    <div>
        <form wire:submit.prevent="save">
            <div class="mb-4">
                <x-input label="New Password" placeholder="Enter new password" type="password" wire:model="password" />
            </div>

            <div class="mb-4">
                <x-input label="Confirm Password" placeholder="Enter confirm password" type="password"
                    wire:model="password_confirmation" />
            </div>

            <x-button primary type="submit" label="Save Password" spinner="save" />
        </form>

    </div>
</div>