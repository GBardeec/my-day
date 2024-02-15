<?php

use App\Livewire\Pages\Auth\LoginPage;
use App\Livewire\Pages\Auth\RegisterPage;
use App\Livewire\Pages\Main\MainPages;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', MainPages::class)->name('main');

Route::get('/login', LoginPage::class)->name('login');
Route::get('/register', RegisterPage::class)->name('register');
