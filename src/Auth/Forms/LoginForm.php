<?php

namespace Foxws\LivewireUse\Auth\Forms;

use Foxws\LivewireUse\Forms\Components\Form;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Livewire\Attributes\Validate;

class LoginForm extends Form
{
    protected static int $maxAttempts = 5;

    #[Validate]
    public ?string $email = null;

    #[Validate]
    public ?string $password = null;

    #[Validate]
    public ?bool $remember = null;

    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'remember' => 'nullable|boolean',
            'password' => [
                'required',
                Password::defaults(),
            ],
        ];
    }

    protected function handle(): void
    {
        if (! Auth::attempt($this->only('email', 'password'), $this->remember)) {
            $this->addError('email', __('These credentials do not match our records'));

            return;
        }

        session()->regenerate();
    }

    protected function afterHandle(): mixed
    {
        return redirect()->intended();
    }
}
