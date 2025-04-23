<?php
require_once 'config.php';

$data = json_decode(file_get_contents("php://input"), true);
$id = $data['id'] ?? 0;

$stmt = $conn->prepare("DELETE FROM empleados WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => $stmt->error]);
}

$stmt->close();
$conn->close();
