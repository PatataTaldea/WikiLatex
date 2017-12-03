<?php
/*
 * Fitxategi honek erabiltzaileak editatzeko erabiltzen da. Hain zuzen ere erabiltzailearen
 * pasahitza aldatzeko erabiltzen da bereziki. Begiratzen du ea sesioa oraindik irekita dagoen,
 * pasahitza zaharra erabiltzailearen pasahitz berbera dela eta pasahitz berria zaharraren ezberdina dela.
 * 
 * @param: String $_POST['pass_z'] erabiltzailearen pasahitz zaharra.
 *         String $_POST['pass_b'] erabiltzailearen pasahitz berria.
 *  
 * @return: 0 Dena ondo joan bada eta erabiltzailea sortu badu.
 *          1 Jasotako pasahitz zaharra ez dator bat erabiltzailearen pasahitzarekin.
 *          2 Jasotako pasahitz berria zaharraren berdina da.
 *          3 Sartutako datu kopurua ez da egokia.
 *          4 Sesioa ez dago irekita.
*/

session_start();
require '../../config.php';
require '../xml_functions.php';

if (isset($_SESSION['logeatuta']) && $_SESSION['logeatuta']) {
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
} else echo '4';

?>