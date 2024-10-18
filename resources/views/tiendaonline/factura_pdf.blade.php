<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Factura {{ $compra->id }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .invoice {
            width: 100%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
        }
        .header, .footer {
            text-align: center;
        }
        .header {
            margin-bottom: 20px;
        }
        .footer {
            margin-top: 20px;
        }
        .details {
            margin-bottom: 20px;
        }
        .details th, .details td {
            padding: 10px;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>

<div class="invoice">
    <div class="header">
        <h1>Factura</h1>
        <p>ID: {{ $compra->id }}</p>
    </div>

    <div class="details">
        <h3>Datos del Cliente</h3>
        <table>
            <tr>
                <th>Nombre:</th>
                <td>{{ $compra->cliente->nombre }}</td>
            </tr>
            <tr>
                <th>Email:</th>
                <td>{{ $compra->cliente->email }}</td>
            </tr>
            <tr>
                <th>Teléfono:</th>
                <td>{{ $compra->cliente->telefono }}</td>
            </tr>
            <tr>
                <th>Documento:</th>
                <td>{{ $compra->cliente->documento }}</td>
            </tr>
        </table>
    </div>

    <h3>Detalles de la Compra</h3>
    <table class="details">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Valor Unitario</th>
                <th>Valor Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $compra->nombre_producto }}</td>
                <td>{{ $compra->cantidad_productos }}</td>
                <td>{{ $compra->valor_producto }}</td>
                <td>{{ $compra->valor_producto * $compra->cantidad_productos }}</td>
            </tr>
        </tbody>
    </table>

    <div class="footer">
        <p>Gracias por su compra</p>
    </div>
</div>

</body>
</html>
