<?php
require '../config.php';
$data = simplexml_load_file("../".ARTIKULUAK) or die("Error: Cannot create object");


// Nondik atera duzue $artikuloa aldagaia?
// Nahi duzuen artikuloa bilatzeko XML-an xpath erabili, horrek array bat itzuliko dizue, [0] posizioan egongo da nahi duzuena baldin badago
// Artikuloaren barneko textua lorzeko xml_functions.php-en definitu dut funtzio bat $artikuloa aldagaia emanda html osoa string batean itzultzen duena.
// Dena echo bezela printeatu beharrean pixkat txukunago egitea komeni litzake ezta? Adibidez izenburua <h1> etiketen artean jartzea, etab... 


$artikuloa = $data->xpath("/artikuloak/artikuloa[izenburua='".$_GET['izenburua']."']")[0];


echo $artikuloa->izenburua;

echo $artikuloa->deskribapena;

echo $artikuloa->saila;

echo $artikuloa->idazlea_textua; //HTML

echo $artikuloa->idazlea_izena;
echo $artikuloa->idazlea;
?>