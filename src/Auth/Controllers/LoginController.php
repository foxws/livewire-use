<?php

namespace Foxws\LivewireUse\Auth\Controllers;

use Closure;
use Foxws\LivewireUse\Auth\Forms\LoginForm;
use Foxws\LivewireUse\Views\Components\Page;
use Illuminate\View\View;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.auth')]
class LoginController extends Page
{
    public LoginForm $form;

    public function mount(): void
    {
        $this->seo()->setTitle(__('Login'));
        $this->seo()->setDescription(__('Login to Account'));

        if (static::isAuthenticated()) {
            redirect()->intended();
        }
    }

    public function render(): View|Closure|string
    {
        return view('livewire-use::auth.login');
    }

    public function submit(): void
    {
        $this->form->submit();
    }
}
