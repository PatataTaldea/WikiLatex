<?php

// Orriak
define("INDEX", "index.php");
define("LOGIN", "login.php");
define("REGISTER", "register.php");
define("SETTINGS", "settings.php");
define("HOME", "pages/home.html");
define("KONTAKTUA", "pages/kontaktua.html");
define("IRUZKINAK_ORRIA", "pages/iruzkinak.php");
define("SAILA_ORRIA", "pages/saila.php");
define("SETTINGS_OROKORRA", "pages/settings_orokorra.php");
define("SETTINGS_ARTIKULOAK", "pages/settings_artikuloak.php");
define("SETTINGS_ADMIN", "pages/settings_admin.php");
define("ARTIKULOA_SORTU", "pages/newArticle.php");
define("ARTIKULOA_IKUSI", "pages/artikuloa.php");

// Datuak
define("ERABILTZAILEAK", "../data/erabiltzaileak.xml");
define("ARTIKULUAK", "../data/artikuluak/index.xml");
define("IRUZKINAK", "../data/iruzkin.xml");
define("EZ_ARTIKULUAK", "../data/artikuluak/ez_ebaluatuak.xml");
define("SAILAK", "../data/artikuluak/sailak.xml");

// Karpetak
define("ARTIKULUAK_KARPETA", "../data/artikuluak/");
define('ROOTPATH', (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]" . substr(substr(__FILE__, strlen(realpath($_SERVER['DOCUMENT_ROOT']))), 0, - strlen(basename(__FILE__))));

// Erroreak
define("ERROR_404", "error/404.html");
?>