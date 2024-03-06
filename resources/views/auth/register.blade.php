<x-livewire-use::container class="flex flex-col gap-y-6 h-screen items-center justify-center">
    <x-ui-card>
        <form class="flex flex-col gap-6" wire:submit="submit">
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

            <x-livewire-use::actions.button
                class="btn-primary"
                type="submit"
            >
                {{ __('Sign Up') }}
            </x-livewire-use::actions.button>
        </form>
    </x-ui-card>
</x-livewire-use::container>
