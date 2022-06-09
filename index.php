<?php 
include 'functions.php';
include 'conf/data_conf.php';

if (isset($_POST['submit']) && $_POST['submit']=="ok"){
    /* tentative d'authentification */ 
    // récupération des données du formulaire et leur nettoyage
    $email = trim(htmlspecialchars($_POST['email']));
    //fdebug($email);
    $password = trim(htmlspecialchars($_POST['password']));
    //fdebug($password);
    // validation des données du formulaire 
    $valid_form = validation($email, array('email', 'not_empty')) && validation($password, array('password', 'not_empty'));
    if($valid_form){
        $password = sha1($password);
        // connexion a la base de données
        try{
            $pdo = new PDO("mysql:host=".$conf['host'].";dbname=".$conf['db'], $conf['user'], $conf['password']);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // verification du couple
            $sql = "SELECT COUNT(email) as nbr_couple, email, nom, prenom, etat, photo FROM `utilisateur` WHERE email = '".$email."' AND password = '".$password."'";
            $res = $pdo->query($sql);
            $res = $res->fetch(PDO::FETCH_ASSOC);
            //fdebug($res);
            if($res['nbr_couple']>=1){
                // authentification reussi
                session_start();
                // ajouter les information de session
                $_SESSION['username'] = $res['nom']." ".$res['prenom'];
                $_SESSION['email'] = $res['email'];
                $_SESSION['role'] = $res['etat']; 
                //fdebug($res);
                if($_SESSION['role']=='admin'){
                    header("Location: editimages.php");
                }else{
                    header("Location: index_.php");
                }
            }else{
                // la combinaison (email,password) n'existe pas 
                $message = "ERREUR : le mot de passe ou l'adresse mail entrée n'est pas correcte.";
                header("Location: logout.php?m=".$message);
            }
        }catch(Exception $e){
            $message = "ERREUR : ".$e->getMessage();
            header("Location: logout.php?m=".$message);
        }finally{
            $pdo = null;
        }
    }else{
        $message_erreur = "Les données du formulaire ne sont pas valides.";
    }
}
// acces ou alerte de securité 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Authentification</title>
</head>
<body>
    <div class="container">
        <nav class="navbar bg-light">
            <div class="container">
                <a class="navbar-brand" href="index_.php">
                <img src="imgs/cal.png" alt="" width="30" height="24">
                Accueil
                </a>
            </div>
        </nav>
        <h1>Authentification</h1>
        <hr class="border-primary border-3 opacity-75">
        <?php /* formulaire d'authentification */ ?>
        <?php if(isset($message_erreur)) echo "<p>".$message_erreur."</p>"; ?>
        <form method="post" action="#">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Se souvenir de moi</label>
            </div>
            <button type="submit" name="submit" value="ok" class="btn btn-primary">Connexion</button>
        </form>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>