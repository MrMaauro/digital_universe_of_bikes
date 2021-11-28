<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\DetFacturasController;
use App\Http\Controllers\FacturasController;
use App\Http\Controllers\MarcasController;
use App\Http\Controllers\PersonasController;
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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

//Rutas inicio pag principal

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

//Rutas categorias
Route::middleware(['auth:sanctum', 'verified'])->get('categorias/index', [CategoriasController::class, 'index'])->name('categorias');

//Rutas Categoria
Route::middleware(['auth:sanctum', 'verified'])->get('/categoria',[CategoriasController::class, 'index'])->name('categoria');
Route::middleware(['auth:sanctum', 'verified'])->get('/api/categoria/index2',[CategoriasController::class, 'index2']);
Route::middleware(['auth:sanctum', 'verified'])->post('/api/categoria/registrar',[CategoriasController::class, 'store']);
Route::middleware(['auth:sanctum', 'verified'])->put('/api/categoria/actualizar',[CategoriasController::class, 'update']);
Route::middleware(['auth:sanctum', 'verified'])->post('/api/categoria/eliminar',[CategoriasController::class, 'destroy']);
Route::middleware(['auth:sanctum', 'verified'])->get('/api/categoria/getdata',[CategoriasController::class, 'getdata']);

//Rutas Productos
Route::middleware(['auth:sanctum', 'verified'])->get('productos/index', [ProductosController::class, 'index'])->name('productos');
//Rutas Productos
Route::middleware(['auth:sanctum', 'verified'])->get('/producto',[ProductosController::class, 'index'])->name('productos');
Route::middleware(['auth:sanctum', 'verified'])->get('/api/producto/index2',[ProductosController::class, 'index2']);
Route::middleware(['auth:sanctum', 'verified'])->post('/api/producto/registrar',[ProductosController::class, 'store']);
Route::middleware(['auth:sanctum', 'verified'])->put('/api/producto/actualizar',[ProductosController::class, 'update']);
Route::middleware(['auth:sanctum', 'verified'])->post('/api/producto/eliminar',[ProductosController::class, 'destroy']);
Route::middleware(['auth:sanctum', 'verified'])->get('/api/producto/getdata',[ProductosController::class, 'getdata']);
