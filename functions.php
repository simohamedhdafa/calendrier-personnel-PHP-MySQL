<?php 

define('ORIGINE', [
    'Nom'   => 'LUNDI',
    'JOUR'  => 27,
    'MOIS'  => 12,
    'ANNEE' => 2021
]);

define('DAYS_NUM', [
    'LUNDI' => 1,
    'MARDI' => 2,
    'MERCREDI' => 3,
    'JEUDI' => 4,
    'VENDREDI' => 5,
    'SAMEDI' => 6,
    'DIMANCHE' => 7,
]);

define('NUM_DAYS', [
    1 => 'LUNDI',
    2 => 'MARDI',
    3 => 'MERCREDI',
    4 => 'JEUDI',
    5 => 'VENDREDI',
    6 =>'SAMEDI',
    7 =>'DIMANCHE'
]);

define('MONTHS', array("Janvier", "Fevrier", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Semptembre", "Octobre", "Novembre", "Decembre"));


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

function est_valide($d){ //O(1)
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
    echo "<pre>";
    print_r($tab);
    echo "</pre>";
    die('END.');
}

function date_lendemain($d){ // O(1)
    //debug($d);
    if(!est_valide($d)){ // complxit de est_valide +
        throw new Exception("Une date utilisee n'est pas valide!\nCalcule du lendemain.");
    // equivaleeente à une affectation
    } 
    $dd = [$d[0], $d[1], $d[2]];
    //debug($dd);
    switch($d[1]){ 
        case 2: // O(1) +
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
        case 11: // O(1) +
            //return $d[0]<=30;
            if($d[0]<30) $dd[0]++;
            else{
                $dd[0] = 1;
                $dd[1]++;
            }
            break;
        default: // O(1)
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

function duree($d1, $d2){ // O(n)
    // assert(inferieur($d1,$d2));
    $jrs = 0;
    $j = [$d1[0], $d1[1], $d1[2]];
    while(!egales($j, $d2)){ // N * (O(1)+
        $jrs++;
        $j = date_lendemain($j); # O(1))
    }
    return $jrs;
}

function string_date($d, $sep="/"){
    return $d[0].$sep.$d[1].$sep.$d[2];
}

function nom_jour($d){
    $noms = array_values(NUM_DAYS);
    $origine = [ORIGINE['JOUR'], ORIGINE['MOIS'], ORIGINE['ANNEE']];
    // refaire l'algorithme durée
    $duree = inferieur($d,$origine) ? -1*(duree($d,$origine)%7) : duree($origine,$d)%7;
    $index_nom_origine = array_search(ORIGINE['Nom'], $noms);
    return $noms[($index_nom_origine+$duree)%7];
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

function endsWith($haystack, $needle) {
    $length = strlen($needle);
    return $length > 0 ? substr($haystack, -$length) === $needle : true;
}

function afficher_mois_html_table($mm, $aaaa){
    $noms = array("LUNDI", "MARDI", "MERCREDI", "JEUDI", "VENDREDI", "SAMEDI", "DIMANCHE");
    $nom = nom_jour([1,$mm,$aaaa]);
    $mois = array("Janvier", "Fevrier", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Semptembre", "Octobre", "Novembre", "Decembre");
    $ecart_deb = array_search($nom,$noms);
    $nbr_jour = nombre_jour($mm, $aaaa);
    $ecart_fin = 6 - array_search(nom_jour([$nbr_jour,$mm,$aaaa]),$noms);
    $total = $ecart_deb + $nbr_jour + $ecart_fin;
    // construction dune table html contenant les données du mois
    $nom_mois = abrv($mois[$mm-1]);
    $present_month = date('Y') == $aaaa && date('m') == $mm ? true : false; // && plus prio que ?
    // and moins prio que ?
    $css = '';
    switch($mm){
        case 9:
        case 10:
        case 11:
            $css = 'class="bgimga"';
            break;
        case 12:
        case 1:
        case 2:
            $css = 'class="bgimgh"';
            break;
        case 3:
        case 4:
        case 5:
            $css = 'class="bgimgp"';
            break;
        default:
            $css = 'class="bgimge"';
    }
    $table_mois = '<table '.$css.'>
        <caption>'.$nom_mois.'</caption>
        <tr>';
    // la prmiere ligne contient les initiales des noms d jour de la sem
    foreach($noms as $jr) $table_mois .= "<td>".substr($jr, 0, 1)."</td>" ;
    $table_mois .= <<<azerto
        </tr>
        <tr>
    azerto;
    // les autres lignes 
    for($i=1, $k = 1; $i<=$total; $i++){
        if (endsWith($table_mois, "</tr>"))  $table_mois .= "<tr>";
        //$table_mois .= "<tr>";
        if($i>$ecart_deb and $i<=$ecart_deb + $nbr_jour){ 
            // si $i%7==0 : td est de classe dimanche
            if ($i%7==0){ 
                if ($present_month and date('d')==$k) $table_mois .= '<td class="dimanche today">'.$k++."</td>";
                else $table_mois .= '<td class="dimanche">'.$k++."</td>";
            // else :
            }else{
                // $table_mois .= "<td>".$k++."</td>";
                if ($present_month and date('d')==$k) $table_mois .= '<td class="today">'.$k++."</td>";
                else $table_mois .= "<td>".$k++."</td>";
            } 
        }else{
            // si $i%7==0 : td est de classe dimanche
            if ($i%7==0) $table_mois .= '<td class="dimanche">'."-"."</td>";
            // else :
            else $table_mois .= "<td>"."-"."</td>";
        }
        if($i%7==0) $table_mois .= "</tr>";
    }
    
    return $table_mois."</table>";

}

/* algorithme nouveau pour calcul écart entre dates */
function diff_annee_par_jour($d1, $d2){
    /* assert that d1>d2 */
    $compt = 0;
    for($annee=$d1[2]; $annee<=$d2[2]; $annee++)
        $compt += $annee%4==0 ? 365 : 366;
    return $compt;
}

function troncon_2($d1){
    $compt = 0;
    if($d1[1]<12){
        for($mois=$d1[1]+1; $mois<=12; $mois++)
            $compt += nombre_jour($mois,$d1[2]);
    }
    return $compt;
}

function troncon_4($d2){
    $compt = 0;
    if($d2[1]>1){
        for($mois=1; $mois<=$d2[1]; $mois++)
            $compt += nombre_jour($mois,$d2[2]);
    }
    return $compt;
}

function troncon_1($d1){
    return nombre_jour($d2[1],$d2[2]) - $d2[0];
}

function troncon_5($d2){
    return $d2[0];
}

function duree_v2($d1, $d2){
    return troncon_1($d1) + troncon_2($d1) + diff_annee_par_jour($d1, $d2) + troncon_4($d2) + troncon_5($d2);
}


function get_month($mm, $aaaa){
    //$noms = array("LUNDI", "MARDI", "MERCREDI", "JEUDI", "VENDREDI", "SAMEDI", "DIMANCHE");
    $noms = array_values(NUM_DAYS);
    //fdebug($noms);
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

// par Zak Ari
function abrv($nom_mois){
    if (strlen($nom_mois)<4) return $nom_mois.'.';
    if (strpos($nom_mois,'e', 3)==3 or strpos($nom_mois,'o',3)==3 or strpos($nom_mois,'i',3)==3)
        return substr($nom_mois, 0, 3).".";
    return substr($nom_mois, 0,4);    
}

function sorted($t){
    $sorted = true;
    for($i=1; $i<=7; $i++){
        if($t[$i-1]>=$t[$i]){
            $sorted = false;
            break;
        }
    }
    return $sorted;
}


/* validations */

function validerform($data){
    $valide = true;
    $dates = array();
    foreach($data as $v){
        $dates[] = $v[0];
        $dates[] = $v[1];
    }
    // dates triées
    if(sorted($dates)){
        // etndue de saison entre 3 et 4 mois 
        // fin saison + 1 = debut saison suivante
        // autre
    }else{
        $valide = false;
    }
     
    return $valide;
}

function valide_nom($name, $msgs){
    // taille entre 2 et 50 : strlen
    if(strlen($name)<2 or strlen($name)>50){
        $msgs['nom'] = "taille nom ou prenom invalide";
        return false;
    } 
    // supprimer les espaces successifs ! 
    
    // composé de lettre seulement, insensible à la casse 
    $letters = explode(',', "a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z, ");
    for($i=0; $i<strlen($name); $i++){
        if(!in_array($name[$i], $letters)){
            $msgs['nom'] = "caractère invalide dans nom ou prenom";
            return false;
        }
    }
    // chaine valide
    return true;
}

function valide_date_naissance($date_naissance){
    // une date
    // superieure à 18 ans et inferieure à 200 ans
    return true;
}

function valide_email($email, $msgs){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)!==false){
        return true;
    }else{
        $msgs['email'] = "email invalide";
        return false;
    }
}

function valide_password($password, $verification, $msgs){

    if($password!==$verification){
        $msgs['password'] = "verivication est different de password";
        echo $msgs['password'];
        return false;
    } 
    //die('premier filtre passé!');

    if(strlen($password)<8 or strlen($password)>16){
        $msgs['password'] = "la taille du mot de passe n'est pas respecté";
        echo $msgs['password'];
        return false;
    } 
    //die('2eme filtre passé!');

    $lower = "a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z";
    $upper = "A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z"; 
    $digits = "0,1,2,3,4,5,6,7,8,9";
    $symbols = "+,-,*,/,%,@,-,_";
    $allowed = explode(',', $lower.','.$upper.','.$digits.','.$symbols);
    for($i=0; $i<strlen($password); $i++){
        if(!in_array($password[$i], $allowed)){
            $msgs['password'] = "utilisation de caractere non autorisé dans le mot de passe";
            echo $msgs['password'];
            return false;
        }
    }
    //die('3eme filtre passé!');    
    $nbr_lowers = count(array_intersect(str_split($password), explode(',', $lower)));
    $nbr_uppers = count(array_intersect(str_split($password), explode(',', $upper)));
    $nbr_digits = count(array_intersect(str_split($password), explode(',', $digits)));
    $nbr_symbols = count(array_intersect(str_split($password), explode(',', $symbols)));
    if(($nbr_lowers * $nbr_uppers * $nbr_digits * $nbr_symbols)==0){
        $msgs['password'] = "au moins une minuscule, majiscule, chiffre, lettre et symbole special are required";
        echo $msgs['password'];
        return false;
    }
    //die('4eme filtre passé!');  
    // d autres regles ?    
    return true;
}

function validation_data($t, $msgs){
    // validation data :
    // nom valide ?
    $valide = valide_nom($t['nom'], $msgs);
    // prenom valide ?
    if($valide) $valide = valide_nom($t['prenom'], $msgs);
    // date naissance valide ?
    if($valide) $valide = valide_date_naissance($t['naissance']);
    // email valide ?
    if($valide) $valide = valide_email($t['email'], $msgs);
    // password valide ?
    if($valide) $valide = valide_password($t['password'], $t['verification'], $msgs);
    return $valide;
}

function validation_uploaded_file($f){
    return true;
}