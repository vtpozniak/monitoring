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

        return $db->query('SELECT data FROM `check` WHERE id ORDER BY id DESC LIMIT 1 ');
    }

}
$rez = new save_data();
//$t = date("Y-m-d H:i:s");
//$t = time();
//$tt = strtotime('+ 1', $tt );
//$startTime = time("H:i",strtotime('-30 minutes',$t));
//echo $t;
//$r = $rez->checkData();
//$arr = $r[0];
//echo "</br>";
//$toy = implode(",", $arr);
//$tt = strtotime("$toy");
//echo $tt;
//echo "</br>";
//if ($t >= $tt + 300){

//}

for( ; ; ){

    if ($t >= $tt + 30){
        $b = $rez->roundsize(disk_total_space('/'));
        $c = $rez->roundsize(disk_free_space('/'));
        $rez->saveDb($b, $c);
        echo "dssfsd";

    }
    $r = $rez->checkData();
    $arr = $r[0];
    $toy = implode(",", $arr);
    $tt = strtotime("$toy");
    $t = time();


}

//$new = strtotime('', $arr);

//
//echo $new;
//$startTime = date("H:i",strtotime('',$t));
//$endTime = date("H:i",strtotime('+30 minutes',$t));
//echo $startTime;
//echo $endTime;






//phpinfo();