<?php
header('Content-Type: application/json');

// Set your desired password here (change "wedding123" to your preferred password)
$correct_password = "AE753951$";

$data = json_decode(file_get_contents('php://input'), true);
$password = isset($data['password']) ? $data['password'] : '';

if ($password === $correct_password) {
    echo json_encode(['valid' => true]);
} else {
    echo json_encode(['valid' => false]);
}
?>