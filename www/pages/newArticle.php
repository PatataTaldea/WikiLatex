

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
	    			</select>
				</div>
			</div>
			
			<div class="form-row" >
				<div class="col">
					<label class="control-label" for="hitzGako">Hitz gakoak: (koma bidez banandu)</label>
					<input type="text" class="form-control"  id='hitzGako'  required="required">
				</div>
					
			</div>
		
		</form>
    	<br>

		<textarea name="_Text" id="text" style="border: 1px solid gray; width: 600px; height: 250px;"></textarea>
   <script type='text/javascript'>
    CKEDITOR.replace('_Text', { toolbar : [['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'], ['Bold','Italic','Format','Font','FontSize'] ] , contentsCss: "css/test.css" , width:"auto",height:"auto"});


  </script>


		<div style=" margin-top:10px; float: right;">
			
			<button type="button" class="btn btn-dark" onclick="artikuluBerri()">Bidali</button>
		</div>	
   		
		
	
	</div>
