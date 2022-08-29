<?php include('functions.php');?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Modifier une entrée</title>
</head>
<body class="gap-3">
    <h4> Remplissez ce que vous souhaiter modifier:</h4>
    <form action="conditions.php" method="post" id="formModify" class="d-flex flex-column justify-content-between gap-2">
        <div class="d-flex justify-content-between align-items-center w-100">
            <label for="tacheToReplace">Type de tâche à remplacer</label>
            <select name="tacheToReplace" id="tacheToReplace" class="form-select w-50">
                <option value=""></option>
                <?php retrieveTache();?>
            </select>
        </div>
        <div class="d-flex justify-content-between align-items-center w-100">
            <label for="dateToReplace">Date à remplacer</label>
            <input type="date" name="dateToReplace" id="dateToReplace" class="form-control w-50">
        </div>
        <div class="d-flex justify-content-between align-items-center w-100">
            <label for="floorToReplace">Étage à remplacer</label>
            <input type="number" name="floorToReplace" id="floorToReplace" class="form-control w-50" min="0" max="10">
        </div>
        <input type="hidden" name="idHiddenToReplace" value="<?php echo $_POST['IDToSendForReplace']?>">
        <input type="submit" name="action" value="Modifier" class="btn btn-warning">
    </form>
    <a href="index.php" class="returnToIndex btn btn-outline-primary position-absolute">Retour à la liste des interventions</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="assets/js/app.js"></script>
</body>
</html>