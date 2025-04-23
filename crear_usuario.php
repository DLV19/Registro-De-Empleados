<?php
require_once 'config.php';

//  datos del formulario
$email = $_POST['email'] ?? '';
$password = password_hash($_POST['password'] ?? '', PASSWORD_DEFAULT);  // ✔️ Aquí se hashea

// Validación 
if (empty($email) || empty($_POST['password'])) {
    echo json_encode(['success' => false, 'error' => 'Todos los campos son obligatorios']);
    exit;
}

// Comprobar si ya existe ese usuario
$stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    echo json_encode(['success' => false, 'error' => 'El correo ya está registrado']);
    exit;
}
$stmt->close();

// Insertar nuevo usuario con contraseña hasheada
$stmt = $conn->prepare("INSERT INTO usuarios (email, password) VALUES (?, ?)");
$stmt->bind_param("ss", $email, $password);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => 'Error al registrar el usuario']);
}

$stmt->close();
$conn->close();
