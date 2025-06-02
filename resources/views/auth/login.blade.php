<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f7b6d2;
        }
        .logo {
            display: block;
            margin: 0 auto 20px auto;
            max-width: 200px;
        }
        .card-header {
            background-color: #ec5ca8; /* rosa fuerte */
            color: white;
            font-weight: bold;
            text-align: center;
        }
        .btn-pink {
            background-color: #ec5ca8;
            color: white;
        }
        .btn-pink:hover {
            background-color: #d94e96;
            color: white;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <!-- Logo centrado -->
            <img src="{{ asset('img/logo.png') }}" alt="Logo" class="logo">

            <div class="card shadow-sm">
                <div class="card-header">
                    <h4 class="mb-0">Iniciar Sesión</h4>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Contraseña</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-pink">Entrar</button>
                        <a href="{{ route('register.form') }}" class="btn btn-link">¿No tienes cuenta?</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
