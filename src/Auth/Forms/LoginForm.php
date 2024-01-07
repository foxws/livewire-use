<?php

namespace Foxws\LivewireUse\Auth\Forms;

use Foxws\LivewireUse\Exceptions\TooManyRequestsException;
use Foxws\LivewireUse\Forms\Components\Form;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Livewire\Attributes\Validate;

class LoginForm extends Form
{
    protected static int $maxAttempts = 5;

    protected static string $throttleModel = 'email';

    #[Validate]
    public ?string $email = null;

    #[Validate]
    public ?string $password = null;

    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'password' => [
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
