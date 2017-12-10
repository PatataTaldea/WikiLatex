<?php
    $data = simplexml_load_file("../".ARTIKULUAK) or die("Error: Cannot create object");
    $artikuloak = $data->xpath("/artikuloak/artikuloa[saila='".$_GET['saila']."']");
?>
<div class="row">
    <div class="col-11">
        <h1><?php echo $_GET['saila'];?></h1>
        <?php
        foreach($artikuloak as $artikuloa){
        ?>
            <div class="list-group-item list-group-item-action flex-column align-items-start" onclick="idatziArtikulua('<?php echo $artikuloa->izenburua;?>','<?php echo $artikuloa->saila;?>');">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1"><?php echo $artikuloa->izenburua;?></h5>
                    <small><?php echo $artikuloa->saila; ?></small>
                </div>
                <p class="mb-1"><?php echo $artikuloa->deskribapena;?></p>
                <small>Egilea: <?php echo $artikuloa->idazlea;?></small>
            </div>	
        <?php
        }
        ?>
    </div>
    <div class="col-1">
    </div>
</div>
