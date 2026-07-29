<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Security;
use App\Livewire\Settings\Profile;
use App\Http\Controllers\Settings\ProfileController;

// Rota de redirecionamento para a tela de login
Route::get('/', function () {
    return redirect()->route('login');
});

// Configuração de rotas que dependem de autenticação
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::view('dashboard', 'dashboard')->middleware(['verified'])->name('dashboard');

    // Configurações
    Route::redirect('settings', 'settings/profile');
    Route::get('settings/profile', Profile::class)->name('profile.edit');
    Route::post('/profile/avatar', [ProfileController::class, 'avatar'])->name('update.avatar');
    Route::get('settings/appearance', Appearance::class)->name('appearance.edit');
    Route::get('settings/password', Security::class)->name('security.edit');
});