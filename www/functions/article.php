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

    $data = simplexml_load_file($ROOTPATH.ARTIKULUAK) or die("Error: Cannot create object");
    $artikuloa = $data->xpath("/artikuloak/artikuloa[izenburua='".$_GET['izenburua']."']")[0];
    
}

if (isset($artikuloa)) {
?>
    <div class="card text-center">
        <div class="card-header text-muted">
            <p align="left"><?php echo $artikuloa->saila;?> -> <?php echo $artikuloa->deskribapena;?></p>
        </div>
        <div class="card-body">
            <h1 class="card-title"><u><?php echo $artikuloa->izenburua;?></u></h1>
            <p class="card-text"><?php $html = lortu_artikuloa($artikuloa,$ROOTPATH);?></p>
        </div>
        <div class="card-footer text-muted">
            <h3 align="right"><?php echo $artikuloa->idazlea_izena;?></h3>
            <p align="right"><?php echo $artikuloa->idazlea;?></p>
        </div>
    </div>
<?php
}

?>