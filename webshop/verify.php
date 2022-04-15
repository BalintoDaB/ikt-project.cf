<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
                                    require_once('osztalyok.php');
                                    include('szervercsatlakozas.php');
                                    $AlreadyVerificated = false;
                                        if($_COOKIE['uname'] != ''){
                                            echo "<script>alert('Kérjük, jelentkezzen ki ahhoz, hogy verifikálni tudjon egy másik fiókot');</script>";
                                        }
                                        else{
                                            $accnev=$_GET['accnev'];
                                            $sql = "UPDATE loginform SET IsVerified = true WHERE Username = '$accnev'";
                                            if(mysqli_query($csatlakozas, $sql)){
                                                echo "<script>alert('Sikeres Verifikáció!');</script>";
                                            }
                                            else{
                                                echo "<script>alert('Valami probléma történt');</script>";
                                            }
                                        }
                                    echo "<script>window.location.href = 'login.php';</script>";
                                ?>
</body>
</html>