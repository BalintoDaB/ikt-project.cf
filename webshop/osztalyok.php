<?php
    class Loginform{
        public $eredmeny;
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
        function regisztralas($uname,$regemail,$pword){
            include('szervercsatlakozas.php');
            $sql = "SELECT * FROM loginform WHERE Username='$uname' OR Email='$regemail'";
            $duplicate=mysqli_query($csatlakozas,$sql);
            if (mysqli_num_rows($duplicate)>0)
            {
                echo 'User name or Email id already exists.';
                $eredmeny = "marvanilyen";
            }
            else{
                try {
                    $sql = "INSERT INTO loginform (Username, Email, Pass) VALUES ('$uname','$regemail','$pword')";
                    mysqli_query($csatlakozas, $sql);
                    echo 'Registered';
                    $eredmeny = "sikeres";
                }
                catch(PDOException $e)
                    {
                        echo $sql . "
                        " . $e->getMessage();
                        $eredmeny = "hiba";
                    }
            }
        }
    };
?>