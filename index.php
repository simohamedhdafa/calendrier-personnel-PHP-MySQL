<?php 
include 'functions.php';

$d = [5,4,2022];

for($i=0; $i<400; $i++){
    $d = jour_precedent($d);
    echo "$d[0]/$d[1]/$d[2]\n";
} 