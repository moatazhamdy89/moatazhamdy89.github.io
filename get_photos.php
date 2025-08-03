<?php
header('Content-Type: application/json');

$photos = [];
$upload_dir = 'uploads/';

if (file_exists($upload_dir) {
    $files = scandir($upload_dir);
    
    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..') {
            $photos[] = [
                'name' => $file,
                'url' => $upload_dir . $file
            ];
        }
    }
}

echo json_encode($photos);
?>