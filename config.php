<?php
$host = "trolley.proxy.rlwy.net";  // Host de Railway
$port = 36683;                         // Puerto de Railway 
$user = "root";                        // Railway usa root como usuario
$password = "WEmFdjncYSxNygEoDHxtwFjuTRFkIXSz";
$dbname = "railway";                  // siempre se llaman Railway

// Conexión con puerto incluido
$conn = new mysqli($host, $user, $password, $dbname, $port);

// Verificación de conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Opcional: para UTF-8
$conn->set_charset("utf8mb4");
?>
