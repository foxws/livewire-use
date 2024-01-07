<?php

namespace Foxws\LivewireUse\Controllers;

use Foxws\LivewireUse\Auth\Forms\LoginForm;
use Foxws\LivewireUse\Views\Components\Page;

class LoginController extends Page
{
    protected static string $view = 'auth.login';

    public LoginForm $form;

    public function mount(): void
    {
        $this->seo()->setTitle(__('Login'));

        if (static::isAuthenticated()) {
            redirect()->intended();
        }
    }
}
