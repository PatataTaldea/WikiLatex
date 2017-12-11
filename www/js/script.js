// register.php

/*
 *  Email bat baliozkoa den edo ez esaten duen funtzioa.
 * 
 *  @params: String email aztertu nahi dugun emaila.
 * 
 *  @return: true baliozko emaila da.
 *           false ez da baliozko email bat.
 * 
 */
function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

/*
 *  Erabiltzaile berri bat erregistratzeko prozedura. Prozedura
 *  honetan AJAX eskaera bat erabiltzen da zerbitzariak bestelako lana 
 *  egin dezan. Sarrerako balioak document aldagai globaletik hartuko ditu.
 *  Irteera bezela HTML dokumentua eguneratzen du erregistroaren emaitzaz
 *  berri emanez eta index-era eramaten du erabiltzailea jadanik logeatuta.
 * 
 *  @params: void
 * 
 *  @return: void
 * 
 */
function erregistratu() {

    var xhttp = null;
    var username = document.getElementById('username');
    var email = document.getElementById('input_email');
    var pasahitza1 = document.getElementById('input_password1');
    var pasahitza2 = document.getElementById('input_password2');
    var error = document.getElementById('error_alert');
    var response_alert = document.getElementById('response_alert');

    error.innerHTML = "";

    // Begiratu ea emaila baliozkoa den
    if (validateEmail(email.value) && pasahitza1.value == pasahitza2.value ){

        // Sortu AJAX eskaera
        if (window.XMLHttpRequest) {
            // code for modern browsers
            xhttp = new XMLHttpRequest();
         } else {
            // code for old IE browsers
            xhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } 
    
        // Erantzuna tratatu
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var erantzuna = parseInt(this.response)
                console.log(erantzuna);
                response_alert.style = "";
                if (erantzuna == 0 ){
                    response_alert.className = "alert alert-success"; 
                    response_alert.innerHTML = "Ondo erregistratu zara!";

                    email.disabled = true;
                    pasahitza1.disabled = true;
                    pasahitza2.disabled = true;
                } else if(erantzuna == 3){
                    response_alert.className = "alert alert-danger";
                    response_alert.innerHTML = "Erabiltzaile izenaren tamaina desegokia 4 eta 10 karaktereen artean.";
                }else{
                    response_alert.className = "alert alert-danger";
                    response_alert.innerHTML = "Dagoeneko existitzen da email berdina duen erabiltzailea.";
                }
            }
        }

        // AJAX eskeara osatu eta bidali
        xhttp.open("POST", "functions/user/create_user.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("username="+username.value+"&email="+email.value+"&pasahitza="+pasahitza1.value);
        console.log(xhttp);
    } else {
        error.innerHTML = "Errorea sartutako datuekin.";
    }

}

// index.php

function sortuArtikulua(){
    
    var orria = document.getElementById('orria');
    var nabigazioa = document.getElementById('nabigazioa');
    var xhttp = null;

    // Sortu AJAX eskaera
    if (window.XMLHttpRequest) {
        // code for modern browsers
        xhttp = new XMLHttpRequest();
     } else {
        // code for old IE browsers
        xhttp = new ActiveXObject("Microsoft.XMLHTTP");
    } 

    // Erantzuna tratatu
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            orria.innerHTML = this.responseText;
            var nabigazioa_html = '' +
                        '<nav aria-label="breadcrumb" role="navigation">' +
                        '<ol id="nabigazioa_lista" class="breadcrumb">' +
                        '<li class="breadcrumb-item"><a href="index.php">Home</a></li>' +
                        '<li class="breadcrumb-item active" aria-current="page">' + orria_izena +'</li>' +
                        '</ol>' + 
                        '</nav> ';
            nabigazioa.innerHTML = nabigazioa_html;
        }
    }

    // AJAX eskeara osatu eta bidali
    xhttp.open("GET", "newArticle.php", true);
    //xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();

}

