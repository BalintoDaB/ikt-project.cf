<?php
    if (isset($_POST['torlogomb']) && isset($_POST['mittorol'])){
        $torles = $_POST['mittorol'];
        $sql = "DELETE FROM webshopitemek WHERE neve = '$torles'";
        if (mysqli_query($csatlakozas, $sql)){
            echo 'Sikeres törlés!';
        }
        else {
            echo 'Hiba az adatbázisból való törlésnél!';
        }
    }
    else if(isset($_POST['mindenttorol'])){
        $sql = "DELETE FROM webshopitemek";
        if (mysqli_query($csatlakozas, $sql)){
            echo 'Sikeresen minden törölve!';
        }
    }