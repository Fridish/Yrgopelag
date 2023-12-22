/* extras -section*/
let kajak = document.getElementById('kajak');
let fiskeutrustning = document.getElementById('fiskeutrustning');
let guide = document.getElementById('guide');
let bergsklättring = document.getElementById('bergsklättring');
let total = 0;
let addArrival = document.getElementById('arrival');
let addDeparture = document.getElementById('departure');

guide.addEventListener('click', addCost);
bergsklättring.addEventListener('click', addCost);
fiskeutrustning.addEventListener('click', addCost);
kajak.addEventListener('click', addCost);

addDeparture.addEventListener('change', addTotalNights);
addArrival.addEventListener('change', addTotalNights);
let extrasTotal = 0;
let totalNights = 0;
/*for (let i = 0; i < addArrival.length; i++) {
/  addArrival[i].addEventListener('click', addArrivalDate);
}
for (let i = 0; i < addDeparture.length; i++) {
  addDeparture[i].addEventListener('click', addDepartureDate);
 }*/

//add cost of extras to the total cost
function addCost() {
  if (this.checked) {
    extrasTotal += Number(this.value);
    total = totalNights + extrasTotal;
    console.log(total);
  } else {
    extrasTotal -= Number(this.value);
    total = totalNights + extrasTotal;
    console.log(total);
  }
  updateCost = document.getElementById('total').innerHTML = total;
  document.getElementById('orderTotal').value = updateCost;
}

//choose arrival date
function addArrivalDate() {
  this.style.backgroundColor = 'blue';
  let arrivalDate = '2024-01-' + this.innerHTML;
  document.getElementById('arrivalDate').innerHTML = arrivalDate;

  //if another button is clicked, make the previous one white again
  for (let i = 0; i < addArrival.length; i++) {
    if (addArrival[i] != this) {
      addArrival[i].style.backgroundColor = 'white';
    }
  }
}
function addTotalNights() {
  let arrivalDate = document.getElementById('arrival').value;
  let departureDate = document.getElementById('departure').value;
  let arrivalDay = arrivalDate.split('-')[2];
  if (arrivalDay < 10) {
    arrivalDay = arrivalDay.split(0)[1];
  }
  let departureDay = departureDate.split('-')[2];
  if (departureDay < 10) {
    departureDay = departureDay.split(0)[1];
  }
  console.log(arrivalDay);
  console.log(departureDay);
  if (arrivalDate >= departureDate && departureDate != '') {
    alert('Dagen för hemfärd måste vara efter ankomstdagen');
  } else {
    if (arrivalDate < 1 || departureDate < 1) {
      nights = 0;
    } else {
      nights = departureDay - arrivalDay;
    }
    totalNights = nights * 10;
    console.log(totalNights);
    total = extrasTotal + totalNights;
    console.log(total);
    document.getElementById('total').innerHTML = total;
    updateCost = parseInt(total);
    document.getElementById('orderTotal').value = updateCost;
  }
}
//choose departure date
function addDepartureDate() {
  let arrivalDateString = document.getElementById('arrivalDate').innerHTML;
  let arrivalDate = new Date(arrivalDateString);
  let day = this.innerHTML.trim().padStart(2, '0');
  let departureDate = new Date('2024-01-' + day + 'T00:00:00Z');

  if (departureDate <= arrivalDate) {
    alert('Dagen för hemfärd måste vara efter ankomstdagen');
    return;
  } else {
    this.style.backgroundColor = 'blue';
    document.getElementById('departureDate').innerHTML = departureDate
      .toISOString()
      .split('T')[0];

    //if another button is clicked, make the previous one white again
    for (let i = 0; i < addDeparture.length; i++) {
      if (addDeparture[i] != this) {
        addDeparture[i].style.backgroundColor = 'white';
      }
    }
    // add total nights to the total cost
    let nights = day - arrivalDateString.split('-')[2];
    total += nights * 10;
    document.getElementById('total').innerHTML = total;
    for (let i = 0; i < addDeparture.length; i++) {
      if (addDeparture[i] != this) {
        total = 0;
        let nights = day - arrivalDateString.split('-')[2];
        total += nights * 10;
        document.getElementById('total').innerHTML = total;
      }
    }
  }
}

//Visa Bara Januari
$('#htmlArrival').datepicker({
  beforeShowDay: function (date) {
    return [date.getMonth() == 0]; // show only January
  },
});

$('#htmlDeparture').datepicker({
  beforeShowDay: function (date) {
    return [date.getMonth() == 0]; // show only January
  },
});

document.getElementById('total').addEventListener('change', function () {
  document.getElementById('orderTotal').value = this.innerHTML;
});
let totalSpan = document.getElementById('total');
let totalCost = document.getElementById('orderTotal');
for (let i = 0; i < addDeparture.length; i++) {
  if (addDeparture[i] != this) {
    total = 0;
    let nights = day - arrivalDateString.split('-')[2];
    total += nights * 10;
    totalSpan.innerHTML = total;
    totalCost.value = totalSpan.innerHTML;
    totalSpan.dispatchEvent(new Event('change'));
  }
}
