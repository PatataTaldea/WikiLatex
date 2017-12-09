<?php 
// Segurtasunerako kontrola
if (!isset($_SESSION['logeatuta']) ){
    die();
} else if ($_SESSION['erab_type'] != "admin") {
    die();
}

$artikuloak = simplexml_load_file("../".EZ_ARTIKULUAK) or die("Error: Cannot create object");
?>
<div class="row" id="sailak-sortu">
    <div class="col-sm-1 col-md-2 col-lg-2 col-xl-2">
    </div>
    <div class="col-sm-10 col-md-8 col-lg-8 col-xl-8">
        <h3>Sailak</h3>
        <form class="form-inline">
            <div class="form-group">
                <label for="sortuSailaLabel" class="sr-only">Sortu sail berria:</label>
                <input type="text" readonly class="form-control-plaintext" id="sortuSailaLabel" value="Sortu sail berria:">
            </div>
            <div class="form-group mx-sm-3">
                <label for="sailBerria" class="sr-only">Sail berria</label>
                <input type="text" class="form-control" id="sailBerria" placeholder="Sailaren izena">
            </div>
            <button type="button" class="btn btn-primary" onclick="sortuSaila()">Sortu</button>
        </form>
        <br>
        <div id="sailaSortuEmaitza" class="alert alert-primary" role="alert" style="display: none;">
            This is a primary alert—check it out!
        </div>

    </div>
    <div class="col-sm-1 col-md-2 col-lg-2 col-xl-2">
    </div>
</div>
<hr>
<div class="row" id="artikulo-aurreikuspena">
</div>
<div class="row">
    <div class="col-sm-1 col-md-2 col-lg-2 col-xl-2" id="ezkerreko-menua">
    </div>
    <div class="col-sm-10 col-md-8 col-lg-8 col-xl-8">
        <h3>Artikuloak</h3>
        <div class="container" id="tab-content">
            <table class="table">
                <thead class="thead">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Izenburua</th>
                    <th scope="col">Aukera</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $i = 0;
                    foreach ($artikuloak->artikuloa as $artikuloa) {
                        $i = $i +1;
                        ?> 
                        <tr>
                            <th class="col-1" scope="row"><?php echo $i;?></th>
                            <td class="col-7"><?php echo $artikuloa->izenburua;?></td>
                            <td class="col-4">
                                <button type="button" class="btn btn-info" onclick="artikuloaBistaratu('<?php echo $artikuloa->izenburua;?>')"><i class="fa fa-search"></i></button>
                                <button type="button" class="btn btn-success" onclick="artikuloaManeiatu('onartu','<?php echo $artikuloa->izenburua;?>')">&#10003;</button>
                                <button type="button" class="btn btn-danger" onclick="artikuloaManeiatu('baztertu','<?php echo $artikuloa->izenburua;?>')">&#9587;</button>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-sm-1 col-md-2 col-lg-2 col-xl-2">
    </div>
</div>