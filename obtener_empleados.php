<?php
require_once 'config.php';

$result = $conn->query("SELECT * FROM empleados ORDER BY id DESC");

$empleados = [];
while ($row = $result->fetch_assoc()) {
    $empleados[] = $row;
}

echo json_encode($empleados);
$conn->close();
