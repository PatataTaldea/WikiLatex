<?php
require '../config.php';
$data = simplexml_load_file("../".ARTIKULUAK) or die("Error: Cannot create object");
$artikuloa = $data->xpath("/artikuloak/artikuloa[izenburua='".$_GET['izenburua']."']")[0];




echo $artikuloa->izenburua;

echo $artikuloa->deskribapena;

echo $artikuloa->saila;

echo lortu_artikuloa($artikuloa->idazlea_textua);

echo $artikuloa->idazlea_izena;
echo $artikuloa->idazlea;
?>