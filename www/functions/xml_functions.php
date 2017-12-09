
<?php

//require_once '../config.php';

/*
 * Funtzio honek emandako XML fitxategiaren SimpleXMLObject instantzia XML formateatu batean gordetzen
 * du, hain zuzen ere tabulazioak errespetatuz hobeto ikus dadin.
 * 
 * @param: SimpleXMLObject $simpleXmlObject SimpleXML-ren bidez irekitako XML fitxategiaren instantzia.
 *         String $path Gorde nahi dugun fitxategiaren direktorioa.
 * @return: true
 *
*/
function save_formated(&$simpleXmlObject, $path){
    
    if( ! is_object($simpleXmlObject) ){
        return "";
    }
    //Format XML to save indented tree rather than one line
    $dom = new DOMDocument('1.0');
    $dom->preserveWhiteSpace = false;
    $dom->formatOutput = true;
    $dom->loadXML($simpleXmlObject->asXML());
    $xml = $dom->saveXML();
    
    $new_xml = fopen($path, "w");
    fwrite($new_xml, $xml);
    fclose($new_xml);

    return true;
}
/*
 * Funtzio honek emandako artikuloaren HTML-a lortzen du.
 * 
 * @param: SimpleXMLObject $simpleXmlObject SimpleXML-ren bidez irekitako XML fitxategiaren instantziaren
 *         xpath-en bidez lortutako nodoaren instantzia.
 *         String $path Webgunearen karpeta publikorako helbidea.
 * @return: true
 *
*/
function lortu_artikuloa($artikuloa,$path){
    $helbidea = preg_replace('/\s+/', '_', $artikuloa[0]->saila . "/" . $artikuloa[0]->izenburua . ".html");
    $html = file_get_contents($path.ARTIKULUAK_KARPETA . $helbidea);
    return $html;
}

?>