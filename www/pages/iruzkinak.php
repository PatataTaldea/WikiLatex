<?php 
  $data2 = simplexml_load_file("../".IRUZKINAK) or die("Error: Cannot create object");
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
