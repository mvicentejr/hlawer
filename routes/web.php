<?php

use App\Http\Controllers\AdvogadosController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\EventosController;
use App\Http\Controllers\MovimentosController;
use App\Http\Controllers\PolosController;
use App\Http\Controllers\ProcessosController;
use App\Http\Controllers\RelAdvogadosController;
use App\Http\Controllers\RelClientesController;
use App\Http\Controllers\RelEventosController;
use App\Http\Controllers\RelMovimentosController;
use App\Http\Controllers\RelTarefasController;
use App\Http\Controllers\TarefasController;
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

Route::get('/sobre', function () {
    return view('sobre');
});

Route::get('/login', function () {
    return view('login');
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
    Route::put('/{id}', [ProcessosController::class, 'mudastat'])->name('processos.mudastat');
});

Route::group(['prefix' => '/polos'], function () {
    Route::get('/{id}/create', [PolosController::class, 'create'])->name('polos.create');
    Route::get('/{id}', [PolosController::class, 'show'])->name('polos.show');
    Route::post('/', [PolosController::class, 'store'])->name('polos.store');
    Route::get('/{id}/edit', [PolosController::class, 'edit'])->name('polos.edit');
    Route::put('/{id}', [PolosController::class, 'update'])->name('polos.update');
    Route::delete('/{id}', [PolosController::class, 'destroy'])->name('polos.destroy');
    Route::get('/{id}/apagar', [PolosController::class, 'apagar'])->name('polos.apagar');
});

Route::group(['prefix' => '/movimentos'], function () {
    Route::get('/{id}/create', [MovimentosController::class, 'create'])->name('movimentos.create');
    Route::get('/{id}', [MovimentosController::class, 'show'])->name('movimentos.show');
    Route::post('/', [MovimentosController::class, 'store'])->name('movimentos.store');
    Route::get('/{id}/edit', [MovimentosController::class, 'edit'])->name('movimentos.edit');
    Route::put('/{id}', [MovimentosController::class, 'update'])->name('movimentos.update');
    Route::delete('/{id}', [MovimentosController::class, 'destroy'])->name('movimentos.destroy');
    Route::get('/{id}/apagar', [MovimentosController::class, 'apagar'])->name('movimentos.apagar');
});

Route::group(['prefix' => '/tarefas'], function () {
    Route::get('/', [TarefasController::class, 'index'])->name('tarefas.index');
    Route::get('/create', [TarefasController::class, 'create'])->name('tarefas.create');
    Route::get('/{id}', [TarefasController::class, 'show'])->name('tarefas.show');
    Route::post('/', [TarefasController::class, 'store'])->name('tarefas.store');
    Route::get('/{id}/edit', [TarefasController::class, 'edit'])->name('tarefas.edit');
    Route::put('/{id}', [TarefasController::class, 'update'])->name('tarefas.update');
    Route::delete('/{id}', [TarefasController::class, 'destroy'])->name('tarefas.destroy');
    Route::get('/{id}/apagar', [TarefasController::class, 'apagar'])->name('tarefas.apagar');
    Route::put('/{id}/mudastatus', [TarefasController::class, 'mudastatus'])->name('tarefas.mudastatus');
    Route::get('/{id}/finalizar', [TarefasController::class, 'finalizar'])->name('tarefas.finalizar');
});

Route::group(['prefix' => '/eventos'], function () {
    Route::get('/', [EventosController::class, 'index'])->name('eventos.index');
    Route::get('/create', [EventosController::class, 'create'])->name('eventos.create');
    Route::get('/{id}', [EventosController::class, 'show'])->name('eventos.show');
    Route::post('/', [EventosController::class, 'store'])->name('eventos.store');
    Route::get('/{id}/edit', [EventosController::class, 'edit'])->name('eventos.edit');
    Route::put('/{id}', [EventosController::class, 'update'])->name('eventos.update');
    Route::delete('/{id}', [EventosController::class, 'destroy'])->name('eventos.destroy');
    Route::get('/{id}/apagar', [EventosController::class, 'apagar'])->name('eventos.apagar');
    Route::put('/{id}/mudastatus', [EventosController::class, 'mudastatus'])->name('eventos.mudastatus');
    Route::get('/{id}/finalizar', [EventosController::class, 'finalizar'])->name('eventos.finalizar');
    Route::post('/getadvogado', [EventosController::class, 'getadvogado'])->name('eventos.getadvogado');
});

Route::group(['prefix' => '/relclientes'], function () {
    Route::get('/', [RelClientesController::class, 'index'])->name('relclientes.index');
    Route::get('/geral',[RelClientesController::class, 'geral'])->name('relclientes.geral');
    Route::post('/tipo',[RelClientesController::class, 'tipo'])->name('relclientes.tipo');
});

Route::group(['prefix' => '/reladvogados'], function () {
    Route::get('/', [RelAdvogadosController::class, 'index'])->name('reladvogados.index');
    Route::get('/geral',[RelAdvogadosController::class, 'geral'])->name('reladvogados.geral');
    Route::post('/area',[RelAdvogadosController::class, 'area'])->name('reladvogados.area');
});

Route::group(['prefix' => '/reltarefas'], function () {
    Route::get('/', [RelTarefasController::class, 'index'])->name('reltarefas.index');
    Route::post('/status',[RelTarefasController::class, 'status'])->name('reltarefas.status');
    Route::post('/advogado',[RelTarefasController::class, 'advogado'])->name('reltarefas.advogado');
});

Route::group(['prefix' => '/relmovimentos'], function () {
    Route::get('/', [RelMovimentosController::class, 'index'])->name('relmovimentos.index');
    Route::post('/tipo',[RelMovimentosController::class, 'tipo'])->name('relmovimentos.tipo');
    Route::post('/processo',[RelMovimentosController::class, 'processo'])->name('relmovimentos.processo');
});

Route::group(['prefix' => '/releventos'], function () {
    Route::get('/', [RelEventosController::class, 'index'])->name('releventos.index');
    Route::post('/periodo',[RelEventosController::class, 'periodo'])->name('releventos.periodo');
    Route::post('/advogado',[RelEventosController::class, 'advogado'])->name('releventos.advogado');
});
