<?php

namespace Foxws\LivewireUse\Auth\Controllers;

use Foxws\LivewireUse\Auth\Forms\RegisterForm;
use Foxws\LivewireUse\Views\Components\Page;
use Illuminate\View\View;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.auth')]
class RegisterController extends Page
{
    public RegisterForm $form;

    public function mount(): void
    {
        $this->seo()->setTitle(__('Register'));
        $this->seo()->setDescription(__('Sign up'));

        if (static::isAuthenticated()) {
            redirect()->intended();
        }
    }

    public function render(): View
    {
        return view('livewire-use::auth.register');
    }

    public function submit(): void
    {
        $this->form->submit();
    }
}
