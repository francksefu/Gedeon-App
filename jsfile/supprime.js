const input = document.querySelector('#supprimons');
const fichier = document.querySelector("#type");
const ide= input.value.split("::");
const valeur = input.value
const btn = document.querySelector("#btn");
const cross = document.querySelector('#cross');
const del = document.querySelector('#del');

function showHint(str, entre) {
  
    if (str.length == 0) {
      document.getElementById("txtHint").innerHTML = "";
      return;
    } else {
      const xmlhttp = new XMLHttpRequest();
      xmlhttp.onload = function() {
        feedback = this.responseText;
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
      let nouveau = entre+"" +str
      
    xmlhttp.open("GET", nouveau);
    xmlhttp.send();
    }
  }

  cross.addEventListener('click', () => {
    input.value = "";
  })

  del.addEventListener('click', () => {
    document.querySelector('.montre-moi').style.display = 'flex';
  })
/**
 * if is data for besoin file do that :
 */

const search = document.querySelector('.search');
const small = document.querySelector('#txtHint');
btn.addEventListener('click', () => {
    if (fichier.value === "besoin") {
      showHint(input.value.split('::')[1]+"::delete", "classBesoin.php?q=")
    }

    if(fichier.value === 'caissein') {
      showHint(input.value.split('::')[1]+"::delete", "classCaissein.php?q=")
    }

    if(fichier.value === 'caisseout') {
      showHint(input.value.split('::')[1]+"::delete", "classCaisseout.php?q=")
    }
    supprime.value = "";
});
