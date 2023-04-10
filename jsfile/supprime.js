const supprime = document.querySelector('#supprime');
const fichier = document.querySelector("#type");
const identifiant = supprime.value.split('::')[1]+"::delete";
const btn = document.querySelector("#btn");

function showHint(str, fileDestination) {
  
    if (str.length == 0) {
      document.getElementById("txtHint").innerHTML = "";
      return;
    } else {
      const xmlhttp = new XMLHttpRequest();
      xmlhttp.onload = function() {
        feedback = this.responseText;
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
      //"classBesoin.php?q="
    xmlhttp.open("GET", fileDestination+ "" + str);
    xmlhttp.send();
    }
  } 

/**
 * if is data for besoin file do that :
 */
btn.addEventListener('click', () => {
    if (fichier.value === "besoin") {
        showHint(identifiant, "classBesoin.php?q=")
    }

    supprime.value = "";
})
