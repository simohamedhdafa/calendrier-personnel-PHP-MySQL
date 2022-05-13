<?php 
    include 'functions.php'; 
    $filename = 'conf/seasons.csv';
    $seasons = array();
    $saisons = array();
    $confirmation = false;
    $validata = false;
    if(isset($_GET['envoyer']) && $_GET['envoyer']=="ok"){
        // validation des donnée
        $seasons = array(
            'winter' => array($_GET['startWinter'], $_GET['endWinter']),
            'spring' => array($_GET['startSpring'], $_GET['endSpring']),
            'summer' => array($_GET['startSummer'], $_GET['endSummer']),
            'autumn' => array($_GET['startAutumn'], $_GET['endAutumn'])
        );
        if(validerform($seasons)){
            $confirmation = "Données envoyées avec succès";
            // ecriture dans le csv
            $f = fopen($filename, 'w');
            if ($f === false) die('Error opening the file ' . $filename);
            foreach($seasons as $k=>$v){
                fputcsv($f, [$k, $v[0], $v[1]]);
            }
            fclose($f);
        }else{
            $validata = "Attention, les données saisies ne sont pas valide...";
        }
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editer les saisons</title>
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
    <?php echo $confirmation ? "<h1>".$confirmation."</h1>" : "<h1>Bienvenu!</h1>"; ?>
        <form action="#" method="get">
            <?php 
                $exists = true;
                if($validata===false){
                    $seasons = array();
                    if (file_exists($filename)) {
                        $f = fopen($filename, 'r');

                        if ($f === false) {
                            die('Cannot open the file ' . $filename);
                        }
                        // read each line in CSV file at a time
                        while (($row = fgetcsv($f)) !== false) {
                            $saisons[] = $row;
                        }
                        fclose($f);
                    } else {
                        $exists = false;
                    }
                }else{
                    foreach($seasons as $k=>$v){
                        $saisons[] = [$k,$v[0], $v[1]];
                    }
                }
                
            ?>
            <labet>winter : from </labet>
            <input type="date" required name="startWinter" <?php if($exists) echo 'value="'.$saisons[0][1].'"'; ?>>
            <labet> to </labet>
            <input type="date" required name="endWinter" <?php if($exists) echo 'value="'.$saisons[0][2].'"'; ?>><br>

            <labet>spring : from </labet>
            <input type="date" required name="startSpring" <?php if($exists) echo 'value="'.$saisons[1][1].'"'; ?>>
            <labet> to </labet>
            <input type="date" required name="endSpring" <?php if($exists) echo 'value="'.$saisons[1][2].'"'; ?>><br>

            <labet>summer : from </labet>
            <input type="date" required name="startSummer" <?php if($exists) echo 'value="'.$saisons[2][1].'"'; ?>>
            <labet> to </labet>
            <input type="date" required name="endSummer" <?php if($exists) echo 'value="'.$saisons[2][2].'"'; ?>><br>
            
            <labet>autumn : from </labet>
            <input type="date" required name="startAutumn" <?php if($exists) echo 'value="'.$saisons[3][1].'"'; ?>>
            <labet> to </labet>
            <input type="date" required name="endAutumn" <?php if($exists) echo 'value="'.$saisons[3][2].'"'; ?>><br>
            <input type="submit" name="envoyer" value="ok">
            <input type="reset">
        </form>
        <p><?php if($validata!==false) echo $validata; ?></p>
    </div>
</body>
</html>