// settings.php
function loadUserData(erabiltzailea, erab_email, erab_type) {
    ERAB_USERNAME = erabiltzailea;
    ERAB_EMAIL = erab_email;
    ERAB_TYPE = erab_type;
}


// register.php
function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function erregistratu() {

    var xhttp = null;
    var username = document.getElementById('username');
    var email = document.getElementById('input_email');
    var pasahitza1 = document.getElementById('input_password1');
    var pasahitza2 = document.getElementById('input_password2');
    var error = document.getElementById('error_alert');
    var response_alert = document.getElementById('response_alert');

    error.innerHTML = "";

    if (validateEmail(email.value) && pasahitza1.value == pasahitza2.value ){
        if (window.XMLHttpRequest) {
            // code for modern browsers
            xhttp = new XMLHttpRequest();
         } else {
            // code for old IE browsers
            xhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } 
    
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var erantzuna = parseInt(this.response)
                console.log(erantzuna);
                response_alert.style = ""; ;
                if (erantzuna == 0 ){
                    response_alert.class = "alert alert-success"; 
                    response_alert.innerHTML = "Ondo erregistratu zara!";

                    email.disabled = true;
                    pasahitza1.disabled = true;
                    pasahitza2.disabled = true;
                } else if(erantzuna == 3){
                    response_alert.class = "alert alert-danger";
                    response_alert.innerHTML = "Erabiltzaile izenaren tamaina desegokia 4 eta 10 karaktereen artean.";
                }else{
                    response_alert.class = "alert alert-danger";
                    response_alert.innerHTML = "Dagoeneko existitzen da email berdina duen erabiltzailea.";
                }
                
                
            }
        }
        xhttp.open("POST", "functions/create_user.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("username="+username.value+"&email="+email.value+"&pasahitza="+pasahitza1.value);
        console.log(xhttp);
    } else {
        error.innerHTML = "Errorea sartutako datuekin.";
    }

}

