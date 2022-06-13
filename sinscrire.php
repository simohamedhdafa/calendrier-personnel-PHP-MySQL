<?php 
    include 'functions.php'; 
    session_start();
    permission_navigation($_SESSION, array('admin', 'public'), 'logout.php');
    // on se connecte à la base de données
    $user = "root";
    $pass = "";
    $db = "calendrier";
    $host = "localhost";
    try {
        $pdo = new PDO("mysql:host=".$host.";dbname=".$db, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "<p>Bien connecté à la BD</p>";
        //$pdostat = $pdo->query("COUCOU") ;
    }catch (PDOException $e) {
        echo "<p>ERREUR : ".$e->getMessage()."</p>";
        die('TERMINE ICI.');
    }

    $valid_form = true;
    $err_msg = "";
    $msgs = array(
        'nom'=>'',
        'prenom'=>'',
        'email'=>'',
        'password'=>''
    );
    $inputs = array();
    if (isset($_POST['envoyer']) && $_POST['envoyer']=='creer'){
        foreach ($_POST as $k=>$v) $inputs[$k] = $v;
        foreach ($_FILES['photo'] as $k=>$v) $inputs[$k] = $v;
        //fdebug($inputs);
        if(!validation_data($inputs, $msgs)){
            // champs invalides 
            $err_msg = "erreur partie data!";
            $valid_form = false;
        }
        // validation file
        if(!validation_uploaded_file($_FILES)){
            // error ?
            $err_msg = "erreur partie file!";
            $valid_form = false;
        }
        if($valid_form){
            try{
                // echo "<p>pret à alimenter la base de données ?</p><br>";
                // connection à la base de données (voir plus haut)
                // compter le nombre d'enregistrements avec le même 'email' !
                $sql = "SELECT COUNT(email) FROM `utilisateur` WHERE email = '".trim($_POST['email'])."'";
                //die("$sql");
                $res = $pdo->query($sql);
                $res = $res->fetch(PDO::FETCH_NUM);
                if($res[0]>=1){
                    // suggerer une page de récupération de mot de pass !
                    die('Email deja utilisé, revenir ulterieurement !');
                }else{
                    // ajout de nouveau utilisateur : 
                    $token = md5($_POST['email']).rand(10,9999);
                    $sql = "INSERT INTO 
                    `utilisateur` (`nom`, `prenom`, `naissance`, `email`, `password`, `creation`, `etat`, `token`, `photo`, `remarques`) 
                    VALUES 
                    ('".$_POST["nom"]."', '".$_POST["prenom"]."', '".$_POST["naissance"]."', '".trim($_POST["email"])."', '".sha1($_POST["password"])."', '".date('Y-m-d')."', 'new', '".$token."', '".$_FILES["photo"]["name"]."', 'RAS')";
                    $pdo->query($sql);
                }
            }catch(PDOException $e) {
                echo "<p>ERREUR : ".$e->getMessage()."</p>";
                die('TERMINE ICI 2.');
            }finally{
                // close connexion 
                $pdo = null;
            }
            // envoie lien de confirmation 
            echo '<p>Informations bien enregistrées. Vous allez devoir activer votre compte bientôt.</p>';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylecss.css">
    <title>s'inscrire</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="alert alert-primary" role="alert">
                TP Calendrier personnel en PHP
            </div>
        </div>
        <div class="row">
            <!-- As a heading -->
            <?php echo navbar_bootstrap($_SESSION['role']); ?>
        <div>
    <?php 
        if(!$valid_form){
            echo "<h3>".$err_msg."</h3><p>";
            foreach($msgs as $k=>$v)
                echo $v."<br>";
            echo "</p>";
        }  
    ?>
    <form method="post" action="#" enctype="multipart/form-data">
        <label for="nom">First name:</label><br>
        <input type="text"  name="nom" value="<?php echo !$valid_form?$inputs['nom']:""; ?>" required><br>
        <label for="prenom">Last name:</label><br>
        <input type="text" name="prenom" value="<?php echo !$valid_form?$inputs['prenom']:""; ?>" required><br>
        <label for="date-naiss">Date de naissance:</label><br>
        <input type="date" name="naissance" value="<?php echo !$valid_form?$inputs['naissance']:""; ?>" required><br>
        <label for="date-naiss">Email:</label><br>
        <input type="email" name="email" value="<?php echo !$valid_form?$inputs['email']:""; ?>" required><br>
        <label for="password">mot de pass:</label><br>
        <input type="password" name="password" required><br>
        <label for="password">confirmation:</label><br>
        <input type="password" name="verification" required><br>
        <label for="photo">photo identité:</label><br>
        <input type="file" name="photo" required><br>
        <input type="submit" name="envoyer" value="creer">
    </form>
        </div>
</body>
</html>