<?php
require '../config.php';
require '../functions/xml_functions.php';
$data = simplexml_load_file("../".ARTIKULUAK) or die("Error: Cannot create object");
$artikuloa = $data->xpath("/artikuloak/artikuloa[izenburua='".$_GET['izenburua']."']")[0];




echo $artikuloa->izenburua;

echo $artikuloa->deskribapena;

echo $artikuloa->saila;

$html = lortu_artikuloa($artikuloa);

echo $artikuloa->idazlea_izena;
echo $artikuloa->idazlea;
?>