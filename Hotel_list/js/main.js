//Slider Function

var slider = document.getElementById("myRange");
var output = document.getElementById("slideVal");
output.innerHTML = "Price/Night: " + slider.value; // Display the default slider value

// Update the current slider value (each time you drag the slider handle)
slider.oninput = function() {
  output.innerHTML = "Price/Night: " + this.value;
  console.log(this.value);
}

