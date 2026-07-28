<?php

use Illuminate\Support\Facades\Route;

// Rota de redirecionamento para a tela de login
Route::get('/', function () {
    return redirect()->route('login');
});

// Configuração de rotas que dependem de autenticação
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::view('dashboard', 'dashboard')->middleware(['verified'])->name('dashboard');
});

require __DIR__.'/settings.php';
