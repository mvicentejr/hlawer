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

//Route::resource('clientes', 'clientesController');

Route::group(['prefix' => '/clientes'], function () {
    Route::get('/', [ClientesController::class, 'index'])->name('clientes.index');
    Route::get('/{id}', [ClientesController::class, 'show'])->name('clientes.show');
    Route::post('/', [ClientesController::class, 'create'])->name('clientes.create');
    Route::put('/{id}', [ClientesController::class, 'edit'])->name('clientes.edit');
    Route::delete('/{id}', [ClientesController::class, 'destroy'])->name('clientes.destroy');
});
