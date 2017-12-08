<?php
require '../config.php';
$data = simplexml_load_file("../".ARTIKULUAK) or die("Error: Cannot create object");
$artikuloa = $data->xpath("/artikuloak/artikuloa[izenburua='".$_GET['izenburua']."']")[0];

//HEMEN HTML TOH GUAPO BAT INGO DEGU

echo $artikuloa->izenburua;

echo $artikuloa->deskribapena;

echo $artikuloa->saila;

echo $artikuloa->idazlea_textua; //HTML

echo $artikuloa->idazlea_izena;
echo $artikuloa->idazlea;
?>