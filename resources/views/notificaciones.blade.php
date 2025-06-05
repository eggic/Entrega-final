@extends('layouts.app')
@section('content')

    <main class="container py-4">
        <div class="notifications-container">
            <h2>Notificaciones</h2>

            @if ($notifications->isEmpty())
                <p>No tienes notificaciones nuevas.</p>
            @else
                @foreach ($notifications as $notification)
                    <div class="notification">
                        <p><strong>Pedido #{{ $notification->order_id }}:</strong> {{ $notification->message }}</p>
                        <small>{{ $notification->created_at->format('h:i A, d/m/Y') }}</small>
                    </div>
                @endforeach
            @endif
        </div>
    </main>

    @auth
        </div>
    @endauth
@endsection

@push('styles')
<style>
    .notifications-container {
        max-width: 600px;
        margin: 30px auto;
        padding: 20px;
        background-color: #ec5ca8;
        border-radius: 10px;
        color: white;
        font-family: Arial, sans-serif;
    }

    .notifications-container h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    .notification {
        background: rgba(255, 255, 255, 0.15);
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 15px;
    }

    .notification p {
        margin: 0 0 5px 0;
        font-weight: 600;
    }

    .notification small {
        color: #ddd;
        font-size: 12px;
    }
</style>
@endpush
