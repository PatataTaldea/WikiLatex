<!DOCTYPE html>
<html>
    <body>

    <form>
  <div class="form-group">
    <label for="exampleInputEmail1">Nor zara?</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Idatzi zure emaila edo izen bat">
    <small id="emailHelp" class="form-text text-muted">Ez da zure informaziorik partekatuko</small>
  </div>
  <div class="form-group">
    <label for="exampleInputText1">Iruzkina</label>
    <input type="text" class="form-control" id="exampleInputText1" placeholder="Esan zerbait">
  </div>
  <div class="form-check">
    <label class="form-check-label">
      <input type="checkbox" class="form-check-input">
      Webguneko baldintzak onartzen ditut
    </label>
  </div>
  <div><button type="submit" class="btn btn-primary">Iruzkindu!</button></div>
</form>

<div><h1>Ikurrak</h1></div>
		<div><img id="pic" style="float: right;"></div>
		<div><h5><ul>
			<li id='t1' onmouseover="mouseOver1()"><a href="#">Letra grekoak</a></li>
			<li id='t2' onmouseover="mouseOver2()"><a href="#">Operazio bitarretako ikurrak</a></li>
			<li id='t3' onmouseover="mouseOver3()"><a href="#">Erlazio ikurrak</a></li>
			<li id='t4' onmouseover="mouseOver4()"><a href="#">Puntuazio ikurrak</a></li>
			<li id='t5' onmouseover="mouseOver5()"><a href="#">Gezi ikurrak</a></li>
			<li id='t6' onmouseover="mouseOver6()"><a href="#">Askotariko ikurrak</a></li>
			<li id='t7' onmouseover="mouseOver7()"><a href="#">tamana-aldagaieko ikurrak</a></li>
			<li id='t8' onmouseover="mouseOver8()"><a href="#">Log motako ikurrak</a></li>
			<li id='t9' onmouseover="mouseOver9()"><a href="#">Mugatzaileak</a></li>
			<li id='t10' onmouseover="mouseOver10()"><a href="#">Mugatzaile luzeak</a></li>
			<li id='t11' onmouseover="mouseOver11()"><a href="#">Matematikako azentuak</a></li>
			<li id='t12' onmouseover="mouseOver12()"><a href="#">Bestelako eraikuntzak</a></li>
		</ul></h5></div>
	<!-- ARGAZKIA AGERTZEKO FUNTZIOA -->
	
	<script>
	function mouseOver(id){
		var irudi = id.value+".gif";
		document.getElementById("pic").src="irudi";	
	}
	function mouseOver1(){
		document.getElementById("pic").src="assets/img/t1.gif";	
	}
	function mouseOver2(){
		document.getElementById("pic").src="assets/img/t2.gif";	
	}
	function mouseOver3(){
		document.getElementById("pic").src="assets/img/t3.gif";	
	}
	function mouseOver4(){
		document.getElementById("pic").src="assets/img/t4.gif";	
	}
	function mouseOver5(){
		document.getElementById("pic").src="assets/img/t5.gif";	
	}
	function mouseOver6(){
		document.getElementById("pic").src="assets/img/t6.gif";	
	}
	function mouseOver7(){
		document.getElementById("pic").src="assets/img/t7.gif";	
	}
	function mouseOver8(){
		document.getElementById("pic").src="assets/img/t8.gif";	
	}
	function mouseOver9(){
		document.getElementById("pic").src="assets/img/t9.gif";	
	}
	function mouseOver10(){
		document.getElementById("pic").src="assets/img/t10.gif";	
	}
	function mouseOver11(){
		document.getElementById("pic").src="assets/img/t11.gif";	
	}
	function mouseOver12(){
		document.getElementById("pic").src="assets/img/t12.gif";	
	}
	</script>

    </body>
</html>
