<?php


session_start();
require '../config.php';
require 'xml_functions.php';


if (isset($_POST['editor']) ){



	$artikuluak=simplexml_load_file('../'.EZ_ARTIKULUAK) or die("Error: Cannot create object");

	foreach ($artikuluak->artikuloa as $artikuloa){
		if(strcmp($artikuloa->izenburua,$_POST['izenburua']) && strcmp($artikuloa->saila,$_POST['saila'])){
			echo('<script>
    alert("Izenburu errepikatua, erabili beste izenburu bat!");
</script>');
			break;
		}

	$berria=$artikuluak->addChild('artikuloa');

	print_r($_POST['editor']);

	
	$hitzGakoak=$berria->addChild('hitzgakoak');

	$hitzGakoa=explode(",",$_POST['hitzGakoak']);
	
	foreach ($hitzGakoa as $gako){
		$hitzGakoak->addChild('hitza',$gako);
	}

	
	$berria->addChild('izenburua',$_POST['izenburua']);

	$berria->addChild('saila',$_POST['saila']);

	if(isset($_SESSION['erabiltzailea'])){
		$berria->addChild('idazlea_izena',$_SESSION['erabiltzailea']);
	}
	
	
	if(isset($_SESSION['erab_email'])){
		$berria->addChild('idazlea',$_SESION['erab_email']);
	}
	
	$berria->addChild('textua',$_POST['saila'].'/'.$_POST['izenburua'].'.html');

	$contenido = $_POST['editor'];

	file_put_contents('../../data/artikuluak/'.$_POST['saila'].'/'.$_POST['izenburua'].'.html', $contenido);
	
    save_formated($artikuluak, "../".EZ_ARTIKULUAK);

    echo $contenido;
      

       
} else echo '1';


?>