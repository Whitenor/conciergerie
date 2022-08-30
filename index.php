<?php 
    include("functions.php");
    if(!isset($_SESSION['username'])){
        header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Conciergerie</title>
</head>
<body>
    <div class="mainIndex d-flex flex-column justify-content-center align-items-center gap-3 position-relative vh-100 vw-100">
        <div id="rowButton" class="d-flex justify-content-center align-items-center gap-3 position-absolute">
            <a href="logout.php" class="btn btn-outline-primary">Déconnexion</a>
            <a href="adding.php" class="btn btn-outline-primary">Ajouter une intervention</a>
        </div>
        <form action="index.php" method="post" id="formSearchInter" class="d-flex gap-2 form">
            <select name="selectTacheIndex" id="selectTacheIndex" class="form-select">
                <option value=""></option>
                <?php retrieveTache();?>
            </select>
            <input type="date" name="dateSelectIndex" id="dateSelectIndex" class="form-control">
            <input type="number" name="etageSelectIndex" id="etageSelectIndex" class="form-control" min="0" max="10"    >
            <input type="submit" name="action" value="Chercher" class="btn btn-primary">
        </form>
        <div id="tableauRetour">
            <table class="table mh-100 d-inline-block text-center">
                <thead class="table-secondary position-sticky top-0">
                    <tr>
                        <th>Date de l'intervention</th>
                        <th>Nom de l'intervention</th>
                        <th>Etage de l'intervention</th>
                        <th>Nom de l'intervenant</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if (isset($_POST['action'])&&$_POST['action']=="Chercher" && (!empty($_POST['selectTacheIndex'])||!empty($_POST['dateSelectIndex'])||!empty($_POST['etageSelectIndex']))){
                        retrieveCustom();
                    }else{
                        retrieve();
                    }?>
                </tbody>
            </table>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="assets/js/app.js"></script>
</body>
</html>
