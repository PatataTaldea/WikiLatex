<?php


session_start();
require '../config.php';
require 'xml_functions.php';


if (isset($_POST['editor']) ){


	$artikuluak=simplexml_load_file('../'.EZ_ARTIKULUAK) or die("Error: Cannot create object");
	$artikuluak2=simplexml_load_file('../'.ARTIKULUAK) or die("Error: Cannot create object");
	$art = $artikuluak->xpath("/artikuluak/artikuloa[izenburua='".$_POST['izenburua']."']");
	$art2 = $artikuluak2->xpath("/artikuluak/artikuloa[izenburua='".$_POST['izenburua']."']");
    
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
		
		$berria->addChild('textua',$_POST['saila'].'/'.$_POST['izenburua'].'.html');

		$contenido = $_POST['editor'];

		$path = preg_replace('/\s+/', '_', '../'.ARTIKULUAK_KARPETA.$_POST['saila'].'/'.$_POST['izenburua'].'.html');

		file_put_contents($path, $contenido);
		
	    save_formated($artikuluak, "../".EZ_ARTIKULUAK);

	    echo '0';


	}   
	else{
		echo '2';
	} 

       
} else echo '1';


?>