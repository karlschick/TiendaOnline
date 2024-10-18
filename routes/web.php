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
use App\Http\Controllers\EntregaController;
use App\Http\Controllers\PaymentController;

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
Route::get('/tiendaonline/productos', [ProductosController::class, 'index'])->name('productos'); // Lista todos los productos

// Rutas para editar un producto
Route::get('/tiendaonline/productos/editar/{id}', [EdicionProductoController::class, 'edit'])->name('productos.editar'); // Vista para editar un producto
Route::put('/tiendaonline/edicionproducto/actualizar/{id}', [EdicionProductoController::class, 'actualizar'])->name('edicionproductos.actualizar'); // Actualiza un producto

// Rutas para añadir un producto
Route::get('/tiendaonline/ingresarproducto', [IngresarProductoController::class, 'create'])->name('ingresarProducto'); // Vista para añadir un producto
Route::post('tiendaonline/ingresarproducto', [IngresarProductoController::class, 'store'])->name('ingresarProducto.store'); // Guarda un nuevo producto

// Rutas para eliminar un producto
Route::delete('/tiendaonline/ingresarproducto/eliminar/{id}', [EliminarProductoController::class, 'eliminar'])->name('productos.eliminar'); // Elimina un producto

// Rutas para carrito
Route::get('/tiendaonline/carrito/detalles', [CarritoController::class, 'verCarrito'])->name('carrito.ver'); // Ver el carrito (detalles)
Route::get('/tiendaonline/carrito', [CarritoController::class, 'index'])->name('carrito'); // Vista principal del carrito
Route::post('/tiendaonline/carrito/agregar/{id}', [CarritoController::class, 'agregarAlCarrito'])->name('carrito.agregar'); // Agregar un producto al carrito
Route::delete('/tiendaonline/carrito/eliminar/{id}', [CarritoController::class, 'eliminarDelCarrito'])->name('carrito.eliminar'); // Eliminar un producto del carrito

// Confirmación de pago
Route::get('/tiendaonline/pago/confirmacion', [CompraController::class, 'confirmarPago'])->name('confirmacion_pago'); // Vista de confirmación de pago
Route::post('/tiendaonline/pago', [PagoController::class, 'realizarPago'])->name('pago.realizar'); // Ruta para procesar el pago

// Rutas para factura
Route::get('/tiendaonline/factura', [FacturaController::class, 'index'])->name('factura'); // Vista de la factura
Route::get('/tiendaonline/factura/generar/{id}', [FacturaController::class, 'generarFactura'])->name('factura.generar'); // Generar una factura específica

// Rutas para gestión de productos
Route::get('/tiendaonline/gestionproducto', [GestionProductoController::class, 'index'])->name('gestionProducto'); // Gestión de productos

// Rutas para listar productos por categoría
Route::get('/tiendaonline/productoscategoria', [ProductosController::class, 'productosPorCategoria'])->name('productos.por.categoria'); // Lista productos por categoría

// Ruta para mostrar el formulario de compra
Route::get('/tiendaonline/formulario_compra', [CompraController::class, 'formulario'])->name('formulario_compra'); // Muestra el formulario de compra

// Ruta para procesar la compra al enviar el formulario
Route::post('/tiendaonline/comprar', [CompraController::class, 'comprar'])->name('comprar'); // Procesa la compra

// Rutas para el Slider
Route::get('/tiendaonline/sliderGestionar', [SliderController::class, 'index'])->name('sliderGestionar'); // Gestionar sliders
Route::get('/tiendaonline/slideragregar', [SliderController::class, 'create'])->name('slideragregar'); // Vista para agregar un slider
Route::post('/tiendaonline/sliderguardar', [SliderController::class, 'store'])->name('sliderguardar'); // Guardar un nuevo slider
Route::get('/tiendaonline/slidereditar/{id}', [SliderController::class, 'edit'])->name('slidereditar'); // Editar un slider existente
Route::put('/tiendaonline/slideractualizar/{id}', [SliderController::class, 'update'])->name('slideractualizar'); // Actualizar un slider
Route::delete('/tiendaonline/sliderborrar/{id}', [SliderController::class, 'destroy'])->name('sliderborrar'); // Eliminar un slider

// Ruta para la pasarela de pago
Route::get('/tiendaonline/pasarela_pago', [CompraController::class, 'pasarelaPago'])->name('pasarela_pago'); // Vista de la pasarela de pago

// Rutas para el módulo de entregas
Route::get('/tiendaonline/entregas', [EntregaController::class, 'index'])->name('entregas.index'); // Vista principal de entregas
Route::get('/tiendaonline/entregas/{id}/editar', [EntregaController::class, 'edit'])->name('entregas.editar'); // Editar una entrega específica
Route::put('/tiendaonline/entregas/{id}', [EntregaController::class, 'update'])->name('entregas.actualizar'); // Actualizar una entrega


// Mostrar el formulario de pago
Route::get('/tiendaonline/pago', [PaymentController::class, 'showPaymentForm'])->name('payment.form');

// Procesar el pago y redirigir a Wompi

Route::post('/tiendaonline/pago/procesar', [PaymentController::class, 'processPayment'])->name('payment.process');

// Confirmación del pago desde Wompi
Route::get('/tiendaonline/pago/confirmacion', [PaymentController::class, 'confirmPayment'])->name('payment.confirm');