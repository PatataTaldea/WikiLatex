<?php
require '../config.php';
$data = simplexml_load_file("../".ARTIKULUAK) or die("Error: Cannot create object");


echo $artikuloa->izenburua;

echo $artikuloa->deskribapena;

echo $artikuloa->saila;

echo $artikuloa->idazlea_textua; //HTML

echo $artikuloa->idazlea_izena;
echo $artikuloa->idazlea;
?>