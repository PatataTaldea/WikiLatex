<?php
require '../config.php';
$data = simplexml_load_file("../".ARTIKULUAK) or die("Error: Cannot create object");
$data2 = simplexml_load_file("../".IRUZKINAK) or die("Error: Cannot create object");
  
if (isset($_GET['saila']) && $_GET['saila']=='Kontaktua') {
  ?>
  <div class="card-group">
    <div class="card border-success mb-3" style="width: 20rem;">
      <img class="card-img-top" src="assets/img/patatafri.png" alt="Oskar">
      <div class="card-body">
        <h4 class="card-title">Oskar maisua</h4>
        <p class="card-text">Munduko garatzailerik bikainena.</p>
      </div>
      <div class="card-footer">
        <p class="card-text">ikasle01@patata.com</p>
      </div>
    </div>
    <div class="card border-success mb-3" style="width: 20rem;">
      <img class="card-img-top" src="assets/img/mai.png" alt="Maite">
      <div class="card-body">
        <h4 class="card-title">Maitechan</h4>
        <p class="card-text">Patxirekin urtebetez entrenatu ondoren Latex maisu bihurtu zen.</p>
      </div>
      <div class="card-footer">
        <p class="card-text">ikasle02@patata.com</p>
      </div>
    </div>
    <div class="card border-success mb-3" style="width: 20rem;">
      <img class="card-img-top" src="assets/img/isa.png" alt="Isabel">
      <div class="card-body">
        <h4 class="card-title">Isachan</h4>
        <p class="card-text">Hacker-ninja-precure bat.</p>
      </div>
      <div class="card-footer">
        <p class="card-text">ikasle03@patata.com</p>
      </div>
    </div>
    <div class="card border-success mb-3" style="width: 20rem;">
      <img class="card-img-top" src="assets/img/bibury.png" alt="Egoitz">
      <div class="card-body">
        <h4 class="card-title">Egonichan</h4>
        <p class="card-text">Gauzak aldrebesten dituen mutiko xelebrea.</p>
      </div>
      <div class="card-footer">
        <p class="card-text">ikasle04@patata.com</p>
      </div>
    </div>
  </div>
<?php 
} else if (isset($_GET['saila']) && $_GET['saila']=='Galderak') {
  ?>
    <h1>Esaiguzu zerbait<button type="button" class="btn btn-outline-primary" style="float: right;" onclick="iruzkindu()">Iruzkindu</button></h1>
    <div><table class="table">
    <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Izena</th>
      <th scope="col">Iruzkina</th>
	  <th scope="col">Data</th>
    </tr>
  </thead>
  <tbody>
<?php
    $kont = 0;
    foreach($data2->iruzkin as $iruzkin){
  ?>
    <tr>
      <td><?php echo $kont+1;?></td>
      <td><?php echo $iruzkin->izena;?></td>
      <td><?php echo $iruzkin->mezua;?></td>
	    <td><?php echo $iruzkin->data;?></td>
    </tr>
<?php
    $kont = $kont+1;
    }
    ?>
  </tbody>
</table></div>
<?php	
} else if (isset($_GET['saila']) && $_GET['saila']=='Nondik hasi') {
  ?>
    <h1>Nola hasi Latex erabiltzen<button type="button" class="btn btn-outline-primary" style="float: right;" onclick="sortuArtikulua()">Sortu artikulu berri bat</button></h1>
<?php
    foreach($data->artikuloa as $artikuloa){
      if ($artikuloa->saila=="Nondik hasi"){
  ?>
      <div class="list-group-item list-group-item-action flex-column align-items-start" onclick="idatziArtikulua('<?php echo $artikuloa->izenburua;?>');">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1"><?php echo $artikuloa->izenburua;?></h5>
            <small><?php echo $artikuloa->saila; ?></small>
         </div>
          <p class="mb-1"><?php echo $artikuloa->deskribapena;?></p>
          <small>Egilea: <?php echo $artikuloa->idazlea;?></small>
      </div>	
<?php
      }
    }
} else if (isset($_GET['saila']) && $_GET['saila']=='Ekuazioak') {
  ?>
    <h1>Ekuazioak, funtzioak, ikurrak eta abar<button type="button" class="btn btn-outline-primary" style="float: right;" onclick="sortuArtikulua()">Sortu artikulu berri bat</button></h1>
<?php
    foreach($data->artikuloa as $artikuloa){
      if ($artikuloa->saila!="Nondik hasi"){
  ?>
      <div class="list-group-item list-group-item-action flex-column align-items-start" onclick="idatziArtikulua('<?php echo $artikuloa->izenburua;?>');">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1"><?php echo $artikuloa->izenburua;?></h5>
            <small><?php echo $artikuloa->saila; ?></small>
         </div>
          <p class="mb-1"><?php echo $artikuloa->deskribapena;?></p>
          <small>Egilea: <?php echo $artikuloa->idazlea;?></small>
      </div>	
<?php
      }
    }
}
?>
