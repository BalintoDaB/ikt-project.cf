<?php
    if (isset($_POST['termek']) && isset($_POST['ar'])){
        $termek = $_POST['termek'];
        $ar = $_POST['ar'];
        echo 'Ár:' . '&nbsp' . $ar . 'Ft' .'&nbsp' . 'Termék:' . '&nbsp' . $termek . '</br>';
        $sql = "INSERT INTO webshopitemek (neve, ara) VALUES ('$termek','$ar')";
        if (mysqli_query($csatlakozas, $sql)){
            echo 'Sikeres hozzáadás!';
        }
        else {
            echo 'Hiba az adatbázisba való beillesztésnél!';
        }
    }