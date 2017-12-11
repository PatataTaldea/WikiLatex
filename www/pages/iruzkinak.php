    <?php session_start(); ?>
    <h1>Esaiguzu zerbait</h1>  
    <form>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputText">Izena</label>
          <?php if(isset($_SESSION['logeatuta']) && $_SESSION['logeatuta']==true){ ?>
            <input type="name" readonly class="form-control" id="name" value="<?php echo $_SESSION['erabiltzailea']; ?>">
          <?php } else { ?>
            <input type="name" class="form-control" id="name" placeholder="Idatzi izen bat" required>
          <?php } ?>
        </div>
        <div class="form-group col-md-6">
          <label for="inputText">Emaila</label>
          <?php if(isset($_SESSION['logeatuta']) && $_SESSION['logeatuta']==true){ ?>
            <input type="email" readonly class="form-control" id="email" value="<?php echo $_SESSION['erab_email']; ?>">
          <?php } else { ?>
            <input type="email" class="form-control" id="email" placeholder="Idatzi zure emaila" required>
          <?php } ?>
        </div>
      </div>
      <div class="form-group">
        <label for="inputText">Iruzkina</label>
        <input type="text" class="form-control" id="text" placeholder="Idatzi zerbait" required>
      </div>
      <div class="form-check">
        <label class="form-check-label">
          <input type="checkbox" class="form-check-input" required>Webguneko baldintzak onartzen ditut
        </label>
      </div>
      <div><button type="button" class="btn btn-primary" onclick="iruzkindu()">Iruzkindu!</button></div>
    </form>
    <br></br>
    <div>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Izena</th>
            <th scope="col">Emaila</th>
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
      <td><?php echo $iruzkin->eposta;?></td>
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