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
        <h1 class="text-center mb-5">Menú de Cadenas</h1>

        @php
            $comidas = [
                ['nombre' => 'McDonald\'s', 'desc' => 'Famoso por sus hamburguesas y papas fritas.', 'img' => 'https://i.pinimg.com/originals/07/f7/bd/07f7bd9afa2c977ba173518fa1a09609.jpg', 'ruta' => route('pedido.mcdonalds')],
                ['nombre' => 'KFC', 'desc' => 'Pollo frito crujiente y sabroso.', 'img' => 'https://i.pinimg.com/736x/90/03/04/900304a6b6859d666bd97a9c703eaa0a.jpg', 'ruta' => route('pedido.kfc')],
                ['nombre' => 'Burger King', 'desc' => 'Hamburguesas a la parrilla con sabor único.', 'img' => 'https://i.pinimg.com/736x/bc/85/7f/bc857fb9c965ad8f5c9e16df6d843d4f.jpg', 'ruta' => route('pedido.burgerking')],
                ['nombre' => 'Subway', 'desc' => 'Sándwiches personalizados y saludables.', 'img' => 'https://i.pinimg.com/originals/5c/8a/10/5c8a1053eb117a6828a71f62e486a799.jpg', 'ruta' => route('pedido.subway')],
                ['nombre' => 'Pizza Hut', 'desc' => 'Pizza con queso fundido y variedad de toppings.', 'img' => 'https://media-cldnry.s-nbcnews.com/image/upload/newscms/2018_25/1347057/pizza-hut-today-tease-180619.jpg', 'ruta' => route('pedido.pizzahut')],
                ['nombre' => 'Domino\'s Pizza', 'desc' => 'Entrega rápida de pizza caliente.', 'img' => 'https://i.pinimg.com/originals/75/8e/4e/758e4e397bb39985e7624b448c87d2fc.jpg', 'ruta' => route('pedido.dominos')],
                ['nombre' => 'Taco Bell', 'desc' => 'Comida rápida mexicana al estilo Tex-Mex.', 'img' => 'https://preview.redd.it/taco-bell-in-the-early-2000s-v0-181s6qtzjqi91.jpg?width=640&crop=smart&auto=webp&s=3a809d14a1ae85bde57aa67cb13412fa2b07d0b4', 'ruta' => route('pedido.tacobell')],
                ['nombre' => 'Popeyes', 'desc' => 'Especialidad en pollo frito estilo sureño.', 'img' => 'https://i.pinimg.com/736x/76/86/d2/7686d28e0289e7e0e78ea398b34fa2d1.jpg', 'ruta' => route('pedido.popeyes')],
                ['nombre' => 'Starbucks', 'desc' => 'Cafés especiales y bebidas frías o calientes.', 'img' => 'https://i.pinimg.com/736x/65/c0/c9/65c0c97e6f0d24ac0c8307de5d84414f.jpg', 'ruta' => route('pedido.starbucks')],
            ];
        @endphp

        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($comidas as $comida)
                <div class="col">
                    <div class="card h-100">
                        <img src="{{ $comida['img'] }}" class="card-img-top" alt="{{ $comida['nombre'] }}" style="height: 300px; object-fit: cover;">
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
