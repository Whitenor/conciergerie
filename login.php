<?php include("functions.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Login Conciergerie</title>
</head>
<body>
    <main>
        <form action="conditions.php" method="post">
            <h1>Login</h1>
            <div>
                <label for="username">Username:</label>
                <input type="text" name="username" id="username">
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password">
            </div>
            <section>
                <button type="submit" name="action" value="login">Login</button>
            </section>
        </form>
    </main>
    <script src="assets/js/app.js"></script>
</body>
</html>