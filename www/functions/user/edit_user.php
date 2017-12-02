<?php
session_start();
require '../../config.php';
require '../xml_functions.php';

if (isset($_POST['pass_z']) && isset($_POST['pass_b'])){

    if ($_POST['pass_z'] != $_SESSION['erab_pass']){
        echo '1';
        exit;
    }

    if ($_POST['pass_z'] == $_POST['pass_b']){
        echo '2';
        exit;
    }

    $erabiltzaileak = simplexml_load_file("../../".ERABILTZAILEAK) or die("Error: Cannot create object");
    $pass = $erabiltzaileak->xpath("/erabiltzaileak/erabiltzaile[email='".$_SESSION['erab_email']."']/password");

    $pass[0][0] = $_POST['pass_b'];
    $_SESSION['erab:pass'] = $_POST['pass_b'];

    save_formated($erabiltzaileak, "../../".ERABILTZAILEAK);

    echo '0';

} else echo '3';

?>