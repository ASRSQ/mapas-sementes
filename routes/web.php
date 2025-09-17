<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CasaDeSementeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Rota principal que mostra o mapa
Route::get('/', [CasaDeSementeController::class, 'index'])->name('mapa.index');

// Rota para mostrar o formulário de cadastro
Route::get('/cadastrar', [CasaDeSementeController::class, 'create'])->name('mapa.create');

// Rota para receber os dados do formulário de cadastro
Route::post('/cadastrar', [CasaDeSementeController::class, 'store'])->name('mapa.store');