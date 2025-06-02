<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Menú de Comidas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        .btn-pink {
            background-color: #e91e63; /* rosa fuerte */
            color: white;
            border-color: #e91e63;
        }
        .btn-pink:hover, 
        .btn-pink:focus {
            background-color: #c2185b;
            border-color: #c2185b;
            color: white;
        }
    </style>
</head>
<body class="bg-light">

    {{-- Incluir el navbar --}}
    @include('layouts.navbar')

    <div class="container py-5">
        <h1 class="text-center mb-5">Menú de Comidas</h1>

        @php
            $comidas = [
                ['nombre' => 'Pupusas', 'desc' => 'Deliciosas pupusas de queso y frijol.', 'img' => 'https://i.pinimg.com/564x/34/4b/35/344b35afa8945b956b7cbde65545f4af.jpg', 'ruta' => route('pupusas')],
                ['nombre' => 'Hamburguesa', 'desc' => 'Jugosa hamburguesa con papas fritas.', 'img' => 'https://i.pinimg.com/736x/87/49/48/87494885845df861a1b6f529c136f2e5.jpg', 'ruta' => route('hamburguesas')],
                ['nombre' => 'Pollo Frito', 'desc' => 'Crujiente y dorado con ensalada.', 'img' => 'https://i.pinimg.com/736x/19/dc/46/19dc46156894605d1a3b4c1851714baa.jpg', 'ruta' => route('pollofrito')],
                ['nombre' => 'Hot Dogs', 'desc' => 'Hot dogs clásicos con toppings.', 'img' => 'https://i.pinimg.com/736x/47/4c/37/474c3730a330ae11db4a0fa09f3313f7.jpg', 'ruta' => route('hotdog')],
                ['nombre' => 'Pizza', 'desc' => 'Pizza artesanal con mucho queso.', 'img' => 'https://i.pinimg.com/originals/f0/86/c2/f086c2b68c7bc41d5371815fb4e0fc58.jpg', 'ruta' => route('pizza')],
                ['nombre' => 'Tacos Mexicanos', 'desc' => 'Tacos al pastor con salsa verde.', 'img' => 'https://i.pinimg.com/564x/4c/b4/ed/4cb4ed77709e3603da9ed68ac151d3c7.jpg', 'ruta' => route('tacos')],
                ['nombre' => 'Sushi Japonés', 'desc' => 'Rollos frescos de sushi.', 'img' => 'https://i.pinimg.com/originals/ef/ca/26/efca2616e091e0d86892c94961c0be61.jpg', 'ruta' => route('sushi')],
                ['nombre' => 'Comida China', 'desc' => 'Arroz frito, chow mein y más.', 'img' => 'https://i.pinimg.com/736x/04/20/90/0420900f649a9cdd6c7774e331175b98.jpg', 'ruta' => route('comidachina')],
                ['nombre' => 'Arepas Venezolanas', 'desc' => 'Arepas rellenas de carne mechada.', 'img' => 'https://i.pinimg.com/originals/fe/da/9b/feda9b9dec57c7dffed2870092102379.jpg', 'ruta' => route('arepas')]
            ];
        @endphp

        <div class="row">
            @foreach ($comidas as $comida)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100">
                        <img src="{{ $comida['img'] }}" class="card-img-top" alt="{{ $comida['nombre'] }}" style="height: 250px; object-fit: cover;" />
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="card-title">{{ $comida['nombre'] }}</h5>
                                <p class="card-text">{{ $comida['desc'] }}</p>
                            </div>
                            <div class="text-center mt-3">
                                <a href="{{ $comida['ruta'] }}" class="btn btn-pink">Hacer pedido</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-5">
            <a href="{{ route('home') }}" class="btn btn-secondary">Volver al inicio</a>
        </div>
    </div>

</body>
</html>
