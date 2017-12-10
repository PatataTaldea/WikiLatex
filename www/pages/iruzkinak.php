<script type="text/javascript">
        function iruzkindu() {
          <?php $bool=true ?>
        }
</script>
<?php
  $bool=false;
  if ($bool==true) {
    $iruzak = simplexml_load_file("../".IRUZKINAK) or die("Error: Cannot create object");
    $berria = $iruzak->addChild('iruzkin');
    $berria->addChild('data',date("Y/m/d"));
    if(isset($_POST['name'])){
      $berria->addChild('izena',$_POST['name']);
    }
    if(isset($_POST['email']) && $_POST['email']!= ""){
      $berria->addChild('eposta',$_POST['email']);
    }
    if(isset($_POST['text'])){
      $berria->addChild('mezua',$_POST['text']);
    }	
    $iruzak->asXML("../".IRUZKINAK);
  }
  ?>
    <h1>Esaiguzu zerbait</h1>  
    <form action=""../".IRUZKINAK_ORRIA" method="post">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Izena</label>
          <input type="name" class="form-control" name="name" placeholder="Idatzi izen bat" required>
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Emaila</label>
          <input type="email" class="form-control" name="email" placeholder="Idatzi zure emaila">
        </div>
      </div>
      <div class="form-group">
        <label for="inputAddress">Iruzkina</label>
        <input type="text" class="form-control" name="text" placeholder="Idatzi zerbait" required>
      </div>
      <div class="form-check">
        <label class="form-check-label">
          <input type="checkbox" class="form-check-input" required>Webguneko baldintzak onartzen ditut
        </label>
      </div>
      <div><button type="submit" class="btn btn-primary" onclick="iruzkindu()">Iruzkindu!</button></div>
    </form>
    <br></br>
    <div>
      <table class="table">
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
    $data2 = simplexml_load_file("../".IRUZKINAK) or die("Error: Cannot create object");
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
      </table>
    </div>