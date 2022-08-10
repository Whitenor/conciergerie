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
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Conciergerie</title>
</head>
<body>
    <a href="logout.php">Déconnexion</a>
    <script src="assets/js/app.js"></script>
</body>
</html>