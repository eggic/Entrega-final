<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Detalle del Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="bg-light py-5">

<div class="container" style="max-width: 600px;">
    <div class="card">
        <div class="card-header">
            <h3>Detalle del Producto</h3>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $producto->id }}</p>
            <p><strong>Nombre:</strong> {{ $producto->nombre }}</p>
            <p><strong>Descripción:</strong> {{ $producto->descripcion }}</p>
            <p><strong>Precio:</strong> ${{ number_format($producto->precio, 2) }}</p>
            <p><strong>Stock:</strong> {{ $producto->stock }}</p>
            <p><strong>Tipo:</strong> {{ $producto->tipo }}</p>

            @if ($producto->imagen)
                <img src="{{ asset('storage/' . $producto->imagen) }}" alt="Imagen del producto" class="img-fluid" style="max-width: 300px; height: auto; margin-top: 1rem;" />

            @else
                <p>No hay imagen disponible</p>
            @endif
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('productos.index') }}" class="btn btn-secondary">Volver</a>
            <a href="{{ route('productos.edit', $producto) }}" class="btn btn-primary">Editar</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
