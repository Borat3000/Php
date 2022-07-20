<?php 
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: authorization.html");
}
require_once 'DbConnection.php';
$post = $_POST;
try {
    $userData = signUp($post['login'], $post['password']);
    

    if($userData && password_verify($post['password'], $userData['pwd'])){
        $_SESSION['login'] = $post['login'];
        echo 'SUCCESS';
    } else {
        echo 'WRONG';
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

function signUp($login, $pwd){
    $connection = DbConnection::getInstance()->getConnection();
    $sql = "SELECT * FROM auth_test WHERE login = :login OR email = :login AND pwd = :pwd;";
    $params = [
        'login' => $login,
        'pwd' => $pwd
    ];
    $statement = $connection->prepare($sql);
    $statement->execute($params);
    return $statement->fetch(PDO::FETCH_DEFAULT);
}