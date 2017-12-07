<?php
require '../config.php';
$data = simplexml_load_file("../".ARTIKULUAK) or die("Error: Cannot create object");


?>

<h1>Ekuazioak eta ikurrak<button type="button" class="btn btn-outline-primary" onclick="sortuArtikulua()">Sortu artikulu berri bat</button></h1>
    
<?php
foreach($data->artikuloa as $artikuloa){
  ?>
<div class="list-group" onclick="console.log('patata');">
  <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1"><?php echo $artikuloa->izenburua; ?></h5>
      <small><?php echo $artikuloa->saila; ?></small>
    </div>
    <p class="mb-1"><?php echo $artikuloa->deskribapena;?></p>
    <small>Egilea: <?php echo $artikuloa->idazlea;?></small>
  </a>
</div>	

  <?php
}

?>
