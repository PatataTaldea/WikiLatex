// settings.php


/*
 *  Erabiltzailearen datuak gordetzen ditu pasahitza izan ezik.
 * 
 *  @params: String erabiltzailea Erabiltzailearen izena
 *           String erab_email Erabiltzailearen emaila
 *           String erab_type Erabiltzaile mota user/admin
 * 
 *  @return: void
 * 
 */
function kargatuErabiltzaileDatuak(erabiltzailea, erab_email, erab_type) {
    ERAB_USERNAME = erabiltzailea;
    ERAB_EMAIL = erab_email;
    ERAB_TYPE = erab_type;
}

/*
 *  Settings orria hasieratzen du. HTML elementuen instantzia gordetzen ditu
 *  eta defektuzko orria kargatzen du.
 * 
 *  @params: void
 *
 *  @return: void
 * 
 */
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

/*
 *  Atzitu nahi den orria eskatu eta gertaerak kargatu.
 * 
 *  @params: String orria Atzitu nahi den orriaren izena.
 * 
 *  @return: void
 * 
 */
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

/*
 *  Kargatu nahi den orriaren AJAX eskaera zerbitzariari. Eskaeraren
 *  emaitza jasotzean pantailarazten da idatziOrria() funtzioarekin.
 * 
 *  @params: String orria Atzitu nahi den orriaren izena.
 * 
 *  @return: void
 * 
 */
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

/*
 *  Kargatu nahi den orria idazten du dagokion HTML-eko div etiketan
 *  eta AURREKO_ORRIA eta UNEKO_ORRIA egoera aldagai globalak eguneratzen
 *  ditu.
 * 
 *  @params: String orria Atzitu nahi den orriaren izena.
 *           HTML html Orriaren edukiaren html kodea.
 * 
 *  @return: void
 * 
 */
function idatziOrria(orria, html) {
    tab_content.innerHTML = html;
    AURREKO_ORRIA = UNEKO_ORRIA;
    UNEKO_ORRIA = orria;

    aldatuNabigazioa();
}

/*
 *  Settings orriko nabigazioaren CSS-a eguneratzen du, lehio aldaketa
 *  egon dela ikusteko.
 * 
 *  @params: void
 * 
 *  @return: void
 * 
 */
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

/*
 *  Uneko orriaren gertaerak kargatu.
 * 
 *  @params: String orria Atzitu nahi den orriaren izena.
 * 
 *  @return: void
 * 
 */
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

/*
 *  Settings-eko 'orokorra' orriaren gertaera. Pasahitza aldatzeko formularioan
 *  dagoen gertaerak. Input-en koloreak aldatzeko egoeraren arabera.
 * 
 *  @params: void
 * 
 *  @return: void
 * 
 */
function datuakOndoBeteta(){
    var pass_zaharra = document.getElementById('pasahitzZaharraInput');
    var pass_berria1 = document.getElementById('pasahitzBerria1Input');
    var pass_berria2 = document.getElementById('pasahitzBerria2Input');
    var btn_pass_bidali = document.getElementById('pasahitzaBidaliBtn');

    if (pass_zaharra.value == "" || pass_berria1.value == "" || pass_berria2.value == "" || pass_berria1.value != pass_berria2.value ){
        btn_pass_bidali.className = "btn btn-info float-right disabled";
        //btn_pass_bidali.disabled = "true";
    } else {
        btn_pass_bidali.className = "btn btn-info float-right";
        //btn_pass_bidali.disabled = "false";
    }
    if (pass_berria1.value != pass_berria2.value && pass_berria2.value != ""){
        pass_berria2.className = "form-control border-danger";
    } else if(pass_berria2.value != ""){
        pass_berria2.className = "form-control border-success";
    }
}

/*
 *  Pasahitza aldatzeko AJAX eskaera. Zerbitzariari bidaltzen dio pasahitza
 *  aldatzeko eskaera eta emaitza pantailarazten du.
 * 
 *  @params: String orria Atzitu nahi den orriaren izena.
 * 
 *  @return: void
 * 
 */
