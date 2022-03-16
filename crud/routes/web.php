<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\AlmacenesController;
use App\Http\Controllers\ProductosController;

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('categorias',CategoriasController::class)->middleware('auth');
Route::resource('almacenes',AlmacenesController::class)->middleware('auth');
Route::get('almacenes/{almacene}/addProductos', [AlmacenesController::class, 'addProductos'])->name('almacenes.addProductos')->middleware('auth');
Route::post('almacenes/{almacene}/storeProductos', [AlmacenesController::class, 'storeProductos'])->name('almacenes.storeProductos')->middleware('auth');
Route::delete('almacenes/{almacene}/{producto}', [AlmacenesController::class, 'destroyProductos'])->name('almacenes.destroyProductos')->middleware('auth');
Route::resource('productos',ProductosController::class)->middleware('auth');
