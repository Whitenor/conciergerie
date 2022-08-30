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
        $str = connect()->prepare("SELECT interventions.ID_inter,taches.nom_tache,interventions.date_inter,interventions.etage,users.nom FROM interventions INNER JOIN users ON interventions.ID_user = users.ID_user INNER JOIN taches ON interventions.ID_tache = taches.ID_tache ORDER BY date_inter DESC;");
        $str->execute();
        $return = $str->fetchAll();
        for ($i=0; $i < count($return); $i++) {
            $index = strval($i);
            echo '<tr><td>'.$return[$index]['date_inter'].'</td><td>'.$return[$index]['nom_tache'].'</td><td>'.$return[$index]['etage'].'</td><td>'.$return[$index]['nom'].'</td><td><form action="modify.php" method="post"><input type="hidden" name="IDToSendForReplace" value="'.$return[$index]['ID_inter'].'"><input type="submit" name="action" value="Modifier" class="btn btn-secondary"></form></td><td><form action="conditions.php" method="post"><input type="hidden" name="IDToSendForDelete" value="'.$return[$index]['ID_inter'].'"><input type="submit" name="action" value="Supprimer" class="btn btn-danger"></form></td></tr>';
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
function retrieveCustom(){
    try {
        $_SESSION['controleMulti'] = 0;
        $query = "SELECT interventions.ID_inter,taches.nom_tache,interventions.date_inter,interventions.etage,users.nom FROM interventions INNER JOIN users ON interventions.ID_user = users.ID_user INNER JOIN taches ON interventions.ID_tache = taches.ID_tache WHERE ";
        if(($_POST['selectTacheIndex']!=""&&$_POST['dateSelectIndex']!="")||($_POST['selectTacheIndex']!=""&&$_POST['etageSelectIndex'])||($_POST['etageSelectIndex']!=""&&$_POST['dateSelectIndex'])){
            $_SESSION['controleMulti'] = 1;
        }
        if ($_POST['selectTacheIndex']!="") {
            $retourForPrep = $_POST['selectTacheIndex'];
            $query .= "taches.ID_tache = $retourForPrep";
        }
        if($_POST['dateSelectIndex']!=""){
            if ($_SESSION['controleMulti'] = 1 && $_POST['selectTacheIndex'] !="") {
                $query .= " AND ";
            }
            $query .= "interventions.date_inter = :test";
        }
        if ($_POST['etageSelectIndex']!="") {
            $retourForPrep = $_POST['etageSelectIndex'];
            if ($_SESSION['controleMulti'] = 1 && ($_POST['selectTacheIndex'] !=""||$_POST['dateSelectIndex']!="")) {
                $query .= " AND ";
            }
            $query .= "interventions.etage = $retourForPrep";
        }
            $query .= " ORDER BY interventions.date_inter DESC";
        $str = connect()->prepare($query);
        if($_POST['dateSelectIndex']!=""){
            $str->bindParam(':test', $_POST['dateSelectIndex']);
        }
        $str->execute();
        $return = $str->fetchAll();
        for ($i=0; $i < count($return); $i++) {
            $index = strval($i);
            echo '<tr><td>'.$return[$index]['date_inter'].'</td><td>'.$return[$index]['nom_tache'].'</td><td>'.$return[$index]['etage'].'</td><td>'.$return[$index]['nom'].'</td><td><form action="modify.php" method="post"><input type="hidden" name="IDToSendForReplace" value="'.$return[$index]['ID_inter'].'"><input type="submit" name="action" value="Modifier" class="btn btn-secondary"></form></td><td><form action="conditions.php" method="post"><input type="hidden" name="IDToSendForDelete" value="'.$return[$index]['ID_inter'].'"><input type="submit" name="action" value="Supprimer" class="btn btn-danger"></form></td></tr>';
        }
    } catch (PDOException $th) {
        echo $th;
    }
}
function updateCustom(){
    try {
        $_SESSION['controleMulti'] = 0;
        $query = "UPDATE interventions SET ";
        if ($_POST['tacheToReplace']!="") {
            $retourForPrep = $_POST['tacheToReplace'];
            $query .= "ID_tache = $retourForPrep";
            if ($_POST['dateToReplace']!="") {
                $query .= ', ';
            }
        }
        if($_POST['dateToReplace']!=""){
            $query .= "date_inter = :date";
            if ($_POST['floorToReplace']!="") {
                $query .= ', ';
            }
        }
        if ($_POST['floorToReplace']!="") {
            $retourForPrep = $_POST['floorToReplace'];
            $query .= "etage = $retourForPrep";
        }
        $query .= " WHERE ID_inter = :id_inter";
        $str = connect()->prepare($query);
        $str->bindParam(':id_inter', $_POST['idHiddenToReplace']);
        if($_POST['dateToReplace']!=""){
            $str->bindParam(':date', $_POST['dateToReplace']);
        }
        $str->debugDumpParams();
        $str->execute();
        header('Location: index.php');
    } catch (PDOException $th) {
        echo $th;
    }
}
function deleteEntry(){
    $query= connect()->prepare("DELETE FROM interventions WHERE id_inter=:idToDelete");
    $query->bindParam(':idToDelete', $_POST['IDToSendForDelete']);
    $query->execute();
    header('Location: index.php');
}

// ORDER BY date_inter DESC 