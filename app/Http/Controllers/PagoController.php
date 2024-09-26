<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagoController extends Controller
{
    // Método para manejar el pago
    public function realizarPago(Request $request)
    {
        // Simulación del proceso de pago
        $pagoExitoso = true; // Cambia esto a false para simular un fallo

        if ($pagoExitoso) {
            // Limpia el carrito aquí
            $this->vaciarCarrito();

            // Redirigir a la vista de confirmación
            return redirect()->route('pago.confirmacion')->with('success', '¡Pago realizado exitosamente!');
        } else {
            // Manejo de errores de pago
            return redirect()->back()->withErrors(['error' => 'Error en el proceso de pago.']);
        }
    }

    // Método para vaciar el carrito
    private function vaciarCarrito()
    {
        // Suponiendo que estás almacenando el carrito en la sesión
        session()->forget('carrito');
    }
}
