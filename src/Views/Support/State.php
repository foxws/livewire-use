<?php

namespace Foxws\LivewireUse\Views\Support;

use Closure;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Collection;
use ReflectionClass;
use ReflectionMethod;
use ReflectionProperty;

abstract class State implements Arrayable
{
    public function __construct(
        protected array $data = [],
        protected array $ignore = [],
    ) {
    }

    public function toArray(): array
    {
        return $this->items()->all();
    }

    protected function items(): Collection
    {
        $class = new ReflectionClass($this);

        $publicProperties = collect($class->getProperties(ReflectionProperty::IS_PUBLIC))
            ->reject(fn (ReflectionProperty $property) => $this->shouldIgnore($property->getName()))
            ->mapWithKeys(fn (ReflectionProperty $property) => [
                $this->resolveName($property->getName()) => $this->{$property->getName()}]
            );

        $publicMethods = collect($class->getMethods(ReflectionMethod::IS_PUBLIC))
            ->reject(fn (ReflectionMethod $method) => $this->shouldIgnore($method->getName()))
            ->mapWithKeys(fn (ReflectionMethod $method) => [
                $this->resolveName($method->getName()) => $this->createVariableFromMethod($method),
            ]);

        return $publicProperties->merge([
            ...$publicMethods,
            ...$this->data,
        ]);
    }

    protected function shouldIgnore(string $methodName): bool
    {
        if (str($methodName)->startsWith('__')) {
            return true;
        }

        return in_array($methodName, $this->ignoredMethods());
    }

    protected function ignoredMethods(): array
    {
        return array_merge([
            'toArray',
            'toResponse',
            'view',
        ], $this->ignore);
    }

    protected function createVariableFromMethod(ReflectionMethod $method): mixed
    {
        if ($method->getNumberOfParameters() === 0) {
            return $this->{$method->getName()}();
        }

        return Closure::fromCallable([$this, $method->getName()]);
    }

    protected function resolveName(string $name): string
    {
        return str($name)->snake();
    }
}
