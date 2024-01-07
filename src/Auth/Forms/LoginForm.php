<?php

namespace Foxws\LivewireUse\Auth\Forms;

use Foxws\LivewireUse\Forms\Components\Form;
use Illuminate\Support\Facades\Auth;

class LoginForm extends Form
{
    protected function handle(): mixed
    {
        if (Auth::attempt($this->all())) {
            session()->regenerate();

            return redirect()->intended();
        }

        $this->addError('email', __('These credentials do not match our records'));
    }
}
