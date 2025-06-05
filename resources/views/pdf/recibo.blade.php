<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Recibo de Pedido #{{ $pedido->id }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:rgb(255, 255, 255);
            padding: 30px;
            color: #333;
        }

        .recibo-container {
            background-color: #ec5ca8;
            border: 10px solidrgb(255, 255, 255);
            border-radius: 10px;
            padding: 30px;
            max-width: 700px;
            margin: 0 auto;
        }

        .logo {
            width: 150px;
            margin-bottom: 20px;
        }

        h1 {
            text-align: center;
            color: rgb(255, 255, 255);
        }

        .info {
            margin-bottom: 20px;
        }

        .info p {
            margin: 4px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            border: 1px solid rgb(0, 0, 0);
            padding: 8px;
            text-align: left;
        }

        td {
    border: 1px solid rgb(0, 0, 0);
    padding: 8px;
    text-align: left;
    color: white; /* <-- agregamos esto */
}


        th {
            background-color: rgb(0, 0, 0);
            color: white;
        }

        .total {
            text-align: right;
            font-size: 18px;
            margin-top: 20px;
        }

        footer {
            margin-top: 30px;
            text-align: center;
            font-size: 12px;
            color: #000000;
        }
    </style>
</head>
<body>
    <div class="recibo-container">
        <!-- LOGO -->
        <div style="text-align: center;">
            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/logo.png'))) }}" alt="Logo" class="logo">
        </div>

        <h1>Recibo de Pedido #{{ $pedido->id }}</h1>

        <!-- INFO -->
        <div class="info">
            <p><strong>Fecha del pedido:</strong> {{ $pedido->fecha_pedido }}</p>
            <p><strong>Cliente:</strong> {{ $pedido->cliente->nombre ?? 'Cliente no registrado' }}</p>
        </div>

        <!-- DETALLES DEL PEDIDO -->
        <h2>Detalles del pedido</h2>
        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pedido->detalles as $detalle)
                    <tr>
                        <td>{{ $detalle->producto->nombre }}</td>
                        <td>{{ $detalle->cantidad }}</td>
                        <td>${{ number_format($detalle->precio_unitario, 2) }}</td>
                        <td>${{ number_format($detalle->cantidad * $detalle->precio_unitario, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <p class="total"><strong>Total:</strong> ${{ number_format($pedido->total, 2) }}</p>

        <footer>
            Gracias por tu compra. ¡Te esperamos pronto!
        </footer>
    </div>
</body>
</html>
