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
                    echo"<script>alert('Kövesse a linket, amelyet a $email email címre küldtünk.')</script>";
                    $timestamp = time();
                    $emailtargy = "Jelszo Visszaallitas";
                    $emailtorzs = "<div style='text-align:center'>
                                    <h1>Jelszó visszaálltás</h1>
                                    <h3>Kérjük <a href='http://ikt-project.rf.gd/webshop/jelszovaltoztat.php?generaltKod=$generaltJelszo&timestamp=$timestamp'>változtassa meg jelszavát!</a></h3>
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
                if($milyen){
                    if($regipword = $hasheltRegi){
                        $sql = "UPDATE loginform SET Pass = '$hasheltJelszo', helyreallitasi = '' WHERE Username = '$mibe'";
                        if(mysqli_query($csatlakozas, $sql)){
                            echo"<script>alert('Sikeres jelszóváltoztatás!');document.cookie='pword=$hasheltJelszo';document.location.href='http://ikt-project.rf.gd/webshop/webshop.php'</script>";
                        }
                    }
                }
                else{
                    $keresido=intval($_GET['timestamp']);
                    $jelenlegiido = time();
                    if($jelenlegiido - $keresido <= 3600){
                        $sql = "UPDATE loginform SET Pass = '$hasheltJelszo', helyreallitasi = '' WHERE Username = '$mibe'";
                        if(mysqli_query($csatlakozas, $sql)){
                            echo"<script>alert('Sikeres jelszóváltoztatás!');document.cookie='pword=$hasheltJelszo';document.location.href='http://ikt-project.rf.gd/webshop/webshop.php'</script>";
                        }
                    }
                    else{
                        echo"<script>alert('A jelszóváltoztatási kérelem már lejárt!');</script>";
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
    };
    class Fiok{
        function adatokLekerdez($uname){
            include('szervercsatlakozas.php');
            $sql = "SELECT * FROM accountAdatok WHERE username = '$uname'";
            $mennyi = $csatlakozas->query($sql);
            if ($mennyi->num_rows > 0){
                $sor = $mennyi->fetch_assoc();
                $email = $sor['email'];
                $nev = $sor['nev'];
                $telszam = $sor['telszam'];
                $orszag = $sor['orszag'];
                $megye = $sor['megye'];
                $varos = $sor['varos'];
                $irszam = $sor['iranyitoszam'];
                $cim = $sor['cim'];
                $megjegyzes = $sor['megjegyzes'];
                $kerEmailt = $sor['kerEmailt'];
                if($megjegyzes != '' and $megjegyzes != null){
                    return $lista = array(
                            "email" => $sor['email'],
                            "nev" => $sor['nev'],
                            "telszam" => $sor['telszam'],
                            "orszag" => $sor['orszag'],
                            "megye" => $sor['megye'],
                            "irszam" => $sor['varos'],
                            "cim" => $sor['cim'],
                            "kerEmailt" => $sor['kerEmailt'],
                            "vane" => true,
                            "megjegyzes" => $sor['megjegyzes'],
                    );
                }
                else{
                    return $lista = array(
                        "email" => $sor['email'],
                        "nev" => $sor['nev'],
                        "telszam" => $sor['telszam'],
                        "orszag" => $sor['orszag'],
                        "megye" => $sor['megye'],
                        "irszam" => $sor['varos'],
                        "cim" => $sor['cim'],
                        "kerEmailt" => $sor['kerEmailt'],
                        "vane" => true,
                        "megjegyzes" => "''",
                    );
                }
            }
            else{
                return $lista = array(
                    "email" => "''",
                    "nev" => "''",
                    "telszam" => "''",
                    "orszag" => "''",
                    "megye" => "''",
                    "varos" => "''", 
                    "irszam" => "''",
                    "cim" => "''",
                    "megjegyzes" => "''",
                    "kerEmailt" => "''",
                    "vane" => false,
                );
            }
        }
        function accountRendeles($uname,$kosar){
            include('szervercsatlakozas.php');
            $sql = "SELECT * FROM accountAdatok WHERE username = '$uname'";
            $mennyi = $csatlakozas->query($sql);
            if ($mennyi->num_rows > 0){
                $sor = $mennyi->fetch_assoc();
                $email = $sor['email'];
                $nev = $sor['nev'];
                $telszam = $sor['telszam'];
                $orszag = $sor['orszag'];
                $megye = $sor['megye'];
                $varos = $sor['varos'];
                $irszam = $sor['varos'];
                $cim = $sor['cim'];
                $megjegyzes = $sor['megjegyzes'];
                $kerEmailt = $sor['kerEmailt'];
                $kod = rand(0, 9999999);
                if($kerEmailt == 1){
                    $sql = "INSERT INTO rendelesek (username, email, nev, telszam, orszag, megye, varos, cim, megjegyzes, rendeltek, kod, kerEmailt, allapot) VALUES ('$uname','$email','$nev','$telszam','$orszag','$megye','$irszam','$cim','$megjegyz','$kosar','$kod', '1', 'Rendelés leadva')";
                }
                else{
                    $sql = "INSERT INTO rendelesek (username, email, nev, telszam, orszag, megye, varos, cim, megjegyzes, rendeltek, kod, kerEmailt, allapot) VALUES ('$uname','$email','$nev','$telszam','$orszag','$megye','$irszam','$cim','$megjegyz','$kosar','$kod', '0', 'Rendelés leadva')";
                };
                if(mysqli_query($csatlakozas,$sql)){
                    echo"<script>alert('Sikeres megrendelés!');</script>";
                    $emailtargy = $kod . ' szamu megrendeles';
                    $emailtorzs =  '<div style="text-align: center;">
                    <h1>Sikeres Megrendelés '. $nev . ' Számára!</h1<br>
                    <h2>A következő a rendelési azonosítója:' . $kod . '</h2><br>
                    <h3>Ön a következő(ket) rendelte:' . $rendeles . '</h3>
                    <h3>A rendelésének állapotának megtekintéséhez kérjük látogasson el a <a style="font-weight: bold;" href="http://ikt-project.rf.gd/webshop/allapot.php?kod=' . $kod . '">weboldalunkra!</a></h3>
                    <h4>Köszönettel: Custom Cases</h4>
                    </div>';
                    include('index.php');
                }
            }
        }
    }
?>