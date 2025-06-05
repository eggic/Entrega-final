<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        return view('productos.create');
    }

    public function store(Request $request)
    {
        $tiposPermitidos = [
            'Pupusas', 'Hamburguesas', 'Pollo', 'HotDog', 'Pizza', 'Tacos', 'Sushi', 'China', 'Arepas', 'CafeHelado',
            'LicuadodeFresa', 'JugodeNaranja', 'Horchata', 'TeVerdeFrio', 'Smoothie', 'Soda', 'CafeEspresso', 'Malteadas',
            'Gelatina', 'Flan', 'Dona', 'Brownie', 'Tres Leches', 'Cheesecake', 'Roll de Canela', 'Cupcake', 'Arroz con Leche',
            "McDonald's", 'KFC', 'Burger King', 'Subway', 'Pizza Hut', "Domino's Pizza", 'Taco Bell', 'Popeyes', 'Starbucks'
        ];

        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'tipo' => 'required|in:' . implode(',', $tiposPermitidos),
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $rutaImagen = $request->file('imagen')->store('productos', 'public');

        Producto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'tipo' => $request->tipo,
            'imagen' => $rutaImagen,
        ]);

        return redirect()->route('productos.index')->with('success', 'Producto creado correctamente.');
    }

    public function pupusas()
    {
        $productos = Producto::where('tipo', 'Pupusas')->get();
        return view('productos.pupusas', compact('productos'));
    }

    public function hamburguesas()
    {
        $productos = Producto::where('tipo', 'Hamburguesas')->get();
        return view('productos.hamburguesas', compact('productos'));
    }

    public function pedido_comida()
    {
        $productos = Producto::all();
        return view('pedido_comida', compact('productos'));
    }

    public function edit(Producto $producto)
    {
        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, Producto $producto)
    {
        $tiposPermitidos = [
            'Pupusas', 'Hamburguesas', 'Pollo', 'HotDog', 'Pizza', 'Tacos', 'Sushi', 'China', 'Arepas', 'CafeHelado',
            'LicuadodeFresa', 'JugodeNaranja', 'Horchata', 'TeVerdeFrio', 'Smoothie', 'Soda', 'CafeEspresso', 'Malteadas',
            'Gelatina', 'Flan', 'Dona', 'Brownie', 'Tres Leches', 'Cheesecake', 'Roll de Canela', 'Cupcake', 'Arroz con Leche',
            "McDonald's", 'KFC', 'Burger King', 'Subway', 'Pizza Hut', "Domino's Pizza", 'Taco Bell', 'Popeyes', 'Starbucks'
        ];

        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'tipo' => 'required|in:' . implode(',', $tiposPermitidos),
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');

            if (!$file->isValid()) {
                return back()->withErrors(['imagen' => 'El archivo de imagen no es válido.']);
            }

            try {
                $rutaImagen = $file->store('productos', 'public');

                if ($producto->imagen && Storage::disk('public')->exists($producto->imagen)) {
                    Storage::disk('public')->delete($producto->imagen);
                }

                $producto->imagen = $rutaImagen;
            } catch (\Exception $e) {
                return back()->withErrors(['imagen' => 'Error inesperado al subir imagen: ' . $e->getMessage()]);
            }
        }

        $producto->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'tipo' => $request->tipo,
        ]);

        return redirect()->route('productos.index')->with('success', 'Producto actualizado con éxito.');
    }

    public function destroy(Producto $producto)
    {
        if ($producto->imagen && Storage::disk('public')->exists($producto->imagen)) {
            Storage::disk('public')->delete($producto->imagen);
        }

        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente.');
    }

    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }
}
