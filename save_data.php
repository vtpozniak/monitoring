<?php

include 'Db.php';
use Datastart\Db;

class save_data
{


    public function saveDb(){
      $config = require 'config.php';
        $db = new Db($config['db']);
//        echo $b;
        $insert = $db->query("INSERT INTO `monitoring` (disk_total_space, disk_free_space) VALUES ('disk_total_space', 'disk_free_space')");
    }

}
    $rez = new save_data();
    $rez->saveDb();
