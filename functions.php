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
    header('Location: adding.php');
    } catch (PDOException $th) {
        echo $th;
    }
}
function retrieve(){
    try {
        $str = connect()->prepare("SELECT interventions.type_inter,interventions.date_inter,interventions.etage,users.nom FROM interventions INNER JOIN users ON interventions.ID_user = users.ID_user");
        $str->execute();
        $test = $str->fetchAll();
        for ($i=0; $i < count($test); $i++) {
            $index = strval($i);
            echo '<p>'.$test[$index]['type_inter'].', réalisé le '.$test[$index]['date_inter']." à l'étage ".$test[$index]['etage']." par Mr ".$test[$index]['nom'];
        }
    } catch (PDOException $th) {
        echo $th;
    }
}