<x-ui-container class="flex h-screen flex-col items-center justify-center gap-y-6">
    <x-ui-card>
        <form
            class="flex flex-col gap-y-6"
            wire:submit="submit"
        >
            <x-forms-input
                wire:model="form.email"
                type="email"
                label="{{ __('Email') }}"
                autocomplete="email"
                required
                autofocus
            />

            <x-forms-input
                wire:model="form.password"
                type="password"
                label="{{ __('Password') }}"
                autocomplete="current-password"
                required
            />

            <x-forms-checkbox
                wire:model="form.remember"
                label="{{ __('Remember me') }}"
            />

            <x-ui-button
                class="bg-primary-500"
                type="submit"
            >
                {{ __('Sign In') }}
            </x-ui-button>
        </form>
    </x-ui-card>
</x-ui-container>
