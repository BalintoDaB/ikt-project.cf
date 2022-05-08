var kuponjson = [];
var kuponkedvezmeny;
var elozoAr=0;
var kedvezmenyUtaniAr=0;
var vankupon = false;
var eddigiKosarban = [""];
var szamlalo = 0;
var eredetib = "";
function kosarbatetel(nev, ar) {
  var v = $.trim(nev);
  var micsoda = "";
  var szamos = 0;
  var cutoltNev = nev.replace(/\s/g, "");
  var elems = $("#kosartable td").filter(function () {
    if ($.trim($(this).text()) == v) {
      micsoda = $.trim($(this).text()).replace(/\s/g, "");
    }
    return $.trim($(this).text()) === v;
  });
  if (elems.length) {
    if (
      confirm(
        "Ez az elem már az ön kosarában van! Szeretne még egy darabot a kosárba tenni?"
      )
    ) {
      szamos = parseInt($("#" + micsoda + "szam").val()) + 1;
      $("#" + micsoda + "szam").val(szamos);
      var eredeti = $("#" + micsoda + "szam").val();
      artd = $("#" + micsoda + "artd");
      var eredetiar = parseInt(ar);
      var ujar = eredetiar * eredeti;
      // var asd = eredeti-1;
      // elozoAr -= eredetiar * asd;
      vegosszegValt(ujar);
      artd.html(ujar.toString() + " Ft");
      eredeti += 1;
      var index = eddigiKosarban.findIndex((element) => {
        if (element.includes(micsoda)) {
          return true;
        }
      });
      eddigiKosarban[index] = "";
      eddigiKosarban[index] = micsoda + " " + eredeti.slice(0, -1) + "db";
    }
  } else {
    var beilleszt = "'#" + cutoltNev + "'";
    $("#kosartable tbody").append(
      '<tr class="align-middle" id="' +
        cutoltNev +
        '"><td>' +
        nev +
        '</td><td><input type="number" id="' +
        cutoltNev +
        'szam" style="width:50px; text-align:center" oninput="szamValt(' +
        "'" +
        cutoltNev +
        "','" +
        ar +
        "'" +
        ')" max="25" min="1" value="1"></td><td id="' +
        cutoltNev +
        'artd" class="artd">' +
        ar +
        ' Ft</td><td><input type="button" class="btn-danger btn" value="Törlés" onclick="vegosszegTorles(' + "'" + cutoltNev + "artd'" +');torles(' +
        beilleszt +
        ')"></td></tr>'
        );
        eddigiKosarban[szamlalo] = cutoltNev;
        szamlalo += 1;
      }
      $("#kosarform").val(eddigiKosarban);
      vegosszegValt(ar);
}
function torles(nev) {
  $(nev).remove();
}
function szamValt(micsoda, ar) {
  var eredeti = $("#" + micsoda + "szam").val();
  if (eredeti < 0) {
    alert("Negatív számot nem lehet rendelni!");
    $("#" + micsoda + "szam").val(1);
  } else if (eredeti > 25) {
    alert("25 db-ot rendelhet maximum egy termékből!");
    $("#" + micsoda + "szam").val(25);
  } else {
    artd = $("#" + micsoda + "artd");
    var eredetiar = parseInt(ar);
    var ujar = eredetiar * eredeti;
    // var asd = eredeti-1;
    // elozoAr -= eredetiar * asd;
    artd.html(ujar.toString() + " Ft");
    eredeti += 1;
    var index = eddigiKosarban.findIndex((element) => {
      if (element.includes(micsoda)) {
        return true;
      }
    });
    eddigiKosarban[index] = "";
    eddigiKosarban[index] = micsoda + " " + eredeti.slice(0, -1) + "db";
    $("#kosarform").val("");
    $("#kosarform").val(eddigiKosarban);
    vegosszegValt(ujar);
  }
}
function ugorj(hova) {
  window.location.href = hova;
}
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
function ratekiir() {
  $("#rateszam").html($("#range").val().slice(0, 3));
}
function createCookie(mibol) {
  document.cookie = "uname=" + mibol + '"';
  alert(getCookie("uname"));
}
function getCookie(mit) {
  var cookieE = mit + "=";
  var ca = document.cookie.split(";");
  for (var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == " ") c = c.substring(1, c.length);
    if (c.indexOf(cookieE) == 0) {
      return c.substring(cookieE.length, c.length);
    } else {
      return null;
    }
  }
}
// function atir() {
//   eredetib = $("#bejelentkezett").html();
//   $("#bejelentkezett").html("Kijelentkezés");
// }
function visszair() {
  $("#bejelentkezett").html(eredetib);
}
function loginToReg() {
  $("#loginbox").css("display", "none");
  $("#regbox").removeClass("d-none");
  // $('#regbox').addClass('d-block')
}
function kijelentkezes() {
  document.cookie = "uname=";
  document.cookie = "pword=";
  document.location.href = "http://ikt-project.rf.gd/webshop/webshop.php";
  alert("Sikeres kijelentkezés!");
}
function loginToReset(){
  $('#loginbox').css('display','none');
  $('#resetbox').removeClass('d-none');
}
$(document).ready(function () {            
    $.ajax({
        type: "GET",
        url: "kuponok.json",
        data: "",
        dataType: "JSON",
        success: function(data) {
            kuponjson = data;
            for(let i of kuponjson){
                if(i.ervenyesseg < Date.now() / 1000){
                    var removeIndex = kuponjson.indexOf(i);
                    kuponjson.splice(removeIndex, 1);
                }
            }
        }
    });
});
function kuponCheck(){
  var input = document.getElementById('kuponin');
  var output = document.getElementById('kuponout');
  var vegosszeg = document.getElementById('vegosszeg');
  for (let i of kuponjson) {
      if(input.value == i.kod){
          kuponkedvezmeny = i.kedvezmeny;
          output.innerHTML = "A következő a kedvezményed: " + i.kedvezmeny + "%";
          var kedvezmenyTizedestort = 1 - kuponkedvezmeny/100 ;
          kedvezmenyUtaniAr = Math.floor(elozoAr * kedvezmenyTizedestort);
          vegosszeg.innerHTML = kedvezmenyUtaniAr + "FT (Kedvezmény után)";
          vankupon = true;
          document.getElementById('ar').value = kedvezmenyUtaniAr;
          break;
      }
      else{
          output.innerHTML = 'Nincs ilyen kupon!';
      }
  }
}
function vegosszegValt(){
  var output = document.getElementById('vegosszeg');
  var input = document.getElementsByClassName('artd');
  elozoAr = 0;
  for(let i of input){
    elozoAr += parseInt(i.innerHTML);
  }
  output.innerHTML = elozoAr + "FT";
  if (vankupon){
    kuponCheck();
  }
  else{
    document.getElementById('ar').value = elozoAr;;
  }
}
function vegosszegTorles(micsoda){
  var output = document.getElementById('vegosszeg');
  var input = $('#' + micsoda);
  var valtar = parseInt(input.html());
  elozoAr -= valtar;
  output.innerHTML = elozoAr + "FT";
  if (vankupon){
    kuponCheck();
  }
  else{
    document.getElementById('ar').value = elozoAr;
  }
}