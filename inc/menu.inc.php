<?php 
    //session_start();
    if(isset($_SESSION['username'])){
?>

<ul>
    <li><a href="index_.php">Accueil</a></li>
    <li><a href="addseasons.php">Editer saisons</a></li>
    <li><a href="editimages.php">Editer images</a></li>
    <li><a href="sinscrire.php">S'inscrire</a></li>
    <li><a href="logout.php">Deconnexion</a></li>
</ul> 

<?php } ?>