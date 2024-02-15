<?php

namespace App\Livewire\Pages\Auth;

use Livewire\Attributes\Validate;
use Livewire\Component;

class RegisterPage extends Component
{
    #[Validate('required', message: 'Укажите эл. почту')]
    public string $email = '';
    #[Validate('required', message: 'Укажите пароль')]
    public string $password = '';
    #[Validate('required', message: 'Укажите пароль повторно')]
    public string $confirmPassword = '';

    public function render()
    {
        return view('livewire.pages.auth.register-page');
    }

    public function register()
    {
        $this->validate();


    }
}
