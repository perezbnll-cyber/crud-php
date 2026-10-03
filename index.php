<?php
include 'conexion.php';

// Eliminar producto si se recibe ID
if (isset($_GET['eliminar'])) {
    $id = $_GET['eliminar'];
    $stmt = $conexion->prepare("DELETE FROM productos WHERE id = ?");
    $stmt->execute([$id]);
    header("Location: index.php");
    exit();
}

// Consultar productos
$stmt = $conexion->query("SELECT * FROM productos ORDER BY id DESC");
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD PHP y MySQL - Portafolio</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f7f6; margin: 0; padding: 20px; }
        .container { max-width: 900px; margin: auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        h2 { color: #333; }
        .btn { display: inline-block; padding: 8px 15px; background: #28a745; color: white; text-decoration: none; border-radius: 4px; margin-bottom: 15px; }
        .btn-danger { background: #dc3545; padding: 5px 10px; }
        .btn-edit { background: #ffc107; color: black; padding: 5px 10px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background: #007bff; color: white; }
    </style>
</head>
<body>
<div class="container">
    <h2>Gestor de Productos (CRUD PHP & MySQL)</h2>
    <a href="crear.php" class="btn">+ Nuevo Producto</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($productos as $p): ?>
        <tr>
            <td><?= $p['id']; ?></td>
            <td><?= htmlspecialchars($p['nombre']); ?></td>
            <td><?= htmlspecialchars($p['descripcion']); ?></td>
            <td>$<?= number_format($p['precio'], 2); ?></td>
            <td><?= $p['stock']; ?></td>
            <td>
                <a href="editar.php?id=<?= $p['id']; ?>" class="btn btn-edit">Editar</a>
                <a href="index.php?eliminar=<?= $p['id']; ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este registro?');">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>