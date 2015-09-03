<?php 
require_once 'model/autoload.php';

$len = new Master();
$len->show();

$con = new Connect();

//$con = $con->fetch(PDO::FETCH_ASSOC);
//var_dump($con);
$con = $con->connectDataBase();
var_dump($con);
//$res = $con->guery('SELECT * FROM `pref_users`');
// $res = $res->fetch(PDO::FETCH_ASSOC);
// var_dump($res);

//require 'config/config.php';
        // try {
            
            // $pdo=new PDO('mysql:host='.$host.';dbname='.$dbase."; charset=".$charset, $user, $pass);
            // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // $pdo = new PDO('mysql:host='.$host, $user, $pass);
            // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // }
        // catch(DBException $e) {
            // echo 'The connect can not create: ' . $e->getMessage();
        // }



            //$this->pdo->exec("CREATE DATABASE IF NOT EXISTS ".$dbase." charset=".$charset);


// $check = new PDO('mysql:host='.$host.';dbname=INFORMATION_SCHEMA; charset='.$charset, $user, $pass);
// $dbase='szpadlic_start';
// $wyn = $check->query(
            // "SELECT `SCHEMA_NAME` 
            // FROM `SCHEMATA` 
            // WHERE `SCHEMA_NAME` = '".$dbase."'"
            // );

// $wyn = $wyn->fetch(PDO::FETCH_ASSOC);
// echo $wyn ? 'exist' : 'not exist';

//var_dump($wyn);

// $wyn = $check->query(
            // "SELECT * 
            // FROM `SCHEMATA`"
            // );
//$wyn = $wyn->fetch(PDO::FETCH_ASSOC);
//var_dump($wyn);