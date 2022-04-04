<?php
    require_once('osztalyok.php');
    if(isset($_POST['loglead'])){
        $uname = $_POST['Username_1'];
        $pword = $_POST['Password_1'];
        $login = new Loginform();
        if($login->loginEll($uname, $pword)){
            echo "<h1>Sikeres bejelentkezés mint $uname!</h1>";
            echo "<script>createCookie('$uname');</script>";
            // header("Location: webshop.php");
        }
        else{
            echo"<script>alert('Rosszak a bejelentkezési adatok!');</script>";
        }
    }
?>