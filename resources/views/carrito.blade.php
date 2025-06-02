<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Carrito de Compras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/tarjetas.css') }}" />
</head>
<body class="bg-light">

{{-- Incluir el navbar --}}
@include('layouts.navbar')

<div class="container mt-5">
    <h1 class="text-center mb-4">Carrito de Compras</h1>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    @if(!empty($carrito) && count($carrito) > 0)
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach($carrito as $item)
                        @php
                            $subtotal = $item['precio'] * $item['cantidad'];
                            $total += $subtotal;
                        @endphp
                        <tr>
                            <td>{{ $item['nombre'] }}</td>
                            <td>${{ number_format($item['precio'], 2) }}</td>
                            <td>{{ $item['cantidad'] }}</td>
                            <td>${{ number_format($subtotal, 2) }}</td>
                        </tr>
                    @endforeach
                    <tr class="table-primary">
                        <td colspan="3"><strong>Total</strong></td>
                        <td><strong>${{ number_format($total, 2) }}</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- Botón para confirmar pedido --}}
        <div class="text-center mt-4">
            <form action="{{ route('carrito.confirmar') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success px-4 py-2">Confirmar pedido</button>
            </form>
        </div>
    @else
        <p class="text-center">Tu carrito está vacío.</p>
    @endif
</div>

</body>
</html>
