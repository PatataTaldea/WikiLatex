// settings.php
function kargatuErabiltzaileDatuak(erabiltzailea, erab_email, erab_type) {
    ERAB_USERNAME = erabiltzailea;
    ERAB_EMAIL = erab_email;
    ERAB_TYPE = erab_type;
}

function hasieratuSettings() {

    tab_content = document.getElementById('tab-content');
    btn_orokorra = document.getElementById('btn-orokorra');
    if (ERAB_TYPE = "admin") btn_admin = document.getElementById('btn-admin');
    btn_artikuloak = document.getElementById('btn-artikuloak');
    UNEKO_ORRIA = "";
    AURREKO_ORRIA = "";
    html_orokorra = "";
    html_admin = "";
    html_artikuloak = "";
    kargatuOrria('orokorra');

} 

function kargatuOrria( orria ){
    if (UNEKO_ORRIA != orria) {
        switch(orria){
            case 'orokorra':
                if (html_orokorra == ""){
                    eskatuOrria(orria);
                } else {
                    idatziOrria(orria, html_orokorra);
                }
                break;
            case 'admin':
                if (html_admin == ""){
                    eskatuOrria(orria);
                } else {
                    idatziOrria(orria, html_admin);
                }
                break;
            case 'artikuloak':
                if (html_artikuloak == ""){
                    eskatuOrria(orria);
                } else {
                    idatziOrria(orria, html_artikuloak);
                }
                break;
        }
        kargatuOrrikoGertaerak(orria);
    }
}

function eskatuOrria( orria ){
    var xhttp = null;
    if (window.XMLHttpRequest) {
        // code for modern browsers
        xhttp = new XMLHttpRequest();
     } else {
        // code for old IE browsers
        xhttp = new ActiveXObject("Microsoft.XMLHTTP");
    } 
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            idatziOrria(orria, this.responseText);
            switch(orria){
                case 'orokorra':
                    html_orokorra = this.responseText;
                    break;
                case 'admin':
                    html_admin = this.responseText;
                    break;
                case 'artikuloak':
                    html_artikuloak = this.responseText;
                    break;
            }
        }
    }
    xhttp.open("POST", "functions/settings_kargatu.php", false);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("orria="+orria);
}

function idatziOrria(orria, html) {
    tab_content.innerHTML = html;
    AURREKO_ORRIA = UNEKO_ORRIA;
    UNEKO_ORRIA = orria;

    aldatuNabigazioa();
}

function aldatuNabigazioa(){
    switch (AURREKO_ORRIA) {
        case 'orokorra':
            btn_orokorra.className = "nav-link btn-outline-info";
            break;
        case 'admin':
            btn_admin.className = "nav-link btn-outline-info";
            break;
        case 'artikuloak':
            btn_artikuloak.className = "nav-link btn-outline-info";
    }
    switch (UNEKO_ORRIA) {
        case 'orokorra':
            btn_orokorra.className = "nav-link active";
            break;
        case 'admin':
            btn_admin.className = "nav-link active";
            break;
        case 'artikuloak':
            btn_artikuloak.className = "nav-link active";
    }
}

function kargatuOrrikoGertaerak( orria ){

    switch(orria){
        case 'orokorra':
            document.getElementById('pasahitzZaharraInput').addEventListener('input', function(){
                datuakOndoBeteta(); }
            );
            document.getElementById('pasahitzBerria1Input').addEventListener('input', function(){
                datuakOndoBeteta(); 
            });
            document.getElementById('pasahitzBerria2Input').addEventListener('input', function(){
                datuakOndoBeteta(); 
            });
            break;
        case 'admin':
            break;
        case 'artikuloak':
            break;
    }

    
}

function datuakOndoBeteta(){
    var pass_zaharra = document.getElementById('pasahitzZaharraInput');
    var pass_berria1 = document.getElementById('pasahitzBerria1Input');
    var pass_berria2 = document.getElementById('pasahitzBerria2Input');
    var btn_pass_bidali = document.getElementById('pasahitzaBidaliBtn');

    if (pass_zaharra.value == "" || pass_berria1.value == "" || pass_berria2.value == "" || pass_berria1.value != pass_berria2.value ){
        btn_pass_bidali.className = "btn btn-info float-right disabled";
    } else {
        btn_pass_bidali.className = "btn btn-info float-right";
    }
    if (pass_berria1.value != pass_berria2.value && pass_berria2.value != ""){
        pass_berria2.className = "form-control border-danger";
    } else if(pass_berria2.value != ""){
        pass_berria2.className = "form-control border-success";
    }
}

function aldatuPasahitza(){
    var pass_zaharra = document.getElementById('pasahitzZaharraInput');
    var pass_berria1 = document.getElementById('pasahitzBerria1Input');
    var pass_berria2 = document.getElementById('pasahitzBerria2Input');
    var btn_pass_bidali = document.getElementById('pasahitzaBidaliBtn');

    var xhttp = null;
    if (window.XMLHttpRequest) {
        // code for modern browsers
        xhttp = new XMLHttpRequest();
     } else {
        // code for old IE browsers
        xhttp = new ActiveXObject("Microsoft.XMLHTTP");
    } 
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('settings_left_menu').innerHTML = this.responseText;
            console.log(this.responseText);
        }
    }
    xhttp.open("POST", "functions/user/edit_user.php", false);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("pass_z="+pass_zaharra.value+"&pass_b="+pass_berria1.value);

}
