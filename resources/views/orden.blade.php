<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordenar Comida</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet"> <!-- Si usas un archivo CSS adicional -->
</head>
<body class="bg-light">

    <!-- Encabezado -->
    <div class="container text-center py-5">
        <h1 class="display-4 mb-4">Ordenar Comida</h1>
        <p class="lead mb-4">Elige tu comida y agrega al carrito.</p>
    </div>

    <!-- Formulario de ordenamiento de comida -->
    <div class="container py-5">
        <form action="{{ route('pedido.store') }}" method="POST">
            @csrf

            <div class="row text-center">
                <!-- Comida 1 -->
                <div class="col-md-3 mb-4">
                    <div class="card shadow-sm border-0">
                        <img src="https://comedera.com/wp-content/uploads/sites/9/2023/05/Pupusas-de-queso-shutterstock_1803502444.jpg" class="card-img-top" alt="Comida 1">
                        <div class="card-body">
                            <h5 class="card-title">Pupusas de Queso</h5>
                            <p class="card-text">Deliciosas pupusas de queso, perfectas para cualquier ocasión.</p>
                            <label for="cantidad_comida_1">Cantidad</label>
                            <input type="number" name="cantidad_comida_1" id="cantidad_comida_1" class="form-control" value="1" min="1" required>
                        </div>
                    </div>
                </div>

                <!-- Comida 2 -->
                <div class="col-md-3 mb-4">
                    <div class="card shadow-sm border-0">
                        <img src="https://www.gastronomiadiaria.com/wp-content/uploads/2021/05/pollo-1.jpg" class="card-img-top" alt="Comida 2">
                        <div class="card-body">
                            <h5 class="card-title">Pollo Asado</h5>
                            <p class="card-text">Pollo asado jugoso y delicioso, servido con acompañamientos frescos.</p>
                            <label for="cantidad_comida_2">Cantidad</label>
                            <input type="number" name="cantidad_comida_2" id="cantidad_comida_2" class="form-control" value="1" min="1" required>
                        </div>
                    </div>
                </div>

                <!-- Comida 3 -->
                <div class="col-md-3 mb-4">
                    <div class="card shadow-sm border-0">
                        <img src="https://www.elheraldo.hn/resizer/3wBGFhY_MjzOphtdY5AUEBQ0rpk=/1200x800/smart/filters:format(webp)/cloudfront-us-east-1.images.arcpublishing.com/eldiario.hn/5G53E5CIBBBJTFIXXB3B6Y3I2Y.jpg" class="card-img-top" alt="Comida 3">
                        <div class="card-body">
                            <h5 class="card-title">Tacos</h5>
                            <p class="card-text">Tacos frescos con carne de res, pollo o cerdo y todos los acompañamientos.</p>
                            <label for="cantidad_comida_3">Cantidad</label>
                            <input type="number" name="cantidad_comida_3" id="cantidad_comida_3" class="form-control" value="1" min="1" required>
                        </div>
                    </div>
                </div>

                <!-- Comida 4 -->
                <div class="col-md-3 mb-4">
                    <div class="card shadow-sm border-0">
                        <img src="https://i.pinimg.com/originals/58/c0/11/58c011d09e7de931c85bb12298684d98.jpg" class="card-img-top" alt="Comida 4">
                        <div class="card-body">
                            <h5 class="card-title">Hamburguesa</h5>
                            <p class="card-text">Hamburguesa jugosa con queso derretido y papas fritas.</p>
                            <label for="cantidad_comida_4">Cantidad</label>
                            <input type="number" name="cantidad_comida_4" id="cantidad_comida_4" class="form-control" value="1" min="1" required>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Botones para agregar al carrito y finalizar pedido -->
            <div class="text-center">
                <button type="submit" class="btn btn-success btn-lg">Agregar al Carrito</button>
                <a href="{{ route('pedido.finalizar') }}" class="btn btn-primary btn-lg">Finalizar Pedido</a>
            </div>
        </form>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2025 Todos los derechos reservados.</p>
    </footer>

    <!-- Bootstrap JS (Opcional para algunos componentes como modales o tooltips) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
