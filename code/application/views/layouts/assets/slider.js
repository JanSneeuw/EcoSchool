var slider = document.getElementById("myRange");
var output = document.getElementById("demo");
output.innerHTML = slider.value; // Display the default slider value

// Update the current slider value (each time you drag the slider handle)
slider.oninput = function() {
	output.innerHTML = this.value;
}

var nslider = document.getElementById("nextRange");
var noutput = document.getElementById("d1");
noutput.innerHTML = nslider.value; // Display the default slider value

// Update the current slider value (each time you drag the slider handle)
nslider.oninput = function() {
	noutput.innerHTML = this.value;
}
