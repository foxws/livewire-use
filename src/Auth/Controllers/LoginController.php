<?php

namespace Foxws\LivewireUse\Auth\Controllers;

use Foxws\LivewireUse\Auth\Forms\LoginForm;
use Foxws\LivewireUse\Views\Components\Page;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.auth')]
class LoginController extends Page
{
    protected static string $view = 'auth.login';

    public LoginForm $form;

    public function mount(): void
    {
        if (static::isAuthenticated()) {
            redirect()->intended();
        }

        $this->seo()->setTitle(__('Login'));
        $this->seo()->setDescription(__('Login to Account'));
    }

    public function submit(): void
    {
        $this->form->submit();
    }
}
