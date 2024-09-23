<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GestionProductoController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\IngresarProductoController;
use App\Http\Controllers\EliminarProductoController;
use App\Http\Controllers\EdicionProductoController;
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

// Ruta principal
Route::get('/', [HomeController::class, 'index'])->name('home');

// Rutas para productos
Route::get('tiendaonline/productos', [ProductosController::class, 'index'])->name('productos'); // Lista todos los productos
Route::get('tiendaonline/productos/gestionar', [ProductosController::class, 'gestionar'])->name('productos.gestionar'); // Vista para gestionar productos

// Rutas para añadir un producto
Route::get('tiendaonline/ingresarproducto', [IngresarProductoController::class, 'create'])->name('ingresarProducto'); // Vista para añadir un producto


Route::post('tiendaonline/ingresarproducto', [IngresarProductoController::class, 'store'])->name('ingresarProducto.store'); // Guarda un nuevo producto

// Rutas para editar un producto
Route::get('tiendaonline/productos/editar/{id}', [EdicionProductoController::class, 'edit'])->name('productos.editar');
Route::put('tiendaonline/productos/actualizar/{id}', [EdicionProductoController::class, 'actualizar'])->name('productos.actualizar');

// Rutas para eliminar un producto
Route::delete('tiendaonline/ingresarproducto/eliminar/{id}', [EliminarProductoController::class, 'eliminar'])->name('productos.eliminar'); // Elimina un producto

// Rutas para carrito
Route::get('tiendaonline/carrito', [CarritoController::class, 'index'])->name('carrito'); // Vista del carrito

// Rutas para factura
Route::get('tiendaonline/factura', [FacturaController::class, 'index'])->name('factura'); // Vista de la factura

// Rutas para gestión de productos
Route::get('tiendaonline/gestionProducto', [GestionProductoController::class, 'index'])->name('gestionProducto'); // Vista para la gestión de productos
/* Route::put('tiendaonline/gestion-producto/actualizar/{id}', [GestionProductoController::class, 'actualizar'])->name('gestionProducto.actualizar'); // Actualiza producto en gestión
Route::delete('tiendaonline/gestion-producto/eliminar/{id}', [GestionProductoController::class, 'eliminar'])->name('gestionProducto.eliminar'); // Elimina producto en gestión 
 */
Route::get('/tiendaonline/gestionproducto', [GestionProductoController::class, 'index'])->name('gestionProducto');
Route::get('/tiendaonline', [ProductosController::class, 'index'])->name('productos.index');
Route::get('/tiendaonline/productoscategoria', [ProductosController::class, 'productosPorCategoria'])->name('productos.por.categoria');

Route::put('/tiendaonline/edicionproducto/actualizar/{id}', [EdicionProductoController::class, 'actualizar'])->name('edicionproductos.actualizar');
