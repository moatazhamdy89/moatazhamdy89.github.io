<?php
header('Content-Type: application/json');

// Create an "uploads" directory if it doesn't exist
if (!file_exists('uploads')) {
    mkdir('uploads', 0777, true);
}

$response = [];
$uploaded_files = [];

foreach ($_FILES['photos']['name'] as $key => $name) {
    if ($_FILES['photos']['error'][$key] === UPLOAD_ERR_OK) {
        $tmp_name = $_FILES['photos']['tmp_name'][$key];
        $new_name = uniqid() . '_' . basename($name);
        $destination = 'uploads/' . $new_name;
        
        if (move_uploaded_file($tmp_name, $destination)) {
            $uploaded_files[] = [
                'name' => $new_name,
                'url' => 'uploads/' . $new_name
            ];
        }
    }
}

if (!empty($uploaded_files)) {
    $response['success'] = true;
    $response['files'] = $uploaded_files;
} else {
    $response['error'] = 'No files were uploaded or there was an error';
}

echo json_encode($response);
?>