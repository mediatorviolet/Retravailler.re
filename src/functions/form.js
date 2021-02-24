let ajout_date = document.querySelector("#ajout_date");
let count = 1;

function insertAfter(newNode, referenceNode) {
  referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
}

function ajouterDate() {
  let parentDiv = document.createElement("div");
  let span = document.createElement("span");
  let spanText = document.createTextNode("Date et heure");
  let dateInput = document.createElement("input");
  let timeInput = document.createElement("input");

  parentDiv.classList.add("col-12", "input-group");
  parentDiv.setAttribute("id", "div" + (count + 1));

  span.classList.add("input-group-text");

  dateInput.classList.add("form-control");
  dateInput.setAttribute("type", "date");
  dateInput.setAttribute("name", "date" + (count + 1));

  timeInput.classList.add("form-control");
  timeInput.setAttribute("type", "time");
  timeInput.setAttribute("name", "heure" + (count + 1));

  span.appendChild(spanText);
  parentDiv.appendChild(span);
  parentDiv.appendChild(dateInput);
  parentDiv.appendChild(timeInput);

  let currentDiv = document.querySelector("#div" + count);
  insertAfter(parentDiv, currentDiv);
  count++;
}

ajout_date.addEventListener("click", ajouterDate);
