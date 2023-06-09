// take all value inside inputs

const identifiantM = document.querySelector('#identifiantM');
const datespaye = document.querySelector('#datesPaye');
const salaireConvenu = document.querySelector('#salaireConvenu');
const montant = document.querySelector('#montant');
const motif = document.querySelector('#commentaire');

const montantVide = document.querySelector('#montantVide')
const salaireVide = document.querySelector('#salaireVide');
const btn = document.querySelector('#envoie');

let feedback = '';
const compareFeedback = `<div class='alert alert-success' role='alert'>
Insertion fait avec success
</div>`; 

const type = document.querySelector('#typeFormulaire');
let idPaiement;
if (type.value === 'update') {
    identifiantM.addEventListener('change', () => {
      const tabValeur = identifiantM.value.split('::');
      idPaiement = tabValeur[1];
      datespaye.value = tabValeur[11];
      salaireConvenu.value = "ID :"+tabValeur[15]+": Nom du travailleur :"+tabValeur[3]+": Salaire convenu :"+tabValeur[5]+":$ en date du = :"+tabValeur[7]+": pour le client = : voir dans lister salaire"
      montant.value = tabValeur[9];
      motif.value = tabValeur[13];
    })
    
  }
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
    xmlhttp.open("GET", "classPaiements.php?q=" + str);
    xmlhttp.send();
    }
  }

btn.addEventListener('click', () => {
    if(salaireConvenu.value == ''){
        messageComplete(salaireVide);
        return;
      } else {
        enleveMessage(salaireVide);
      }
   
      if(montant.value == ''){
        messageComplete(montantVide);
        return;
      } else {
        enleveMessage(montantVide);
      }
  // prendre uniquement les id
  const idSalaire = salaireConvenu.value.split(':');
  let prend;
  if (type.value == "update") {
    prend = idSalaire[1]+"::"+montant.value+"::"+datespaye.value+"::"+motif.value+"::"+idPaiement+"::update";
  } else {
    prend = idSalaire[1]+"::"+montant.value+"::"+datespaye.value+"::"+motif.value+"::add";
  }
  
  showHint(prend);
  
    salaireConvenu.value =""; 
    montant.value = "";
    motif.value = "";
    identifiantM.value = "";
});