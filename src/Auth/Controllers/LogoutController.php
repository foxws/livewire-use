<?php

namespace Foxws\LivewireUse\Auth\Controllers;

use Foxws\LivewireUse\Views\Components\Page;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Features\SupportRedirects\Redirector;

#[Layout('components.layouts.auth')]
class LogoutController extends Page
{
    public function mount(): void
    {
        $this->seo()->setTitle(__('Logout'));
        $this->seo()->setDescription(__('Account Logout'));

        $this->submit();
    }

    public function render(): View
    {
        return view('livewire-use::auth.logout');
    }

    public function submit(): Redirector
    {
        auth()->logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/');
    }
}
