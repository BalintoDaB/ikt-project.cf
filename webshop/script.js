var eddigiKosarban = [''];
var szamlalo = 0;
function kosarbatetel(nev, ar){
    var v = $.trim(nev);
    var micsoda = '';
    var szamos = 0;
    var cutoltNev = nev.replace(/\s/g, '');
    var elems = $('#kosartable td').filter(function(){
        if ($.trim($(this).text())==v){
            micsoda = $.trim($(this).text()).replace(/\s/g, '');
        }
        return $.trim($(this).text())===v;
    });
    if (elems.length){
        if(confirm('Ez az elem már az ön kosarában van! Szeretne még egy darabot a kosárba tenni?')){
            szamos = parseInt($('#' + micsoda + 'szam').val()) + 1;
            $('#' + micsoda + 'szam').val(szamos);
            var eredeti = $('#' + micsoda + 'szam').val();
            artd = $('#' + micsoda + 'artd');
            var eredetiar = parseInt(ar);
            var ujar = eredetiar*eredeti;
            artd.html(ujar.toString() + ' Ft');
            eredeti+=1;
            var index = eddigiKosarban.findIndex(element => {
                if (element.includes(micsoda)) {
                  return true;
                }
            });
            eddigiKosarban[index] = '';
            eddigiKosarban[index] = micsoda + ' ' + eredeti.slice(0, -1) + 'db';
        }
    }
    else{
        var beilleszt = "'#" + cutoltNev + "'";
        $('#kosartable tbody').append('<tr class="align-middle" id="'+ cutoltNev + '"><td>' + nev + '</td><td><input type="number" id="' + cutoltNev + 'szam" style="width:50px; text-align:center" oninput="szamValt(' + "'" + cutoltNev + "','" + ar + "'" + ')" max="10" min="1" value="1"></td><td id="' +  cutoltNev + 'artd">' + ar +' Ft</td><td><input type="button" class="btn-danger btn" value="Törlés" onclick="torles(' + beilleszt +')"></td></tr>');
        eddigiKosarban[szamlalo] = cutoltNev;
        szamlalo += 1;
    }
    $('#kosarform').val(eddigiKosarban);
}
function torles(nev){
    $(nev).remove();
}
function szamValt(micsoda, ar){
    var eredeti = $('#' + micsoda + 'szam').val();
    artd = $('#' + micsoda + 'artd');
    var eredetiar = parseInt(ar);
    var ujar = eredetiar*eredeti;
    artd.html(ujar.toString() + ' Ft');
    eredeti+=1;
    var index = eddigiKosarban.findIndex(element => {
        if (element.includes(micsoda)) {
          return true;
        }
    });
    eddigiKosarban[index] = '';
    eddigiKosarban[index] = micsoda + ' ' + eredeti.slice(0, -1) + 'db';
    $('#kosarform').val('');
    $('#kosarform').val(eddigiKosarban);
}
function ugorj(hova){
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