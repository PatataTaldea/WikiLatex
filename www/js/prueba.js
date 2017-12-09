  function artikuluBerri() {

    if(!required()){
        alert("Sartu izenburu, hitz gakoak eta artikulua!");
    }
    else{
        
        var data = CKEDITOR.instances.text.getData();
       
        var sailaList = document.getElementById('saila');
        var saila = sailaList.options[sailaList.selectedIndex].text;

        var izenburua = document.getElementById('izenburua');
        var hitzGakoak = document.getElementById('hitzGako').value;



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
                
            }
        }

        // AJAX eskeara osatu eta bidali
        xhttp.open("POST", "functions/create_article.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("izenburua="+izenburua.value+"&saila="+saila+"&hitzGakoak="+hitzGakoak+"&editor="+data);
        console.log(xhttp);
        }
    
  }

   
  function required()   { 
    var izenburua = document.getElementById('izenburua').value;
    var data = CKEDITOR.instances.text.getData();
    var hitzGakoak = document.getElementById('hitzGako').value;

     if (izenburua.length == 0 || hitzGakoak.length ==0 || data.length ==0)  
      {         
         return false; 
      }       
      return true;   
    } 