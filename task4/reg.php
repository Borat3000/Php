<?php

const REG = 'registration-list.txt';

$post = $_POST;

$login = $post['login'];
$password = $post['password'];
$reg_list = file(REG, FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);


foreach($reg_list as $string){
    $db_login = explode(':',$string);
    if($_POST['login'] === $db_login[0]){
    echo "Пользователь с таким логином:$db_login[0] уже существует";
    exit();
    }
}
if (file_put_contents(REG, $login . ':' . $password . PHP_EOL, LOCK_EX | FILE_APPEND) !== false){
    echo 'Данные записаны';
    } else {
    echo 'Данные не были записаны';
    }






