<?php include 'Function.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendrier</title>
    <link rel="stylesheet" href="style_cal.css">

</head>

<body>
<h1>Calendrier personnel</h1>
<p>PASSAGE VERS AFFICHAGE D'UNE<a href="entree.php">MENUE</a></p>
<!--
    <ul>
        <li>finaliser les fonctions de calcul exacte des dates, et le nom des jours (en cours)</li>
        <li>style caractérisant la date d'aujourd'hui</li>
        <li>couleur rouge pour les dimanches</li>
        <li>abreger les noms des mois (fait)</li>
        <li>finaliser le fonctionnement du form, la page d'un mois(en cours)</li>
        <li>image de saison en filigrane ou sur les cotés (en cours) </li>
      </ul> -->

<?php $an = isset($_GET['year']) ? $_GET['year'] : 2022; ?>
<?php $m = isset($_GET['month']) ? $_GET['month'] : 1; ?>
    
<div class="formulaire">
  <p>PASSAGE VERS AFFICHAGE D'UNE<a href="mois.php">MOIS</a></p>
  <p>PASSAGE VERS AFFICHAGE D'UNE<a href="addsession1.php">TABLE_SEASONS</a></p>
  
  <form action="#" method="GET">
    <label for="month">Choisir un mois:</label>
    <select id="month" name="month">
      <?php for($mois=1; $mois<=12; $mois++){ ?>
        <option value="<?php echo $mois; ?>"><?php echo MONTHS[$mois-1]; ?></option>
      <?php } ?>
    </select>
    <input type="submit">
    </form>
    <div class="month">
   <h1><?php echo $m; ?></h1>
</div>
    <form action="#" method="GET">
    <label for="year">Choisir une année:</label>
    <select id="year" name="year">
      <?php for($annee=2022; $annee<=2100; $annee++){ ?>
        <option value="<?php echo $annee; ?>"><?php echo $annee; ?></option>
      <?php } ?>
    </select>
    <input type="submit">
  </form>
<div class="year">
   <h1><?php echo $an; ?></h1>
</div>

</div>
      <div id="months-content">
    
      
      <div class="grid-container">
        <?php for($m=1; $m<=12; $m++){ ?>
        <div class="grid-item"><?php echo afficher_mois_html_table($m, $an) ?></div>
        <?php } ?>  
    </div>
      </div>

      
  <!-- <div class="gallery1">
  <a target="_blank" href="Printemp.jpg">
    <img src="Printemp.jpg" alt="Printemp" width="600" height="400">
  </a>
  <div class="desc">Add a description of the image here</div>
</div>

<div class="gallery2">
  <a target="_blank" href="hiver.jpg">
    <img src="hiver.jpg" alt="hiver" width="600" height="400">
  </a>
  <div class="desc">Add a description of the image here</div>
</div>

<div class="gallery3">
  <a target="_blank" href="Automne.jpg">
    <img src="Automne.jpg" alt="Automne" width="600" height="400">
  </a>
  <div class="desc">Add a description of the image here</div>
</div>

<div class="gallery4">
  <a target="_blank" href="img_mountains.jpg">
    <img src="été.jpg" alt="été" width="600" height="400">
  </a>
  <div class="desc">Add a description of the image here</div>
</div>-->
    
</body>
</html>