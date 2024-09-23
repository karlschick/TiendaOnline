<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarritoController extends Controller
{
    public function index()
    {
        return view('tiendaonline.carrito'); // Asegúrate de tener la vista carrito.blade.php en resources/views
    }
}
