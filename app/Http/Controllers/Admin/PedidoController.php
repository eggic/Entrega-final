<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReciboPedidoMailable;
use App\Models\Pedido;
use App\Models\Producto;

class PedidoController extends Controller
{
    // Solo admins pueden acceder a esta vista
    public function indexAdmin()
    {
        if (auth()->user()->rol !== 'admin') {
            abort(403, 'Acceso no autorizado');
        }

        $pedidos = Pedido::with('detalles')->orderBy('created_at', 'desc')->get();
        return view('admin.pedidos.index', compact('pedidos'));
    }

    // Cambiar estado de pedido
    public function cambiarEstado(Request $request, $id)
    {
        $request->validate([
            'estado' => 'required|string',
        ]);

        $pedido = Pedido::findOrFail($id);
        $pedido->estado = $request->input('estado');
        $pedido->save();

        return redirect()->back()->with('success', 'Estado actualizado correctamente.');
    }

    // Eliminar pedido
    public function eliminar($id)
    {
        $pedido = Pedido::findOrFail($id);
        $pedido->delete();

        return redirect()->back()->with('success', 'Pedido eliminado correctamente.');
    }

    // Guardar pedido en sesión antes de finalizar (ejemplo básico)
    public function store(Request $request)
    {
        $request->validate([
            'productos' => 'required|array|min:1',
        ]);

        session(['pedido' => $request->all()]);

        return redirect()->route('pedido.finalizar');
    }

    // Vista para finalizar pedido
    public function finalizar()
    {
        return view('finalizar_pedido');
    }

    // Vista de orden general
    public function ordenar()
    {
        return view('orden');
    }

    // Enviar correo con recibo del pedido
    public function enviarRecibo($idPedido)
    {
        $pedido = Pedido::find($idPedido);

        if (!$pedido) {
            return response("Pedido no encontrado.", 404);
        }

        // Aquí deberías reemplazar 'cliente@example.com' por el email real del cliente
        Mail::to('cliente@example.com')->send(new ReciboPedidoMailable($pedido));

        return "Recibo enviado correctamente.";
    }

    // Métodos para categorías de productos usando helper privado para evitar repetición
    public function pupusas()       { return $this->productoPorTipo('Pupusas', 'productos.pupusas'); }
    public function hamburguesa()   { return $this->productoPorTipo('Hamburguesas', 'productos.hamburguesas'); }
    public function pollofrito()    { return $this->productoPorTipo('Pollo', 'productos.pollofrito'); }
    public function hotdog()        { return $this->productoPorTipo('HotDog', 'productos.hotdog'); }
    public function pizza()         { return $this->productoPorTipo('Pizza', 'productos.pizza'); }
    public function tacos()         { return $this->productoPorTipo('Tacos', 'productos.tacos'); }
    public function sushi()         { return $this->productoPorTipo('Sushi', 'productos.sushi'); }
    public function comidachina()   { return $this->productoPorTipo('China', 'productos.comidachina'); }
    public function arepas()        { return $this->productoPorTipo('Arepas', 'productos.arepas'); }

    public function bebidas()
    {
        return view('pedido_bebida');
    }

    public function cafeHelado()      { return $this->productoPorTipo('CafeHelado', 'productos.cafehelado'); }
    public function licuadoDeFresa()  { return $this->productoPorTipo('LicuadodeFresa', 'productos.licuadodefresa'); }
    public function jugodenaranja()   { return $this->productoPorTipo('JugodeNaranja', 'productos.jugodenaranja'); }
    public function horchata()        { return $this->productoPorTipo('Horchata', 'productos.horchata'); }
    public function teVerde()         { return $this->productoPorTipo('TeVerdeFrio', 'productos.teverdefrio'); }
    public function smoothie()        { return $this->productoPorTipo('Smoothie', 'productos.smoothie'); }
    public function soda()            { return $this->productoPorTipo('Soda', 'productos.soda'); }
    public function cafeexpresso()    { return $this->productoPorTipo('CafeEspresso', 'productos.cafeexpresso'); }
    public function malteada()        { return $this->productoPorTipo('Malteadas', 'productos.malteada'); }

    public function cadenas()
    {
        return view('pedido_cadenas');
    }

    public function mcdonalds()    { return $this->productoPorTipo("McDonald's", 'productos.mcdonalds'); }
    public function kfc()          { return $this->productoPorTipo('KFC', 'productos.kfc'); }
    public function burgerking()   { return $this->productoPorTipo('Burger King', 'productos.burgerking'); }
    public function subway()       { return $this->productoPorTipo('Subway', 'productos.subway'); }
    public function pizzahut()     { return $this->productoPorTipo('Pizza Hut', 'productos.pizzahut'); }
    public function dominos()      { return $this->productoPorTipo("Domino's Pizza", 'productos.dominos'); }
    public function tacobell()     { return $this->productoPorTipo('Taco Bell', 'productos.tacobell'); }
    public function popeyes()      { return $this->productoPorTipo('Popeyes', 'productos.popeyes'); }
    public function starbucks()    { return $this->productoPorTipo('Starbucks', 'productos.starbucks'); }

    public function otros()
    {
        return view('pedido_otros');
    }

    public function gelatinas()     { return $this->productoPorTipo('Gelatina', 'productos.gelatina'); }
    public function flan()          { return $this->productoPorTipo('Flan', 'productos.flan'); }
    public function donas()         { return $this->productoPorTipo('Dona', 'productos.dona'); }
    public function brownies()      { return $this->productoPorTipo('Brownie', 'productos.brownies'); }
    public function tresleches()    { return $this->productoPorTipo('Tres Leches', 'productos.tresleches'); }
    public function cheesecake()    { return $this->productoPorTipo('Cheesecake', 'productos.cheesecake'); }
    public function roll()          { return $this->productoPorTipo('Roll de Canela', 'productos.roll'); }
    public function cupcakes()      { return $this->productoPorTipo('Cupcake', 'productos.cupcake'); }
    public function arroz()         { return $this->productoPorTipo('Arroz con Leche', 'productos.arrozleche'); }

    // Método privado para evitar repetir código en las categorías
    private function productoPorTipo(string $tipo, string $vista)
    {
        $productos = Producto::where('tipo', $tipo)->get();
        return view($vista, compact('productos'));
    }
}
