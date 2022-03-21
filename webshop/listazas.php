<?php
    $szam = 0;
    if (isset($_POST['listagomb'])){
        $sql = "SELECT * FROM webshopitemek";
        $mennyi = $csatlakozas->query($sql);
        if ($mennyi->num_rows > 0){
            while($sor = $mennyi->fetch_assoc()) {
                echo "<tr><td>" . $sor['neve'] . "</td><td>" . $sor['ara'] . "</td></tr>";
            };
        }
    };