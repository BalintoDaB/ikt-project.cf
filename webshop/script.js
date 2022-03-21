function kosarbatetel(nev, ar){
    var v = $.trim(nev);
    var micsoda = '';
    var szamos = 0;
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
        }
    }
    else{
        var cutoltNev = nev.replace(/\s/g, '');
        var beilleszt = "'#" + cutoltNev + "'";
        $('#kosartable tbody').append('<tr class="align-middle" id="'+ cutoltNev + '"><td>' + nev + '</td><td><input type="number" id="' + cutoltNev + 'szam" style="width:50px; text-align:center" max="10" min="1" value="1"></td><td>' + ar +' Ft</td><td><input type="button" class="btn-danger btn" value="Törlés" onclick="torles(' + beilleszt +')"></td></tr>');
    }
}
function torles(nev){
    $(nev).remove();
}