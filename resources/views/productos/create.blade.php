<!DOCTYPE html>
<html lang="es">
     <a href="{{ route('home') }}" class="btn btn-outline-secondary">
        Ir al inicio
        </a>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Crear Producto</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="bg-light py-5">

<div class="container">
    <div class="card mx-auto" style="max-width: 500px;">
        <div class="card-body">
            <h2 class="card-title mb-4">Crear nuevo producto</h2>

            <!-- Errores -->
            @if ($errors->any())
                <div class="mb-4 alert alert-danger">
                    <ul class="list-unstyled">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Formulario -->
            <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Nombre -->
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre del producto</label>
                    <input
                        type="text"
                        name="nombre"
                        id="nombre"
                        class="form-control"
                        value="{{ old('nombre') }}"
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
                    >{{ old('descripcion') }}</textarea>
                </div>

                <!-- Precio -->
                <div class="mb-3">
                    <label for="precio" class="form-label">Precio ($)</label>
                    <input
                        type="number"
                        name="precio"
                        id="precio"
                        class="form-control"
                        value="{{ old('precio') }}"
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
                        class="form-control"
                        value="{{ old('stock') }}"
                        required
                        min="0"
                    />
                </div>

                <!-- Tipo -->
                <div class="mb-3">
                    <label for="tipo" class="form-label">Tipo</label>
                    <select name="tipo" id="tipo" class="form-control" required>
                        <option value="">Selecciona un tipo</option>
                        <option value="Pupusas" {{ old('tipo') == 'Pupusas' ? 'selected' : '' }}>Pupusas</option>
                        <option value="Hamburguesas" {{ old('tipo') == 'Hamburguesas' ? 'selected' : '' }}>Hamburguesas</option>
                        <option value="Pollo" {{ old('tipo') == 'Pollo' ? 'selected' : '' }}>Pollo</option>
                        <option value="HotDog" {{ old('tipo') == 'HotDog' ? 'selected' : '' }}>HotDog</option>
                        <option value="Pizza" {{ old('tipo') == 'Pizza' ? 'selected' : '' }}>Pizza</option>
                        <option value="Tacos" {{ old('tipo') == 'Tacos' ? 'selected' : '' }}>Tacos</option>
                        <option value="Sushi" {{ old('tipo') == 'Sushi' ? 'selected' : '' }}>Sushi</option>
                        <option value="China" {{ old('tipo') == 'China' ? 'selected' : '' }}>Comida China</option>
                        <option value="Arepas" {{ old('tipo') == 'Arepas' ? 'selected' : '' }}>Arepas</option>

                        <option value="CafeHelado" {{ old('tipo') == 'CafeHelado' ? 'selected' : '' }}>Café Helado</option>
                        <option value="LicuadodeFresa" {{ old('tipo') == 'LicuadodeFresa' ? 'selected' : '' }}>Licuado de Fresa</option>
                        <option value="JugodeNaranja" {{ old('tipo') == 'JugodeNaranja' ? 'selected' : '' }}>Jugo de Naranja</option>
                        <option value="Horchata" {{ old('tipo') == 'Horchata' ? 'selected' : '' }}>Horchata</option>
                        <option value="TeVerdeFrio" {{ old('tipo') == 'TeVerdeFrio' ? 'selected' : '' }}>Té Verde Frío</option>
                        <option value="Smoothie" {{ old('tipo') == 'Smoothie' ? 'selected' : '' }}>Smoothie</option>
                        <option value="Soda" {{ old('tipo') == 'Soda' ? 'selected' : '' }}>Soda</option>
                        <option value="CafeEspresso" {{ old('tipo') == 'CafeEspresso' ? 'selected' : '' }}>Café Espresso</option>
                        <option value="Malteadas" {{ old('tipo') == 'Malteadas' ? 'selected' : '' }}>Malteadas</option>

                        <option value="Gelatina" {{ old('tipo') == 'Gelatina' ? 'selected' : '' }}>Gelatina</option>
                        <option value="Flan" {{ old('tipo') == 'Flan' ? 'selected' : '' }}>Flan</option>
                        <option value="Dona" {{ old('tipo') == 'Dona' ? 'selected' : '' }}>Dona</option>
                        <option value="Brownie" {{ old('tipo') == 'Brownie' ? 'selected' : '' }}>Brownie</option>
                        <option value="Tres Leches" {{ old('tipo') == 'Tres Leches' ? 'selected' : '' }}>Tres Leches</option>
                        <option value="Cheesecake" {{ old('tipo') == 'Cheesecake' ? 'selected' : '' }}>Cheesecake</option>
                        <option value="Roll de Canela" {{ old('tipo') == 'Roll de Canela' ? 'selected' : '' }}>Roll de Canela</option>
                        <option value="Cupcake" {{ old('tipo') == 'Cupcake' ? 'selected' : '' }}>Cupcake</option>
                        <option value="Arroz con Leche" {{ old('tipo') == 'Arroz con Leche' ? 'selected' : '' }}>Arroz con Leche</option>

                        <option value="McDonald's" {{ old('tipo') == "McDonald's" ? 'selected' : '' }}>McDonald's</option>
                        <option value="KFC" {{ old('tipo') == 'KFC' ? 'selected' : '' }}>KFC</option>
                        <option value="Burger King" {{ old('tipo') == 'Burger King' ? 'selected' : '' }}>Burger King</option>
                        <option value="Subway" {{ old('tipo') == 'Subway' ? 'selected' : '' }}>Subway</option>
                        <option value="Pizza Hut" {{ old('tipo') == 'Pizza Hut' ? 'selected' : '' }}>Pizza Hut</option>
                        <option value="Domino's Pizza" {{ old('tipo') == "Domino's Pizza" ? 'selected' : '' }}>Domino's Pizza</option>
                        <option value="Taco Bell" {{ old('tipo') == 'Taco Bell' ? 'selected' : '' }}>Taco Bell</option>
                        <option value="Popeyes" {{ old('tipo') == 'Popeyes' ? 'selected' : '' }}>Popeyes</option>
                        <option value="Starbucks" {{ old('tipo') == 'Starbucks' ? 'selected' : '' }}>Starbucks</option>

                    </select>
                </div>

                <!-- Imagen con botón personalizado -->
<div class="mb-3">
    <label class="form-label">Imagen del producto</label>

    <div class="input-group">
        <input type="file" name="imagen" id="imagen" accept="image/*" style="display: none;" required>
        <button type="button" class="btn btn-outline-secondary" onclick="document.getElementById('imagen').click();">
            Subir imagen
        </button>
        <input type="text" id="nombre-archivo" class="form-control bg-light" readonly value="Ningún archivo seleccionado">
    </div>
</div>


                <!-- Previsualización -->
                <div class="mb-3">
                    <img id="preview" src="#" alt="Previsualización" style="display:none; max-width: 200px; margin-top: 10px;">
                </div>

                <!-- Botones -->
                <div class="d-flex justify-content-end">
                    <a href="{{ route('productos.index') }}" class="btn btn-secondary me-2">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.getElementById('imagen').addEventListener('change', function(event) {
        const [file] = event.target.files;
        if (file) {
            // Mostrar nombre del archivo
            document.getElementById('nombre-archivo').value = file.name;

            // Mostrar previsualización
            const preview = document.getElementById('preview');
            preview.src = URL.createObjectURL(file);
            preview.style.display = 'block';
        }
    });
</script>
</body>
</html>
