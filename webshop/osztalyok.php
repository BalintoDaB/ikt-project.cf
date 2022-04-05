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
        function jelszoReset($email){
            include('szervercsatlakozas.php');
            $generaltJelszo = md5($this->getRandomString(10));
            $sql = "SELECT * FROM loginform WHERE email = '$email'";
            $mennyi = $csatlakozas->query($sql);
            if ($mennyi->num_rows > 0){
                $sql = "UPDATE loginform SET helyreallitasi = '$generaltJelszo' WHERE Email = '$email'";
                if (mysqli_query($csatlakozas, $sql)){
                    echo"<script>alert('A(z) $email email címhez tartozó profil új jelszavát elküldtük Ön számára emailben!')</script>";
                    $emailtargy = "Jelszo Visszaallitas";
                    $emailtorzs = "<div style='text-align:center'>
                                    <h1>Jelszó visszaálltás</h1>
                                    <h3>Kérjük <a href='http://ikt-project.rf.gd/webshop/jelszovaltoztat.php?generaltKod=$generaltJelszo'>változtassa meg jelszavát!</a></h3>
                                    <h4>Üdvözlettel: Custom Cases</h4>
                                    </div>";
                    include('index.php');
                }
            }
            else{
                echo"<script>alert('Nem létezik ilyen email címmel regisztráció!');</script>";
            }
        }
        function jelszoValtoztat($mibe,$regi,$uj,$milyen){
            include('szervercsatlakozas.php');
            $hasheltRegi = md5($regi);
            $hasheltJelszo = md5($uj);
            $sql = "SELECT * FROM loginform WHERE Username = '$mibe'";
            $mennyi = $csatlakozas->query($sql);
            if ($mennyi->num_rows > 0){
                $sor = $mennyi->fetch_assoc();
                $regipword = $sor['Pass'];
                $helyreallitasi = $sor['helyreallitasi'];
                if($milyen){
                    if($regipword = $hasheltRegi){
                        $sql = "UPDATE loginform SET Pass = '$hasheltJelszo', helyreallitasi = '' WHERE Username = '$mibe'";
                        if(mysqli_query($csatlakozas, $sql)){
                            echo"<script>alert('Sikeres jelszóváltoztatás!');document.location.href='http://ikt-project.rf.gd/webshop/webshop.php'</script>";
                        }
                    }
                }
                else{
                    $sql = "UPDATE loginform SET Pass = '$hasheltJelszo', helyreallitasi = '' WHERE Username = '$mibe'";
                    if(mysqli_query($csatlakozas, $sql)){
                        echo"<script>alert('Sikeres jelszóváltoztatás!');document.location.href='http://ikt-project.rf.gd/webshop/webshop.php'</script>";
                    }
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