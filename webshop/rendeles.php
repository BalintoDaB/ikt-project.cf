<?php
    if (isset($_POST['email']) && isset($_POST['name']) && isset($_POST['telszam']) && isset($_POST['orszag']) && isset($_POST['megye']) && isset($_POST['iranyitoszam']) && isset($_POST['cim']) && isset($_POST['kosar'])){
        $email = $_POST['email'];
        $nev = $_POST['name'];
        $telszam = $_POST['telszam'];
        $orszag = $_POST['orszag'];
        $megye = $_POST['megye'];
        $irszam = $_POST['iranyitoszam'];
        $cim = $_POST['cim'];
        $megjegyz = $_POST['megjegyzes'];
        $rendeles = $_POST['kosar'];
        $ertesites = $_POST['emailkergomb'];
        $kod = rand(0, 9999999);
        if(isset($ertesites)){
            $sql = "INSERT INTO rendelesek (email, nev, telszam, orszag, megye, varos, cim, megjegyzes, rendeltek, kod, kerEmailt, allapot) VALUES ('$email','$nev','$telszam','$orszag','$megye','$irszam','$cim','$megjegyz','$rendeles','$kod', '1', 'Rendelés leadva')";
        }
        else{
            $sql = "INSERT INTO rendelesek (email, nev, telszam, orszag, megye, varos, cim, megjegyzes, rendeltek, kod, kerEmailt, allapot) VALUES ('$email','$nev','$telszam','$orszag','$megye','$irszam','$cim','$megjegyz','$rendeles','$kod', '0', 'Rendelés leadva')";
        }
        if(mysqli_query($csatlakozas, $sql)){
            echo "<script>alert('Sikeres megrendelés!');</script>";
            echo "<h1>Sikeres Megrendelés!</h1>";
            echo "<h2>A következő a megrendelési kódod: $kod</h2></br>";
            echo "<input type='button' class='my-4 btn webshopgomb' onclick='ugorj(" . '"' . "allapot.php?kod=$kod" . '"' . ")' value='Rendelés állapotának megtekintése'>";
            $emailtargy = $kod . ' számú megrendelés';
            $emailtorzs =  '<div style="text-align: center;">
            <h1>Sikeres Megrendelés '. $nev . ' Számára!</h1<br>
            <h2>A következő a rendelési azonosítója:' . $kod . '</h2><br>
            <h3>Ön a következő(ket) rendelte:' . $rendeles . '</h3>
            <h3>A rendelésének állapotának megtekintéséhez kérjük látogasson el a <a style="font-weight: bold;" href="http://ikt-project.rf.gd/webshop/allapot.php?kod=' . $kod . '">weboldalunkra!</a></h3>
            <h4>Köszönettel: Custom Cases</h4>
            </div>';
            include('index.php');
        }
        
    }