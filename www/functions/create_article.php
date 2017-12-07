<?php
/*
 * Fitxategi honek erabiltzaileak sortzeko erabiltzen da. Bidalitako informazioa aztertu, datubasea
 * izango den XML fitxategia atzitzeko eta aldatzeko balio du. Jasotako informazioaren arabera, eta
 * datubasearen arabera emaitza ezberdinak itzuliko ditu.
 * 
 * @param: String $_POST['username'] erabiltzaile berriaren erabiltzaile-izena.
 *         String $_POST['email'] erabiltzaile berriaren emaila.
 *         String $_POST['pasahitza'] erabiltzaile berria izango duen pasahitza.
 *  
 * @return: 0 Dena ondo joan bada eta erabiltzailea sortu badu.
 *          1 Erabiltzailea jadanik existitzen bada. Email berdina duen erabiltzaila
 *            hain zuzen ere.
 *          2 Jaso behar diren datu guztiak jaso ez badira.
 *          3 erabiltzaile izena tamaina desegokia badu.
*/

session_start();
require '../../config.php';
require '../xml_functions.php';

if (isset($_POST['data']) ){


	$artikuluak=simplexml_load_file('../../data/ez_ebaluatuak.xml') or die("Error: Cannot create object");
	$berria=$artikuluak->addChild('artikuloa');
	
	$berria->addChild('idazlea_izena',_SESION['erabiltzailea']);
	$berria->addChild('idazlea',_SESION['erab_email']);
	$berria->addChild('textua',$_POST['data']);
	

    echo '0';
      

       
} else echo '1';


?>