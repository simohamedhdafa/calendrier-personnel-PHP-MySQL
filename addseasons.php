<?php 
    $confirmation = false;
    if(isset($_GET['envoyer']) && $_GET['envoyer']=="ok"){
        $confirmation = "Données envoyées avec succès";
        // validation des donnée
        // ecriture dans le csv
        $filename = 'conf/seasons.csv';
        $f = fopen($filename, 'w');
        if ($f === false) die('Error opening the file ' . $filename);
        $seasons = array(
            'winter' => array($_GET['startWinter'], $_GET['endWinter']),
            'spring' => array($_GET['startSpring'], $_GET['endSpring']),
            'summer' => array($_GET['startSummer'], $_GET['endSummer']),
            'autumn' => array($_GET['startAutumn'], $_GET['endAutumn'])
        );
        foreach($seasons as $k=>$v){
            fputcsv($f, [$k, $v[0], $v[1]]);
        }
        fclose($f);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editer les saisons</title>
</head>
<body>
    <?php echo $confirmation ? "<h1>".$confirmation."</h1>" : "<h1>Bienvenu!</h1>"; ?>
    <form action="#" method="get">
        <?php 
            $filename = 'conf/seasons.csv';
            $exists = true;
            $seasons = array();
            if (file_exists($filename)) {
                $f = fopen($filename, 'r');

                if ($f === false) {
                    die('Cannot open the file ' . $filename);
                }
                // read each line in CSV file at a time
                while (($row = fgetcsv($f)) !== false) {
                    $seasons[] = $row;
                }
                fclose($f);
            } else {
                $exists = false;
            }
        ?>
        <labet>winter : from </labet>
        <input type="date" required name="startWinter" <?php if($exists) echo 'value="'.$seasons[0][1].'"'; ?>>
        <labet> to </labet>
        <input type="date" required name="endWinter" <?php if($exists) echo 'value="'.$seasons[0][2].'"'; ?>><br>

        <labet>spring : from </labet>
        <input type="date" required name="startSpring" <?php if($exists) echo 'value="'.$seasons[1][1].'"'; ?>>
        <labet> to </labet>
        <input type="date" required name="endSpring" <?php if($exists) echo 'value="'.$seasons[1][2].'"'; ?>><br>

        <labet>summer : from </labet>
        <input type="date" required name="startSummer" <?php if($exists) echo 'value="'.$seasons[2][1].'"'; ?>>
        <labet> to </labet>
        <input type="date" required name="endSummer" <?php if($exists) echo 'value="'.$seasons[2][2].'"'; ?>><br>
        
        <labet>autumn : from </labet>
        <input type="date" required name="startAutumn" <?php if($exists) echo 'value="'.$seasons[3][1].'"'; ?>>
        <labet> to </labet>
        <input type="date" required name="endAutumn" <?php if($exists) echo 'value="'.$seasons[3][2].'"'; ?>><br>
        <input type="submit" name="envoyer" value="ok">
        <input type="reset">
    </form>
</body>
</html>