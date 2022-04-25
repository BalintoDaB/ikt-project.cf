<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bejelentkezés</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <link rel="icon" href="../logo1.svg" type="image/x-icon">
        <script>
            function createCookie(mit,mibol){
                document.cookie = mit + "=" + mibol;
            }
            function getCookie(mit){
                var cookieE = mit + "=";
                var ca = document.cookie.split(';');
                for(var i = 0; i < ca.length; i++){
                    var c = ca[i];
                    while (c.charAt(0)==' ') c = c.substring(1, c.length);
                    if (c.indexOf(cookieE) == 0){
                        return c.substring(cookieE.length,c.length);
                    }
                    else{
                        return null;
                    }
                }
            }
        </script>
</head>
<body>
    <header>
        <nav id="navbar_top" class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
            <object height="50px" data="../logo1.svg" type="image/svg+xml"></object>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="main_nav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="../index.php">Főoldal</a></li>
                        <li class="nav-item"><a class="nav-link" href="../rolunk.html">Rólunk</a></li>
                        <li class="nav-item"><a class="nav-link" href="allapot.php">Rendelés állapota</a></li>
                        <li class="nav-item"><a class="nav-link" href="webshop.php">Webshop</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container">
        <div class="row justify-content-center" style="margin-top:30vh">
            <div class="col-12 col-md-8">
                <div class="card text-center p-4" id="bejelentkezesbox">
                        <form method="post">
                            <div id="loginbox">
                                <h1>Bejelentkezés</h1>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="form-floating mb-3">
                                                <input required name="unamein" type="text" class="form-control" id="unameiin" placeholder="minta@gmail.com">
                                                <label for="uname">Felhasználónév<span class="text-danger">*</span></label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-floating mb-3">
                                                <input required name="pwordin" type="password" class="form-control" id="pwordin" placeholder="minta@gmail.com">
                                                <label for="pwordin">Jelszó<span class="text-danger">*</span></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center mt-4">
                                        <div class="col-12 col-md-4">
                                            <input type="submit" class="btn webshopgomb" value="Belépés" name="login">
                                        </div>
                                        <?php
                                            if(isset($_POST['login'])){
                                                require_once('osztalyok.php');
                                                $uname = $_POST['unamein'];
                                                $pword = $_POST['pwordin'];
                                                $pwordcookie = md5($pword);
                                                $login = new Loginform();
                                                if($login->loginEll($uname,$pword)){
                                                    echo "<script>createCookie('uname','$uname');createCookie('pword','$pwordcookie');document.location.href='webshop.php'</script>";
                                                }
                                                else if($login->eredmeny == "verifKell"){
                                                    echo "<script>alert('Kérjük, erősítse meg a profilját!')</script>";
                                                }
                                                else{
                                                    echo "<script>alert('Valami hibás!')</script>";
                                                }
                                            };
                                            ?>
                                    </div>
                                    <div class="row justify-content-center mt-2">
                                        <div class="col-12 col-md-8">
                                            <span>Nincs még profilja? <b onclick="loginToReg()" style="cursor:pointer">Regisztráljon!</b></span><br>
                                            <span>Elfelejtette jelszavát? <b onclick="loginToReset()" style="cursor:pointer">Kattintson ide!</b></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <form method="post">
                        <div id="regbox" class="d-none">
                            <h1>Regisztráció</h1>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-floating mb-3">
                                            <input required name="regunamein" type="text" class="form-control" id="refunameiin" placeholder="minta@gmail.com">
                                            <label for="regunamein">Felhasználónév<span class="text-danger">*</span></label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-floating mb-3">
                                            <input required name="regemailin" type="text" class="form-control" id="regemailin" placeholder="minta@gmail.com">
                                            <label for="regemailin">Email cím<span class="text-danger">*</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-floating mb-3">
                                            <input required name="regpwordin" type="password" class="form-control" id="regpwordin" placeholder="minta@gmail.com">
                                            <label for="regpwordin">Jelszó<span class="text-danger">*</span></label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-floating mb-3">
                                            <input required name="regpword2in" type="password" class="form-control" id="regpword2in" placeholder="minta@gmail.com">
                                            <label for="regpword2in">Jelszó mégegyszer<span class="text-danger">*</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center mt-3">
                                    <div class="col-12 col-md-6">
                                        <input type="submit" name="regel" class="btn webshopgomb" value="Regisztráció">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <input type="button" class="btn webshopgomb" value="Vissza" onclick="ugorj('login.php')">
                                    </div>
                                    <?php
                                        if(isset($_POST['regel'])){
                                            require_once('osztalyok.php');
                                            $username = $_POST['regunamein'];
                                            $password = $_POST['regpwordin'];
                                            $password2 = $_POST['regpword2in'];
                                            $email = $_POST['regemailin'];
                                            $reg = new Loginform();
                                            $eredmeny = $reg->regisztralas($username,$email,$password,$password2);
                                            if($eredmeny== "sikeres"){
                                                $emailtargy = "Koszonjuk regisztraciojat, $username!";
                                                $emailtorzs = "<div style='text-align:center'>
                                                                    <h1>Kedves $username, a Custom Cases üdvözli önt!</h1>
                                                                    <h3>Ahhoz hogy érvényes legyen a regisztrációja, kérjük kattintson <a href='http://ikt-project.rf.gd/webshop/verify.php?account=$username'>ide</a></h3>
                                                                    <h4>Üdvözlettel: <a href='http://ikt-project.rf.gd'>Custom Cases</a></h4>
                                                                </div>";
                                                include_once('index.php');
                                                header("Refresh:0");
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        </form>
                        <form method="post">
                            <div id="resetbox" class="d-none mt-3">
                                <h1>Jelszó helyreállítás</h1>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-md-12">
                                            <div class="form-floating mb-3">
                                                <input required name="resetemail" type="text" class="form-control" id="resetemail" placeholder="minta@gmail.com">
                                                <label for="resetemail">Email cím<span class="text-danger">*</span></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center mt-3">
                                        <div class="col-12 col-md-4">
                                            <input type="submit" class="btn webshopgomb" value="Email küldése" name="jelszoreset">
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <input type="button" class="btn webshopgomb" value="Vissza" onclick="window.location.reload()">
                                        </div>
                                        <?php
                                            if(isset($_POST['jelszoreset'])){
                                                include_once('osztalyok.php');
                                                $resetel = new Loginform();
                                                $email = $_POST['resetemail'];
                                                $resetel->jelszoReset($email);
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
<script>
    function change(mirol, mire){
        var changeTo = document.getElementById(mirol);
        var changeFrom = document.getElementById(mirol);
        changeTo.style.display = "block";
        changeFrom.style.display = "none";
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="script.js"></script>
</body>
</html>