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
use App\Http\Controllers\PagoController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\SliderController;
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
// Ver el carrito (detalles)
Route::get('/tiendaonline/carrito/detalles', [CarritoController::class, 'verCarrito'])->name('carrito.ver');

// Vista principal del carrito
Route::get('/tiendaonline/carrito', [CarritoController::class, 'index'])->name('carrito');

// Agregar un producto al carrito
Route::post('/tiendaonline/carrito/agregar/{id}', [CarritoController::class, 'agregarAlCarrito'])->name('carrito.agregar');

// Eliminar un producto del carrito
Route::delete('/tiendaonline/carrito/eliminar/{id}', [CarritoController::class, 'eliminarDelCarrito'])->name('carrito.eliminar');

// Mostrar el resumen de la compra
Route::get('/tiendaonline/carrito/resumen', [CarritoController::class, 'resumenCompra'])->name('carrito.resumen');

// Confirmación de pago
Route::get('/tiendaonline/pago/confirmacion', function() {
    return view('tiendaonline.confirmacion'); // Cambié esto para que apunte a tu vista
})->name('pago.confirmacion');

// Ruta para procesar el pago
Route::post('/tiendaonline/pago', [PagoController::class, 'realizarPago'])->name('pago.realizar');


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

// Ruta para mostrar el formulario de compra
Route::get('/tiendaonline/formulario_compra', [CompraController::class, 'formulario'])->name('formulario_compra');

// Ruta para procesar la compra al enviar el formulario
Route::post('/tiendaonline/comprar', [CompraController::class, 'comprar'])->name('comprar');

// Ruta para mostrar el resumen de la compra
Route::get('/tiendaonline/resumen-compra', [CarritoController::class, 'resumenCompra'])->name('resumen_compra');


// Rutas para el Slider
Route::get('/tiendaonline/sliderGestionar', [SliderController::class, 'index'])->name('sliderGestionar');
Route::get('/tiendaonline/slideragregar', [SliderController::class, 'create'])->name('slideragregar');
Route::post('/tiendaonline/sliderguardar', [SliderController::class, 'store'])->name('sliderguardar');
Route::get('/tiendaonline/slidereditar/{id}', [SliderController::class, 'edit'])->name('slidereditar');
Route::put('/tiendaonline/slideractualizar/{id}', [SliderController::class, 'update'])->name('slideractualizar');
Route::delete('/tiendaonline/sliderborrar/{id}', [SliderController::class, 'destroy'])->name('sliderborrar');
Route::get('/tiendaonline/productos', [ProductosController::class, 'mostrarProductos'])->name('productos');
