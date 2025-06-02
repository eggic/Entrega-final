@extends('layouts.app')

@section('content')
<div class="container">
    <h2>📦 Gestión de Pedidos</h2>

    @foreach ($pedidos as $pedido)
        <div class="card mb-3">
            <div class="card-header">
                Pedido #{{ $pedido->id }} - Estado: {{ $pedido->estado }}
            </div>
            <div class="card-body">
                <p><strong>Usuario ID:</strong> {{ $pedido->usuario_id }}</p>
                <p><strong>Fecha:</strong> {{ $pedido->fecha_pedido }}</p>
                <p><strong>Total:</strong> ${{ $pedido->total }}</p>

                @if($pedido->detalles && $pedido->detalles->count() > 0)
                    <h5>🧾 Detalles:</h5>
                    <ul>
                        @foreach ($pedido->detalles as $detalle)
                            <li>
                                {{ $detalle->producto_nombre ?? 'Producto eliminado' }} -
                                Cantidad: {{ $detalle->cantidad }} -
                                Precio: ${{ $detalle->precio }}
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-muted">Este pedido no tiene detalles.</p>
                @endif

                <!-- Cambiar estado -->
                <form action="{{ route('admin.pedidos.estado', $pedido->id) }}" method="POST" class="d-inline">
                    @csrf
                    <select name="estado" class="form-select d-inline w-auto">
                        <option value="pendiente" {{ $pedido->estado === 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                        <option value="preparación" {{ $pedido->estado === 'preparación' ? 'selected' : '' }}>En preparación</option>
                        <option value="entregado" {{ $pedido->estado === 'entregado' ? 'selected' : '' }}>Entregado</option>
                    </select>
                    <button type="submit" class="btn btn-primary btn-sm">Actualizar Estado</button>
                </form>

                <!-- Eliminar -->
                <form action="{{ route('admin.pedidos.eliminar', $pedido->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection
