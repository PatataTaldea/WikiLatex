
<?php

//require_once '../config.php';

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

?>