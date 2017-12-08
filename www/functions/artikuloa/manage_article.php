<?php 
/*
 * Fitxategi honek onartuta ez dauden artikuloak maneiatzeko balio du. Funtzio honetan
 * sarrera bezela sartutako artikuloa onartzeko edo baztertzeko balio du. Bi kasuetan artikuloa
 * ez_ebaluatuak.xml-tik borratua izango da, eragiketa = 'onartu' den kasuan index.xml-an
 * gordeko da artikuloa, onartutzat emanez.
 * 
 * @param: String $_GET['eragiketa'] artikuloari aplikatu nahi diogun eragiketa. (onartu/baztertu)
 *         String $_GET['artikuoa'] artikuloaren izenburua.
 *  
 * @return: 0 Dena ondo joan bada artikuloa onartu edo baztertuko du.
 *          1 Sartutako datuak desegokiak dira.
 *          2 Emandako artikuloa ez bada existitzen.
 *          3 Emandako eragiketa ezezaguna bada.
 *          4 AccessDenied erabiltzailea ez da administratzailea.
*/

require '../../config.php';
require '../xml_functions.php';
session_start();

// Badaezpada begiratu ea erabiltzailea administratzaile bezela logeatuta dagoen.
if (isset($_SESSION['erab_type']) && $_SESSION['erab_type'] == "admin") {

    if (isset($_GET['eragiketa']) && isset($_GET['artikuloa'])) {
        
        // Oraindik onartu gabe dauden lista kargatu eta sarrera bezela eman diguten artikuloa bilatu
        $ez_onartuak = simplexml_load_file("../../".EZ_ARTIKULUAK) or die("Error: Cannot create object");
        $artikuloa = $ez_onartuak->xpath("/artikuloak/artikuloa[izenburua='".$_GET['artikuloa']."']")[0];
    
        // Emandako artikuloa ez bada existitzen 2 errore kodea itzuli eta prozeduratik atera.
        if ($artikuloa == NULL) {
            echo '2';
            exit;
        }
    
        // Emandako eragiketa ezaguna ez bada 3 errore kodea itzuli eta prozeduratik atera.
        if ($_GET['eragiketa'] != "onartu" && $_GET['eragiketa'] != "baztertu") {
            echo '3';
            exit;
        }
    
        // bidalitako eragiketa onartu bada index.xml-ra artikulo berria kopiatu
        if ($_GET['eragiketa'] == "onartu") {
            $onartuak = simplexml_load_file("../../".ARTIKULUAK) or die("Error: Cannot create object");
            $arti_onartua = $ez_onartuak->xpath("/artikuloak/artikuloa[izenburua='".$_GET['artikuloa']."']")[0];
    
            if ($arti_onartua != NULL) {
                $berria = $onartuak->addChild('artikuloa');
                $berria->addChild('izenburua', $artikuloa->izenburua);
                $berria->addChild('saila', $artikuloa->saila);
                $berria->addChild('deskribapena', $artikuloa->deskribapena);
                $berria_hitzgakoak = $berria->addChild('hitzgakoak');
                foreach($artikuloa->hitzgakoak->hitza as $hitza) {
                    $berria_hitzgakoak->addChild('hitza',$hitza);
                }
                $berria->addChild('idazlea', $artikuloa->idazlea);
                $berria->addChild('idazlea_izena', $artikuloa->idazlea_izena);
                $berria->addChild('textua', $artikuloa->textua);
            }
    
            // Gorde aldaketak ebaluatuetan
            save_formated($onartuak, "../../".ARTIKULUAK);
        }
    
        // Gorde aldaketak ez ebaluatuetan
        unset($artikuloa[0]);
        save_formated($ez_onartuak, "../../".EZ_ARTIKULUAK);
    
        echo '0';
        
    } else echo '1';
} else echo '4';

?>