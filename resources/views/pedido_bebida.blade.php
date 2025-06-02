<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Menú de Bebidas</title>
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
    <h1 class="text-center mb-5">Menú de Bebidas</h1>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @php
            $comidas = [
                ['nombre' => 'Café Helado', 'desc' => 'Refrescante café con hielo y leche.', 'img' => 'https://i.pinimg.com/564x/4f/a3/8c/4fa38ce3dc9fbc179bbb7c429c7e5bcf.jpg', 'ruta' => route('pedido.cafehelado')],
                ['nombre' => 'Licuado de Fresa', 'desc' => 'Batido natural con leche y fresas.', 'img' => 'https://i.pinimg.com/736x/9c/e9/20/9ce9204b597a2b5638700f0fc64e1664.jpg', 'ruta' => route('pedido.licuadodefresa')],
                ['nombre' => 'Jugo de Naranja', 'desc' => 'Jugo recién exprimido y natural.', 'img' => 'https://i.pinimg.com/736x/1e/03/ed/1e03eddcb7825b288b19535a08b5c20d.jpg', 'ruta' => route('pedido.jugodenaranja')],
                ['nombre' => 'Horchata', 'desc' => 'Bebida tradicional de arroz con canela.', 'img' => 'https://i.pinimg.com/736x/e6/1d/b5/e61db5ac25a5d4ee1f63d8bf23c9a6d7.jpg', 'ruta' => route('pedido.horchata')],
                ['nombre' => 'Té Verde Frío', 'desc' => 'Té verde con limón y menta.', 'img' => 'https://i0.wp.com/gourmetlikeme.com/wp-content/uploads/2018/08/IMG_6324.jpg?resize=637%2C637&ssl=1', 'ruta' => route('pedido.teverdefrio')],
                ['nombre' => 'Smoothie Tropical', 'desc' => 'Frutas tropicales mezcladas al instante.', 'img' => 'https://i.pinimg.com/736x/81/ed/ab/81edabf802837de797bbffde9466f488.jpg', 'ruta' => route('pedido.smoothie')],
                ['nombre' => 'Soda de Uva', 'desc' => 'Refresco sabor uva con burbujas.', 'img' => 'https://i.pinimg.com/736x/45/88/2f/45882fd4cc8bcf58a27ab32572c6ed50.jpg', 'ruta' => route('pedido.soda')],
                ['nombre' => 'Café Espresso', 'desc' => 'Shot fuerte de café oscuro.', 'img' => 'https://i.pinimg.com/736x/46/3c/d9/463cd9191f0b467132fc99026fb5518d.jpg', 'ruta' => route('pedido.cafeexpresso')],
                ['nombre' => 'Malteada de Chocolate', 'desc' => 'Malteada cremosa con chocolate.', 'img' => 'https://i.pinimg.com/736x/11/7e/68/117e685bb45d88ec72e22b7ceb6fe6ad.jpg', 'ruta' => route('pedido.malteada')],
            ];
        @endphp

        @foreach ($comidas as $comida)
            <div class="col">
                <div class="card h-100">
                    <img src="{{ $comida['img'] }}" class="card-img-top" alt="{{ $comida['nombre'] }}" style="height: 300px; object-fit: cover;" />
                    <div class="card-body">
                        <h5 class="card-title">{{ $comida['nombre'] }}</h5>
                        <p class="card-text">{{ $comida['desc'] }}</p>
                        <a href="{{ $comida['ruta'] }}" class="btn btn-pink">Agregar al pedido</a>
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
