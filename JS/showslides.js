//------------ Para os Bookings

var slideIndex = [1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1];

/* Class the members of each slideshow group with different CSS classes */
var slideId = []; 
var strslides = "mySlides";
for($i=0; $i<50; $i++)
{
  slideId.push(strslides.concat($i));
  showSlides(1, $i);
}

function plusSlides(n, no) {
  showSlides(slideIndex[no] += n, no);
}

function currentSlide(n, no) {
  showSlides(slideIndex[no] = n, no);
}

function showSlides(n, no) {
  var i;
  var x = document.getElementsByClassName(slideId[no]);
  if(x.length != 0) { 
  if (n > x.length) {slideIndex[no] = 1}
  if (n < 1) {slideIndex[no] = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  x[slideIndex[no]-1].style.display = "block";
 } else return null;
}

//----------------- Para as Properties

var slideIndexP = [1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1];

/* Class the members of each slideshow group with different CSS classes */
var slideIdP = []; 
var strslidesP = "PmySlides";
for($i=0; $i<50; $i++)
{
  slideIdP.push(strslidesP.concat($i));
  showSlidesP(1, $i);
}

function plusSlidesP(n, no) {
  showSlidesP(slideIndexP[no] += n, no);
}

function currentSlideP(n, no) {
  showSlidesP(slideIndexP[no] = n, no);
}

function showSlidesP(n, no) {
  var i;
  var x = document.getElementsByClassName(slideIdP[no]);
  if(x.length != 0) { 
  if (n > x.length) {slideIndexP[no] = 1}
  if (n < 1) {slideIndexP[no] = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  x[slideIndexP[no]-1].style.display = "block";
} else return null;
}