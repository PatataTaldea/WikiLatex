  function artikuluBerri() {

    var editor = CKEDITOR.instances.editor;

	var data = editor.getData();
 
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
        xhttp.send("editor="+data);
        console.log(xhttp);
  }

       
    

