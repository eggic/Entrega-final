<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Pedidos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #aaa;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f3f3f3;
        }
        form {
            display: inline;
        }
    </style>
</head>
<body>

    <h1>📦 Gestión de Pedidos</h1>

    <?php
    // Ejemplo de pedidos (en Laravel, estos vendrían del controlador)
    $pedidos = [
        ['id' => 1, 'cliente' => 'Juan Pérez', 'estado' => 'pendiente'],
        ['id' => 2, 'cliente' => 'María López', 'estado' => 'cocinándose'],
        ['id' => 3, 'cliente' => 'Carlos Ruiz', 'estado' => 'empacándose'],
    ];
    ?>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Estado</th>
                <th>Cambiar Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pedidos as $pedido): ?>
                <tr>
                    <td><?= $pedido['id'] ?></td>
                    <td><?= $pedido['cliente'] ?></td>
                    <td><?= ucfirst($pedido['estado']) ?></td>
                    <td>
                        <form action="/admin/pedidos/<?= $pedido['id'] ?>/estado" method="POST">
                            <!-- Simula método PUT (si usas Laravel) -->
                            <input type="hidden" name="_method" value="POST">
                            <!-- En Laravel necesitas también csrf -->
                            <select name="estado">
                                <option <?= $pedido['estado'] === 'pendiente' ? 'selected' : '' ?>>pendiente</option>
                                <option <?= $pedido['estado'] === 'cocinándose' ? 'selected' : '' ?>>cocinándose</option>
                                <option <?= $pedido['estado'] === 'empacándose' ? 'selected' : '' ?>>empacándose</option>
                                <option <?= $pedido['estado'] === 'con el repartidor' ? 'selected' : '' ?>>con el repartidor</option>
                                <option <?= $pedido['estado'] === 'completado' ? 'selected' : '' ?>>completado</option>
                            </select>
                            <button type="submit">Actualizar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>
