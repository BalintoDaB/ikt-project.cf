var ActivPic;
var ActivBuy;
var magassag;

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

    var reveals = document.querySelectorAll(".reveal");

    for (var i = 0; i < reveals.length; i++) {
      var windowHeight = window.innerHeight;
      var elementTop = reveals[i].getBoundingClientRect().top;
      var elementVisible = 150;

      if (elementTop < windowHeight - elementVisible) {
        reveals[i].classList.add("active");
      } else {
        reveals[i].classList.remove("active");
      }
    }
  });
});

function GetSlide() {
  var aktiv = document.getElementsByClassName("active");
  var src = aktiv[1].getElementsByClassName("cr-kep");
  var buy = aktiv[1].getElementsByClassName("cr-buy");
  ActivPic = src[0];
  ActivBuy = buy[0];
  var hatter = document.body.style.backgroundColor;
  var color = ["#d72631", "#ff5b65", "#a2d5c6", "#077b8a", "#5c3c92"];
  var color2 = ["#c12f38", "#d25960", "#85aea2", "#085f6b", "#472e6f"];
  if (src[0].src.includes("0.png")) {
    document.getElementById("sec1").style.backgroundColor = color[0];
    ActivBuy.style.backgroundColor = color2[0];
  } else if (src[0].src.includes("1.png")) {
    document.getElementById("sec1").style.backgroundColor = color[1];
    ActivBuy.style.backgroundColor = color2[1];
  } else if (src[0].src.includes("2.png")) {
    document.getElementById("sec1").style.backgroundColor = color[2];
    ActivBuy.style.backgroundColor = color2[2];
  } else if (src[0].src.includes("3.png")) {
    document.getElementById("sec1").style.backgroundColor = color[3];
    ActivBuy.style.backgroundColor = color2[3];
  } else if (src[0].src.includes("4.png")) {
    document.getElementById("sec1").style.backgroundColor = color[4];
    ActivBuy.style.backgroundColor = color2[4];
  }
}
function nagyobbit() {
  var move = -250;
  if (window.screen.width < 1000) {
    move = -150;
  } else if (window.screen.width < 770) {
    move = -50;
  } else if (window.screen.width < 400) {
    move = 0;
  }
  anime({
    targets: ActivPic,
    keyframes: [{ translateX: move }],
    duration: 500,
    easing: "spring(1, 80, 20, 10)",
  });
  ActivBuy.style.opacity = "1";
}
function sima() {
  anime({
    targets: ActivPic,
    keyframes: [{ translateX: 0 }],
    duration: 500,
    easing: "spring(1, 80, 20, 10)",
  });
  ActivBuy.style.opacity = "0";
}
function ugorj(hova) {
  window.location.href = hova;
}
// function reveal() {
//   var reveals = document.querySelectorAll(".reveal");

//   for (var i = 0; i < reveals.length; i++) {
//     var windowHeight = window.innerHeight;
//     var elementTop = reveals[i].getBoundingClientRect().top;
//     var elementVisible = 150;

//     if (elementTop < windowHeight - elementVisible) {
//       reveals[i].classList.add("active");
//     } else {
//       reveals[i].classList.remove("active");
//     }
//   }
// }
// window.addEventListener("scroll", reveal);
