<?php
    require_once('osztalyok.php');
    if (isset($_POST['leadas2']) && isset($_POST['Username_2']) && isset($_POST['Password_2']) && isset($_POST['Email'])){
        $username = $_POST['Username_2'];
        $password = $_POST['Password_2'];
        $email = $_POST['Email'];
        $reg = new Loginform();
        $reg->regisztralas($username,$email,$password);
    }
?>