<?php

include 'Db.php';
use Datastart\Db;

class save_data
{

public function roundsize($size){
        $i=0;
        $iec = array("B", "Kb", "Mb", "Gb", "Tb");
        while (($size/1024)>1) {
            $size=$size/1024;
            $i++;}
        return(round($size,1)." ".$iec[$i]);
    }

    public function saveDb($b, $c){
        $config = require 'config.php';
        $db = new Db($config['db']);
        $insert = $db->query("INSERT INTO `check` (disk_total_space, disk_free_space) VALUES (:disk_total_space, :disk_free_space)", [
                 'disk_total_space' => $b,
                 'disk_free_space' => $c,
             ]);
    }

    public function checkData()
    {
        $config = require 'config.php';
        $db = new Db($config['db']);
        $rez = $db->query('SELECT data FROM `check` WHERE id ORDER BY id DESC LIMIT 1 ');

//        while ($dir = mysqli_fetch_assoc($rez)){
//            print_r($dir);
//        }
        return $rez;

    }

}
$rez = new save_data();
time();
echo time();

//for( ; ; ){
//    $b = $rez->roundsize(disk_total_space('/'));
//    $c = $rez->roundsize(disk_free_space('/'));
//    $rez->saveDb($b, $c);
//
//    sleep(300);
//}
$r = $rez->checkData();
echo "</br>";
//$r = strtotime(+300);
print_r($r);

