<?php

namespace Foxws\LivewireUse\Components;

use Foxws\LivewireUse\Concerns\WithState;
use Foxws\LivewireUse\Concerns\WithSteps;
use Foxws\LivewireUse\Enums\StepStatus;
use Foxws\LivewireUse\Support\State;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Livewire;

abstract class WizardComponent extends Component
{
    use WithState;
    use WithSteps;

    protected $listeners = [
        'previousStep',
        'nextStep',
        'setStep',
    ];

    public function mount(): void
    {
        /** @var string */
        $initialStep = collect($this->steps())->firstOrFail();

        $this->setStep($initialStep);
    }

    public function booted(): void
    {
        /** @var StepComponent */
        $class = fn (string $class) => Livewire::getClass($class);

        $currentFound = false;

        $this->steps = collect($this->steps())
            ->each(function (string $step) use ($class) {
                // Validate step
                throw_if(! is_a($class($step), StepComponent::class, true));

                // Set initial state
                if (! $this->getState($step)) {
                    /** @var array */
                    $state = Arr::except(app($class($step))->all(), 'state');

                    $this->setState($step, $state);
                }
            })
            ->map(function (string $step) use (&$currentFound, $class) {
                $info = app($class($step))->stepInfo();

                $status = $currentFound ? StepStatus::Next : StepStatus::Previous;

                if ($step === $this->getState('current')) {
                    $currentFound = true;
                    $status = StepStatus::Current;
                }

                return new State(
                    compact('step', 'status', 'info')
                );
            });
    }

    abstract public function render(): View;

    abstract protected function steps(): array;

    public function setStep(string $step, array $state = []): void
    {
        if (! in_array($step, $this->steps())) {
            return;
        }

        // Set step state
        if ($this->step) {
            $this->setState($this->step, Arr::except($state, 'state'));
        }

        // Set step component
        $this->step = $step;
    }

    public function previousStep(array $state = []): void
    {
        $previousStep = collect($this->steps())
            ->before(fn (string $step) => $step === $this->step);

        $this->setStep($previousStep, $state);
    }

    public function nextStep(array $state = []): void
    {
        $nextStep = collect($this->steps())
            ->after(fn (string $step) => $step === $this->step);

        $this->setStep($nextStep, $state);
    }
}
