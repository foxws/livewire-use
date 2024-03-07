<x-livewire-use::layout-container class="flex flex-col gap-y-6 h-screen items-center justify-center">
    <x-ui-card>
        <x-livewire-use::forms-schema>
            <x-forms-input
                wire:model="form.email"
                type="email"
                label="{{ __('Email') }}"
                required
                autofocus
            />

            <x-forms-input
                wire:model="form.password"
                type="password"
                label="{{ __('Password') }}"
                required
            />

            <x-forms-input
                wire:model="form.password_confirmation"
                type="password"
                label="{{ __('Confirm Password') }}"
                required
            />

            <x-livewire-use::actions-button
                class="btn-primary"
                type="submit"
            >
                {{ __('Sign Up') }}
            </x-livewire-use::actions-button>
        </x-livewire-use::forms-schema>
    </x-ui-card>
</x-livewire-use::layout-container>
