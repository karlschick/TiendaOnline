<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FacturaController extends Controller
{
    public function index()
    {
        return view('tiendaonline.factura'); // Asegúrate de tener la vista factura.blade.php en resources/views
    }
}
