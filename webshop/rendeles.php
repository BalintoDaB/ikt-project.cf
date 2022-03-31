<?php
    if (isset($_POST['email']) && isset($_POST['name']) && isset($_POST['telszam']) && isset($_POST['orszag']) && isset($_POST['megye']) && isset($_POST['iranyitoszam']) && isset($_POST['cim']) && isset($_POST['kosar'])){
        $emaila = $_POST['email'];
        $nev = $_POST['name'];
        $telszam = $_POST['telszam'];
        $orszag = $_POST['orszag'];
        $megye = $_POST['megye'];
        $irszam = $_POST['iranyitoszam'];
        $cim = $_POST['cim'];
        $megjegyz = $_POST['megjegyzes'];
        $rendeles = $_POST['kosar'];
        $kod = rand(0, 9999999);
        $sql = "INSERT INTO rendelesek (email, nev, telszam, orszag, megye, varos, cim, megjegyzes, rendeltek, kod, allapot) VALUES ('$emaila','$nev','$telszam','$orszag','$megye','$irszam','$cim','$megjegyz','$rendeles','$kod','Rendelés leadva')";
        if(mysqli_query($csatlakozas, $sql)){
            echo "<script>alert('Sikeres megrendelés!');</script>";
            echo "<h1>Sikeres Megrendelés!</h1>";
            echo "<h2>A következő a megrendelési kódod: $kod</h2></br>";
            echo "<input type='button' class='my-4 btn webshopgomb' onclick='ugorj(" . '"' . "allapot.php?kod=$kod" . '"' . ")' value='Tovább a rendelés állapotának megtekintéséhez'>";
            $email = $emaila;
            include('index.php');
        }
        
    }