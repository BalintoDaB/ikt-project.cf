<?php
    require_once('osztalyok.php');
    if(isset($_POST['loglead'])){
        $uname = $_POST['Username_1'];
        $pword = $_POST['Password_1'];
        $login = new Loginform();
        if($login->loginEll($uname, $pword)){
            echo "Sikeres, $uname, $pword";
            echo "<script>createCookie('$uname');</script>";
        }
        else{
            echo"Rossz, $uname, $pword";
        }
    }
?>