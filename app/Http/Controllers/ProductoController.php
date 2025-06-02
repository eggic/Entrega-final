<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    // Mostrar todos los productos
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    // Mostrar el formulario para crear un nuevo producto
    public function create()
    {
        return view('productos.create');
    }

    // Almacenar un nuevo producto
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

        $request->validate([
    'nombre' => 'required|string',
    'descripcion' => 'required|string',
    'precio' => 'required|numeric',
    'stock' => 'required|integer',
    'tipo' => 'required|string',
    'imagen' => 'required|image',
]);


        // Guardar imagen en storage/app/public/productos
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

    // Mostrar productos filtrados por tipo "Pupusa"
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

    // Mostrar el formulario para editar un producto existente
    public function edit(Producto $producto)
    {
        return view('productos.edit', compact('producto'));
    }

    // Actualizar un producto existente
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

            if (!$rutaImagen) {
                return back()->withErrors(['imagen' => 'Falló al guardar la imagen.']);
            }

            // Borrar imagen anterior si existe
            if ($producto->imagen && Storage::disk('public')->exists($producto->imagen)) {
                Storage::disk('public')->delete($producto->imagen);
            }

            $producto->imagen = $rutaImagen;

        } catch (\Exception $e) {
            return back()->withErrors(['imagen' => 'Error inesperado al subir imagen: ' . $e->getMessage()]);
        }
    }

    $producto->nombre = $request->nombre;
    $producto->descripcion = $request->descripcion;
    $producto->precio = $request->precio;
    $producto->stock = $request->stock;
    $producto->tipo = $request->tipo;

    $producto->save();

    return redirect()->route('productos.index')->with('success', 'Producto actualizado con éxito.');
}


    // Eliminar un producto y su imagen
    public function destroy(Producto $producto)
    {
        if ($producto->imagen && Storage::disk('public')->exists($producto->imagen)) {
            Storage::disk('public')->delete($producto->imagen);
        }

        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente.');
    }

    // Mostrar detalle de un producto
    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }
}
