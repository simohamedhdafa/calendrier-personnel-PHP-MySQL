<?php 
$d1 = new DateTime('2012-02-1');
$d2 = new DateTime('2012-02-16');
$d = date_diff($d1, $d2);

foreach($d as $k=>$v) 
    echo "$k=>$v\t(".gettype($v).")\n";