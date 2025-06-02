@extends('layouts.app')

@section('content')
<div class="container py-5">

    {{-- Cierre de sesión arriba a la derecha --}}
    <div class="d-flex justify-content-end mb-3">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn">
                🚪 Cerrar sesión
            </button>
        </form>
    </div>

    {{-- Encabezado centrado --}}
    <h2 class="text-center text-primary fw-bold mb-4">
        👑 Bienvenido, {{ Auth::user()->name }} 
    </h2>

    {{-- Panel de botones --}}
    <div class="row justify-content-center mb-4 text-center">
        <div class="col-md-4 mb-3">
            <a href="{{ route('admin.productos.create') }}" class="btn btn-outline-primary w-100 py-3 shadow">
                ➕ Agregar Producto
            </a>
        </div>
        <div class="col-md-4 mb-3">
            <a href="{{ route('admin.pedidos.index') }}" class="btn btn-outline-secondary w-100 py-3 shadow">
                📦 Gestionar Pedidos
            </a>
        </div>
        <div class="col-md-4 mb-3">
            <a href="#" class="btn btn-outline-success w-100 py-3 shadow">
                📊 Ver Reportes
            </a>
        </div>
    </div>

    {{-- Mensaje inferior --}}
    <p class="text-muted text-center">
        Desde aquí puedes administrar productos, pedidos y revisar estadísticas del sistema.
    </p>

</div>
@endsection

