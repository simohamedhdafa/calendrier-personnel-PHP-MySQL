<?php include 'functions.php'; ?>
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
    <h1>TP Calendrier personnel</h1>
    <ul>
        <li><a href="index.php">Accueil</a></li>
        <li><a href="addseasons.php">Editer saisons</a></li>
        <li><a href="editimages.php">Editer images</a></li>
        <li><a href="#">s'inscrire</a></li>
    </ul> 
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
</body>
</html>
