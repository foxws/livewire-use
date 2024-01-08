<?php

namespace Foxws\LivewireUse\Auth\Forms;

use Foxws\LivewireUse\Forms\Components\Form;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Livewire\Attributes\Validate;

class RegisterForm extends Form
{
    protected static int $maxAttempts = 5;

    #[Validate]
    public ?string $email = null;

    #[Validate]
    public ?string $password = null;

    #[Validate]
    public ?string $passwordConfirmation = null;

    public function rules(): array
    {
        return [
            'email' => 'required|email|unique:users',
            'password' => [
                'required',
                'confirmed',
                Password::defaults(),
            ],
            'password_confirmation' => [
                'required',
                Password::defaults(),
            ],
        ];
    }

    protected function handle()
    {
        if (Auth::attempt($this->all())) {
            session()->regenerate();

            return redirect()->intended();
        }

        $this->addError('email', __('These credentials do not match our records'));
    }
}
