  function artikuluBerri() {

    var response_alert = document.getElementById('response_alert');
    //Datuak sartu direla zihurtatu
    if(!required()){
        response_alert.style = "";
        response_alert.className = "alert alert-danger";
        response_alert.innerHTML = "Sartu izenburu, hitz gakoak, deskribapen eta artikulua!";
    }
    else{
        
        //Datuak lortu
        var data = CKEDITOR.instances.text.getData();
        var sailaList = document.getElementById('saila');
        var saila = sailaList.options[sailaList.selectedIndex].text;
        var izenburua = document.getElementById('izenburua');
        var hitzGakoak = document.getElementById('hitzGako').value;
        var deskribapena = document.getElementById('deskribapena').value;
        var bidali = document.getElementById('bidali');

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
                    response_alert.innerHTML = "Ondo sortu duzu artikulua!";
                    bidali.disabled=true;

                } else if(erantzuna == 2){
                    response_alert.className = "alert alert-danger";
                    response_alert.innerHTML = "Izenburu hori duen artikulua existitzen da dagoeneko";
                }else{
                     response_alert.className = "alert alert-danger";
                    response_alert.innerHTML = "Barkatu, errorerenbat egon da";                   
                }

                response_alert.innerHTML = this.responseText;
                
            }
        }

        // AJAX eskeara osatu eta bidali
        xhttp.open("POST", "functions/create_article.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("izenburua="+izenburua.value+"&saila="+saila+"&hitzGakoak="+hitzGakoak+"&deskribapena="+deskribapena+"&editor="+data);
        console.log(xhttp);
        }
    
  }


//Derrigorezko datuak sartu diren ikusi
function required()   { 
    var izenburua = document.getElementById('izenburua').value;
    var data = CKEDITOR.instances.text.getData();
    var hitzGakoak = document.getElementById('hitzGako').value;
    var deskribapena = document.getElementById('deskribapena').value;

    if (izenburua.length == 0 || hitzGakoak.length ==0 || data.length ==0 || deskribapena.length == 0){         
        return false; 
    }       
      return true;   
} 