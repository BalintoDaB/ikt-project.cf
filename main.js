var intervalId = window.setInterval(function () {
  GetSlide();
}, 100);

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
  var src = aktiv[1].getElementsByClassName("cr-kep");
  var hatter = document.body.style.backgroundColor;
  var color = ["#d72631", "#ff5b65", "#a2d5c6", "#077b8a", "#5c3c92"];
  if(src[0].src.includes("0.png")){
    document.getElementById("sec1").style.backgroundColor = color[0];
    console.log("0");
  }else if(src[0].src.includes("1.png")){
    document.getElementById("sec1").style.backgroundColor = color[1];
    console.log("1");
  }else if(src[0].src.includes("2.png")){
    document.getElementById("sec1").style.backgroundColor = color[2];
    console.log("2");
  }else if(src[0].src.includes("3.png")){
    document.getElementById("sec1").style.backgroundColor = color[3];
    console.log("3");
  }else if(src[0].src.includes("4.png")){
    document.getElementById("sec1").style.backgroundColor = color[4];
    console.log("4");
  }
}
function nagyobbit() {
  
}

