// take all value inside inputs
const nomClient = document.querySelector('#nomClient');
const hectareTour = document.querySelector('#champsTours');
const typeClient = document.querySelector('#type');
const datesLocation = document.querySelector('#datesLoc');
const montant = document.querySelector('#montant');
const motif = document.querySelector('#commentaire');
const btn = document.querySelector('#envoie');

const clientVide = document.querySelector('#clientVide');
const hectareVide = document.querySelector('#hectaresVide');
const montantVide = document.querySelector('#montantVide');

let feedback = '';
const compareFeedback = `<div class='alert alert-success' role='alert'>
Insertion fait avec success
</div>`;

const messageComplete = valeur => {
  valeur.textContent = messageVide;
  valeur.style.color = 'red';
}

const enleveMessage = valeur => {
  valeur.textContent = '';
  valeur.style.color = 'balck';
}


const messageVide = 'Veuillez remplir ce champs svp';

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
    xmlhttp.open("GET", "classChamps.php?q=" + str);
    xmlhttp.send();
    }
  }
btn.addEventListener('click', () => {
  // Verifie si tous les champs sont rempli avant l envoie, sinon blocage
  if(nomClient.value == ''){
    messageComplete(clientVide);
    return;
  } else {
    enleveMessage(clientVide);
  }

  if(hectareTour.value == ''){
    messageComplete(hectareVide);
    return;
  } else {
    enleveMessage(hectareVide);
  }

  if(montant.value == ''){
    messageComplete(montantVide);
    return;
  } else {
    enleveMessage(montantVide);
  }
 
  const prend = hectareTour.value+"::"+montant.value+"::"+nomClient.value+"::"+datesLocation.value+"::"+typeClient.value+"::"+motif.value;
  showHint(prend);
  
    hectareTour.value =""; 
    montant.value = "";
    nomClient.value = ""
    
});