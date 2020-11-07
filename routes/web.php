<?php

use App\Http\Controllers\ClientesController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/inicio', function () {
    return view('inicio');
});

Route::group(['prefix' => '/clientes'], function () {
    Route::get('/', [ClientesController::class, 'index'])->name('clientes.index');
    Route::get('/create', [ClientesController::class, 'create'])->name('clientes.create');
    Route::get('/{id}', [ClientesController::class, 'show'])->name('clientes.show');
    Route::post('/', [ClientesController::class, 'store'])->name('clientes.store');
    Route::get('/{id}/edit', [ClientesController::class, 'edit'])->name('clientes.edit');
    Route::put('/{id}', [ClientesController::class, 'update'])->name('clientes.update');
    Route::delete('/{id}', [ClientesController::class, 'destroy'])->name('clientes.destroy');
});

//Route::get('/cadastrar-cliente', [ClientesController::class, 'create'])->name('clientes.create');
