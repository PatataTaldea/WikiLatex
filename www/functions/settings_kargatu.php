<?php
require '../config.php';
session_start();


if (isset($_POST['orria']) && $_POST['orria'] == "orokorra") {
?>
<div class="col-sm-1 col-lg-3 col-xl-3" id="ezkerreko-menua">
</div>
<div class="col-sm-10 col-md-8 col-lg-6 col-xl-6">
    <div class="container" id="tab-content">
        <ul class="list-group w-md-50 p-3 mx-auto">
            <li class="list-group-item d-flex justify-content-between align-items-center">
            Erabiltzaile izena:
            <span id="erab_izena"><?php echo $_SESSION['erabiltzailea']; ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
            Emaila:
            <span id="erab_emaila"><?php echo $_SESSION['erab_email']; ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
            Erabiltzaile mota:
            <span id="erab_emaila"><?php echo $_SESSION['erab_type']; ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
            Pasahitza:
            <button type="button" class="btn btn-light"data-toggle="collapse" data-target="#collapsePasahitza" aria-expanded="false" aria-controls="collapseExample">Aldatu</button>
            <div class="collapse" id="collapseExample">
            </li>
        </ul>

        <div class="collapse" id="collapsePasahitza">
            <div class="card card-body">
                <form>
                    <div class="form-group">
                        <label for="pasahitzZaharraInput">Pasahitz zaharra:</label>
                        <input type="password" class="form-control" id="pasahitzZaharraInput" placeholder="Pasahitz zaharra">
                    </div>
                    <div class="form-group">
                        <label for="pasahitzBerria1Input">Pasahitz berria:</label>
                        <input type="password" class="form-control" id="pasahitzBerria1Input" placeholder="Pasahitz berria">
                    </div>
                    <div class="form-group">
                    <input type="password" class="form-control" id="pasahitzBerria2Input" placeholder="Pasahitz berria errepikatu">
                    </div>
                    <button type="button" class="btn btn-info float-right disabled" id="pasahitzaBidaliBtn" onclick="aldatuPasahitza()">Bidali</button>
                </form>
            </div>
            <br>
            <div id="aldaketaEmaitzaAlert" class="alert" role="alert" style="display: none;">
                This is a success alert—check it out!
            </div>
        </div>
    </div>
</div>
<div class="col-sm-1 col-lg-3 col-xl-3">
</div>

<?php
} else if (isset($_POST['orria']) && $_POST['orria'] == "artikuloak") {

    $artikuloak = simplexml_load_file("../".ARTIKULUAK) or die("Error: Cannot create object");
    $artikuloa = $artikuloak->xpath("/artikuloak/artikuloa[idazlea='".$_SESSION['erab_email']."']");
?>
<div class="col-sm-12 col-md-12 col-lg-3 col-xl-3" id="ezkerreko-menua">
    <ul class="list-group w-md-50 p-3 mx-auto">
        <li class="list-group-item d-flex justify-content-between align-items-center">
        Artikulo kopurua:
        <span id="erab_izena"><?php echo sizeof($artikuloa); ?></span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
        Sortu berria:
        <button type="button" class="btn btn-info float-right" id="sortuArtikuloaBtn" onclick="sortuArtikuloBerria()">Sortu</button>
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

<?php
} else if (isset($_POST['orria']) && $_POST['orria'] == "admin") {
?>
<div class="col-sm-1 col-md-2 col-lg-2 col-xl-2" id="ezkerreko-menua">
</div>
<div class="col-sm-10 col-md-18 col-lg-8 col-xl-8">
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
                <tr>
                    <th class="col-1" scope="row">1</th>
                    <td class="col-7">Ikur matematikoak</td>
                    <td class="col-4">
                        <button type="button" class="btn btn-info"><i class="fa fa-search"></i></button>
                        <button type="button" class="btn btn-success">&#10003;</button>
                        <button type="button" class="btn btn-danger">&#9587;</button>
                    </td>
                </tr>
                <tr>
                    <th class="col-1" scope="row">2</th>
                    <td class="col-7">Matrizeak</td>
                    <td class="col-4">
                        <button type="button" class="btn btn-info"><i class="fa fa-search"></i></button>
                        <button type="button" class="btn btn-success">&#10003;</button>
                        <button type="button" class="btn btn-danger">&#9587;</button>
                    </td>
                </tr>
                <tr>
                    <th class="col-1" scope="row">3</th>
                    <td class="col-7">Ekuazioak</td>
                    <td class="col-4">
                        <button type="button" class="btn btn-info"><i class="fa fa-search"></i></button>
                        <button type="button" class="btn btn-success">&#10003;</button>
                        <button type="button" class="btn btn-danger">&#9587;</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="col-sm-1 col-md-2 col-lg-2 col-xl-2">
</div>
<?php
}
?>