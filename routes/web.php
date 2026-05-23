<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JogoController;
use App\Http\Controllers\PalpiteAdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BolaoController;
use App\Http\Controllers\PalpiteController;
use App\Http\Controllers\TimeController;


// Listar bolões
// Route::get('/boloes', [BolaoController::class, 'index'])->name('boloes.index');

// Listar jogos de um bolão
Route::get('/boloes/{id_bolao}/jogos', [JogoController::class, 'index'])->name('bolao.jogos');
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/jogos/criar', [JogoController::class, 'create'])->name('jogos.create');
    Route::post('/admin/jogos', [JogoController::class, 'store'])->name('jogos.store');
});

// Admin (gerenciar palpites, jogos, regras)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/palpites', [PalpiteAdminController::class, 'index'])->name('admin.palpites.index');
    Route::get('/admin/jogos', [PalpiteAdminController::class, 'jogos'])->name('admin.jogos.index');
    Route::get('/admin/regras', [PalpiteAdminController::class, 'regras'])->name('admin.regras.index');
});


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


// Listar bolões
Route::get('/boloes', [BolaoController::class, 'index'])->name('boloes.index');

// Listar jogos de um bolão
Route::get('/boloes/{id_bolao}/jogos', [JogoController::class, 'index'])->name('bolao.jogos');


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/boloes/{id_bolao}/jogos', [JogoController::class, 'index'])->name('bolao.jogos');
});


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/boloes/criar', [BolaoController::class, 'create'])->name('boloes.create');
    Route::post('/admin/boloes', [BolaoController::class, 'store'])->name('boloes.store');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/boloes/{id_bolao}/palpites', [PalpiteController::class, 'index'])->name('palpites.index');
    Route::get('/boloes/{bolao}/jogos/{jogo}/palpite', [PalpiteController::class, 'edit'])->name('palpites.edit');
    Route::post('/boloes/{bolao}/jogos/{jogo}/palpite', [PalpiteController::class, 'store'])->name('palpites.store');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/boloes/{id_bolao}/jogos', [JogoController::class, 'index'])->name('bolao.jogos');
    Route::get('/boloes/{id_bolao}/jogos/{id_jogo}/palpite', [PalpiteController::class, 'edit'])->name('palpites.edit');
    Route::post('/boloes/{id_bolao}/jogos/{id_jogo}/palpite', [PalpiteController::class, 'store'])->name('palpites.store');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/boloes/{id_bolao}/jogos-dashboard', [DashboardController::class, 'jogosDoBolao'])->name('dashboard.jogos');
});


Route::resource('times', TimeController::class);


Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->as('admin.')
    ->group(function () {
        Route::resource('times', TimeController::class);
    });