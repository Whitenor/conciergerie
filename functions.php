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
        $str = connect()->prepare("INSERT INTO interventions (ID_tache, date_inter, etage, id_user) VALUES(?, ?, ?, ?)");
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
        $str = connect()->prepare("SELECT taches.nom_tache,interventions.date_inter,interventions.etage,users.nom FROM interventions INNER JOIN users ON interventions.ID_user = users.ID_user INNER JOIN taches ON interventions.ID_tache = taches.ID_tache;");
        $str->execute();
        $return = $str->fetchAll();
        for ($i=0; $i < count($return); $i++) {
            $index = strval($i);
            echo '<p>'.$return[$index]['nom_tache'].', réalisé le '.$return[$index]['date_inter']." à l'étage ".$return[$index]['etage']." par Mr ".$return[$index]['nom'];
        }
    } catch (PDOException $th) {
        echo $th;
    }
}
function addingType(){
    try {
        $str = connect()->prepare("INSERT INTO taches (nom_tache) VALUES(?)");
        $str->execute(array(
            $_POST['type_inter_to_add']));
        header('Location: adding.php');
    } catch (PDOException $th) {
        echo $th;
    }
}
function retrieveTache(){
    try {
        $str = connect()->prepare("SELECT * FROM taches");
        $str -> execute();
        $return= $str->fetchAll();
        for ($i=0; $i < count($return) ; $i++) {
            $index = strval($i);
            echo '<option value="'.$return[$index]['ID_tache'].'">'.$return[$index]['nom_tache'].'</option>';
        }
    } catch (PDOException $th) {
            echo $th;
    }
}