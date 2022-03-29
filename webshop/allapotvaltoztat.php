<?php
    if(isset($_POST['lead'])){
        $ujallapot = $_POST['mive'];
        $kod = $_POST['micsoda'];
        $sql = "UPDATE rendelesek SET allapot = '$ujallapot' WHERE kod = '$kod'";
        if (mysqli_query($csatlakozas, $sql)){
            echo '<script>alert("Sikeres Változtatás!")</script>';
        }
        else {
            echo 'Hiba az adatbázisba való beillesztésnél!';
        }
    }