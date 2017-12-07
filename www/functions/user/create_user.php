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
if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['pasahitza'])){
    if ( strlen($_POST['username']) < 4 || strlen($_POST['username']) > 10 ) {
        echo '3';
        exit;
    } 
    $erabiltzaileak = simplexml_load_file("../../".ERABILTZAILEAK) or die("Error: Cannot create object");
    $erab = $erabiltzaileak->xpath("/erabiltzaileak/erabiltzaile[email='".$_POST['email']."']");
    if($erab == NULL) {
        $erab=$erabiltzaileak->addChild('erabiltzaile');
        $erab->addChild('username',$_POST['username']);
        $erab->addChild('email',$_POST['email']);
        $erab->addChild('password',$_POST['pasahitza']);
        $erab->addChild('type','user'); 
        save_formated($erabiltzaileak, "../../".ERABILTZAILEAK);
        $_SESSION['erabiltzailea'] = $_POST['username'];
        $_SESSION['erab_email'] = $_POST['email'];
        $_SESSION['erab_pass'] = $_POST['pasahitza'];
        $_SESSION['erab_type'] = "user";
        $_SESSION['logeatuta'] = true;
        echo '0';
      
    } else echo '1';
       
} else echo '2';
?>