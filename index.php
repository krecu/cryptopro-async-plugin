<?php

define('UPLOAD_DIR', __DIR__ . '/uploads/');

$messages = [];

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $file = UPLOAD_DIR . basename($_FILES['file']['name']);

    if (move_uploaded_file($_FILES['file']['tmp_name'], $file)) {
        $messages[] = "Файл сохранен";
    } else {
        $messages[] = "Файл однако не сохранился";
    }

}

$uploadedFiles = glob(UPLOAD_DIR . '*.*', GLOB_BRACE);
$files = [];
foreach($uploadedFiles as $file) {

    $files[] = [
        'name'      => basename($file),
        'download'  => '/uploads/' . basename($file),
        'size'      => round(filesize($file) / (1024*1024), 3),
        'mime'      => mime_content_type($file),
        'path'      => $file,
    ];
}

include_once "./template.php";