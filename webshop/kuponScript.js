var kuponjson = [];
var kuponkodok = [];
var kuponkedvezmenyek = [];
$(document).ready(function () {            
    $.ajax({
        type: "GET",
        url: "kuponok.json",
        data: "",
        dataType: "JSON",
        success: function(data) {
            kuponjson = data.kuponok;
            kuponjson.forEach(element => {
                if(element.érvényesség > Date.now() / 1000){
                    kuponkodok.push(element.kód);
                    kuponkedvezmenyek.push(element.kedvezmény);
                }
            });
        }
    });
});
function kuponCheck(){
    var input = document.getElementById('asd');
    var output = document.getElementById('ide');
    var vane = false
    for (let i of kuponkodok) {
        if(input.value == i){
            var kuponIndex = kuponkodok.indexOf(i);
            output.innerHTML = 'A következő a kedvezmény: ' + kuponkedvezmenyek[kuponIndex] + "%";
            vane = true;
            break;
        }
        else{
            output.innerHTML = 'Nincs ilyen kupon!';
        }
    }
}