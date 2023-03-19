// take all value inside inputs
const datesVente = document.querySelector('#datesVente');
const nomProduit = document.querySelector('#nomProduit');
const pA = document.querySelector('#pA');
const pV = document.querySelector('#pV');
const benefice = document.querySelector('#benefice');

const motif = document.querySelector('#commentaire');
const btn = document.querySelector('#envoie');

const clientVide = document.querySelector('#clientVide');
const nomVide = document.querySelector('#nomVide');
const paVide = document.querySelector('#paVide');
const pvVide = document.querySelector('#pvVide');

let feedback = '';
const compareFeedback = `<div class='alert alert-success' role='alert'>
Insertion fait avec success
</div>`;

// message if input in empty
const messageVide = 'Veuillez remplir ce champs svp';

const messageComplete = valeur => {
    valeur.textContent = messageVide;
    valeur.style.color = 'red';
  }
  
  const enleveMessage = valeur => {
    valeur.textContent = '';
    valeur.style.color = 'balck';
  }

  const calculBenefice = () => {
    return pV.value - pA.value;
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
    xmlhttp.open("GET", "classVentes.php?q=" + str);
    xmlhttp.send();
    }
  }
btn.addEventListener('click', () => {
      if(nomProduit.value == ''){
        messageComplete(nomVide);
        return;
      } else {
        enleveMessage(nomVide);
      }
    
      if(pA.value == ''){
        messageComplete(paVide);
        return;
      } else {
        enleveMessage(paVide);
      }
    
      if(pV.value == ''){
        messageComplete(pvVide);
        return;
      } else {
        enleveMessage(pvVide);
      }
  
  const prend = pA.value+"::"+pV.value+"::"+(pV.value - pA.value)+"::"+datesVente.value+"::"+nomProduit.value+"::"+motif.value;
  showHint(prend);
 
    pA.value =""; 
    pV.value = "";
    motif.value = "";
    nomProduit.value = "";
    
});

pA.addEventListener('change', () => {
  benefice.value = calculBenefice();
})

pV.addEventListener('change', () => {
    benefice.value = calculBenefice();
});