<?php

require '../config.php';
  

// Kontaktua orriaren HTML kodea
if (isset($_GET['saila']) && $_GET['saila']=='Kontaktua') {
  require '../'.KONTAKTUA;
} 
// Iruzkin orriaren HTML kodea
else if (isset($_GET['saila']) && $_GET['saila']=='Iruzkinak') {
  require '../'.IRUZKINAK_ORRIA;
} 
// Home saileko HTML kodea
else if (isset($_GET['saila']) && $_GET['saila'] == 'HOME') {
  require '../'.HOME;
}
// Bestelako sailak funtzio orokorra behar dute
else if (isset($_GET['saila'])) {
 require '../'.SAILA_ORRIA;
}
?>
