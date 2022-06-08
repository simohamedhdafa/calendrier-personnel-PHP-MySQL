<?php include 'functions.php'; 
    if(isset($_GET['month']) and $_GET['month']!=0) 
        header("Location: /calendrier_v0/mois.php?m=".$_GET['month']."&a=".$_GET['year']);
    // obtenir une année (uiliser date() ou time())
    $an = isset($_GET['year']) ? $_GET['year'] : 2022; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>calendrier</title>
    <link rel="stylesheet" href="stylecss.css">
    </style>
</head>
<body>

    <h1>TP Calendrier personnel</h1>
    
    <?php 
        // include the menu script 
        include "inc/menu.inc.php"; 
        // 
    ?>
    
    <div class="formulaire">
        <form action="#" method="GET">
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
    <div><h1><?php echo $an; ?></h1></div>
    <div class="grid-container">
        <?php for($m=1; $m<=12; $m++){ ?>
        <div class="grid-item"><?php echo afficher_mois_html_table($m, $an) ?></div>
        <?php } ?>  
    </div>
</body>
</html>