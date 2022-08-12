<?php
include "main.php";

use simitsdk\phpjasperxml\PHPJasperXML;
$filename = __DIR__.'/report2.jrxml';




// $config = [
//     'driver'=>'postgresql',
//     'host'=>'127.0.0.1',
//     'user'=>'postgres',
//     'pass'=>'postgres',
//     'name'=>'demo',
// ];
 $config = [
    'driver'=>'mysql',
    'host'=>'br8ci1y2h5jbgtbdlkeh-mysql.services.clever-cloud.com',
    'user'=>'uafziyg7bdppjgp7',
    'pass'=>'wmg6pwxvGw8t9X1V6Nf6',
    'name'=>'br8ci1y2h5jbgtbdlkeh'
 ];
// $config = [
//     'driver'=>'pdo',
//     'dsn'=>'mysql:host=127.0.0.1;dbname=demo;',
//     'user'=>'root',
//     'pass'=>'root'
// ];


$report = new PHPJasperXML();
$report->load_xml_file($filename)    
    ->setParameter(['reporttitle'=>'Database Report With Driver : '.$config['driver']])
    ->setDataSource($config)
    ->export('Pdf');
?>