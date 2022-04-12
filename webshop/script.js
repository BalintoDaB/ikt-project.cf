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
        ')" max="10" min="1" value="1"></td><td id="' +
        cutoltNev +
        'artd">' +
        ar +
        ' Ft</td><td><input type="button" class="btn-danger btn" value="Törlés" onclick="torles(' +
        beilleszt +
        ')"></td></tr>'
    );
    eddigiKosarban[szamlalo] = cutoltNev;
    szamlalo += 1;
  }
  $("#kosarform").val(eddigiKosarban);
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
function irszamKeres(irszam){
  $.ajax({
    type: "GET",
    url: "irszamok.json",
    data: "",
    dataType: "JSON",
    success: function(data) {
      var tomb = data.Települések;
      tomb.forEach(element => {
        if(element.IRSZ == irszam){
          $('body').html(element.Település);
        }
      });
    }
  });
}