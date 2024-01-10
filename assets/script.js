//swiper for the house info page//
document.addEventListener('DOMContentLoaded', (event) => {
  const seasideSwiper = new Swiper('.seasideSwiper', {
    slidesPerView: 1,
    loop: true,
    autoplay: {
      delay: 3000,
    },
    pagination: {
      el: '.swiper-pagination',
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });
});

// ---------------------------------------------------------------------//

let kayak = document.getElementById('kayak');
let fishing = document.getElementById('fishing');
let guide = document.getElementById('guide');
let mountainclimbing = document.getElementById('mountainclimbing');
let addArrival = document.getElementsByClassName('arrival');
let addDeparture = document.getElementsByClassName('departure');
let dropdownButton1 = document.getElementById('ddbtn1');
let dropdownButton2 = document.getElementById('ddbtn2');
let dropdownButton3 = document.getElementById('ddbtn3');

let total = 0;
let extrasTotal = 0;
let totalNights = 0;
let roomCost = 0;

// extras //
if (document.getElementById('kayak') != null) {
  kayak.addEventListener('change', addCost);
  fishing.addEventListener('change', addCost);
  guide.addEventListener('change', addCost);
  mountainclimbing.addEventListener('change', addCost);
}

//dropdown//
if (document.getElementById('ddbtn1') != null) {
  dropdownButton1.addEventListener('click', toggleVisibility);
  dropdownButton2.addEventListener('click', toggleVisibility);
}
if (document.getElementById('ddbtn3') != null) {
  dropdownButton3.addEventListener('click', toggleVisibility);
}

//dates//
for (let i = 0; i < addArrival.length; i++) {
  addArrival[i].addEventListener('click', addArrivalDate);
}
for (let i = 0; i < addDeparture.length; i++) {
  addDeparture[i].addEventListener('click', addDepartureDate);
}

// ---------------------------------------------------------------------//

//toggle visibility of dropdown menu//
function toggleVisibility() {
  if (this.children[1].classList.contains('active')) {
    this.children[1].classList.remove('active');
  } else {
    this.children[1].classList.add('active');
  }
}

//choose arrival date
function addArrivalDate() {
  this.style.backgroundColor = 'blue';
  let arrivalDate = this.innerHTML.trim().padStart(2, '0');
  let arrivalDateString = '2024-01-' + arrivalDate;
  let printArrivalDate = document.getElementsByClassName('arrivalDate');
  for (let i = 0; i < printArrivalDate.length; i++) {
    printArrivalDate[i].innerHTML = arrivalDateString;
  }
  document.getElementById('arrivalPost').value = arrivalDateString;
  //if another button is clicked, make the previous one white again
  for (let i = 0; i < addArrival.length; i++) {
    if (addArrival[i] != this) {
      addArrival[i].style.backgroundColor = 'white';
    }
  }
  addTotalNights();
}
//choose departure date
function addDepartureDate() {
  let arrivalDateString =
    document.getElementsByClassName('arrivalDate')[0].innerHTML;
  let arrivalCompare = arrivalDateString.split('-')[2];
  let departureDate = this.innerHTML.trim().padStart(2, '0');
  let departureDateString = '2024-01-' + departureDate;
  let departureCompare = departureDateString.split('-')[2];
  if (departureCompare <= arrivalCompare) {
    alert('Departure date must be after arrival date');
    return;
  } else {
    this.style.backgroundColor = 'blue';
    let printDepartureDate = document.getElementsByClassName('departureDate');
    for (let i = 0; i < printDepartureDate.length; i++) {
      printDepartureDate[i].innerHTML = departureDateString;
    }
    document.getElementById('departurePost').value = departureDateString;
    //if another button is clicked, make the previous one white again
    for (let i = 0; i < addDeparture.length; i++) {
      if (addDeparture[i] != this) {
        addDeparture[i].style.backgroundColor = 'white';
      }
    }
    // add total nights to the total cost
    addTotalNights();
  }
}

function addTotalNights() {
  let arrivalDate = document.getElementsByClassName('arrivalDate')[0].innerHTML;
  console.log(arrivalDate);
  let departureDate =
    document.getElementsByClassName('departureDate')[0].innerHTML;
  console.log(departureDate);
  let arrivalDay = Number(arrivalDate.split('-')[2]);
  let departureDay = Number(departureDate.split('-')[2]);
  console.log(arrivalDay);
  console.log(departureDay);
  if (arrivalDay >= departureDay && departureDay != 0) {
    alert('Arrival date must be prior to departure date');
    return;
  } else {
    if (arrivalDay < 1 || departureDay < 1) {
      nights = 0;
      return;
    } else {
      nights = departureDay - arrivalDay;
    }
    let roomNumber = document.getElementsByClassName('invisible')[0];
    if (
      roomNumber.innerHTML != '' ||
      roomNumber.innerHTML != null ||
      roomNumber.innerHTML != 0
    ) {
      roomCost = roomNumber.innerHTML;
    } else {
      roomCost = 0;
    }

    totalNights = nights * roomCost;
    console.log(totalNights);
    total = extrasTotal + totalNights;
    console.log(total);
    document.getElementById('total').innerHTML = total;
    updateCost = parseInt(total);
    document.getElementById('orderTotal').value = updateCost;
    //Update total cost when extras or dates are added or removed //
    document.getElementById('total').addEventListener('change', function () {
      document.getElementById('orderTotal').value = this.innerHTML;
    });
    let totalSpan = document.getElementById('total');
    let totalCost = document.getElementById('orderTotal');
    for (let i = 0; i < addDeparture.length; i++) {
      if (addDeparture[i] != this) {
        totalNights = 0;
        let nights = departureDay - arrivalDay;
        totalNights += nights * roomCost;
        totalSpan.innerHTML = totalNights + extrasTotal;
        totalCost.value = totalSpan.innerHTML;
        totalSpan.dispatchEvent(new Event('change'));
      }
    }
  }
}

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
