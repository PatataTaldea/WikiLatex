<?php 

require '../../config.php';
require '../xml_functions.php';
session_start();

if (isset($_SESSION['erab_type']) && $_SESSION['erab_type'] == "admin" ) {

    if (isset($_GET['saila'])) {

        $sailak = simplexml_load_file("../../".SAILAK) or die("Error: Cannot create object");
        $saila = $sailak->xpath("//saila[@izena='".$_GET['saila']."']");

        if ($saila == NULL) {
            
            $sailak->addChild("saila",$_GET['saila'])->addAttribute("izena",$_GET['saila']);
            save_formated($sailak, "../../".SAILAK);
            mkdir("../../".ARTIKULUAK_KARPETA.preg_replace('/\s+/', '_', $_GET['saila']));

            echo '0';

        } else echo '1';

    } else echo '3';

} else echo '2';

?>