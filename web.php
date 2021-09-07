<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\EmpresaController;
use App\Http\Controllers\Admin\DepartamentoController;
use App\Http\Controllers\Admin\FotoController;

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






Route::prefix('admin')->name('admin.')->group(function(){



    Route::resource('empresas', EmpresaController::class)->except(['show']);
    Route::resource('departamentos', DepartamentoController::class);
    Route::resource('departamentos.fotos', FotoController::class)->except(['show', 'edit', 'update']);
});


Route::resource('/', App\Http\Controllers\Site\EmpresaController::class)->only('index');
Route::resource('empresas.departamentos', App\Http\Controllers\Site\DepartamentoController::class)->only(['index', 'show']);
