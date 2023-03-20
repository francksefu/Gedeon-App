// take all value inside inputs
const nomPersonnel = document.querySelector('#nomPersonnel');
const telephone = document.querySelector('#telephone');
const poste = document.querySelector('#poste');

const btn = document.querySelector('#envoie');

const nomVide = document.querySelector('#nomVide');
const telephoneVide = document.querySelector('#telephoneVide');
const posteVide = document.querySelector('#posteVide');

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
    xmlhttp.open("GET", "classPersonnels.php?q=" + str);
    xmlhttp.send();
    }
  }
btn.addEventListener('click', () => {
  // Verifie si tous les champs sont rempli avant l envoie, sinon blocage
  if(nomPersonnel.value == ''){
    messageComplete(nomVide);
    return;
  } else {
    enleveMessage(nomVide);
  }

  if(poste.value == ''){
    messageComplete(posteVide);
    return;
  } else {
    enleveMessage(posteVide);
  }
 
  const prend = poste.value+"::"+nomPersonnel.value+"::"+telephone.value;
  showHint(prend);
  
    nomPersonnel.value =""; 
    telephone.value = "";
    poste.value = ""
    
});