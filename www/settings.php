<?php
    // Sesioa hasi
    session_start();
    require 'config.php';

    // Begiratu logeatuta ez dagoen
    if (!isset($_SESSION['logeatuta']) || $_SESSION['logeatuta']==false) {
        header('Location: '.INDEX);
        exit;
    }

    $erabiltzaileak = simplexml_load_file(ERABILTZAILEAK) or die("Error: Cannot create object");
    $erab = $erabiltzaileak->xpath("/erabiltzaileak/erabiltzaile[email='".$_SESSION['erab_email']."']");

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
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
        <link rel="stylesheet" type="text/css" href="css/style.css">

        <!-- Goiburukoa -->
        <link rel="icon" type="image/icon"  href="favicon.ico">
        <title>WikiLatex</title>
        <script>
            <?php
                echo 'loadUserData(\''.$_SESSION['erabiltzailea'].'\',\''.$_SESSION['erab_email'].'\',\''.$_SESSION['erab_type'].'\');';
            ?>
        </script>
    </head>
    <body>

        <div class="fixed-top">
            <!-- Goiko barra -->
            <nav class="navbar navbar-dark bg-dark w3-card">
                <span class="navbar-brand mb-0 h1 w3-xlarge">WikiLatex</span>
                <div class="dropdown">
                    <button class="btn text-info bg-dark dropdown-toggle font-weight-light" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <?php echo $_SESSION['erab_email']; ?>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="<?php echo INDEX?>">Sarrera</a>
                        <a class="dropdown-item" href="#">Aginte panela</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php echo INDEX ?>?logout=true">Atera</a>
                    </div>
                </div>
                
            </nav>
        </div>

        <div id="page" class="container-fluid">
            <div class="row">
                <div class="col-sm-1 col-md-2 col-lg-2" id="settings_left_menu">
                </div>
                <div class="col-sm-10 col-md-8 col-lg-8" id="settings_content_page">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <button class="nav-link active" href="#">Orokorra</button>
                    </li>
                    <?php
                    if (isset($_SESSION['erab_type']) && $_SESSION['erab_type'] == "admin"){
                    ?>
                    <li class="nav-item">
                        <button class="nav-link btn-outline-info" href="#">Admin</button>
                    </li>
                    <?php
                    }
                    ?>
                    <li class="nav-item">
                        <button class="nav-link btn-outline-info" href="#">Nire aportazioak</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link btn-outline-info disabled" href="#">Disabled</button>
                    </li>
                </ul>
                </div>
                <div class="col-sm-1 col-md-2 col-lg-2">
                </div>
                
            </div>
        </div>
        
    </body>
</html>