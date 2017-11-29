<?php
    // Sesioa hasi
    session_start();
    require 'config.php';

    // Konprobatu kredentzialak
    if (isset($_POST['email']) && isset($_POST['pasahitza'])){
        $erabiltzaileak = simplexml_load_file(ERABILTZAILEAK) or die("Error: Cannot create object");
        $erab = $erabiltzaileak->xpath("/erabiltzaileak/erabiltzaile[email='".$_POST['email']."']");
        
        $username = substr($erab[0]->username,0);
        $email = substr($erab[0]->email,0);
        $password = substr($erab[0]->password,0);

        if ($_POST['email'] == $email && $_POST['pasahitza'] == $password) {
            $_SESSION['erabiltzailea'] = $username;
            $_SESSION['erab_email'] = $email;
            $_SESSION['logeatuta'] = true;
        }       
    }

    // Begiratu iadanik logeatuta dagoen
    if (isset($_SESSION['logeatuta']) && $_SESSION['logeatuta']==true) {
        header('Location: '.INDEX);
        exit;
    }
    

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
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
    </head>
    <body>

        <div class="fixed-top">
            <!-- Goiko barra -->
            <nav class="navbar navbar-dark bg-dark w3-card">
                <span class="navbar-brand mb-0 h1 w3-xlarge">WikiLatex</span>
                <form>
                    <a class="btn text-info bg-dark my-2 my-sm-0" href="<?php echo INDEX;?>">Itzuli</a>
                </form>
            </nav>
        </div>

        <div id="page" class="container">
            <div class="row">
                <div class="col-sm-1 col-md-4">
                    <?php
                        // Pruebak egiteko lekua jeje
                    ?>
                </div>
                <div class="col-sm-10 col-md-4">
                    <h2>Login:</h2>
                    <form class="login" onsubmit="login.php" method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Emaila</label>
                            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Sartu emaila">
                            <small id="emailHelp" class="form-text text-muted">Ez dugu inorekin zure emaila partekatuko.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Pasahitza</label>
                            <input name="pasahitza" type="password" class="form-control" id="exampleInputPassword1" placeholder="Pasahitza">
                        </div>
                        <button type="submit" class="btn btn-dark btn-sm">Bidali</button>
                    </form>

                    <hr>

                    <div class="register-form">
                        <h5 class="tituloa">Ez duzu konturik?</h5>
                        <button type="button" class="btn btn-secondary btn-sm">Erregistratu</button>
                    </div>
                </div>
                <div class="col-sm-1 col-md-4">
                </div>
                
            </div>
        </div>
        
    </body>
</html>