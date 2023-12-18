/* extras -section*/

let kajak = document.getElementById('kajak');
let fiskeutrustning = document.getElementById('fiskeutrustning');
let guide = document.getElementById('guide');
let bergsklättring = document.getElementById('bergsklättring');
let total = 0;
let calendarDay = document.getElementsByClassName('calendarDay');
let getTd = document.getElementsByTagName('td');

guide.addEventListener('click', addCost);
bergsklättring.addEventListener('click', addCost);
fiskeutrustning.addEventListener('click', addCost);
kajak.addEventListener('click', addCost);
for (let i = 0; i < getTd.length; i++) {
  getTd[i].addEventListener('click', addDate);
}

function addCost() {
  if (this.checked) {
    total += Number(this.value);
  } else {
    total -= Number(this.value);
  }
  document.getElementById('total').innerHTML = total;
}
