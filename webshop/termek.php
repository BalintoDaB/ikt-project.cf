<!DOCTYPE html>
<html lang="hu">
    <head>
        <link rel="icon" href="../logo1.svg" type="image/x-icon">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php
        include('szervercsatlakozas.php');
        $termek = $_GET['termek'];
        $sql = "SELECT * FROM webshopitemek WHERE neve = '$termek'";
        $mennyi = $csatlakozas->query($sql);
        if ($mennyi->num_rows > 0){
            $sor = $mennyi->fetch_assoc();
            $termeknev = $sor['neve'];
            $termekkep = $sor['kepnev'];
            $termekar = $sor['ara'];
            $eredetiertekeles = $sor['Rating'];
            if($eredetiertekeles == ''){
                $eredetiertekeles = 'N.A.';
            }
            else{
                $ertekeles = substr($eredetiertekeles, 0, 4);
            }
        }
        echo "<title>$termeknev</title>";
    ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
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
                        <li class="nav-item"><a class="nav-link" href="webshop.php">Webshop</a></li>
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
    <div class="container termekcont shadow-lg p-4">
    <h1 class="text-center mb-4"><?php echo"$termeknev";?></h1>
    <div class="row mb-4">
        <div class="col-12 col-md-6 rounded">
            <img class="mx-auto d-block w-25" src="../img/<?php echo$termekkep; ?>">
        </div>
        <div class="col-12 col-md-6 p-4 text-center">
            <h2 class="mb-4">Termék ára: <?php echo"$termekar";?> Ft</h2>
            <h2>Értékelés: 5/<?php echo"$ertekeles";?></h2>
            <input type="button" class="webshopgomb btn mt-4" onclick="ugorj('webshop.php?eredetitermek=<?php echo$termeknev;?>&eredetiar=<?php echo$termekar?>')" value="Kosárba tétel">
        </div>
    </div>
    <hr>
    <div class="row mt-4">
        <div class="col-12 col-md-6 text-center">
            <h3>Termék értékelése</h3>
            <form method="post">
                <div class="row justify-content-center">
                    <div class="col-12 mt-4 col-md-6 d-flex justify-content-center">
                    <div class="rate">
                            <input type="radio" id="star5" name="rate5" value="5" />
                            <label for="star5" title="text">5 stars</label>
                            <input type="radio" id="star4" name="rate4" value="4" />
                            <label for="star4" title="text">4 stars</label>
                            <input type="radio" id="star3" name="rate3" value="3" />
                            <label for="star3" title="text">3 stars</label>
                            <input type="radio" id="star2" name="rate2" value="2" />
                            <label for="star2" title="text">2 stars</label>
                            <input type="radio" id="star1" name="rate1" value="1" />
                            <label for="star1" title="text">1 star</label>
                            <?php
                                if(isset($_POST['ratinglead'])){                            
                                    include_once('osztalyok.php');
                                    include('szervercsatlakozas.php');
                                    $counter = 0;
                                    while(true){
                                        $counter++;
                                        $userrate = $_POST['rate' . $counter];
                                        if(isset($userrate)){
                                            break;
                                        }
                                    };
                                    $ratel = new Rating();
                                    if($ratel->rateAdd($termeknev,intval($userrate))){
                                        echo"<script>alert('Sikeres értékelés, kérjük frissítse a weboldalt!');</script>";
                                    };
                                }
                            ?>
                    </div>
                </div>
                    <div class="col-12 mt-4 col-md-6">
                        <input type="submit" class="btn webshopgomb" value="Értékelés" name="ratinglead">
                    </div>
                </div>
            </form>
        </div>
        <div class="col-12 col-md-6 text-center">
            <h3>Comment írás</h3>
            <?php 
                require_once('osztalyok.php');
                include('szervercsatlakozas.php');
                $loginell = new Loginform();
                if($loginell->loginMegnez()){
                    echo'            <form method="post">
                    <div class="row mt-4">
                        <div class="col-12 col-md-12">
                            <div class="form-floating mb-3">
                                <input type="text" name="commentheaderin" class="form-control" id="commentheaderin" placeholder="Molnár Bálint">
                                <label for="nevin">Komment fejléc</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="mb-3">
                                <textarea class="form-control" name="commentin" placeholder="Komment" id="commenttextarea"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-4">
                            <input type="submit" class="btn webshopgomb" value="Közzététel" name="commentlead">
                        </div>
                    </div>
                </form>';
                }
                else{
                    echo"<form method='post'>
                            <div class='row mt-4 justify-content-center'>
                                <div class='col-12 col-md-4'>
                                <input class='btn webshopgomb' type='button' value='Kérem jelentkezzen be!' onclick='ugorj(" . '"login.php"' . ")'>
                                </div>
                            </div>
                        </form>
                        ";
                }
            ?><?php 
                if(isset($_POST['commentlead'])){
                    require_once('osztalyok.php');
                    $fiok = new Fiok();
                    $commentheader = $_POST['commentheaderin'];
                    $comment = $_POST['commentin'];
                    $eredmeny = $fiok->kommenteles($uname,$termek,$commentheader,$comment);
                    echo $eredmeny;
                }
            ?>
        </div>
    </div>
    <hr class="my-4">
    <?php 
        require_once('osztalyok.php');
        include('szervercsatlakozas.php');
        $fiok = new Fiok();
        $fiok->kommentKiir($termek);
    ?>
    </div>
    <script>
        if(window.history.replaceState) 
        {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</body>
</html>