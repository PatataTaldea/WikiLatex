<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Artikulu Berria</title>
	<script src="modules/ckeditor/ckeditor.js"></script>
	<script src="js/sample.js"></script>
	<script src="js/prueba.js"></script>
	<script src="modules/ckeditor/ckeditor.js"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

</head>
<body id="main">

<main>
	
	<div style="padding:35px">
		<h1>Artikulu berria:</h1>
		<br>
		<form data-toggle="validator" role="form">
			<div class="form-row ">
				<div class="col">
					<label class="control-label" for="izenburua">Izenburua:</label>
					<input type="text" class="form-control" id="izenburua" required="required">
				</div>
				<div class="col">
					<label class="mr-sm-2" for="inputState">Saila:</label>
					<select class="form-control"  id="saila">
	    	    	
	    	    		<?php 
	    	    		

	    	    			$sailak=simplexml_load_file('../data/artikuluak/sailak.xml')or die("Error: Cannot create object");
	    	    	
	    	   
	    	    			 			foreach ($sailak->saila as $saila) {
	    	    				echo('<option>'.$saila.'</option>');
	    	    			}
	    	    		?>
	    	    		<option>Kontaktua</option>
	    			</select>
				</div>
			</div>
			
			<div class="form-row" >
				<div class="col">
					<label class="control-label" for="hitzGako">Hitz gakoak: (koma bidez banandu)</label>
					<input type="text" class="form-control"  id='hitzGako'  required="required">
				</div>
					
			</div>

			<div class="form-row" >
				<div class="col">
					<label class="control-label" for="deskribapena">Deskribapena:</label>
					<input type="text" class="form-control"  id='deskribapena'  required="required">
				</div>
					
			</div>
		
		</form>
    	<br>

		<textarea name="_Text" id="text" style="border: 1px solid gray; width: 600px; height: 250px;"></textarea>
   <script type='text/javascript'>
    CKEDITOR.replace('_Text', { toolbar : [['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'], ['Bold','Italic','Format','Font','FontSize'],['Source'] ] , width:"auto",height:"auto"});


  </script>


		<div style=" margin-top:10px; float: right;">
			
			<button type="button" id="bidali" class="btn btn-dark" onclick="artikuluBerri()">Bidali</button>
		</div>	
   		
		<br>
		<br>
		<br>
                    <div id="response_alert" class="alert alert-primary" role="alert" style="display: none">
                        This is a primary alert—check it out!
                    </div>
	
	</div>

	

</body>
</html>
