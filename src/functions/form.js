/**
 * 
 * Script JS pour générer plusieurs champs (date, heure et nombre de places) lors de la création d'un atelier
 * 
 */

let ajout_date = document.querySelector("#ajout_date");
let count = 0;

/**
 * 
 * Fonction pour insérer un élément DOM après un élément spécifique
 * 
 */
function insertAfter(newNode, referenceNode) {
  referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
}


/**
 * 
 * Fonction qui crée les champs pour la date (date et heure)
 * 
 */
function createDateInput() {
  let dateDiv = document.createElement("div");
  let span = document.createElement("span");
  let spanText = document.createTextNode("Date et heure");
  let dateInput = document.createElement("input");
  let timeInput = document.createElement("input");

  dateDiv.classList.add("col-12", "input-group");

  span.classList.add("input-group-text");

  dateInput.classList.add("form-control");
  dateInput.setAttribute("type", "date");
  dateInput.setAttribute("name", "date" + (count + 1));

  timeInput.classList.add("form-control");
  timeInput.setAttribute("type", "time");
  timeInput.setAttribute("name", "heure" + (count + 1));

  span.appendChild(spanText);
  dateDiv.appendChild(span);
  dateDiv.appendChild(dateInput);
  dateDiv.appendChild(timeInput);

  return dateDiv;
}

/**
 * 
 * Fonction qui crée un champ pour le nombre de place
 * 
 */
function createPlaceInput() {
  let placeDiv = document.createElement("div");
  let placeLabel = document.createElement("label");
  let placeLabelText = document.createTextNode('Nombre de places');
  let placeInput = document.createElement("input");

  placeDiv.classList.add("col-md-6");

  placeLabel.classList.add("form-label");
  placeLabel.setAttribute("for", "nb_place" + (count + 1));

  placeInput.classList.add("form-control");
  placeInput.setAttribute("type", "number");
  placeInput.setAttribute("min", "1");
  placeInput.setAttribute("name", "nb_place" + (count + 1));

  placeLabel.appendChild(placeLabelText);
  placeDiv.appendChild(placeLabel);
  placeDiv.appendChild(placeInput);

  return placeDiv;
}

/**
 * 
 * Fonction qui met les deux champs créés précédemment dans une div et les ajoute à la fin du formulaire
 * 
 */
function ajouterDate() {
  let parentDiv = document.createElement("div");

  parentDiv.classList.add('mt-5');
  parentDiv.setAttribute('id', 'div' + (count + 1));

  parentDiv.appendChild(createDateInput());
  parentDiv.appendChild(createPlaceInput());

  let currentDiv = document.querySelector("#div" + count);

  insertAfter(parentDiv, currentDiv);
  count++;
}

// Event Listener, lance la fonction ajouterDate() à chaque fois que l'administrateur clique sur le lien 'ajouter une date'
ajout_date.addEventListener("click", ajouterDate);
