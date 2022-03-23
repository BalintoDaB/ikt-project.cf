 <?php
    $szervernev = "sql201.byetcluster.com";
    $felhasznalonev = "epiz_31348482";
    $jelszo = "ITrcq8cg3L3";
    $adatbazisnev = "epiz_31340715_webshop";

    // $szervernev = "localhost";
    // $felhasznalonev = "root";
    // $jelszo = "";
    // $adatbazisnev = "webshop";
    $csatlakozas = new mysqli($szervernev, $felhasznalonev, $jelszo, $adatbazisnev);

    if ($csatlakozas->connect_error) {
        die("Nem sikerült csatlakozni: " . $csatlakozas->connect_error);
    }
    // else {
    //     echo '<script>alert("Csatlakozva az adatbázishoz")</script>';
    // }
