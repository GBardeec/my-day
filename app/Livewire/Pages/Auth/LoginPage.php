<?php

namespace App\Livewire\Pages\Auth;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Component;

class LoginPage extends Component
{
    #[Validate('required', 'Укажите электронную почту')]
    public string $email;
    #[Validate('required', 'Укажите пароль')]
    public string $password;
    public null|bool $is_remember = false;

    public function render(): View
    {
        return view('livewire.pages.auth.login-page');
    }

    public function login()
    {
        $this->validate();

        $user = User::query()
            ->where('email', $this->email)
            ->first();

        if ($user && Hash::check($this->password, $user->password)) {
            if ($this->is_remember) {
                Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->is_remember);
            }

            Auth::login($user);

            return redirect()->route('main');
        }

        session()->flash('error', 'Неверная почта или пароль');
    }

}
