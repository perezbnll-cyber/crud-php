<?php
include 'conexion.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: index.php");
    exit();
}

// Obtener datos actuales
$stmt = $conexion->prepare("SELECT * FROM productos WHERE id = ?");
$stmt->execute([$id]);
$producto = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];

    $stmt = $conexion->prepare("UPDATE productos SET nombre = ?, descripcion = ?, precio = ?, stock = ? WHERE id = ?");
    $stmt->execute([$nombre, $descripcion, $precio, $stock, $id]);
    
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f7f6; padding: 20px; }
        .container { max-width: 500px; margin: auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        input, textarea { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        .btn { background: #ffc107; color: black; border: none; padding: 10px 15px; cursor: pointer; border-radius: 4px; font-weight: bold; }
    </style>
</head>
<body>
<div class="container">
    <h2>Editar Producto</h2>
    <form method="POST">
        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?= htmlspecialchars($producto['nombre']); ?>" required>
        
        <label>Descripción:</label>
        <textarea name="descripcion"><?= htmlspecialchars($producto['descripcion']); ?></textarea>
        
        <label>Precio:</label>
        <input type="number" step="0.01" name="precio" value="<?= $producto['precio']; ?>" required>
        
        <label>Stock:</label>
        <input type="number" name="stock" value="<?= $producto['stock']; ?>" required>
        
        <button type="submit" class="btn">Actualizar Producto</button>
    </form>
    <br><a href="index.php">← Volver</a>
</div>
</body>
</html>