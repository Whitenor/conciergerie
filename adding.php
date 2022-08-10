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
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Document</title>
</head>
<body>
    <form action="conditions.php" method="POST">
        <div>
            <label for="type_inter">Type d'intervention:</label>
            <input type="text" name="type_inter" id="type_inter">
        </div>
        <div>
            <label for="date_inter">Date de l'intervention:</label>
            <input type="date" name="date_inter" id="date_inter">
        </div>
        <div>
            <label for="etage_inter">Étage de l'intervention:</label>
            <input type="number" name="etage_inter" id="etage_inter">
        </div>
        <button type="submit" name="action" value="adding">Ajouter l'intervention</button>
    </form>
    <a href="index.php">Retour à la liste des interventions</a>
    <script src="assets/js/app.js"></script>
</body>
</html>