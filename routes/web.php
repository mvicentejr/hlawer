<?php

use App\Http\Controllers\AdvogadosController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ProcessosController;
use App\Http\Controllers\UsuariosController;
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

Route::group(['prefix' => '/advogados'], function () {
    Route::get('/', [AdvogadosController::class, 'index'])->name('advogados.index');
    Route::get('/create', [AdvogadosController::class, 'create'])->name('advogados.create');
    Route::get('/{id}', [AdvogadosController::class, 'show'])->name('advogados.show');
    Route::post('/', [AdvogadosController::class, 'store'])->name('advogados.store');
    Route::get('/{id}/edit', [AdvogadosController::class, 'edit'])->name('advogados.edit');
    Route::put('/{id}', [AdvogadosController::class, 'update'])->name('advogados.update');
    Route::delete('/{id}', [AdvogadosController::class, 'destroy'])->name('advogados.destroy');
});

Route::group(['prefix' => '/usuarios'], function () {
    Route::get('/', [UsuariosController::class, 'index'])->name('usuarios.index');
    Route::get('/create', [UsuariosController::class, 'create'])->name('usuarios.create');
    Route::get('/{id}', [UsuariosController::class, 'show'])->name('usuarios.show');
    Route::post('/', [UsuariosController::class, 'store'])->name('usuarios.store');
    Route::get('/{id}/edit', [UsuariosController::class, 'edit'])->name('usuarios.edit');
    Route::put('/{id}', [UsuariosController::class, 'update'])->name('usuarios.update');
    Route::delete('/{id}', [UsuariosController::class, 'destroy'])->name('usuarios.destroy');
});

Route::group(['prefix' => '/processos'], function () {
    Route::get('/', [ProcessosController::class, 'index'])->name('processos.index');
    Route::get('/create', [ProcessosController::class, 'create'])->name('processos.create');
    Route::get('/{id}', [ProcessosController::class, 'show'])->name('processos.show');
    Route::post('/', [ProcessosController::class, 'store'])->name('processos.store');
    Route::get('/{id}/edit', [ProcessosController::class, 'edit'])->name('processos.edit');
    Route::put('/{id}', [ProcessosController::class, 'update'])->name('processos.update');
    Route::get('/{id}/getstatus', [ProcessosController::class, 'getstatus'])->name('processos.getstatus');
    Route::get('/{id}/mudar', [ProcessosController::class, 'mudar'])->name('processos.mudar');
});
