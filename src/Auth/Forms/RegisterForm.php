<?php

namespace Foxws\LivewireUse\Auth\Forms;

use Foxws\LivewireUse\Forms\Components\Form;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Livewire\Attributes\Validate;

class RegisterForm extends Form
{
    protected static int $maxAttempts = 3;

    #[Validate]
    public ?string $email = null;

    #[Validate]
    public ?string $password = null;

    #[Validate]
    public ?string $password_confirmation = null;

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
        $data = $this->only('email', 'password');

        $data['password'] = Hash::make($data['password']);

        $user = $this->getUserModel()::create($data);

        request()->session()->regenerate();

        auth()->login($user);

        event(new Registered($user));

        redirect()->to('/');
    }

    protected function getUserModel(): User
    {
        return app(config('auth.providers.users.model'));
    }
}
