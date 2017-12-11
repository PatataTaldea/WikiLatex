<?php
require '../config.php';
require 'xml_functions.php';
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['text'])) {
  $iruzak = simplexml_load_file("../".IRUZKINAK) or die("Error: Cannot create object");
  $berria = $iruzak->addChild('iruzkin');
  $berria->addChild('data',date("Y/m/d"));
  $berria->addChild('izena',$_POST['name']);
  $berria->addChild('eposta',$_POST['email']);
  $berria->addChild('mezua',$_POST['text']);
  save_formated($iruzak, "../".IRUZKINAK);
  echo '0';
} else echo '1';
?>