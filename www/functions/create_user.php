<?php

session_start();
require '../config.php';
require 'xml_functions.php';

if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['pasahitza'])){
    $erabiltzaileak = simplexml_load_file("../".ERABILTZAILEAK) or die("Error: Cannot create object");
    $erab = $erabiltzaileak->xpath("/erabiltzaileak/erabiltzaile[email='".$_POST['email']."']");

    if($erab == NULL) {
        $erab=$erabiltzaileak->addChild('erabiltzaile');
        $erab->addChild('username',$_POST['username']);
        $erab->addChild('email',$_POST['email']);
        $erab->addChild('password',$_POST['pasahitza']);

        save_formated($erabiltzaileak, "../".ERABILTZAILEAK);


        $_SESSION['erabiltzailea'] = $_POST['username'];
        $_SESSION['erab_email'] = $_POST['email'];
        $_SESSION['logeatuta'] = true;

        echo '0';
      
    } else echo '1';

       
} else echo '2';


?>