/* extras -section*/

let kajak = document.getElementById('kajak');
let fiskeutrustning = document.getElementById('fiskeutrustning');
let guide = document.getElementById('guide');
let bergsklättring = document.getElementById('bergsklättring');
let total = 0;

guide.addEventListener('click', addCost);
bergsklättring.addEventListener('click', addCost);
fiskeutrustning.addEventListener('click', addCost);
kajak.addEventListener('click', addCost);

function addCost() {
  if (this.checked) {
    total += Number(this.value);
  } else {
    total -= Number(this.value);
  }
  document.getElementById('total').innerHTML = total;
}
