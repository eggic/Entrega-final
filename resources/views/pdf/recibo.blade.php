<!-- resources/views/pdf/recibo.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Recibo de Pedido #{{ $pedido->id }}</title>
</head>
<body>
    <h1>Recibo de tu pedido #{{ $pedido->id }}</h1>
    <p>Fecha: {{ $pedido->fecha_pedido }}</p>
    <p>Total: ${{ number_format($pedido->total, 2) }}</p>

    <h2>Detalles</h2>
    <ul>
        @foreach ($pedido->detalles as $detalle)
            <li>{{ $detalle->producto->nombre }} - Cantidad: {{ $detalle->cantidad }} - Precio unitario: ${{ number_format($detalle->precio_unitario, 2) }}</li>
        @endforeach
    </ul>
</body>
</html>
