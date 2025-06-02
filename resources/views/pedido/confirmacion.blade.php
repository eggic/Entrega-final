<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Pedido Confirmado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="bg-light">

<div class="container mt-5 text-center">
    <h1>¡Pedido confirmado!</h1>
    <p>Gracias por tu compra. Tu pedido ha sido registrado correctamente.</p>

    {{-- Enlace para ver el recibo PDF --}}
    <a href="{{ route('pedido.recibo', ['idPedido' => $pedido->id]) }}" target="_blank" class="btn btn-primary">
        Ver recibo PDF
    </a>

    <br><br>

    <a href="{{ route('carrito.index') }}" class="btn btn-secondary">Volver al carrito</a>
</div>

</body>
</html>
