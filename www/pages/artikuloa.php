<div class="card text-center">
    <div class="card-header text-muted">
        <p align="left"><?php echo $artikuloa->saila;?> -> <?php echo $artikuloa->deskribapena;?></p>
    </div>
    <div class="card-body">
        <h1 class="card-title"><u><?php echo $artikuloa->izenburua;?></u></h1>
        <p class="card-text"><?php echo lortu_artikuloa($artikuloa,$ROOTPATH);?></p>
    </div>
    <div class="card-footer text-muted">
        <h3 align="right"><?php echo $artikuloa->idazlea_izena;?></h3>
        <p align="right"><?php echo $artikuloa->idazlea;?></p>
    </div>
</div>