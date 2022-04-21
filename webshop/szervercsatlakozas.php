 <?php
    $szervernev = "sql201.epizy.com";
    $felhasznalonev = "epiz_31348482";
    $jelszo = "ITrcq8cg3L3";
    $adatbazisnev = "epiz_31348482_webshop";

    // $szervernev = "sql11.freemysqlhosting.net";
    // $felhasznalonev = "sql11486028";
    // $jelszo = "4ebFQKEZ9c";
    // $adatbazisnev = "sql11486028";

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
