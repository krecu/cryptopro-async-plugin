<?php

define('UPLOAD_DIR', __DIR__ . '/uploads/');

// если у нас POST то это наверное сохранение
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $fileName = 'pkcs7-'.basename($_POST['file']);
    $filePath = UPLOAD_DIR . $fileName;

    // сохраняем файл с подписью
    $f = fopen($filePath, 'w+');
    fwrite($f, base64_decode($_POST['data']));
    fclose($f);

    print '/uploads/' . $fileName;
    exit;

}

// иначе это наверное получение
elseif ($_SERVER['REQUEST_METHOD'] == "GET") {

    // запрашиваем файл в base64
    $content = file_get_contents(__DIR__ . $_GET['file']);
    print base64_encode($content);
    exit;

}