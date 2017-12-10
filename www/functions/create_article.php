<?php
session_start();
require '../config.php';
require 'xml_functions.php';


if (isset($_POST['editor']) ){


	$artikuluak=simplexml_load_file('../'.EZ_ARTIKULUAK) or die("Error: Cannot create object");
	$artikuluak2=simplexml_load_file('../'.ARTIKULUAK) or die("Error: Cannot create object");
	$art = $artikuluak->xpath("artikuloa[izenburua='".$_POST['izenburua']."']")[0];
	$art2 = $artikuluak2->xpath("artikuloa[izenburua='".$_POST['izenburua']."']")[0];
    
    if($art == NULL && $art2 == NULL) {

		$berria=$artikuluak->addChild('artikuloa');

	

		
		$hitzGakoak=$berria->addChild('hitzgakoak');

		$hitzGakoa=explode(",",$_POST['hitzGakoak']);
		
		foreach ($hitzGakoa as $gako){
			$hitzGakoak->addChild('hitza',$gako);
		}

		
		$berria->addChild('izenburua',$_POST['izenburua']);

		$berria->addChild('saila',$_POST['saila']);

		if(isset($_SESSION['erabiltzailea'])){
			$berria->addChild('idazlea_izena',substr($_SESSION['erabiltzailea'],0));
		}
		
		
		if(isset($_SESSION['erab_email'])){
			$berria->addChild('idazlea',substr($_SESSION['erab_email'],0));
		}
		
		

		$contenido = $_POST['editor'];

		$sail = preg_replace('/\s+/', '_', $_POST['saila']);

		file_put_contents('../'.ARTIKULUAK_KARPETA.$sail.'/'.$_POST['izenburua'].'.html', $contenido);

		$berria->addChild('textua',$sail.'/'.$_POST['izenburua'].'.html');
		
	    save_formated($artikuluak, "../".EZ_ARTIKULUAK);

	    echo '0';


	}   
	else{
		echo '2';
	} 

       
} else echo '1';


?>