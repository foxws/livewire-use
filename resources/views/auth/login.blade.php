<x-ui-container class="flex h-screen flex-col items-center justify-center gap-y-6">
    <x-ui-card>
        <form
            class="form"
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
                {{-- class:layer="!boo bar" --}}
                {{-- class="gap-1.5 rounded border-transparent bg-green-500 py-2.5 text-sm font-medium" --}}
                {{-- class:hover="bg-primary" --}}
                disabled
                type="submit"
            >
                {{ __('Sign In') }}
            </x-ui-button>
        </form>
    </x-ui-card>
</x-ui-container>
