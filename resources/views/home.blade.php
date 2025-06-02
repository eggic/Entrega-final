<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos personalizados -->
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">

    <style>
        .btn-pedido {
            background-color: #ec5ca8;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-pedido:hover {
            background-color: #d94e96;
            color: white;
        }
    </style>
</head>
<body class="bg-light">

    {{-- Incluir el navbar --}}
    @include('layouts.navbar')

    <main class="container py-4">
        @yield('content')

        @auth

      
    </div>
@endauth

    </main>

    <!-- Encabezado -->
    <div class="container text-center py-5">
        <h1 class="display-4 mb-4">Bienvenido a Nuestro Menú</h1>
        <p class="lead mb-4">Explora nuestras opciones y haz tu pedido en línea.</p>
    </div>

    <!-- Opciones de menú -->
    <div class="container py-5">
        <div class="row text-center">
            <!-- Comida -->
            <div class="col-md-3 mb-4">
                <div class="card shadow-sm border-0">
                    <img src="https://comedera.com/wp-content/uploads/sites/9/2023/05/Pupusas-de-queso-shutterstock_1803502444.jpg" class="card-img-top" alt="Comida">
                    <div class="card-body">
                        <h5 class="card-title">Comida</h5>
                        <p class="card-text">Disfruta de nuestras deliciosas opciones de comida.</p>
                        <a href="{{ route('pedido.comida') }}" class="btn btn-pedido">Haz tu pedido</a>
                    </div>
                </div>
            </div>

            <!-- Bebidas -->
            <div class="col-md-3 mb-4">
                <div class="card shadow-sm border-0">
                    <img src="https://i.pinimg.com/736x/5d/8c/33/5d8c33fa23e20e997c24cc92602a51b6.jpg" class="card-img-top" alt="Bebidas">
                    <div class="card-body">
                        <h5 class="card-title">Bebidas</h5>
                        <p class="card-text">Refresca tu día con nuestras bebidas deliciosas.</p>
                        <a href="{{ route('pedido.bebidas') }}" class="btn btn-pedido">Haz tu pedido</a>
                    </div>
                </div>
            </div>

            <!-- Cadenas de comida -->
            <div class="col-md-3 mb-4">
                <div class="card shadow-sm border-0">
                    <img src="https://whatsupuebli.wordpress.com/wp-content/uploads/2019/12/1030tj9j.jpg" class="card-img-top" alt="Cadenas de comida">
                    <div class="card-body">
                        <h5 class="card-title">Cadenas de comida</h5>
                        <p class="card-text">Encuentra las mejores cadenas de comida cerca de ti.</p>
                        <a href="{{ route('pedido.cadenas') }}" class="btn btn-pedido">Haz tu pedido</a>
                    </div>
                </div>
            </div>

            <!-- Otros -->
            <div class="col-md-3 mb-4">
                <div class="card shadow-sm border-0">
                    <img src="https://i.pinimg.com/originals/0a/65/f3/0a65f3005771685b5b3121252d303692.jpg" class="card-img-top" alt="Otros">
                    <div class="card-body">
                        <h5 class="card-title">Otros</h5>
                        <p class="card-text">Explora otras opciones deliciosas y únicas.</p>
                        <a href="{{ route('pedido.otros') }}" class="btn btn-pedido">Haz tu pedido</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
