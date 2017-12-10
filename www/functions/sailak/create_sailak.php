<?php 
/*
 * Fitxategi honek sailak sortzeko balio du. Funtzio honetan sarrera bezela sailaren izena
 * hartuko da. Sailak bakarrik administratzaileak sorty ahal izango ditu, beraz administratzailea
 * ez bada errorea bota beharko du. Saila dagoeneko existitzen bada orduan errorea botako du ere.
 * Dena ondo joan bada saila sortuko du eta sail berriari dagokion karpeta ere.
 * 
 * @param: String $_GET['saila'] Sailaren izena.
 *  
 * @return: 0 Dena ondo joan bada saila sortuko du.
 *          1 Existitzen da dagoeneko sail bat izen berdinarekin.
 *          2 Erabiltzailea ez dago logeatuta edo ez da administratzailea.
 *          3 Sarrera desegokia egon da.
*/
require '../../config.php';
require '../xml_functions.php';
session_start();

if (isset($_SESSION['erab_type']) && $_SESSION['erab_type'] == "admin" ) {
    // Konprobatu sarrera
    if (isset($_GET['saila'])) {

        // Sailak.xml kargatu eta begiratu izen berdina duen saila existitzen den dagoeneko.
        $sailak = simplexml_load_file("../../".SAILAK) or die("Error: Cannot create object");
        $saila = $sailak->xpath("//saila[@izena='".$_GET['saila']."']");

        if ($saila == NULL) {
            
            // Sail berria sortu sailak.xml-an
            $sailak->addChild("saila",$_GET['saila'])->addAttribute("izena",$_GET['saila']);
            save_formated($sailak, "../../".SAILAK);

            // Sail berriari dagokion karpeta sortu.
            mkdir("../../".ARTIKULUAK_KARPETA.preg_replace('/\s+/', '_', $_GET['saila']));

            // Dena ondo joan da eta saila ondo sortu da.
            echo '0';

        } else echo '1'; // Existitzen da dagoeneko sail bat izen berdinarekin.

    } else echo '3'; // Sarrera desegokia egond da.

} else echo '2'; // Erabiltzailea ez dago logeatuta edo ez da administratzailea.

?>