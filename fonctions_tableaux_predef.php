<?php
/***********************************************************
* Fichier contenant des exemples/tests de fonctions        *
* sur les tableaux. Ce sont des fonctions prédéfinies      *
* en PHP                                                   *
***********************************************************/
//echo 'bonjour!';
//$greet = "bonjour JUNIA";
//print_r($greet);
/*
$t = array(2.13, 5, 'bonjor', array(0,9));
print_r($t); 
$t_assoc = array(
    'un' => 16,
    'deux' => 17.5,
    10 => array(0,9)
);
print_r($t_assoc);
$t_assoc = [
    'un' => 16,
    'deux' => 17.5,
    10 => array(0,9)
];
print_r($t_assoc);

$pile = array();
print_r($pile);
array_push($pile,'Taha');
array_push($pile,'Hiba');
array_push($pile,'simo');
print_r($pile);
array_pop($pile);
print_r($pile);

$file = array();
array_unshift($file, 12);
array_unshift($file, 3.14);
array_unshift($file, 0);
print_r($file);
array_shift($file);
print_r($file);

// Tri
$t = [55, 7, 4, 10, 12, 21];
sort($t);
print_r($t);
$villes = ["EL JADIDA", "NADOR", "KENITRA", "KAMOUNI", "EL HOCEIMA", "ERRACHIDIA"];
sort($villes);
print_r($villes);
rsort($villes);
print_r($villes);
$villes = ["EL JADIDA", "NADOR", "KENITRA", "KAMOUNI", "EL HOCEIMA", "ERRACHIDIA"];
asort($villes);
print_r($villes);
arsort($villes);
print_r($villes);
$fruits = array("d"=>"lemon", "a"=>"orange", "b"=>"banana", "c"=>"apple");
print_r($fruits);
ksort($fruits);
print_r($fruits);
krsort($fruits);
print_r($fruits);

$a = range(0,10,2);
print_r($a);
shuffle($a);
print_r($a);
shuffle($a);
print_r($a);

$fruits = array("d"=>"lemon", "a"=>"orange", "b"=>"banana", "c"=>"apple", "z"=>"pèche");
echo count($fruits);
if(array_key_exists('z',$fruits)){
    echo "Il y a une pèche dans le panier";
}else{
    echo "Il n y a pas de pèche dans le panier";
}

$fruits = array("d"=>"lemon", "a"=>"orange", "b"=>"banana", "x"=>"banana" , "c"=>"apple", "z"=>"pèche");
//print_r(array_keys($fruits));
//print_r(array_values($fruits));
//echo array_search("banana", $fruits);
// si pas d'occ de la val ds le tab:
if(array_search("bananas", $fruits)==false){
 echo "FALSE";
}

$adresse = "17, avenue Alas, Haut Agdal, Rabat, Maroc";
$t_adr = explode(',', $adresse);
print_r($t_adr);

$today = explode('-',date('5-1999'));
print_r($today);

if (date('d')==5) echo 'OUI';
else echo 'NON';
*/
$aaaa = 2022;
$mm = 5;
if (date('Y') == date($aaaa) and date('m') == date($mm)) echo 'EGALE';
else echo 'mauVAISSSSS';