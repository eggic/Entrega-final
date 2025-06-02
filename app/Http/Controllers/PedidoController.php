<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReciboMail;
use App\Mail\ReciboPedidoMailable;
use App\Models\Pedido;
use App\Models\Producto;




class PedidoController extends Controller
{



public function indexAdmin()
{
    // Solo admins pueden ver esta vista
    if (auth()->user()->rol !== 'admin') {
        abort(403, 'Acceso no autorizado');
    }

    $pedidos = Pedido::with('detalles')->orderBy('created_at', 'desc')->get();
    return view('admin.pedidos.index', compact('pedidos'));
}







public function index()
    {
        $pedidos = Pedido::with('detalles')->get(); // Obtiene todos los pedidos con sus detalles
        return view('admin.pedidos.index', compact('pedidos'));
    }

    public function cambiarEstado(Request $request, $id)
    {
        $pedido = Pedido::findOrFail($id);
        $pedido->estado = $request->input('estado');
        $pedido->save();

        return redirect()->back()->with('success', 'Estado actualizado');
    }

    public function eliminar($id)
    {
        $pedido = Pedido::findOrFail($id);
        $pedido->delete();

        return redirect()->back()->with('success', 'Pedido eliminado');
    }


    public function realizarPedido(Request $request)
    {
        // lógica para procesar pedido
    }

    public function ordenar()
    {
        return view('orden');
    }

    public function store(Request $request)
    {
        $request->validate([
            'productos' => 'required|array|min:1',
        ]);

        session(['pedido' => $request->all()]);

        return redirect()->route('pedido.finalizar');
    }

    public function showPedidoComida()
    {
        $productos = Producto::all();
        return view('pedido_comida', compact('productos'));
    }

    public function finalizar()
    {
        return view('finalizar_pedido');
    }

    public function comida()
    {
        return view('pedido_comida');
    }

    public function enviarRecibo($idPedido)
{
    $pedido = Pedido::find($idPedido);

    if (!$pedido) {
        return "Pedido no encontrado.";
    }

    Mail::to('cliente@example.com')->send(new ReciboPedidoMailable($pedido));

    return "Recibo enviado.";
}

    public function pupusas() { return $this->productoPorTipo('Pupusas', 'productos.pupusas'); }
    public function hamburguesa() { return $this->productoPorTipo('Hamburguesas', 'productos.hamburguesas'); }
    public function pollofrito() { return $this->productoPorTipo('Pollo', 'productos.pollofrito'); }
    public function hotdog() { return $this->productoPorTipo('Hot Dog', 'productos.hotdog'); }
    public function pizza() { return $this->productoPorTipo('Pizza', 'productos.pizza'); }
    public function tacos() { return $this->productoPorTipo('Tacos', 'productos.tacos'); }
    public function sushi() { return $this->productoPorTipo('Sushi', 'productos.sushi'); }
    public function comidachina() { return $this->productoPorTipo('Comida China', 'productos.comidachina'); }
    public function arepas() { return $this->productoPorTipo('Arepas', 'productos.arepas'); }

    public function bebidas()
    {
        return view('pedido_bebida');
    }

    public function cafeHelado() { return $this->productoPorTipo('Cafe Helado', 'productos.cafehelado'); }
    public function licuadoDeFresa() { return $this->productoPorTipo('Licuado de fresa', 'productos.licuadodefresa'); }
    public function jugoNaranja() { return $this->productoPorTipo('Jugo de naranja', 'productos.jugodenaranja'); }
    public function horchata() { return $this->productoPorTipo('Horchata', 'productos.horchata'); }
    public function teVerde() { return $this->productoPorTipo('Té Verde Frío', 'productos.teverdefrio'); }
    public function smoothie() { return $this->productoPorTipo('Smoothie Tropical', 'productos.smoothie'); }
    public function soda() { return $this->productoPorTipo('Soda de Uva', 'productos.soda'); }
    public function cafeexpresso() { return $this->productoPorTipo('Café Espresso', 'productos.cafeexpresso'); }
    public function malteada() { return $this->productoPorTipo('Malteada de Chocolate', 'productos.malteada'); }

    public function cadenas() { return view('pedido_cadenas'); }
    public function mcdonalds() { return $this->productoPorTipo("McDonald's", 'productos.mcdonalds'); }
    public function kfc() { return $this->productoPorTipo('KFC', 'productos.kfc'); }
    public function burgerking() { return $this->productoPorTipo('Burger King', 'productos.burgerking'); }
    public function subway() { return $this->productoPorTipo('Subway', 'productos.subway'); }
    public function pizzahut() { return $this->productoPorTipo('Pizza Hut', 'productos.pizzahut'); }
    public function dominos() { return $this->productoPorTipo("Domino's Pizza", 'productos.dominos'); }
    public function tacobell() { return $this->productoPorTipo('Taco Bell', 'productos.tacobell'); }
    public function popeyes() { return $this->productoPorTipo('Popeyes', 'productos.popeyes'); }
    public function starbucks() { return $this->productoPorTipo('Starbucks', 'productos.starbucks'); }

    public function otros() { return view('pedido_otros'); }
    public function gelatinas() { return $this->productoPorTipo('Gelatina', 'productos.gelatina'); }
    public function flan() { return $this->productoPorTipo('Flan', 'productos.flan'); }
    public function donas() { return $this->productoPorTipo('Dona', 'productos.dona'); }
    public function brownies() { return $this->productoPorTipo('Brownie', 'productos.brownies'); }
    public function tresleches() { return $this->productoPorTipo('Tres Leches', 'productos.tresleches'); }
    public function cheesecake() { return $this->productoPorTipo('Cheesecake', 'productos.cheesecake'); }
    public function roll() { return $this->productoPorTipo('Roll de Canela', 'productos.roll'); }
    public function cupcakes() { return $this->productoPorTipo('Cupcake', 'productos.cupcake'); }
    public function arroz() { return $this->productoPorTipo('Arroz con Leche', 'productos.arrozleche'); }

    private function productoPorTipo($tipo, $vista)
    {
        $productos = Producto::where('tipo', $tipo)->get();
        return view($vista, compact('productos'));
    }
}