function idatziOrria( orria_izena ){
    
    var orria = document.getElementById('orria');
    var nabigazioa = document.getElementById('nabigazioa');
    var xhttp = null;

    // Sortu AJAX eskaera
    if (window.XMLHttpRequest) {
        // code for modern browsers
        xhttp = new XMLHttpRequest();
     } else {
        // code for old IE browsers
        xhttp = new ActiveXObject("Microsoft.XMLHTTP");
    } 

    // Erantzuna tratatu
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            orria.innerHTML = this.responseText;
            var nabigazioa_html = '' +
                        '<nav aria-label="breadcrumb" role="navigation">' +
                        '<ol id="nabigazioa_lista" class="breadcrumb">';

            if (orria_izena == "HOME") {
                nabigazioa_html += '<li class="breadcrumb-item active" aria-current="page">Home</li>';
            } else {
                nabigazioa_html += '<li class="breadcrumb-item"><a href="javascript:idatziOrria(\'HOME\')">Home</a></li>' +
                                    '<li class="breadcrumb-item active" aria-current="page">' + orria_izena +'</li>';
            }
            nabigazioa_html += '</ol>' + 
                               '</nav> ';

            nabigazioa.innerHTML = nabigazioa_html;
        }
    }

    // AJAX eskeara osatu eta bidali
    xhttp.open("GET", "functions/sailist.php?saila="+orria_izena, true);
    //xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();
        
}

function iruzkindu(){
    
    var xhttp = null;

    var izena = document.getElementById('name');
    var eposta = document.getElementById('email');
    var mezua = document.getElementById('text');

    // Sortu AJAX eskaera
    if (window.XMLHttpRequest) {
        // code for modern browsers
        xhttp = new XMLHttpRequest();
     } else {
        // code for old IE browsers
        xhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    var response_alert = document.getElementById('response_alert');
    if(!required()){
        response_alert.style = "";
        response_alert.className = "alert alert-danger";
        response_alert.innerHTML = "Sartu datuak!";
    }
    else{
        // Erantzuna tratatu
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                idatziOrria("Iruzkinak");
            }
        }

        // AJAX eskeara osatu eta bidali
        xhttp.open("POST", "functions/newIruzkin.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("name="+izena.value+"&email="+eposta.value+"&text="+mezua.value);
    }
}

function idatziArtikulua( orria_izena, orria_saila ){
    
    var orria = document.getElementById('orria');
    var nabigazioa = document.getElementById('nabigazioa');
    var xhttp = null;

    // Sortu AJAX eskaera
    if (window.XMLHttpRequest) {
        // code for modern browsers
        xhttp = new XMLHttpRequest();
     } else {
        // code for old IE browsers
        xhttp = new ActiveXObject("Microsoft.XMLHTTP");
    } 

    // Erantzuna tratatu
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            orria.innerHTML = this.responseText;

            
            var nabigazioa_html = '' +
                        '<nav aria-label="breadcrumb" role="navigation">' +
                        '<ol id="nabigazioa_lista" class="breadcrumb">' +
                        '<li class="breadcrumb-item"><a href="javascript:idatziOrria(\'HOME\')">Home</a></li>' +
                        '<li class="breadcrumb-item active" aria-current="page"><a href="javascript:idatziOrria(\''+ orria_saila + '\')">'+orria_saila+'</a></li>' +
                        '<li class="breadcrumb-item active" aria-current="page">' + orria_izena +'</li>' +
                        '</ol>' + 
                        '</nav> ';
            nabigazioa.innerHTML = nabigazioa_html;
        }
    }

    // AJAX eskeara osatu eta bidali
    xhttp.open("GET", "functions/article.php?izenburua="+orria_izena, true);
    //xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();

}

function required(){ 
    var izena = document.getElementById('name');
    var mezua = document.getElementById('text');

    if (izena.value.length == 0 || mezua.value.length == 0){         
         return false; 
    }       
    return true;   
}