<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ArticulosController;
use App\Http\Controllers\MovimientosController;
use App\Http\Controllers\ExistenciasController;
use App\Http\Controllers\Auth\LoginController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('user.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('user.destroy');
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// Rutas para los proveedores
Route::get('/proveedores', [ProveedorController::class, 'index'])->name('proveedores.index');
Route::get('/proveedores/{id}/edit', [ProveedorController::class, 'edit'])->name('proveedores.edit');
Route::put('/proveedores/{id}', [ProveedorController::class, 'update'])->name('proveedores.update');
Route::get('/proveedores/{id}/edit', [ProveedorController::class, 'edit'])->name('editproveedores');
Route::put('/proveedores/{id}', [ProveedorController::class, 'update'])->name('proveedores.update');
Route::get('/createproovedores', [ProveedorController::class, 'create'])->name('createproovedores');
Route::post('/proveedores', [ProveedorController::class, 'store'])->name('proveedores.store');
Route::delete('/proveedores/{id}', [ProveedorController::class, 'destroy'])->name('proveedores.destroy');

// Rutas para los articulos
Route::get('/articulos', [ArticulosController::class, 'index'])->name('articulos.index');
Route::get('/articulos/{id}/edit', [ArticulosController::class, 'edit'])->name('articulos.edit');
Route::put('/articulos/{id}', [ArticulosController::class, 'update'])->name('articulos.update');
Route::get('/articulos/{id}/edit', [ArticulosController::class, 'edit'])->name('editarticulos');
Route::put('/articulos/{id}', [ArticulosController::class, 'update'])->name('articulos.update');
Route::get('/createarticulos', [ArticulosController::class, 'create'])->name('createarticulos');
Route::post('/articulos', [ArticulosController::class, 'store'])->name('articulos.store');
Route::delete('/articulos/{id}', [ArticulosController::class, 'destroy'])->name('articulos.destroy');
Route::put('/articulos/{id}', [ArticulosController::class, 'update'])->name('articulos.update');
Route::get('/articulos/{id}', [ArticulosController::class, 'show']); // Para ver un artículo específico
Route::put('/articulos/{id}', [ArticulosController::class, 'update']); // Para actualizar un artículo
Route::delete('/articulos/{id}', [ArticulosController::class, 'destroy']); // Para eliminar un artículo
Route::delete('/articulos/{id}', [ArticulosController::class, 'destroy'])->name('articulos.destroy');
Route::put('/articulos/{id}', [ArticulosController::class, 'update'])->name('articulos.update');

Route::get('/movimientos', [MovimientosController::class, 'index'])->name('movimientos.index');
Route::post('/movimientos', [MovimientosController::class, 'store'])->name('movimientos.store');

Route::get('/existencias', [ExistenciasController::class, 'index'])->name('existencias.index');
Route::post('/existencias', [ExistenciasController::class, 'store'])->name('existencias.store');
Route::get('/existencias', [ExistenciasController::class, 'index']);
Route::get('/existencias', 'ExistenciasController@index')->name('existencias.index');
Route::get('/existencias', 'App\Http\Controllers\ExistenciasController@index')->name('existencias.index');

//Login
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);



