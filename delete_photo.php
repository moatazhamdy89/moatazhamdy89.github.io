<?php
header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);
$filename = isset($data['filename']) ? $data['filename'] : '';

if (file_exists('uploads/' . $filename)) {
    if (unlink('uploads/' . $filename)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['error' => 'Could not delete file']);
    }
} else {
    echo json_encode(['error' => 'File not found']);
}
?>