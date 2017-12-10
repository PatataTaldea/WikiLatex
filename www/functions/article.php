<?php

// Index-etik egin da deia artikuloa zuzenean erakusteko.
if (isset($_GET['artikuloa'])){
    $ROOTPATH = '';
    $data = simplexml_load_file(ARTIKULUAK) or die("Error: Cannot create object");
    $artikuloa = $data->xpath("/artikuloak/artikuloa[izenburua='".$_GET['artikuloa']."']")[0];
    
// AJAX dei bat egin da.
}else {
    $ROOTPATH = '../';
    require $ROOTPATH.'config.php';
    require 'xml_functions.php';

    if (isset($_GET['ez-ebaluatua'])) {
        $data = simplexml_load_file($ROOTPATH.EZ_ARTIKULUAK) or die("Error: Cannot create object");
        $artikuloa = $data->xpath("/artikuloak/artikuloa[izenburua='".$_GET['izenburua']."']")[0];
    }else{
        $data = simplexml_load_file($ROOTPATH.ARTIKULUAK) or die("Error: Cannot create object");
        $artikuloa = $data->xpath("/artikuloak/artikuloa[izenburua='".$_GET['izenburua']."']")[0];
    }

    
}

if (isset($artikuloa) && $artikuloa != NULL) {
    require $ROOTPATH.ARTIKULOA_IKUSI;
} else require $ROOTPATH.ERROR_404;

?>