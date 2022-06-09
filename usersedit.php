<?php 
if(isset($_SESSION['email'])){
    if($_SESSION['role']=='admin'){
        echo "Bienvenu admin.";
    }else{
        // n'est pas admin, mais essaye d'acceder via url a un contenu non autorisé 
        unset($_SESSION);
        header("Location: index.php");
    }
}else{
    // n'est pas authentifié, mais essaye dd'acceder via url a un contenu non autorisé
    unset($_SESSION);
    header("Location: index.php");
}