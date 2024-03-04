<x-ui-container class="flex flex-col gap-y-6 h-screen items-center justify-center">
    <x-ui-card>
        <form class="form" wire:submit="submit">
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
                {{-- class:color="bg-green-500" --}}
                class:disabled="lol"
                {{-- class:base="!boo bar" --}}
                {{-- class:hover="bg-primary" --}}
                disabled
                type="submit"
            >
                {{ __('Sign In') }}
            </x-ui-button>
        </form>
    </x-ui-card>
</x-ui-container>
