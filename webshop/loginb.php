<?php
    require_once('osztalyok.php');
    if(isset($_POST['loglead'])){
        $uname = $_POST['Username_1'];
        $pword = $_POST['Password_1'];
        $login = new Loginform();
        if($login->loginEll($uname, $pword)){
            echo "Sikeres, $uname, $pword";
        }
        else{
            echo"Rossz, $uname, $pword";
        }
    }
?>