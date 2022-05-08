<!DOCTYPE html>
<html lang="hu">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Custom Cases Webshop</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src='script.js'></script>
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
                        <li class="nav-item"><a class="nav-link" href="../index.html">Főoldal</a></li>
                        <li class="nav-item"><a class="nav-link" href="../rolunk.html">Rólunk</a></li>
                        <li class="nav-item"><?php
                            if(isset($_COOKIE['uname']) && $_COOKIE['uname'] != '' && isset($_COOKIE['pword']) && $_COOKIE['pword'] != ''){
                                include('szervercsatlakozas.php');
                                $uname = $_COOKIE['uname'];
                                $pword = $_COOKIE['pword'];
                                $sql = "SELECT * FROM loginform WHERE username = '$uname'";
                                $mennyi = $csatlakozas->query($sql);
                                if ($mennyi->num_rows > 0){
                                    $sor = $mennyi->fetch_assoc();
                                    $auname = $sor['Username'];
                                    $apword = $sor['Pass'];
                                    if ($auname == $uname && $apword == $pword){
                                        echo '
                                          <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                              Üdvözlet, ' . $uname . '
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                            <li><a class="dropdown-item" href="jelszovaltoztat.php">Jelszó változtatás</a></li>
                                            <li><a class="dropdown-item" href="adatok.php">Adatok</a></li>
                                            <li><a class="dropdown-item" href="megrendeleseim.php">Megrendeléseim</a></li>
                                            <li><a class="dropdown-item" style="cursor:pointer;" onclick="kijelentkezes()">Kijelentkezés</a></li>
                                            </ul>
                                          </li>';
                                    }
                                }
                            }
                            else{
                                echo'<a href="login.php" class="nav-link">Bejelentkezés</a>';
                            }
                        ?></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container">    
        <div class="row justify-content-start">
        <?php
        include('szervercsatlakozas.php');
        include('webshopbetolt.php');
        ?>
        </div>
        <hr>
        <table id='kosartable' class="table table-striped table-hover shadow-lg table-dark text-center">
            <thead>
                <tr>
                    <th>
                        Termék neve
                    </th>
                    <th>
                        Darabszám
                    </th>
                    <th>
                        Ár
                    </th>
                    <th>
                        Törlés
                    </th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <div class="row">
            <div class="col-12 col-md-6 p-3">
                <h3>
                    A következő a végösszeg:
                    <span id="vegosszeg">
                        0
                        </span>
                </h3>
            </div>
            <div class="col-12 col-md-6 p-3">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="kuponin" id="kuponin" placeholder="asd">
                            <label for="kuponin">Kuponkód</label>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 text-center">
                        <input type="button" class="btn webshopgomb" value="Érvényesítés" onclick="kuponCheck()">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-12 text-center">
                        <h2 id="kuponout">
                            Nincs ilyen kuponkód!
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <hr class="my-4">
        <div class="text-center">
            <h1 class="mb-4">
                Megrendelés
            </h1>
            <form method="post">
            <input required type="hidden" name="kosar" id="kosarform">
            <input required type="hidden" name="ar" id="ar">
            <div class="row justify-content-center"> 
                    <?php
                        if(isset($_COOKIE['uname']) and $_COOKIE['uname'] != '' and isset($_COOKIE['pword']) and $_COOKIE['pword'] != ''){
                            if($auname == $uname && $apword == $pword){
                                echo '<div class="col-12 col-md-6">
                                <input type="submit" name="rendelesleadas" class="btn mt-3 webshopgomb" value="Megrendelés mint ' . $uname . '">
                                </div><div class="col-12 col-md-6"><input type="button" class="btn mt-3 webshopgomb" value="Felhasználóváltás" onclick="kijelentkezes();ugorj(' . "'login.php'" . ');"></div>';
                            }
                        }
                        else{
                            echo"<div class='col-12 col-md-6'><input class='btn webshopgomb' type='button' value='Kérem jelentkezzen be!' onclick='ugorj(" . '"login.php"' . ")'></div>";
                        }
                    ?>
            </div>
            </form>
            <hr>
            <div class="row">
                <div class="col-12 col-md-12 text-center" id="rendeles">
                    <?php
                    if(isset($_POST['rendelesleadas']) and isset($_POST['kosar']) and isset($_POST['ar'])){
                        require_once('osztalyok.php');
                        $kosar = $_POST['kosar'];
                        $rendel = new Fiok();
                        $rendel->accountRendeles($uname,$kosar);
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php
        if(isset($_GET['eredetitermek']) && isset($_GET['eredetiar'])){
            $termek = $_GET['eredetitermek'];
            $termekbe = '"' . $termek . '"';
            $ar = $_GET['eredetiar'];
            echo "<script>kosarbatetel($termekbe, $ar);</script>";
        }
    ?>
    <script src="title-scroll.js" data-start="5000" data-speed="250"></script>
    <script>
        if(window.history.replaceState) 
        {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>