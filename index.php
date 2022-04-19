<?php include 'functions.php'; ?>
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
  <?php $an = isset($_GET['year']) ? $_GET['year'] : 2022; ?>

      <div class="formulaire">
        <form action="#" method="GET">
          <label for="months">Choisir un mois:</label>
          <select id="months" name="month">
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
      
      <div class="calendrier">
      <div class="year">
         <h1><?php echo $an; ?></h1>
      </div>
      <div id="months-content">
        <?php for($m=1; $m<=12; $m+=3){ ?>
          <div class="month-row">
              <div class="col-1"><?php echo afficher_mois_html_table($m, $an) ?></div>
              <div class="col-2"><?php echo afficher_mois_html_table($m+1, $an) ?></div>
              <div class="col-3"><?php echo afficher_mois_html_table($m+2, $an) ?></div>
          </div>
        <?php } ?>
      </div>
    </div>
    
</body>
</html>
