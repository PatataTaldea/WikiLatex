<?php
session_start();


if (isset($_POST['orria']) && $_POST['orria'] == "orokorra") {
?>
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

<?php
}
?>