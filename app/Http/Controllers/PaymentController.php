<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    // Mostrar el formulario de pago
    public function showPaymentForm()
    {
        // Retorna la vista del formulario de pago
        return view('tiendaonline.pasarela_pago'); // Asegúrate de que la vista exista
    }

    // Procesar el pago y redirigir a Wompi
    public function processPayment(Request $request)
    {
        // Validar los datos del cliente
        if (!session('cliente_email')) {
            return redirect()->route('payment.form')->with('error', 'Debes completar tus datos antes de proceder al pago.');
        }

        $total = session('total') * 100; // Wompi espera el monto en centavos
        $publicKey = config('services.wompi.public_key');
        $redirectUrl = config('services.wompi.redirect_url');

        // Crear la transacción en Wompi
        $response = Http::withHeaders([
            'Authorization' => "Bearer $publicKey"
        ])->post('https://sandbox.wompi.co/v1/transactions', [
            'amount_in_cents' => $total,
            'currency' => 'COP',
            'customer_email' => session('cliente_email'),
            'reference' => 'Pedido_' . time(), // Identificador único
            'redirect_url' => $redirectUrl,
            'payment_method' => [
                'type' => 'CARD',
            ]
        ]);

        $transaction = $response->json();

        if (isset($transaction['data']['payment_link'])) {
            // Redirigir al usuario al enlace de pago
            return redirect($transaction['data']['payment_link']);
        } else {
            // Si ocurre un error
            return back()->with('error', 'Hubo un problema al procesar el pago.');
        }
    }

    // Confirmar el estado del pago
    public function confirmPayment(Request $request)
    {
        // Recuperar el ID de la transacción desde la URL de redirección
        $transactionId = $request->query('id');

        // Consultar el estado de la transacción en Wompi
        $response = Http::withHeaders([
            'Authorization' => "Bearer " . config('services.wompi.public_key')
        ])->get("https://sandbox.wompi.co/v1/transactions/{$transactionId}");

        $transaction = $response->json();

        // Verificamos si el estado de la transacción es "APPROVED"
        if (isset($transaction['data']) && $transaction['data']['status'] === 'APPROVED') {
            // El pago fue aprobado
            return redirect()->route('home')->with('success', 'Pago completado con éxito.');
        } else {
            // Si el pago no fue aprobado
            return redirect()->route('payment.form')->with('error', 'El pago no fue completado. Inténtalo nuevamente.');
        }
    }
}
