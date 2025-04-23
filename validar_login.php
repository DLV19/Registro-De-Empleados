<?php
session_start();
include "config.php";

$email = $_POST['email'];
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$resultado = $stmt->get_result();

if ($usuario = $resultado->fetch_assoc()) {
    if (password_verify($password, $usuario['password'])) {
        $_SESSION['usuario'] = $usuario['email'];
        echo "ok";
    } else {
        echo "Contraseña incorrecta";
    }
} else {
    echo "Usuario no encontrado";
}

$stmt->close();
$conn->close();
?>
