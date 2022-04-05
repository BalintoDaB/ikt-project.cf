<?php
    class Loginform{
        public $eredmeny = '';
        function loginEll($uname, $pword){
            include('szervercsatlakozas.php');
            $hasheltJelszo = md5($pword);
            $sql = "SELECT * FROM loginform WHERE Username = '$uname' AND Pass = '$hasheltJelszo'";
            $mennyi = $csatlakozas->query($sql);
            if ($mennyi->num_rows > 0){
                return True;
            }
            else{
                return False;
            }
        }
        function getRandomString($n) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randomString = '';
          
            for ($i = 0; $i < $n; $i++) {
                $index = rand(0, strlen($characters) - 1);
                $randomString .= $characters[$index];
            }
            return $randomString;
        }
        function regisztralas($uname,$regemail,$pword,$pword2){
            if($pword == $pword2){
                include('szervercsatlakozas.php');
                $sql = "SELECT * FROM loginform WHERE Username='$uname' OR Email='$regemail'";
                $duplicate=mysqli_query($csatlakozas,$sql);
                if (mysqli_num_rows($duplicate)>0)
                {
                    echo '<script>alert("Ezzel a névvel vagy emaillel regisztráltak már!")</script>';
                    return "mar van ilyen";
                }
                else{
                    try {
                        $hasheltJelszo = md5($pword);
                        $sql = "INSERT INTO loginform (Username, Email, Pass) VALUES ('$uname','$regemail','$hasheltJelszo')";
                        mysqli_query($csatlakozas, $sql);
                        echo '<script>alert("Sikeres regisztráció, ' . $uname . '!")</script>';
                        return "sikeres";
                    }
                    catch(PDOException $e)
                        {
                            echo $sql . "
                            " . $e->getMessage();
                            return "hiba";
                        }
                }
            }
            else{
                echo"<script>alert('A 2 jelszó nem egyezik!');</script>";
            }
        }
        function jelszoReset($miaktivalja,$hova){
            if(isset($miaktivalja)){
                include('szervercsatlakozas.php');
                $generaltJelszo = $getRandomString(10);
                $sql = "UPDATE loginform SET Pass VALUE '$generaltJelszo' WHERE Email = '$hova'";
                $mennyi = $csatlakozas->query($sql);
                if ($mennyi->num_rows > 0){
                    echo"<script>alert($hova,$generaltJelszo)</script>";
                }
            }
        }
    };
    class Rating{
        function rateAdd($ad, $mennyitad){
            include('szervercsatlakozas.php');
            $egy = intval(1);
            $sql = "UPDATE webshopitemek SET RatingAll= RatingAll + $mennyitad WHERE neve = '$ad'";
            $sql2 = "UPDATE webshopitemek SET NumOfRatings= NumOfRatings + $egy WHERE neve = '$ad'";
            $sql3 = "UPDATE webshopitemek SET Rating= RatingAll / NumOfRatings WHERE neve = '$ad'";
            if (mysqli_query($csatlakozas, $sql) && mysqli_query($csatlakozas, $sql2) && mysqli_query($csatlakozas, $sql3)){
                return true;
            }
            else{
                return false;
            }

        }
    }
?>