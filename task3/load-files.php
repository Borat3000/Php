<?php 

$files = $_FILES;

if( isset($files['pictures']['name'])) {
    $total_files = count($_FILES['pictures']['name']);
} else {
    header("Location: files.php");
}

function checkType($type) {
    if( in_array($type, array('image/jpg', 'image/jpeg', 'image/png'))) {
        return true;
    } else {
        return false;
    }
}

function checkSize($size) {
    $maxFileSize = 3 * 1024 * 1024; 
    if ($size < $maxFileSize){
        return true;
    } else {
        return false;
    }
}

function checkError($error) {
    if ($error === 0) {
        return true;
    } else {
        return false;
    }
}

for($key = 0; $key < $total_files; $key++) {

    $type = $files['pictures']['type'][$key];
    $size = $files['pictures']['size'][$key];
    $error = $files['pictures']['error'][$key];

    $tmp_name = $files['pictures']['tmp_name'][$key];
    $file_name = $files['pictures']['name'][$key];
    $file_name = microtime() . $file_name;

    if (checkType($type) &&
        checkSize($size) && 
        checkError($error)) {
            if (move_uploaded_file($tmp_name, "image/$file_name")){
                echo "$file_name успешно загружен";
            } else {
                echo "$file_name не был загружен";
            }
    } elseif (!checkType($type)) {
        echo "$file_name Неподдерживаемый тип файла. Файл не был загружен";
    } elseif (!checkSize($size)) {
        echo "Превышен размер файла $file_name. Файл не был загружен";
    } else {
        echo "$file_name не был загружен из-за ошибки сервера";
    }
}