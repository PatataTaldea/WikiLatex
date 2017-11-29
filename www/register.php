<?php
    // Sesioa hasi
    session_start();
    require 'config.php';

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
                <div class="col-sm-1 col-md-2 col-lg-4">
                    <?php
                        

                    ?>
                </div>
                <div class="col-sm-10 col-md-8 col-lg-4">
                <h2>Erregistratu:</h2>
                    <form>
                        <span>Erabiltzaile izena</span>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">@</span>
                            <input id="username" type="text" class="form-control" placeholder="Erabiltzaile izena" aria-label="Erabiltzaile izena" aria-describedby="basic-addon1">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="input_email">Emaila</label>
                            <input name="email" type="email" class="form-control" id="input_email" aria-describedby="emailHelp" placeholder="Sartu emaila">
                            <small id="emailHelp" class="form-text text-muted">Ez dugu inorekin zure emaila partekatuko.</small>
                        </div>
                        <div class="form-group">
                            <label for="input_password1">Pasahitza</label>
                            <input name="pasahitza" type="password" class="form-control" id="input_password1" placeholder="Pasahitza">
                        </div>
                        <div class="form-group">
                            <label for="input_password2">Errepikatu pasahitza</label>
                            <input name="pasahitza" type="password" class="form-control" id="input_password2" placeholder="Errepikatu pasahitza">
                        </div>
                        <button type="button" class="btn btn-dark btn-sm" onclick="erregistratu();">Bidali</button>
                        <span id="error_alert" class="text-danger float-right"></span>
                    </form>
                    <br>
                    <div id="response_alert" class="alert alert-primary" role="alert" style="display: none">
                        This is a primary alert—check it out!
                    </div>
                </div>
                <div class="col-sm-1 col-md-2 col-lg-4">
                </div>
                
            </div>
        </div>
        
    </body>
</html>