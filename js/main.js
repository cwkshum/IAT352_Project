//Arrrows for manual control
var slideIndex = 1;
slideControl(slideIndex);

function plusSlides(n) {
  slideControl(slideIndex += n);
}

function currentSlide(n) {
  slideControl(slideIndex = n);
}

// Changing active indicator dot
function slideControl(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {
    slideIndex = 1;
  }    
  if (n < 1) {
    slideIndex = slides.length;
  }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}

var slideAuto = 0;
showSlides();

// Changing active carousel slide
function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideAuto++;
  if (slideAuto > slides.length) {slideAuto = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideAuto-1].style.display = "block";  
  dots[slideAuto-1].className += " active";
  // Change image every 5 seconds
  setTimeout(showSlides, 5000); 
}