<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Compra;
use Illuminate\Http\Request;

class EntregaController extends Controller
{
    public function index()
    {
        $compras = Compra::all(); // Obtiene todas las entregas

        // Calcular métricas de ventas
        $ventasMensuales = Compra::selectRaw('MONTH(created_at) as mes, COUNT(*) as total_ventas, SUM(valor_producto) as total_ventas_mes')
            ->whereYear('created_at', Carbon::now()->year)
            ->groupBy('mes')
            ->orderBy('mes')
            ->get();

        $totalAnual = Compra::whereYear('created_at', Carbon::now()->year)->sum('valor_producto');

        // Calcular el tiempo de respuesta promedio (en días)
        $comprasConRespuesta = Compra::whereNotNull('estado_entrega')
            ->selectRaw('AVG(DATEDIFF(updated_at, created_at)) as tiempo_respuesta')
            ->first();

        return view('tiendaonline.gestionEntregas', compact('compras', 'ventasMensuales', 'totalAnual', 'comprasConRespuesta'));
    }

    public function edit($id)
    {
        $compra = Compra::findOrFail($id);
        return view('tiendaonline.editarEntrega', compact('compra'));
    }

    public function update(Request $request, $id)
    {
        $compra = Compra::findOrFail($id);
        $compra->estado_entrega = 'entregado'; // Cambiar el estado a 'entregado'
        $compra->save();

        return redirect()->route('entregas.index')->with('success', 'Entrega actualizada correctamente');
    }
}

