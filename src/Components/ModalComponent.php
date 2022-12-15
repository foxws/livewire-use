<?php

namespace Foxws\LivewireUse\Components;

use Foxws\LivewireUse\Concerns\WithModal;
use Foxws\LivewireUse\Concerns\WithState;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Livewire\Component;

abstract class ModalComponent extends Component
{
    use WithModal;
    use WithState;

    protected $listeners = [
        'openModal',
        'closeModal',
        'escapeModal',
    ];

    abstract public function render(): View;

    public function openModal(array $parameters = []): void
    {
        // Set state
        $this->fillState($parameters);

        // Set modal
        $this->fill(Arr::only($parameters, [
            'component', 'backdrop', 'class', 'escapable', 'focus',
        ]));

        // Open modal
        $this->open = true;
    }

    public function closeModal(): void
    {
        $this->resetModal();
    }

    public function escapeModal(): void
    {
        if (! $this->escapable) {
            return;
        }

        $this->closeModal();
    }

    public function resetModal(): void
    {
        // Reset state
        $this->resetState();

        // Reset attributes
        $this->resetExcept('state');
    }

    public function updatingOpen(): void
    {
        $this->resetModal();
    }
}
