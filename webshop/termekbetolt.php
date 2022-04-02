<?php
    $termek = $_GET['termek'];
    $sql = "SELECT * FROM webshopitemek WHERE neve = '$termek'";
    $mennyi = $csatlakozas->query($sql);
    if ($mennyi->num_rows > 0){
        $sor = $mennyi->fetch_assoc();
        $termeknev = $sor['neve'];
        $termekkep = $sor['kepnev']
        echo ""