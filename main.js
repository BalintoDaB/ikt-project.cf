var intervalId = window.setInterval(function () {
  GetSlide();
}, 50);

document.addEventListener("DOMContentLoaded", function () {
  window.addEventListener("scroll", function () {
    if (window.scrollY > 50) {
      document.getElementById("navbar_top").classList.add("fixed-top");
      // add padding top to show content behind navbar
      navbar_height = document.querySelector(".navbar").offsetHeight;
      document.body.style.paddingTop = navbar_height + "px";
    } else {
      document.getElementById("navbar_top").classList.remove("fixed-top");
      // remove padding top from body
      document.body.style.paddingTop = "0";
    }
  });
});

function GetSlide() {
  var aktiv = document.getElementsByClassName("active");
  var src = aktiv[0].getElementsByTagName("img").src;
  var hatter = document.body.style.backgroundColor;
  var color = ["#d72631", "#ff5b65", "#a2d5c6", "#077b8a", "#5c3c92"];
}
