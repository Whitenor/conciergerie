<?php
session_start();

function connect(){
    $db = new PDO('mysql:host=localhost;dbname=conciergerie;charset=utf8', 'root', '');
    return $db;
}
function login(){
    $str = connect()->prepare("SELECT login_user, password_user, nom FROM users WHERE login_user = ?");
    $str->execute(array(
        $_POST['username']));
    $comp = $str->fetch();
    if ($comp && password_verify($_POST['password'], $comp['password_user'])) {
        session_start();
        $_SESSION['username'] = $comp['nom'];
        header('Location: index.php');
    }else{
        echo "Invalid username or password";
    }
}