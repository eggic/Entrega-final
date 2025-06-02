<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalizar Pedido</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <!-- Encabezado -->
    <div class="container text-center py-5">
        <h1 class="display-4 mb-4">Finaliza tu Pedido</h1>
        <p class="lead mb-4">Revisa tu pedido antes de proceder al pago.</p>
    </div>

    <!-- Resumen del Pedido -->
    <div class="container py-5">
        <h3>Resumen de tu Pedido</h3>
        <ul class="list-group">
            <!-- Ciclo para mostrar los productos desde la sesión -->
            @php
                $pedido = session('pedido');
            @endphp

            @if($pedido && count($pedido) > 0)
                @foreach($pedido as $producto)
                    <li class="list-group-item">
                        {{ $producto['nombre'] }} x {{ $producto['cantidad'] }} - ${{ number_format($producto['precio'] * $producto['cantidad'], 2) }}
                    </li>
                @endforeach
            @else
                <li class="list-group-item">No hay productos en tu pedido.</li>
            @endif
        </ul>

        <div class="mt-4">
            <!-- Calcular el total -->
            @php
                $total = 0;
                if($pedido) {
                    foreach($pedido as $producto) {
                        $total += $producto['precio'] * $producto['cantidad'];
                    }
                }
            @endphp
            <p><strong>Total: ${{ number_format($total, 2) }}</strong></p>
        </div>

        <!-- Botones -->
        <div class="text-center">
            <a href="{{ route('pedido.pago') }}" class="btn btn-success btn-lg">Proceder al Pago</a>
            <a href="{{ route('pedido.ordenar') }}" class="btn btn-secondary btn-lg">Modificar Pedido</a>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2025 Todos los derechos reservados.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
