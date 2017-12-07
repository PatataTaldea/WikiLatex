<?php
require '../config.php';
$data = simplexml_load_file("../".ARTIKULUAK) or die("Error: Cannot create object");
  
  if (isset($_GET['saila']) && $_GET['saila']=='HOME') {
  ?>
    <h1>HOMEEEEEEEEEEEEEEEEE</h1>
<?php 
} else if (isset($_GET['saila']) && $_GET['saila']=='Kontaktua') {
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
} else {
  ?>
    <h1>Ekuazioak eta ikurrak<button type="button" class="btn btn-outline-primary" onclick="sortuArtikulua()">Sortu artikulu berri bat</button></h1>

<?php
    foreach($data->artikuloa as $artikuloa){
  ?>
      <div class="list-group" onclick="console.log('patata');">
        <a href="<?php echo $artikuloa->textua;?>" class="list-group-item list-group-item-action flex-column align-items-start">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1"><?php echo $artikuloa->izenburua;?></h5>
            <small><?php echo $artikuloa->saila; ?></small>
         </div>
          <p class="mb-1"><?php echo $artikuloa->deskribapena;?></p>
          <small>Egilea: <?php echo $artikuloa->idazlea;?></small>
       </a>
      </div>	

<?php
    }
}
?>
