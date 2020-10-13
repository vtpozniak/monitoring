<?php

include 'Db.php';
require 'index.php';
use Datastart\Db;



class save_data
{
    public function saveDb($b, $c){
        $config = require 'config.php';
        $db = new Db($config['db']);
//        $data = date("Y-m-d H-i-s");
        $insert = $db->query("INSERT INTO `monitoring` (disk_total_space, disk_free_space) VALUES (:disk_total_space, :disk_free_space)", [
                 'disk_total_space' => $b,
                 'disk_free_space' => $c,
             ]);
    }

}
$rez = new save_data();
$rez->saveDb($b, $c);