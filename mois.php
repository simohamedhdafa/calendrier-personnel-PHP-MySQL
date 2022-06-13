<?php 
include 'functions.php'; 
session_start();
permission_navigation($_SESSION, array('admin', 'active', 'public'), 'logout.php');
$role = isset($_SESSION['role']) ? $_SESSION['role'] : 'public';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo MONTHS[$_GET['m']-1]."/".$_GET['a']; ?></title>
    <link rel="stylesheet" href="stylecss.css">
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
            <?php echo navbar_bootstrap($role); ?>
        <div>
    <div class="formulaire">
        <form action="/calendrier_v0/index.php" method="GET">
            <label for="months">Choisir un mois:</label>
                <select id="months" name="month">
                    <option value="0">----</option>
                    <?php for($mois=1; $mois<=12; $mois++){ ?>
                    <option value="<?php echo $mois; ?>"><?php echo MONTHS[$mois-1]; ?></option>
                    <?php } ?>
                </select>

            <label for="year">Choisir une année:</label>
                <select id="year" name="year">
                    <?php for($annee=2022; $annee<=2100; $annee++){ ?>
                    <option value="<?php echo $annee; ?>"><?php echo $annee; ?></option>
                    <?php } ?>
                </select>
            <input type="submit">
        </form>
    </div>
    <div class="mois">
        <?php echo afficher_mois_html_table($_GET['m'], $_GET['a']); ?>
    </div>
        </div>
</body>
</html>
