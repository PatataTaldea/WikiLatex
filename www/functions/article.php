<?php

// Index-etik egin da deia artikuloa zuzenean erakusteko.
if (isset($_GET['artikuloa'])){
    
    $data = simplexml_load_file(ARTIKULUAK) or die("Error: Cannot create object");
    $artikuloa = $data->xpath("/artikuloak/artikuloa[izenburua='".$_GET['artikuloa']."']")[0];
    
// AJAX dei bat egin da.
}else {
    require '../config.php';
    require 'xml_functions.php';
    
    $data = simplexml_load_file("../".ARTIKULUAK) or die("Error: Cannot create object");
    $artikuloa = $data->xpath("/artikuloak/artikuloa[izenburua='".$_GET['izenburua']."']")[0];
    
}

if (isset($artikuloa)) {

    echo $artikuloa->izenburua;
    
    echo $artikuloa->deskribapena;
    
    echo $artikuloa->saila;
    
    $html = lortu_artikuloa($artikuloa);
    
    echo $artikuloa->idazlea_izena;
    echo $artikuloa->idazlea;
}

?>