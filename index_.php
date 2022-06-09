<?php 
    include 'functions.php'; 
    session_start();
    if(isset($_SESSION['email']))
        echo "Bienvenu ".$_SESSION['username']." dans votre calendrier personnel<br>";

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Calendrier</title>
    </style>
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
            <nav class="navbar bg-light">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1">Navbar</span>
            </div>
            </nav>
        <div>
        <div class="row">
        <form class="row row-cols-lg-auto g-3 align-items-center" action="#" method="GET">
            <div class="col-12">
                <label class="visually-hidden" for="inlineFormSelectPref">Preference</label>
                <select class="form-select" id="inlineFormSelectPref" name="year">
                    <?php for($annee=2022; $annee<=2100; $annee++){ ?>
                    <option value="<?php echo $annee; ?>"><?php echo $annee; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="col-12">
                <label class="visually-hidden" for="inlineFormSelectPref">Preference</label>
                <select class="form-select" id="inlineFormSelectPref" name="month"> 
                    <option value="0">Choisir un mois</option>
                    <?php for($mois=1; $mois<=12; $mois++){ ?>
                    <option value="<?php echo $mois; ?>"><?php echo MONTHS[$mois-1]; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="col-6">
                <button type="submit" class="btn btn-primary">afficher</button>
            </div>
        </form>
        </div>

        <div class="row">
            <div class="col-2">
                <h1><span class="badge bg-secondary"><?php echo $an; ?></span></h1>
            </div>
            <div class="col-9">
                <div class="row row-cols-1 row-cols-md-3 g-4">

                    <?php for($m=1; $m<=12; $m++){ ?>
                        <?php echo afficher_mois_as_bootstrap_card($m, $an) ?>
                    <?php } ?>
                </div>
            </div>
            <div class="col-1">
                <h1><span class="badge bg-secondary"><?php echo $an; ?></span></h1>
            </div>
        </div>
    </div>



    <?php include "inc/menu.inc.php"; ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>