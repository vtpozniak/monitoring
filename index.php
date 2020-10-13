<?php

function roundsize($size){
    $i=0;
    $iec = array("B", "Kb", "Mb", "Gb", "Tb");
    while (($size/1024)>1) {
        $size=$size/1024;
        $i++;}
    return(round($size,1)." ".$iec[$i]);
}

$b = disk_total_space('/');
$c = disk_free_space('/');

var_dump(roundsize($b));
var_dump(roundsize($c));
