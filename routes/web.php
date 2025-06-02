<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificacionController;
use App\Mail\PedidoConfirmadoMailable;
use Illuminate\Support\Facades\Mail;
use App\Models\Pedido;
//desde aui
use Illuminate\Support\Facades\Hash;
use App\Models\User;

Route::get('/crear-admin', function () {
    $admin = User::create([
        'name' => 'Administrador',
        'email' => 'admin@fastfood.com',
        'password' => Hash::make('admin123'),
        'rol' => 'admin'
    ]);

    return 'Usuario admin creado: ' . $admin->email;
});

//hasta aqui
Route::get('/pedido/recibo/{idPedido}', [CarritoController::class, 'generarRecibo'])->name('pedido.recibo');



// Página principal
Route::get('/', [HomeController::class, 'index'])->name('home');


// Rutas de autenticación
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rutas protegidas (requieren autenticación)
Route::middleware('auth')->group(function () {
    // Carrito
    Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
    Route::post('/carrito/agregar', [CarritoController::class, 'agregar'])->name('carrito.agregar');
    Route::post('/carrito/confirmar', [CarritoController::class, 'confirmarPedido'])->name('carrito.confirmar');


    // Perfil
    Route::get('/perfil', fn () => 'Página de Perfil (temporal)')->name('perfil');
    Route::get('/perfil/editar', fn () => 'Editar Perfil (temporal)')->name('perfil.editar');

    // Notificaciones
    Route::get('/notificaciones', [NotificacionController::class, 'index'])->name('notificaciones');
});


// ----------------------------------
// ADMINISTRADOR
// ----------------------------------
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/productos/crear', [ProductoController::class, 'create'])->name('admin.productos.create');
    Route::post('/admin/productos', [ProductoController::class, 'store'])->name('admin.productos.store');
});

// Gestión de pedidos por el administrador

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/pedidos', [PedidoController::class, 'indexAdmin'])->name('admin.pedidos.index');

    Route::post('/pedidos/{id}/estado', [PedidoController::class, 'cambiarEstado'])->name('admin.pedidos.estado');
    Route::delete('/pedidos/{id}', [PedidoController::class, 'eliminar'])->name('admin.pedidos.eliminar');
});



// Pedidos
Route::post('/pedido/realizar', [PedidoController::class, 'realizarPedido'])->name('pedido.realizar');
Route::get('/pedido/finalizar', [PedidoController::class, 'finalizar'])->name('pedido.finalizar');
Route::get('/pedido/pago', [PedidoController::class, 'pago'])->name('pedido.pago');
Route::get('/pedido/ordenar', [PedidoController::class, 'ordenar'])->name('pedido.ordenar');
Route::post('/pedido/store', [PedidoController::class, 'store'])->name('pedido.store');
Route::get('/pedido/detalles', [PedidoController::class, 'detalles'])->name('pedido.detalles');

// Categorías generales de pedido
Route::get('/pedido/comida', [PedidoController::class, 'comida'])->name('pedido.comida');
Route::get('/pedido/bebidas', [PedidoController::class, 'bebidas'])->name('pedido.bebidas');
Route::get('/pedido/cadenas', [PedidoController::class, 'cadenas'])->name('pedido.cadenas');
Route::get('/pedido/otros', [PedidoController::class, 'otros'])->name('pedido.otros');

// Productos específicos
Route::get('/productos/pupusas', [ProductoController::class, 'pupusas'])->name('productos.pupusas');
Route::get('/hamburguesas', [ProductoController::class, 'hamburguesas'])->name('hamburguesas');
Route::get('/pedido-pupusas', [ProductoController::class, 'pedidoPupusas'])->name('productos.pedido_pupusas');

// CRUD Productos
Route::resource('productos', ProductoController::class);



// Categorías específicas de comida
Route::get('/pupusas', [PedidoController::class, 'pupusas'])->name('pupusas');
Route::get('/hamburguesa', [PedidoController::class, 'hamburguesa'])->name('hamburguesas');
Route::get('/pollofrito', [PedidoController::class, 'pollofrito'])->name('pollofrito');
Route::get('/arepas', [PedidoController::class, 'arepas'])->name('arepas');
Route::get('/comidachina', [PedidoController::class, 'comidachina'])->name('comidachina');
Route::get('/hotdog', [PedidoController::class, 'hotdog'])->name('hotdog');
Route::get('/pizza', [PedidoController::class, 'pizza'])->name('pizza');
Route::get('/sushi', [PedidoController::class, 'sushi'])->name('sushi');
Route::get('/tacos', [PedidoController::class, 'tacos'])->name('tacos');

// Bebidas
Route::prefix('pedido')->group(function () {
    Route::get('/cafehelado', [PedidoController::class, 'cafeHelado'])->name('pedido.cafehelado');
    Route::get('/licuadodefresa', [PedidoController::class, 'licuadoDeFresa'])->name('pedido.licuadodefresa');
    Route::get('/jugodenaranja', [PedidoController::class, 'jugoNaranja'])->name('pedido.jugodenaranja');
    Route::get('/horchata', [PedidoController::class, 'horchata'])->name('pedido.horchata');
    Route::get('/teverdefrio', [PedidoController::class, 'teVerde'])->name('pedido.teverdefrio');
    Route::get('/smoothie', [PedidoController::class, 'smoothie'])->name('pedido.smoothie');
    Route::get('/soda', [PedidoController::class, 'soda'])->name('pedido.soda');
    Route::get('/cafeexpresso', [PedidoController::class, 'cafeexpresso'])->name('pedido.cafeexpresso');
    Route::get('/malteada', [PedidoController::class, 'malteada'])->name('pedido.malteada');
});

// Cadenas de comida rápida
Route::prefix('pedido')->group(function () {
    Route::get('/mcdonalds', [PedidoController::class, 'mcdonalds'])->name('pedido.mcdonalds');
    Route::get('/kfc', [PedidoController::class, 'kfc'])->name('pedido.kfc');
    Route::get('/burgerking', [PedidoController::class, 'burgerking'])->name('pedido.burgerking');
    Route::get('/subway', [PedidoController::class, 'subway'])->name('pedido.subway');
    Route::get('/pizzahut', [PedidoController::class, 'pizzahut'])->name('pedido.pizzahut');
    Route::get('/dominos', [PedidoController::class, 'dominos'])->name('pedido.dominos');
    Route::get('/tacobell', [PedidoController::class, 'tacobell'])->name('pedido.tacobell');
    Route::get('/popeyes', [PedidoController::class, 'popeyes'])->name('pedido.popeyes');
    Route::get('/starbucks', [PedidoController::class, 'starbucks'])->name('pedido.starbucks');
});

// Postres
Route::prefix('pedido')->group(function () {
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
