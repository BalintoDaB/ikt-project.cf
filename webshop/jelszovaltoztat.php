<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="../logo1.svg" type="image/x-icon">
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
                        <li class="nav-item"><a class="nav-link" href="#">Rólunk</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Referenciáink</a></li>
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
                <div class="card text-center p-4">
                    <h1>Jelszó változtatás</h1>
                    <form method="post">
                        <div class="card-body">
                            <div class="row mt-4">
                                <?php
                                    include('szervercsatlakozas.php');
                                    require_once('osztalyok.php');
                                    if($_COOKIE['uname'] != ''){
                                        echo'
                                    <div class="col-12 col-md-6">
                                        <div class="form-floating mb-3">
                                            <input required name="regipword" type="password" class="form-control" id="regipword" placeholder="minta@gmail.com">
                                            <label for="regipword">Régi jelszó<span class="text-danger">*</span></label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-floating mb-3">
                                            <input required name="ujpword" type="password" class="form-control" id="ujpword" placeholder="minta@gmail.com">
                                            <label for="ujpword">Új jelszó<span class="text-danger">*</span></label>
                                        </div>
                                    </div>';
                                    }
                                    else{
                                        echo'
                                    <div class="col-12 col-md-12">
                                        <div class="form-floating mb-3">
                                            <input required name="ujpword" type="password" class="form-control" id="ujpword" placeholder="minta@gmail.com">
                                            <label for="ujpword">Új jelszó<span class="text-danger">*</span></label>
                                        </div>
                                    </div>';
                                    }
                                ?>
                            </div>
                            <div class="row justify-content-center mt-4">
                                <div class="col-12 col-md-4">
                                    <input type="submit" name="pwordvalt" value="Jelszó megváltoztatása" class="btn webshopgomb">
                                </div>
                                <?php
                                    require_once('osztalyok.php');
                                    include('szervercsatlakozas.php');
                                    if(isset($_POST['pwordvalt'])){
                                        if($_COOKIE['uname'] != ''){
                                            $username = $_COOKIE['uname'];
                                            $cookieTorles = true;
                                            $milyen = true;
                                        }
                                        else{
                                            $helyreallitasi=$_GET['generaltKod'];
                                            $milyen = false;
                                            $sql = "SELECT * FROM loginform WHERE helyreallitasi = '$helyreallitasi'";
                                            $mennyi = $csatlakozas->query($sql);
                                            if ($mennyi->num_rows > 0){
                                                $sor = $mennyi->fetch_assoc();
                                                $username = $sor['Username'];
                                            }
                                        }
                                        if(isset($_POST['regipword'])){
                                            $regijelszo = $_POST['regipword'];
                                        }
                                        else{
                                            $regijelszo='';
                                        }
                                        $ujjelszo = $_POST['ujpword'];
                                        $valt = new Loginform();
                                        $valt->jelszoValtoztat($username,$regijelszo,$ujjelszo,$milyen);
                                        // if($cookieTorles){
                                        //     echo"<script>document.cookie='uname=';</script>";
                                        // }
                                    }
                                ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="script.js"></script>
</body>
</html>