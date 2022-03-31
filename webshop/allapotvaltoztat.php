<?php
    if(isset($_POST['lead'])){
        $ujallapot = $_POST['mive'];
        $kod = $_POST['micsoda'];
        $sql = "UPDATE rendelesek SET allapot = '$ujallapot' WHERE kod = '$kod'";
        if (mysqli_query($csatlakozas, $sql)){
            echo '<script>alert("Sikeres Változtatás!")</script>';
            $sql = "SELECT * FROM rendelesek WHERE kod = '$kod'";
            $sorok = $csatlakozas->query($sql);
            while($sor = $sorok->fetch_assoc()){
                if($sor['kerEmailt'] == '1'){
                    $emailtargy = $kod . ' számú rendelés állapotváltozása!';
                    $emailtorzs = '<div style="text-align: center"><h1>Kedves ' . $sor['nev'] .'!</h1>
                                    <h2>Az ön <b>' . $kod .'</b> számú rendelésének az állapota a következőre változott: <b>' . $ujallapot . '</b></h2>
                                    <h3>További információkért látogasson el <a href="http://ikt-project.rf.gd/webshop/allapot.php?kod=' . $kod . '">weboldalunkra!</a></h3>
                                    <h4>További jó napot kíván önnek a <b>Custom Cases!</b></h4>
                                    </div>';
                    include('index.php');
                }
            }
        }
        else {
            echo 'Hiba az adatbázisba való beillesztésnél!';
        }
    }