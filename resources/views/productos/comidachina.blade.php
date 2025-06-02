<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Comida China</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/tarjetas.css') }}" />
</head>
<body class="bg-light">

    {{-- Incluir el navbar --}}
    @include('layouts.navbar')

    <div class="container mt-5">
        <h1 class="text-center mb-4">Comida China</h1>

        <form action="{{ route('pedido.realizar') }}" method="POST">
            @csrf

            <div class="comidas-apiladas">
                @forelse($productos as $producto)
                <div class="mb-4">
                    <div class="card shadow-sm">
                        <img src="{{ asset('storage/' . $producto->imagen) }}" class="img-pequena" alt="Imagen del producto" />
                        <div class="card-body">
                            <h5 class="card-title">{{ $producto->nombre }}</h5>
                            <p class="card-text">{{ $producto->descripcion }}</p>
                            <p><strong>Precio por unidad:</strong> ${{ number_format($producto->precio, 2) }}</p>

                            <div class="d-flex justify-content-center align-items-center gap-2">
                                <button type="button" class="btn btn-outline-secondary" onclick="cambiarCantidad({{ $loop->index }}, -1)">-</button>
                                <span id="cantidad-{{ $loop->index }}">1</span>
                                <button type="button" class="btn btn-outline-secondary" onclick="cambiarCantidad({{ $loop->index }}, 1)">+</button>
                            </div>

                            <input type="hidden" name="productos[{{ $producto->id }}]" id="input-cantidad-{{ $loop->index }}" value="1" />
                        </div>
                    </div>
                </div>
                @empty
                <p class="text-center">No hay productos disponibles.</p>
                @endforelse
            </div>

            <div class="text-center mt-5">
                <button type="submit" class="btn btn-success px-5 py-2">Hacer pedido</button>
            </div>
        </form>
    </div>

    <script>
        function cambiarCantidad(index, cambio) {
            const spanCantidad = document.getElementById('cantidad-' + index);
            const inputCantidad = document.getElementById('input-cantidad-' + index);
            let cantidad = parseInt(spanCantidad.textContent);
            cantidad += cambio;
            if (cantidad < 1) cantidad = 1;  // mínimo 1 unidad
            spanCantidad.textContent = cantidad;
            inputCantidad.value = cantidad;
        }
    </script>

</body>
</html>
