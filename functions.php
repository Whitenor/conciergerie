<?php
session_start();

function connect(){
    $db = new PDO('mysql:host=localhost;dbname=conciergerie;charset=utf8', 'root', '');
    return $db;
}
function login(){
    try {
    $str = connect()->prepare("SELECT * FROM users WHERE login_user = ?");
    $str->execute(array(
        $_POST['username']));
    $comp = $str->fetch();
    if ($comp && password_verify($_POST['password'], $comp['password_user'])) {
        session_start();
        $_SESSION['username'] = $comp['nom'];
        $_SESSION['id_user'] = $comp['ID_user'];
        header('Location: index.php');
    }else{
        echo "Invalid username or password";
    }
    } catch (PDOException $th) {
        echo $th;
    }
    
}
function adding(){
    try {
        $str = connect()->prepare("INSERT INTO interventions (type_inter, date_inter, etage, id_user) VALUES(?, ?, ?, ?)");
    $str->execute(array(
        $_POST['type_inter'],
        $_POST['date_inter'],
        $_POST['etage_inter'],
        $_SESSION['id_user']));
    $str->debugDumpParams();
    } catch (PDOException $th) {
        echo $th;
    }
}
function retrieve(){
    
}