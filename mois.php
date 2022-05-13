<?php include "Function.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendrier</title>
    <link rel="stylesheet" href="style_cal.css">
    
</head>
<h1>Calendrier personnel</h1>
<p>PASSAGE VERS AFFICHAGE D'UNE<a href="entree.php">MENUE</a></p>
<?php $an = isset($_GET['year']) ? $_GET['year'] : 2022; ?>
<?php $m = isset($_GET['month']) ? $_GET['month'] : 1; ?>
    
<div class="formulaire">
  <p>PASSAGE VERS AFFICHAGE D'UNE<a href="index2.php">ANNÉE</a></p>
  <form action="#" method="GET">
    <label for="month">Choisir un mois:</label>
    <select id="month" name="month">
      <?php for($mois=1; $mois<=12; $mois++){ ?>
        <option value="<?php echo $mois; ?>"><?php echo MONTHS[$mois-1]; ?></option>
      <?php } ?>
    </select>
    <select id="year" name="year">
      <?php for($annee=2022; $annee<=2100; $annee++){ ?>
        <option value="<?php echo $annee; ?>"><?php echo $annee; ?></option>
      <?php } ?>
    </select>
    <input type="submit">
    </form>
    <div class="month">
   <h1><?php echo $m; ?></h1>
</div>
    
<div class="year">
   <h1><?php echo $an; ?></h1>
</div>

</div>
<body>
<div id="months-content">
    
      
    <div class="grid-container">
    
    <?php if($m<=3){ ?>
        <div class="grid-item"><div class="a">  <?php echo afficher_mois_html_table($m, $an);?>  </div></div><?php } ?>
      
        <?php if($m<=6 and $m>3){ ?>
          <div class="grid-item"><div class="b"> <?php echo afficher_mois_html_table($m, $an);?> </div></div><?php } ?>
      
        <?php if($m<=9 and $m>6){ ?>
          <div class="grid-item"><div class="c">  <?php echo afficher_mois_html_table($m, $an);?>  </div></div><?php } ?>
      
        <?php if($m<=12 and $m>9){ ?>
          <div class="grid-item"><div class="d">  <?php echo afficher_mois_html_table($m, $an);?> </div></div><?php } ?>

    </div>
    </div>
</body>
</html>