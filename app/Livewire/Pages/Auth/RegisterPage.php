<?php

namespace App\Livewire\Pages\Auth;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
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

    public function render(): View
    {
        return view('livewire.pages.auth.register-page');
    }

    /**
     * @return RedirectResponse|void
     */
    public function register()
    {
        $this->validate();

        if($this->password !== $this->confirmPassword) {
            session()->flash('error', 'Пароли не совпадают');
            return;
        }

        $checkUser = User::query()->where('email', $this->email)->exists();

        if($checkUser) {
            session()->flash('error', 'Пользователь с такой почтой уже существует');
            return;
        }

        $user = User::create([
            'email' => $this->email,
            'password' => $this->password,
            'is_active' => true,
        ]);

        if ($user) {
            Auth::login($user);
           return redirect()->route('main');
        }

        session()->flash('error', 'Произошла непредвиденная ошибка');
        return;
    }
}