function aldatuPasahitza(){
    var pass_zaharra = document.getElementById('pasahitzZaharraInput');
    var pass_berria1 = document.getElementById('pasahitzBerria1Input');
    var pass_berria2 = document.getElementById('pasahitzBerria2Input');
    var btn_pass_bidali = document.getElementById('pasahitzaBidaliBtn');
    var alert_emaitza = document.getElementById('aldaketaEmaitzaAlert');

    alert_emaitza.style.display = "none";

    if (pass_zaharra.value == "" || pass_berria1.value == "" || pass_berria2.value == "" || pass_berria1.value != pass_berria2.value ){
        alert_emaitza.innerText = "Ez daude eremu guztiak beteta.";
        alert_emaitza.className = "alert alert-info";
        alert_emaitza.style.display = "block";
        return 1;
    }

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
            var erantzuna = parseInt(this.response);
            switch(erantzuna) {
                case 0:
                    alert_emaitza.innerText = "Pasahitza ondo aldatu da.";
                    alert_emaitza.className = "alert alert-success";
                    alert_emaitza.style.display = "block";
                    pass_zaharra.disabled = "true";
                    pass_berria1.disabled = "true";
                    pass_berria2.disabled = "true";
                    btn_pass_bidali.disabled = "true";
                    break;
                case 1:
                    alert_emaitza.innerText = "Jasotako pasahitz zaharra ez dator bat erabiltzailearen pasahitzarekin.";
                    alert_emaitza.className = "alert alert-danger";
                    alert_emaitza.style.display = "block";
                    break;
                case 2:
                    alert_emaitza.innerText = "Jasotako pasahitz berria zaharraren berdina da.";
                    alert_emaitza.className = "alert alert-danger";
                    alert_emaitza.style.display = "block";
                    break;
                case 3:
                    console.log('Sartutako datu kopurua ez da egokia.');
                    break;
                case 4:
                    console.log('Sesioa ez dago irekita.');
                    break;
            }
        }
    }
    xhttp.open("POST", "functions/user/edit_user.php", false);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("pass_z="+pass_zaharra.value+"&pass_b="+pass_berria1.value);

}

/*
 *  Artikuloak onartzeko edo baztertzeko arduratzen den 
 *  AJAX eskaera. Funtzio honek manage_article.php funtzioari
 *  dei egiten dio eta emaitzaren arabera admin orria eguneratzen 
 *  du.
 * 
 *  @params: String eragiketa Artikuloari aplikatu nahi diogun eragiketa. (onartu/baztertu).
 *           String artikuloa Artikuloaren izenburua.
 * 
 *  @return: void
 * 
 */
function artikuloaManeiatu( eragiketa, artikuloa ) {
    var aurreikuspena = document.getElementById('artikulo-aurreikuspena');
    aurreikuspena.innerHTML = "";
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
            var erantzuna = parseInt(this.response);
            switch(erantzuna) {
                case 0:
                    console.log('Dena ondo joan da.')
                    eskatuOrria('admin');
                    break;
                case 1:
                    console.log('Sartutako datuak desegokiak dira.');
                    break;
                case 2:
                    console.log('Emandako artikuloa ez bada existitzen.');
                    break;
                case 3:
                    console.log('Emandako eragiketa ezezaguna bada.');
                    break;
                case 4:
                    console.log('AccessDenied erabiltzailea ez da administratzailea.');
                    break;
            }
        }
    }
    xhttp.open("GET", "functions/artikuloa/manage_article.php?eragiketa="+eragiketa+"&artikuloa="+artikuloa, false);
    //xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();

}

function artikuloaBistaratu( artikuloa ) {
    var aurreikuspena = document.getElementById('artikulo-aurreikuspena');
    console.log(artikuloa);
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
            var html = '<div class="col-1"></div><div class="col-10">';
                html+= this.responseText;
                html+= '</div><div class="col-1"></div>';
            aurreikuspena.innerHTML = html;
        }
    }
    xhttp.open("GET", "functions/article.php?izenburua="+artikuloa+"&ez-ebaluatua=true", true);
    //xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();
    console.log(xhttp);
}

function sortuSaila() {

    var saila = document.getElementById('sailBerria').value;
    var alert_emaitza = document.getElementById('sailaSortuEmaitza');
    
    if (saila == "" || saila.length < 3 || saila.length > 20) {
        alert_emaitza.style.display = "block";
        alert_emaitza.className = "alert alert-danger";
        alert_emaitza.innerHTML = "Sartutako balioa ez da egokia."
        return 1;
    }
    
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
            var erantzuna = parseInt(this.response);
            switch(erantzuna) {
                case 0:
                    alert_emaitza.style.display = "block";
                    alert_emaitza.className = "alert alert-success";
                    alert_emaitza.innerHTML = saila + " saila sortu da."
                    break;
                case 1:
                    alert_emaitza.style.display = "block";
                    alert_emaitza.className = "alert alert-danger";
                    alert_emaitza.innerHTML = saila + " jadanik existitzen da."
                    break;
                case 2:
                    console.log('Erabiltzaile desegokia.');
                    window.location.replace('index.php');
                    break;
                case 3:
                    console.log('Sarrera desegokia.');
                    break;
            }
        }
    }
    xhttp.open("GET", "functions/sailak/create_sailak.php?saila="+saila, false);
    //xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();
    console.log(xhttp);
}