<x-ui-container class="h-screen flex items-center justify-center">
    <x-ui-card>
        <form wire:submit="submit">
            <x-forms-input
                type="email"
                label="{{ __('Email') }}"
                wire:model="form.email"
            />

            <x-forms-input
                type="password"
                label="{{ __('Password') }}"
                wire:model="form.password"
            />

            <x-ui-button type="submit">
                {{ __('Login') }}
            </x-ui-button>
        </form>
    </x-ui-card>
</x-ui-container>
