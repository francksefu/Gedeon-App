// take all value inside inputs
const identifiantM = document.querySelector('#identifiantM')
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
const typeForm = document.querySelector('#typeFormulaire');
let idChamps;
if (typeForm.value === 'update') {
  identifiantM.addEventListener('change', () => {
    const tabValeur = identifiantM.value.split('::');
    nomClient.value = tabValeur[7];
    montant.value = tabValeur[5];
    hectareTour.value = tabValeur[3];
    idChamps = tabValeur[1];
    datesLocation.value = tabValeur[9];
    typeClient.value = tabValeur[11];
    motif.value = tabValeur[13];
  });
}
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
 
  let prend;
  if(typeForm.value === 'update') {
    prend = hectareTour.value+"::"+montant.value+"::"+nomClient.value+"::"+datesLocation.value+"::"+typeClient.value+"::"+motif.value+"::"+idChamps+"::update";
  } else {
    prend = hectareTour.value+"::"+montant.value+"::"+nomClient.value+"::"+datesLocation.value+"::"+typeClient.value+"::"+motif.value+"::add";
  }
  showHint(prend);
  
    hectareTour.value =""; 
    montant.value = "";
    nomClient.value = "";
    motif.value = "";
    identifiantM.value = "";
});