<?php
    if (isset($_POST['addologomb']) && isset($_POST['mihezad']) && isset($_POST['mitad'])){
        $ad = $_POST['mihezad'];
        $mennyitad = intval($_POST['mitad']);
        // $mihezad = intval("SELECT RatingAll FROM webshopitemek WHERE neve = '$ad'");
        // $ossz = intval($mennyitad + $mihezad);
        $one = intval(1);
        $sql = "UPDATE webshopitemek SET RatingAll= RatingAll + $mennyitad WHERE neve = '$ad'";
        $sql2 = "UPDATE webshopitemek SET NumOfRatings= NumOfRatings + $one WHERE neve = '$ad'";
        $sql3 = "UPDATE webshopitemek SET Rating= RatingAll / NumOfRatings WHERE neve = '$ad'";
        if (mysqli_query($csatlakozas, $sql) && mysqli_query($csatlakozas, $sql2) && mysqli_query($csatlakozas, $sql3)){
            echo 'Sikeres addolás!';
        }
        else {
            echo 'Hiba az adatbázishoz való addoláskor!';
        }
    }