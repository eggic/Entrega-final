<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Editar Producto</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="bg-light py-5">

<div class="container">
    <div class="card mx-auto" style="max-width: 500px;">
        <div class="card-body">
            <h2 class="card-title mb-4">Editar producto</h2>

            <!-- Mostrar errores -->
            @if ($errors->any())
                <div class="mb-4 alert alert-danger">
                    <ul class="list-unstyled mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Nombre -->
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre del producto</label>
                    <input
                        type="text"
                        name="nombre"
                        id="nombre"
                        value="{{ old('nombre', $producto->nombre) }}"
                        class="form-control"
                        required
                    />
                </div>

                <!-- Descripción -->
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea
                        name="descripcion"
                        id="descripcion"
                        class="form-control"
                        required
                    >{{ old('descripcion', $producto->descripcion) }}</textarea>
                </div>

                <!-- Precio -->
                <div class="mb-3">
                    <label for="precio" class="form-label">Precio ($)</label>
                    <input
                        type="number"
                        name="precio"
                        id="precio"
                        value="{{ old('precio', $producto->precio) }}"
                        class="form-control"
                        required
                        step="0.01"
                        min="0"
                    />
                </div>

                <!-- Stock -->
                <div class="mb-3">
                    <label for="stock" class="form-label">Stock</label>
                    <input
                        type="number"
                        name="stock"
                        id="stock"
                        value="{{ old('stock', $producto->stock) }}"
                        class="form-control"
                        required
                        min="0"
                    />
                </div>

                <!-- Tipo -->
                <div class="mb-3">
                    <label for="tipo" class="form-label">Tipo</label>
                    <select name="tipo" id="tipo" class="form-control" required>
                        <option value="">Selecciona un tipo</option>
                        <option value="Pupusas" {{ old('tipo', $producto->tipo) == 'Pupusas' ? 'selected' : '' }}>Pupusas</option>
                        <option value="Hamburguesas" {{ old('tipo', $producto->tipo) == 'Hamburguesas' ? 'selected' : '' }}>Hamburguesas</option>
                        <option value="Pollo" {{ old('tipo', $producto->tipo) == 'Pollo' ? 'selected' : '' }}>Pollo</option>
                        <option value="HotDog" {{ old('tipo', $producto->tipo) == 'HotDog' ? 'selected' : '' }}>Hot Dog</option>
                        <option value="Pizza" {{ old('tipo', $producto->tipo) == 'Pizza' ? 'selected' : '' }}>Pizza</option>
                        <option value="Tacos" {{ old('tipo', $producto->tipo) == 'Tacos' ? 'selected' : '' }}>Tacos</option>
                        <option value="China" {{ old('tipo', $producto->tipo) == 'China' ? 'selected' : '' }}>Comida China</option>
                        <option value="Arepas" {{ old('tipo', $producto->tipo) == 'Arepas' ? 'selected' : '' }}>Arepas</option>
                        <option value="CafeHelado" {{ old('tipo', $producto->tipo) == 'CafeHelado' ? 'selected' : '' }}>Café Helado</option>
                        <option value="LicuadodeFresa" {{ old('tipo', $producto->tipo) == 'LicuadodeFresa' ? 'selected' : '' }}>Licuado de Fresa</option>
                        <option value="JugodeNaranja" {{ old('tipo', $producto->tipo) == 'JugodeNaranja' ? 'selected' : '' }}>Jugo de Naranja</option>
                        <option value="Horchata" {{ old('tipo', $producto->tipo) == 'Horchata' ? 'selected' : '' }}>Horchata</option>
                        <option value="TeVerdeFrio" {{ old('tipo', $producto->tipo) == 'TeVerdeFrio' ? 'selected' : '' }}>Té Verde Frío</option>
                        <option value="Smoothie" {{ old('tipo', $producto->tipo) == 'Smoothie' ? 'selected' : '' }}>Smoothie</option>
                        <option value="Soda" {{ old('tipo', $producto->tipo) == 'Soda' ? 'selected' : '' }}>Soda</option>
                        <option value="CafeEspresso" {{ old('tipo', $producto->tipo) == 'CafeEspresso' ? 'selected' : '' }}>Café Espresso</option>
                        <option value="Malteadas" {{ old('tipo', $producto->tipo) == 'Malteadas' ? 'selected' : '' }}>Malteadas</option>
                        <option value="Gelatina" {{ old('tipo', $producto->tipo) == 'Gelatina' ? 'selected' : '' }}>Gelatina</option>
                        <option value="Flan" {{ old('tipo', $producto->tipo) == 'Flan' ? 'selected' : '' }}>Flan</option>
                        <option value="Dona" {{ old('tipo', $producto->tipo) == 'Dona' ? 'selected' : '' }}>Dona</option>
                        <option value="Brownie" {{ old('tipo', $producto->tipo) == 'Brownie' ? 'selected' : '' }}>Brownie</option>
                        <option value="Tres Leches" {{ old('tipo', $producto->tipo) == 'Tres Leches' ? 'selected' : '' }}>Tres Leches</option>
                        <option value="Cheesecake" {{ old('tipo', $producto->tipo) == 'Cheesecake' ? 'selected' : '' }}>Cheesecake</option>
                        <option value="Roll de Canela" {{ old('tipo', $producto->tipo) == 'Roll de Canela' ? 'selected' : '' }}>Roll de Canela</option>
                        <option value="Cupcake" {{ old('tipo', $producto->tipo) == 'Cupcake' ? 'selected' : '' }}>Cupcake</option>
                        <option value="Arroz con Leche" {{ old('tipo', $producto->tipo) == 'Arroz con Leche' ? 'selected' : '' }}>Arroz con Leche</option>
                        <option value="McDonald's" {{ old('tipo', $producto->tipo) == "McDonald's" ? 'selected' : '' }}>McDonald's</option>
                        <option value="KFC" {{ old('tipo', $producto->tipo) == 'KFC' ? 'selected' : '' }}>KFC</option>
                        <option value="Burger King" {{ old('tipo', $producto->tipo) == 'Burger King' ? 'selected' : '' }}>Burger King</option>
                        <option value="Subway" {{ old('tipo', $producto->tipo) == 'Subway' ? 'selected' : '' }}>Subway</option>
                        <option value="Pizza Hut" {{ old('tipo', $producto->tipo) == 'Pizza Hut' ? 'selected' : '' }}>Pizza Hut</option>
                        <option value="Domino's Pizza" {{ old('tipo', $producto->tipo) == "Domino's Pizza" ? 'selected' : '' }}>Domino's Pizza</option>
                        <option value="Taco Bell" {{ old('tipo', $producto->tipo) == 'Taco Bell' ? 'selected' : '' }}>Taco Bell</option>
                        <option value="Popeyes" {{ old('tipo', $producto->tipo) == 'Popeyes' ? 'selected' : '' }}>Popeyes</option>
                        <option value="Starbucks" {{ old('tipo', $producto->tipo) == 'Starbucks' ? 'selected' : '' }}>Starbucks</option>
                    </select>
                </div>
w
                <!-- Imagen -->
                <div class="mb-3">
                    <label for="imagen" class="form-label">Imagen del producto</label>
                    <input type="file" name="imagen" id="imagen" class="form-control" />
<small class="text-muted">Si no seleccionas una nueva imagen, se mantendrá la actual.</small>

                    @if ($producto->imagen)
                        <img src="{{ asset('storage/' . $producto->imagen) }}" alt="Imagen actual" class="img-fluid mt-2" style="max-width: 150px;" />
                    @endif
                </div>

                <!-- Botones -->
                <div class="d-flex justify-content-end">
                    <a href="{{ route('productos.index') }}" class="btn btn-secondary me-2">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS (opcional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
