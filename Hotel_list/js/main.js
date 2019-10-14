function setloader() {
  sessionStorage.setItem("search", document.getElementById('searchbox').value);
  sessionStorage.setItem("checkin", document.getElementById('checkin').value);
  sessionStorage.setItem("checkout", document.getElementById('checkout').value);
  sessionStorage.setItem("myRange", document.getElementById('myRange').value);
  sessionStorage.setItem("accomodation", document.getElementById('accomodation').value);
  sessionStorage.setItem("guest_rating", document.getElementById('guest_rating').value);
  sessionStorage.setItem("datad", document.getElementById('datad').value);
}

function getloader() {
  document.getElementById('searchbox').value = sessionStorage.getItem("search");
  document.getElementById('checkin').value = sessionStorage.getItem("checkin");
  document.getElementById('checkout').value = sessionStorage.getItem("checkout");
  document.getElementById('accomodation').value = sessionStorage.getItem("accomodation");
  document.getElementById('guest_rating').value = sessionStorage.getItem("guest_rating");
  document.getElementById('datad').value = sessionStorage.getItem("datad");
  document.getElementById('myRange').value = sessionStorage.getItem("myRange");
  document.getElementById("slideVal").innerHTML="Price/Night: " +document.getElementById('myRange').value;
}

function defaultloader() {
  document.getElementById('searchbox').value = "";
  document.getElementById('checkin').value = "";
  document.getElementById('checkout').value = "";
  document.getElementById('accomodation').value = "All types";
  document.getElementById('guest_rating').value = "All";
  document.getElementById('datad').value ="";
  document.getElementById('myRange').value = 50;
}

//Slider Function

var slider = document.getElementById("myRange");
var output = document.getElementById("slideVal");
output.innerHTML = "Price/Night: " + slider.value; // Display the default slider value

// Update the current slider value (each time you drag the slider handle)
slider.oninput = function () {
  output.innerHTML = "Price/Night: " + this.value;
}
