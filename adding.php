<?php 
include("conditions.php")
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
    <title>Ajout d'une intervention</title>
</head>
<body class="bodyAdd">
    <form action="conditions.php" method="POST" id="formAddIntervention" class="d-flex flex-column gap-2">
        <div class="d-flex w-100">
            <label for="type_inter" class="form-label">Type d'intervention:</label>
            <select name="type_inter" id="selectTypeInter" class="form-select">
                <?php retrieveTache();?>
            </select>
        </div>
        <div class="d-flex w-100">
            <label for="date_inter" class="form-label">Date de l'intervention:</label>
            <input type="date" name="date_inter" id="date_inter" class="form-control">
        </div>
        <div class="d-flex w-100">
            <label for="etage_inter" class="form-label">Étage de l'intervention:</label>
            <input type="number" name="etage_inter" id="etage_inter" class="form-control" min="0" max="10">
        </div>
        <button type="submit" name="action" value="addingInter" class="btn btn-primary">Ajouter l'intervention</button>
    </form>
    <form action="conditions.php" method="POST" id="formAddTypeInter" class="d-flex flex-column gap-2">
        <h4>Ajout de type d'intervention</h4>
        <div class="d-flex w-100">
            <label for="type_inter_to_add" class="form-label">Type d'intervention:</label>
            <input type="text" name="type_inter_to_add" id="type_inter_to_add" class="form-control">
        </div>
        <button type="submit" name="action" value="addingType" class="btn btn-secondary">Ajouter le type d'intervention</button>
    </form>
    <a href="index.php" class="returnToIndex btn btn-outline-primary position-absolute">Retour à la liste des interventions</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="assets/js/app.js"></script>
</body>
</html>