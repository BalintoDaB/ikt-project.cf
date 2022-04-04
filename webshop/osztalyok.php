<?php
    class Loginform{
        public $eredmeny = '';
        function loginEll($uname, $pword){
            include('szervercsatlakozas.php');
            $sql = "SELECT * FROM loginform WHERE Username = '$uname' AND Pass = '$pword'";
            $mennyi = $csatlakozas->query($sql);
            if ($mennyi->num_rows > 0){
                return True;
            }
            else{
                return False;
            }
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
                        $sql = "INSERT INTO loginform (Username, Email, Pass) VALUES ('$uname','$regemail','$pword')";
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
    };
?>