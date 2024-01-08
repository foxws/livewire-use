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

    protected function handle()
    {
        if (Auth::attempt($this->only('email', 'password'), $this->remember)) {
            session()->regenerate();

            return redirect()->intended();
        }

        $this->addError('email', __('These credentials do not match our records'));
    }
}
