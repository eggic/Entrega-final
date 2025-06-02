<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Menú de Postres</title>
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
        <h1 class="text-center mb-5">Menú de Postres</h1>

        @php
            $postres = [
                ['nombre' => 'Gelatinas de Colores', 'desc' => 'Gelatinas frutales y refrescantes en varios sabores.', 'img' => 'https://i.pinimg.com/736x/24/c1/66/24c166b47d0da6ba25f2f6410721133b.jpg', 'ruta' => route('pedido.gelatinas')],
                ['nombre' => 'Flan Napolitano', 'desc' => 'Clásico flan cremoso con caramelo.', 'img' => 'https://a180grados.wordpress.com/wp-content/uploads/2014/11/img_0795-1.jpg', 'ruta' => route('pedido.flan')],
                ['nombre' => 'Donas Glaseadas', 'desc' => 'Suaves y dulces, cubiertas con glaseado de vainilla.', 'img' => 'https://i.pinimg.com/originals/15/cc/c0/15ccc08fecce00413cdfeff8e16e7745.jpg', 'ruta' => route('pedido.donas')],
                ['nombre' => 'Brownies de Chocolate', 'desc' => 'Bizcocho húmedo de chocolate con trozos de nuez.', 'img' => 'https://i.pinimg.com/736x/a3/9f/71/a39f71660ca585fd04f09317e78b8c37.jpg', 'ruta' => route('pedido.brownies')],
                ['nombre' => 'Pastel Tres Leches', 'desc' => 'Esponjoso pastel bañado en mezcla de tres leches.', 'img' => 'https://i.pinimg.com/1200x/41/03/3b/41033bccad1627459e04713659ab0e76.jpg', 'ruta' => route('pedido.tresleches')],
                ['nombre' => 'Cheesecake', 'desc' => 'Tarta de queso con cobertura.', 'img' => 'https://www.australianeggs.org.au/assets/features/Lemon_Meringue_Cheesecake_1198__ScaleWidthWzEyMDBd.jpg', 'ruta' => route('pedido.cheesecake')],
                ['nombre' => 'Panecillos de Canela', 'desc' => 'Rollos de canela con glaseado dulce.', 'img' => 'https://www.finedininglovers.com/es/sites/g/files/xknfdk1706/files/2023-12/Cinnamon%20rolls%20rollos%20de%20canela.jpg', 'ruta' => route('pedido.roll')],
                ['nombre' => 'Cupcakes', 'desc' => 'Pequeños pasteles con diferentes sabores y coberturas.', 'img' => 'https://i.pinimg.com/736x/45/3b/a2/453ba2458dd376fa2815cc79158e6ce4.jpg', 'ruta' => route('pedido.cupcakes')],
                ['nombre' => 'Arroz con Leche', 'desc' => 'Tradicional postre cremoso espolvoreado con canela.', 'img' => 'https://www.midiariodecocina.com/wp-content/uploads/2023/03/Arroz-con-leche-y-arandanos07.jpg', 'ruta' => route('pedido.arroz')],
            ];
        @endphp

        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($postres as $postre)
                <div class="col">
                    <div class="card h-100">
                        <img src="{{ $postre['img'] }}" class="card-img-top" alt="{{ $postre['nombre'] }}" style="height: 300px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $postre['nombre'] }}</h5>
                            <p class="card-text">{{ $postre['desc'] }}</p>
                            <a href="{{ $postre['ruta'] }}" class="btn btn-pink">Agregar al pedido</a>
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
