<x-livewire-use::layout-container class="flex h-screen flex-col items-center justify-center gap-y-6">
    <x-livewire-use::ui-card class="shadow-sm sm:max-w-lg sm:rounded-xl bg-gray-900">
        <x-livewire-use::forms-schema>
            <x-livewire-use::layout-join class="gap-y-2" vertical>
                <x-livewire-use::forms-label for="form.email">
                    {{ __('Email') }}
                </x-livewire-use::forms-label>

                <x-livewire-use::forms-input
                    wire:model="form.email"
                    type="email"
                    class="border-0 bg-gray-800 text-gray-300 placeholder:text-gray-500"
                    placeholder="{{ __('Your Email') }}"
                    autocomplete="email"
                    required
                    autofocus
                />
            </x-livewire-use::layout-join>

            <x-livewire-use::layout-join class="gap-y-2" vertical>
                <x-livewire-use::forms-label for="form.password">
                    {{ __('Password') }}
                </x-livewire-use::forms-label>

                <x-livewire-use::forms-input
                    wire:model="form.password"
                    type="password"
                    class="border-0 bg-gray-800 text-gray-300 placeholder:text-gray-500"
                    placeholder="{{ __('Your Password') }}"
                    autocomplete="current-password"
                    required
                />
            </x-livewire-use::layout-join>

            <x-livewire-use::forms-checkbox
                wire:model="form.remember"
                label="{{ __('Remember me') }}"
            />

            <x-livewire-use::actions-button
                class="py-1.5 font-medium bg-primary-500"
                type="submit"
            >
                {{ __('Sign In') }}
            </x-livewire-use::actions-button>
        </x-livewire-use::forms-schema>
    </x-livewire-use::ui-card>
</x-livewire-use::layout-container>
