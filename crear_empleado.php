<?php
require_once 'config.php';

$nombre = $_POST['nombre'] ?? '';
$correo = $_POST['correo'] ?? '';
$puesto = $_POST['puesto'] ?? '';
$fecha = $_POST['fecha_ingreso'] ?? '';
$imagen = 'fotos/default.jpg';

// Subir imagen
if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === 0) {
    $nombreImagen = uniqid() . "_" . $_FILES['imagen']['name'];
    $rutaDestino = "fotos/" . $nombreImagen;
    move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaDestino);
    $imagen = $rutaDestino;
}

$stmt = $conn->prepare("INSERT INTO empleados (nombre, correo, puesto, fecha_ingreso, imagen) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $nombre, $correo, $puesto, $fecha, $imagen);

if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Empleado registrado', 'id' => $stmt->insert_id, 'imagen' => $imagen]);
} else {
    echo json_encode(['success' => false, 'error' => $stmt->error]);
}

$stmt->close();
$conn->close();
