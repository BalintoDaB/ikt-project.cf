<?php
    if (isset($_POST['termek']) && isset($_POST['ar'])){
        $termek = $_POST['termek'];
        $ar = $_POST['ar'];
        $kep = $_POST['kep'];
        echo 'Ár:' . '&nbsp' . $ar . 'Ft' .'&nbsp' . 'Termék:' . '&nbsp' . $termek . '&nbsp' . 'Kép:' . $kep . '</br>';
        $sql = "INSERT INTO webshopitemek (neve, ara, kepnev) VALUES ('$termek','$ar','$kep')";
        if (mysqli_query($csatlakozas, $sql)){
            echo 'Sikeres hozzáadás!';
        }
        else {
            echo 'Hiba az adatbázisba való beillesztésnél!';
        }
    }