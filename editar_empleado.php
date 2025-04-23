<?php
require_once 'config.php';

$id = $_POST['id'] ?? '';
$nombre = $_POST['nombre'] ?? '';
$correo = $_POST['correo'] ?? '';
$puesto = $_POST['puesto'] ?? '';
$fecha = $_POST['fecha_ingreso'] ?? '';
$imagen = $_POST['imagen_actual'] ?? 'fotos/default.jpg';

if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === 0) {
    $nombreImagen = uniqid() . "_" . $_FILES['imagen']['name'];
    $rutaDestino = "fotos/" . $nombreImagen;
    move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaDestino);
    $imagen = $rutaDestino;
}

$stmt = $conn->prepare("UPDATE empleados SET nombre=?, correo=?, puesto=?, fecha_ingreso=?, imagen=? WHERE id=?");
$stmt->bind_param("sssssi", $nombre, $correo, $puesto, $fecha, $imagen, $id);

if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Empleado actualizado']);
} else {
    echo json_encode(['success' => false, 'error' => $stmt->error]);
}

$stmt->close();
$conn->close();
