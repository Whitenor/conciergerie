<?php include("functions.php");
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
    <title>Login Conciergerie</title>
</head>
<body>
    <main class="vw-100 vh-100 d-flex justify-content-center align-items-center">
        <form action="conditions.php" method="post" id="formLogin" class=" d-flex flex-column justify-content-around align-items-center">
            <h2>Login</h2>
            <div class="d-flex justify-content-between align-items-center w-100">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" class="form-control w-50">
            </div>
            <div class="d-flex justify-content-between align-items-center w-100">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" class="form-control w-50">
            </div>
            <button type="submit" name="action" value="login" class="btn btn-primary">Login</button>
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="assets/js/app.js"></script>
</body>
</html>