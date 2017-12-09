<?php 
    // Segurtasunerako kontrola
    if (!isset($_SESSION['logeatuta']) ){
        die();
    }

    $artikuloak = simplexml_load_file("../".ARTIKULUAK) or die("Error: Cannot create object");
    $artikuloa = $artikuloak->xpath("/artikuloak/artikuloa[idazlea='".$_SESSION['erab_email']."']");
?>
<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3" id="ezkerreko-menua">
        <ul class="list-group w-md-50 p-3 mx-auto">
            <li class="list-group-item d-flex justify-content-between align-items-center">
            Artikulo kopurua:
            <span id="erab_izena"><?php echo sizeof($artikuloa); ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
            Sortu berria:
            <button type="button" class="btn btn-info float-right" id="sortuArtikuloaBtn" onclick="javascript:location.href='<?php echo INDEX.'?sortu=true';?>'">Sortu</button>
            </li>
        </ul>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
        <div class="container" id="tab-content">
            <table class="table">
                <thead class="thead">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Izenburua</th>
                    <th scope="col">URL</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $i = 0;
                        foreach($artikuloa as $arti) {
                            $i = $i +1;
                            $helbidea = ROOTPATH . INDEX . "?artikuloa=$arti->izenburua";
                            ?>
                            <tr>
                                <th scope="row"><?php echo $i;?></th>
                                <td><?php echo $arti->izenburua;?></td>
                                <td><a href="<?php echo $helbidea?>"><?php echo $helbidea?></a></td>
                            </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-sm-1 col-md-2 col-lg-1 col-xl-1">
    </div>
</div>
