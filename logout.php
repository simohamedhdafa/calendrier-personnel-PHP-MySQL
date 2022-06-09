<?php 
    session_start();
    session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Deconnexion</title>
</head>
<body>
    <div class="container">
        <nav class="navbar bg-light">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                <img src="imgs/cal.png" alt="" width="30" height="24">
                Connexion
                </a>
            </div>
        </nav>
        <h1>Deconnexion</h1>
        <hr class="border-warning border-3 opacity-75">
        <p><?php if(isset($_GET['m'])) echo $_GET['m']; ?></p>
        <p>Mot de passe oublié? récuperez le <a href="#">ici</a>, ou reconnectez-vous <a href="index.php">ici</a>.</p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>