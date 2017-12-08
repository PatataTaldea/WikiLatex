<?php
    // Sesioa hasi
    session_start();
    require 'config.php';
    require 'functions/xml_functions.php';

    //$_SESSION['index'] = 'Patata'; 

    if (isset($_GET['logout'])){
        session_unset(); 
        session_destroy();
        session_start();
    }

    if (isset($_GET['artikuloa'])) {
        $artikuloak = simplexml_load_file(ARTIKULUAK) or die("Error: Cannot create object");
        $artikuloa = $artikuloak->xpath("/artikuloak/artikuloa[izenburua='".$_GET['artikuloa']."']");
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <!-- Javascript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <script src="js/script.js"></script>

        <!-- CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
        <link rel="stylesheet" type="text/css" href="css/style.css">

        <!-- Cookie Consent -->
        <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css" />
        <script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js"></script>
        <script>
            window.addEventListener("load", function(){
            window.cookieconsent.initialise({
            "palette": {
                "popup": {
                "background": "#eaf7f7",
                "text": "#5c7291"
                },
                "button": {
                "background": "#56cbdb",
                "text": "#ffffff"
                }
            },
            "theme": "edgeless",
            "content": {
                "message": "Webgune honek cookiak erabiltzen ditu erabiltzailearen experientzia hobetzearren",
                "dismiss": "Ados!",
                "link": "Irakurri gehiago"
            }
            })});
        </script>

        <!-- Goiburukoa -->
        <link rel="icon" type="image/icon"  href="favicon.ico">
        <title>WikiLatex</title>
    </head>
    <body>

        <div class="fixed-top">
            <!-- Goiko barra -->
            <nav class="navbar navbar-dark bg-dark w3-card">
                <span class="navbar-brand mb-0 h1 w3-xlarge">WikiLatex</span>
                    <?php 
                    if (isset($_SESSION['logeatuta']) && $_SESSION['logeatuta']==true) 
                    { 
                        ?>
                        <div class="dropdown">
                            <button class="btn text-info bg-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <?php echo $_SESSION['erab_email']; ?>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="<?php echo INDEX?>">Sarrera</a>
                                <a class="dropdown-item" href="<?php echo SETTINGS?>">Aginte panela</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="?logout=true">Atera</a>
                            </div>
                        </div>
                        
                        <?php
                    } else { ?>
                    <a class="btn text-info bg-dark my-2 my-sm-0" href="<?php echo LOGIN; ?>">Sartu / Erregistratu</a>
                    <?php } ?>
            </nav>
            <div>
                <!-- Ezkerreko menua -->
                <div id="menua" class="menua w3-sidebar w3-card">
                    <div id="menu_lista" class="w3-bar-block">
                        <button class="w3-bar-item w3-button" onclick="location.href='index.php'">HOME</button>
                        <button class="w3-bar-item w3-button" onclick="idatziOrria('Nondik hasi');">Nondik hasi</button>
                        <button class="w3-bar-item w3-button" onclick="idatziOrria('Ekuazioak');">Ekuazioak</button>
                        <button class="w3-bar-item w3-button" onclick="idatziOrria('Galderak');">Galderak</button>
                        <button class="w3-bar-item w3-button" onclick="idatziOrria('Kontaktua');">Kontaktua</button>
                    </div> 
                </div>
                <!-- Orriaren path helbidea -->
                <div id="nabigazioa">
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol id="nabigazioa_lista" class="breadcrumb">
                            <?php
                            if (isset($artikuloa) && $artikuloa != NULL) {
                                ?>
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#"><?php echo $artikuloa[0]->saila; ?></a></li>
                                    <li class="breadcrumb-item active"><?php echo $artikuloa[0]->izenburua; ?></li>
                                <?php
                            } else {
                                ?>
                                    <li class="breadcrumb-item active">Home</li>
                                <?php
                            }
                             ?>
                        </ol>
                    </nav>  
                </div>
            </div>
        </div>



        <!-- Orria -->
        <div id="orria" class="container-fluid">
            <?php 
                if (isset($artikuloa) && $artikuloa != NULL) {
                    echo lortu_artikuloa($artikuloa);
                } else if (isset($artikuloa) && $artikuloa == NULL) {
                    $html = file_get_contents(ERROR_404);
                    echo $html;
                }
            ?>
            <div class="alert alert-warning" role="alert">
                <p class="mb-0">OHARRA: Webgunea oraindik beta egoeran dago eta ez dago osaturik. Barkatu eragozpenak.</p>
            </div>
            <div class="alert alert-info" role="alert">
                <h1 class="alert-heading">Ongi etorri WIKILATEXera!<img src="assets/img/LaTeX_logo.png" height="150" width="450" class="rounded float-right" alt="..."></h1>
                <p>Webgune honetan Latex erabiltzean lagungarri izango zaizkizun gauza interesgarri asko topatuko dituzu!<img src="assets/img/homer.gif" class="rounded float-right" alt="..."></p>
                <p>Oraindik ez badakizu nondik hasi, sakatu nabigazio barran ageri diren botoiak.</p>
                <p>Saltseatu pixka bat gure webgunean!</p>
                <hr>
                <p class="mb-0">>>> Zalantzarik baduzu jarri kontaktuan gurekin posta edo iruzkin bidez.</p>
            </div> 
        </div>
    </body>
</html>