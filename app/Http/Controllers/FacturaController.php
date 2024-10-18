<?php

namespace App\Http\Controllers;

use App\Compra; // Asegúrate de que la ruta es correcta
use Illuminate\Http\Request;
use PDF;

class FacturaController extends Controller
{
    public function index()
    {
        // Obtener todas las compras para generar la factura
        $compras = Compra::with('cliente')->get(); // Cargar los datos del cliente

        return view('tiendaonline.factura', compact('compras'));
    }
    public function generarFactura($id)
    {
        $compra = Compra::with('cliente')->findOrFail($id);
        $pdf = PDF::loadView('tiendaonline.factura_pdf', compact('compra')); // Cargar la vista del PDF
        return $pdf->download('factura-' . $compra->id . '.pdf'); // Descarga el PDF
    }
}
