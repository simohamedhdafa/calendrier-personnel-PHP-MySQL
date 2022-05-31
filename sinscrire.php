<?php 
    include 'functions.php'; 

    // etablir une connection à la base de donnée :

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
            echo "<p>pret à alimenter la base de données...</p><br>";
            // connection à la base de données (voir plus haut)
            // ajout de nouveau utilisateur : 
            /*
            INSERT INTO `utilisateur` 
            (`id`, `nom`, `prenom`, `naissance`, `email`, `password`, `creation`, `etat`, `photo`, `remarques`) 
            VALUES 
            (, '', '', '', '', '', '', '', '', '')
            */
            // envoie lien de confirmation 
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>s'inscrire</title>
</head>
<body>
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
</body>
</html>