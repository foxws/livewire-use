<?php

namespace Foxws\LivewireUse\Components;

use Illuminate\View\View;
use Livewire\Component;
use Foxws\LivewireUse\Concerns\WithState;

abstract class StepComponent extends Component
{
    use WithState;

    abstract public function render(): View;

    public function stepInfo(): array
    {
        return [];
    }

    public function setStep(): void
    {
        $this->emitUp('setStep', $this->state());
    }

    public function previousStep(): void
    {
        $this->emitUp('previousStep', $this->state());
    }

    public function nextStep(): void
    {
        $this->emitUp('nextStep', $this->state());
    }

    public function state(): array
    {
        return $this->all();
    }

    public function stateFor(string $step): ?array
    {
        return $this->state->get($step);
    }
}
