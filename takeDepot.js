// take all value inside inputs

const datesAcquis = document.querySelector('#datesAcquis');
const materiels = document.querySelector('#materiels');
const quantite = document.querySelector('#quantite');
const valeur = document.querySelector('#valeur');
const motif = document.querySelector('#commentaire');

const valeurVide = document.querySelector('#valeurVide')
const quantiteVide = document.querySelector('#quantiteVide');
const materielVide = document.querySelector('#materielVide');
const btn = document.querySelector('#envoie');

let feedback = '';
const compareFeedback = `<div class='alert alert-success' role='alert'>
Insertion fait avec success
</div>`; 

const messageVide = 'Veuillez remplir ce champs svp'
const messageComplete = valeur => {
    valeur.textContent = messageVide;
    valeur.style.color = 'red';
  }

  const enleveMessage = valeur => {
    valeur.textContent = '';
    valeur.style.color = 'balck';
  }
// Use ajax to insere it in the BD (communication with CRUD file)

function showHint(str) {
    if (str.length == 0) {
      document.getElementById("txtHint").innerHTML = "";
      return;
    } else {
      const xmlhttp = new XMLHttpRequest();
      xmlhttp.onload = function() {
        feedback = this.responseText;
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    xmlhttp.open("GET", "classDepot.php?q=" + str);
    xmlhttp.send();
    }
  }

btn.addEventListener('click', () => {
   
   
      if(valeur.value == ''){
        messageComplete(valeurVide);
        return;
      } else {
        enleveMessage(valeurVide);
      }

      if(quantite.value == ''){
        messageComplete(quantiteVide);
        return;
      } else {
        enleveMessage(quantiteVide);
      }

      if(materiels.value == ''){
        messageComplete(materielVide);
        return;
      } else {
        enleveMessage(materielVide);
      }
  
  const prend = materiels.value+"::"+quantite.value+"::"+valeur.value+"::"+motif.value+"::"+datesAcquis.value;
  showHint(prend);
    materiels.value = "";
    quantite.value = "";
    valeur.value = "";
    motif.value = "";
});