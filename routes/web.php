<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificacionController;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


// Página principal
Route::get('/', [HomeController::class, 'index'])->name('home');

// Crear usuario admin (solo para desarrollo)
Route::get('/crear-admin', function () {
    $admin = User::create([
        'name' => 'Administrador',
        'email' => 'admin@fastfood.com',
        'password' => Hash::make('admin123'),
        'rol' => 'admin'
    ]);
    return 'Usuario admin creado: ' . $admin->email;
});



// Productos (vista general y resource)
Route::get('/productos', function () {
    return view('productos.index');
})->name('productos.index');

Route::get('/productos/index1', function () {
    return view('productos.index1');
})->name('productos.index1');

Route::resource('productos', ProductoController::class);







// Notificaciones (protegidas por auth)
Route::middleware('auth')->group(function () {
    Route::get('/notificaciones', [NotificacionController::class, 'index'])->name('notificaciones');
});

// Autenticación
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rutas protegidas (auth)
Route::middleware('auth')->group(function () {
    // Carrito
    Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
    Route::post('/carrito/agregar', [CarritoController::class, 'agregar'])->name('carrito.agregar');
    Route::post('/carrito/confirmar', [CarritoController::class, 'confirmarPedido'])->name('carrito.confirmar');

    // Perfil
    Route::get('/perfil', fn () => 'Página de Perfil (temporal)')->name('perfil');
    Route::get('/perfil/editar', fn () => 'Editar Perfil (temporal)')->name('perfil.editar');

    // Recibo pedido
    Route::get('/pedido/recibo/{idPedido}', [CarritoController::class, 'generarRecibo'])->name('pedido.recibo');
});

// Pedidos generales (sin admin)
Route::prefix('pedido')->group(function () {
    Route::post('/realizar', [PedidoController::class, 'realizarPedido'])->name('pedido.realizar');
    Route::get('/finalizar', [PedidoController::class, 'finalizar'])->name('pedido.finalizar');
    Route::get('/pago', [PedidoController::class, 'pago'])->name('pedido.pago');
    Route::get('/ordenar', [PedidoController::class, 'ordenar'])->name('pedido.ordenar');
    Route::post('/store', [PedidoController::class, 'store'])->name('pedido.store');
    Route::get('/detalles', [PedidoController::class, 'detalles'])->name('pedido.detalles');

    // Categorías generales
    Route::get('/comida', [PedidoController::class, 'comida'])->name('pedido.comida');
    Route::get('/bebidas', [PedidoController::class, 'bebidas'])->name('pedido.bebidas');
    Route::get('/cadenas', [PedidoController::class, 'cadenas'])->name('pedido.cadenas');
    Route::get('/otros', [PedidoController::class, 'otros'])->name('pedido.otros');

    // Bebidas específicas
    Route::get('/cafehelado', [PedidoController::class, 'cafeHelado'])->name('pedido.cafehelado');
    Route::get('/licuadodefresa', [PedidoController::class, 'licuadoDeFresa'])->name('pedido.licuadodefresa');
    Route::get('/jugodenaranja', [PedidoController::class, 'jugodenaranja'])->name('pedido.jugodenaranja');
    Route::get('/horchata', [PedidoController::class, 'horchata'])->name('pedido.horchata');
    Route::get('/teverdefrio', [PedidoController::class, 'teVerde'])->name('pedido.teverdefrio');
    Route::get('/smoothie', [PedidoController::class, 'smoothie'])->name('pedido.smoothie');
    Route::get('/soda', [PedidoController::class, 'soda'])->name('pedido.soda');
    Route::get('/cafeexpresso', [PedidoController::class, 'cafeexpresso'])->name('pedido.cafeexpresso');
    Route::get('/malteada', [PedidoController::class, 'malteada'])->name('pedido.malteada');

    // Cadenas de comida rápida
    Route::get('/mcdonalds', [PedidoController::class, 'mcdonalds'])->name('pedido.mcdonalds');
    Route::get('/kfc', [PedidoController::class, 'kfc'])->name('pedido.kfc');
    Route::get('/burgerking', [PedidoController::class, 'burgerking'])->name('pedido.burgerking');
    Route::get('/subway', [PedidoController::class, 'subway'])->name('pedido.subway');
    Route::get('/pizzahut', [PedidoController::class, 'pizzahut'])->name('pedido.pizzahut');
    Route::get('/dominos', [PedidoController::class, 'dominos'])->name('pedido.dominos');
    Route::get('/tacobell', [PedidoController::class, 'tacobell'])->name('pedido.tacobell');
    Route::get('/popeyes', [PedidoController::class, 'popeyes'])->name('pedido.popeyes');
    Route::get('/starbucks', [PedidoController::class, 'starbucks'])->name('pedido.starbucks');

    // Postres
    Route::get('/gelatina', [PedidoController::class, 'gelatinas'])->name('pedido.gelatinas');
    Route::get('/flan', [PedidoController::class, 'flan'])->name('pedido.flan');
    Route::get('/donas', [PedidoController::class, 'donas'])->name('pedido.donas');
    Route::get('/brownies', [PedidoController::class, 'brownies'])->name('pedido.brownies');
    Route::get('/tresleches', [PedidoController::class, 'tresleches'])->name('pedido.tresleches');
    Route::get('/cheesecake', [PedidoController::class, 'cheesecake'])->name('pedido.cheesecake');
    Route::get('/roll', [PedidoController::class, 'roll'])->name('pedido.roll');
    Route::get('/cupcakes', [PedidoController::class, 'cupcakes'])->name('pedido.cupcakes');
    Route::get('/arroz', [PedidoController::class, 'arroz'])->name('pedido.arroz');
});

// Categorías específicas de comida (sin prefijo)
Route::get('/pupusas', [PedidoController::class, 'pupusas'])->name('pupusas');
Route::get('/hamburguesa', [PedidoController::class, 'hamburguesa'])->name('hamburguesas');
Route::get('/pollofrito', [PedidoController::class, 'pollofrito'])->name('pollofrito');
Route::get('/arepas', [PedidoController::class, 'arepas'])->name('arepas');
Route::get('/comidachina', [PedidoController::class, 'comidachina'])->name('comidachina');
Route::get('/hotdog', [PedidoController::class, 'hotdog'])->name('hotdog');
Route::get('/pizza', [PedidoController::class, 'pizza'])->name('pizza');
Route::get('/sushi', [PedidoController::class, 'sushi'])->name('sushi');
Route::get('/tacos', [PedidoController::class, 'tacos'])->name('tacos');
