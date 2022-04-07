<?php 

define('ORIGINE', [
    'Nom'   => 'MERCREDI',
    'JOUR'  => 1,
    'MOIS'  => 1,
    'ANNEE' => 1902
]);

/*
define('ORIGINE', [
    'Nom'   => 'VENDREDI',
    'JOUR'  => 1,
    'MOIS'  => 4,
    'ANNEE' => 2022
]);
*/

function nombre_jour($mm,$aaaa){
    switch($mm){
        case 2: 
            return $aaaa%4==0 ? 29 : 28;
        case 4:
        case 6:
        case 9:
        case 11:
            return 30;
        default: return 31; 
    }
}

function est_valide($d){
    // format de la date : [jj, mm, aaaa]
    if($d[0]<=0 or $d[0]>31 or $d[1]<=0 or $d[1]>12 or $d[2]<0) return false;
    switch($d[1]){
        case 2: 
            return $d[2]%4==0 ? $d[0]<=29 : $d[0]<=28;
        case 4:
        case 6:
        case 9:
        case 11:
            return $d[0]<=30;
        default: return $d[0]<=31; 
    }
}

function fdebug($tab){
    print_r($tab);
    die('END.');
}

function date_lendemain($d){
    //debug($d);
    if(!est_valide($d)) throw new Exception("Une date utilisee n'est pas valide!\n
    Calcule du lendemain.");
    $dd = [$d[0], $d[1], $d[2]];
    //debug($dd);
    switch($d[1]){
        case 2: 
            if($d[2]%4==0){
                if($d[0]<29){ 
                    $dd[0]++;
                }else{
                    $dd[0] = 1;
                    $dd[1]++;
                }
            }else{
                if($d[0]<28){ 
                    $dd[0]++;
                }else{
                    $dd[0] = 1;
                    $dd[1]++;
                }
            }
            break;
        case 4:
        case 6:
        case 9:
        case 11:
            //return $d[0]<=30;
            if($d[0]<30) $dd[0]++;
            else{
                $dd[0] = 1;
                $dd[1]++;
            }
            break;
        default: 
            //return $d[0]<=31; 
            if($d[0]<31) $dd[0]++;
            elseif($d[1]!=12){
                $dd[0] = 1;
                $dd[1]++;
            }else{
                $dd[0] = 1;
                $dd[1] = 1;
                $dd[2]++;
            }
    }
    return $dd;
}

function jour_precedent($d){
    if(!est_valide($d)) throw new Exception("Une date utilisee n'est pas valide!\n
    Calcule du jour precedent.");
    $dd = [$d[0], $d[1], $d[2]];
    if($d[0]>1) $dd[0]--;
    else{
        switch($d[1]){
            case 1:
                $dd[0] = 31;
                $dd[1] = 12;
                $dd[2]--;
                break;
            case 3:
                if($d[2]%4==0) $dd[0] = 29;
                else $dd[0] = 28;
                $dd[1]--;
                break;
            case 2:
            case 4:
            case 6:
            case 9:
            case 11:
                $dd[0] = 31;
                $dd[1]--;
                break;
            default:
                $dd[0] = 30;
                $dd[1]--;
        }
    }
    return $dd;
}

function egales($d1, $d2){
    return $d1[0]==$d2[0] and $d1[1]==$d2[1] and $d1[2]==$d2[2];
}

function inferieur($petite, $grande){
    if($petite[2]>$grande[2]) return false;
    if($petite[2]<$grande[2]) return true;
    if($petite[1]>$grande[1]) return false;
    if($petite[1]<$grande[1]) return true;
    if($petite[0]>$grande[0]) return false;
    if($petite[0]<=$grande[0]) return true;
}

function duree($d1, $d2){
    assert(inferieur($d1,$d2));
    $jrs = 0;
    $j = [$d1[0], $d1[1], $d1[2]];
    while(!egales($j, $d2)){
        $jrs++;
        $j = date_lendemain($j); # retourne un nouveau array ?
    }
    return $jrs;
}

function string_date($d, $sep="/"){
    return $d[0].$sep.$d[1].$sep.$d[2];
}

function nom_jour($d){
    $noms = array("LUNDI", "MARDI", "MERCREDI", "JEUDI", "VENDREDI", "SAMEDI", "DIMANCHE");
    $origine = [ORIGINE['JOUR'], ORIGINE['MOIS'], ORIGINE['ANNEE']];
    $duree = inferieur($d,$origine) ? duree($d,$origine)%7 : duree($origine,$d)%7;
    $index_nom_origine = array_search(ORIGINE['Nom'], $noms);
    if(!inferieur($d,$origine)) return $noms[($index_nom_origine+$duree)%7];
    return $noms[($index_nom_origine-$duree)%7];    
}

function afficher_mois($mm, $aaaa){
    $noms = array("LUNDI", "MARDI", "MERCREDI", "JEUDI", "VENDREDI", "SAMEDI", "DIMANCHE");
    $nom = nom_jour([1,$mm,$aaaa]);
    
    $ecart_deb = array_search($nom,$noms);
    $nbr_jour = nombre_jour($mm, $aaaa);
    $ecart_fin = 6 - array_search(nom_jour([$nbr_jour,$mm,$aaaa]),$noms);
    $total = $ecart_deb + $nbr_jour + $ecart_fin;

    foreach($noms as $jr) printf("%3s", substr($jr, 0, 1));
    echo "\n";
    for($i=1, $k = 1; $i<=$total; $i++){
        if($i>$ecart_deb and $i<=$ecart_deb + $nbr_jour) 
            printf("%3s", $k++);
        else
            printf("%3s", "-");
        if($i%7==0) echo "\n";
    }
}

