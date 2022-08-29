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
<body>
    <h4> </h4>
    <form action="conditions.php" method="post" id="formModify">
        <div>
            <label for="tacheToReplace">Type de tâche à remplacer</label>
            <select name="tacheToReplace" id="tacheToReplace">
                <option value=""></option>
                <?php retrieveTache();?>
            </select>
        </div>
        <div>
            <label for="dateToReplace">Date à remplacer</label>
            <input type="date" name="dateToReplace" id="dateToReplace">
        </div>
        <div>
            <label for="floorToReplace">Étage à remplacer</label>
            <input type="number" name="floorToReplace" id="floorToReplace">
        </div>
        <input type="hidden" name="idHiddenToReplace" value="<?php echo $_POST['IDToSendForReplace']?>">
        <input type="submit" name="action" value="Modifier" class="btn btn-warning">
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="assets/js/app.js"></script>
</body>
</html>