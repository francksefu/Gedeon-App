// take all value inside inputs

const infoChamps = document.querySelector('#nomChamps');
const datesDit = document.querySelector('#datesDit');
const personnel = document.querySelector('#personnel');
const salaire = document.querySelector('#salaire');
const motif = document.querySelector('#commentaire');

const personnelVide = document.querySelector('#idPVide');
const champsVide = document.querySelector('#idCVide')
const salaireVide = document.querySelector('#salaireVide');
const btn = document.querySelector('#envoie');
const idChampsVide = document.querySelector('#identifiantVide'); 
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
    xmlhttp.open("GET", "classSalaire.php?q=" + str);
    xmlhttp.send();
    }
  }

btn.addEventListener('click', () => {
    if(infoChamps.value == ''){
        messageComplete(champsVide);
        return;
      } else {
        enleveMessage(champsVide);
      }
   
      if(personnel.value == ''){
        messageComplete(personnelVide);
        return;
      } else {
        enleveMessage(personnelVide);
      }

      if(salaire.value == ''){
        messageComplete(salaireVide);
        return;
      } else {
        enleveMessage(salaireVide);
      }
  // prendre uniquement les id
  const idP = personnel.value.split(':');
  const idC = infoChamps.value.split(':');
  const prend = idC[idC.length - 1]+"::"+idP[idP.length - 1]+"::"+salaire.value+"::"+datesDit.value+"::"+motif.value;
  showHint(prend);
  
    infoChamps.value =""; 
    personnel.value = "";
    salaire.value = ""
    motif.value = "";
});