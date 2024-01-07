<x-ui-container class="flex h-screen items-center justify-center">
    <x-ui-card>
        <form wire:submit="submit">
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

            <x-ui-button type="submit">
                {{ __('Login') }}
            </x-ui-button>
        </form>
    </x-ui-card>
</x-ui-container>
