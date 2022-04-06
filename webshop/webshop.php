<!DOCTYPE html>
<html lang="hu">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
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
                        <li class="nav-item"><a class="nav-link" href="../index.php">Főoldal</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Rólunk</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Referenciáink</a></li>
                        <li class="nav-item"><a class="nav-link" href="allapot.php">Rendelés állapota</a></li>
                        <li class="nav-item"><?php
                            if(isset($_COOKIE['uname']) && $_COOKIE['uname'] != ''){
                                $uname = $_COOKIE['uname'];
                                echo '
                                  <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                      Üdvözlet, ' . $uname . '
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                    <li><a class="dropdown-item" href="jelszovaltoztat.php">Jelszó változtatás</a></li>
                                    <li><a class="dropdown-item" href="adatok.php">Adatok</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="kijelentkezes()">Kijelentkezés</a></li>
                                    </ul>
                                  </li>';
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
                <?php
                    if(isset($_GET['eredetitermek']) && isset($_GET['eredetiar'])){
                        $termek = $_GET['eredetitermek'];
                        $termekbe = '"' . $termek . '"';
                        $ar = $_GET['eredetiar'];
                        echo "<script>kosarbatetel($termekbe, $ar);</script>";
                    }
                ?>
            </tbody>
        </table>
        <hr class="my-4">
        <div class="text-center">
            <h1 class="mb-4">
                Szállítási és fizetési adatok
            </h1>
            <form method="post">
                <input required type="hidden" name="kosar" id="kosarform">
                <div class="row mb-4">
                    <div class="col-12 col-md-4">
                        <div class="form-floating mb-3">
                            <input required autocomplete="email" name="email" type="email" class="form-control" id="emailin" placeholder="minta@gmail.com">
                            <label for="emailin">Email Cím<span class="text-danger">*</span></label>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-floating mb-3">
                            <input required autocomplete="name" name="name" type="text" class="form-control" id="nevin" placeholder="Molnár Bálint">
                            <label for="nevin">Név<span class="text-danger">*</span></label>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-floating mb-3">
                            <input required autocomplete="tel" name="telszam" type="text" class="form-control" id="telin" placeholder="+36201234567">
                            <label for="telin">Telefonszám<span class="text-danger">*</span></label>
                        </div>
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col-12 col-md-4">
                        <div class="form-floating mb-3">
                            <input required autocomplete="country-name" name="orszag" type="text" class="form-control" id="orszagin" placeholder="Magyarország">
                            <label for="orszagin">Ország<span class="text-danger">*</span></label>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-floating mb-3">
                            <input required type="text" class="form-control" name="megye" id="megyein" placeholder="Győr-Moson-Sopron megye">
                            <label for="megyein">Megye/Állam<span class="text-danger">*</span></label>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-floating mb-3">
                            <input required autocomplete="postal-code" name="iranyitoszam" type="text" class="form-control" id="iranyin" placeholder="9200">
                            <label for="iranyin">Irányítószám<span class="text-danger">*</span></label>
                        </div>
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col-12 col-md-12">
                        <div class="form-floating mb-3">
                            <input required autocomplete="address-line1" name="cim" type="text" class="form-control" id="cimin" placeholder="Mosonmagyaróvár, Fő utca 1.">
                            <label for="cimin">Cím<span class="text-danger">*</span></label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-8">
                        <div class="form-floating mb-3 w-100">
                            <input name="megjegyzes" type="text" class="form-control" id="megjegyzen" placeholder="Megjegyzés">
                            <label for="megjegyzen">Megjegyzés</label>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 d-flex align-items-center">
                        <div class="form-check mx-auto">
                            <input class="form-check-input" type="checkbox" name="emailkergomb" id="emailkergomb">
                            <label class="form-check-label" for="emailkergomb" style="color:white">Szeretnék e-mailt kapni ha változik a rendelésem állapota</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 p-4">
                        <input required class="btn webshopgomb" type="reset" value="Adatok törlése">
                    </div>
                    <div class="col-12 col-md-6 p-4">
                        <input required class="btn webshopgomb" name="submit" type="submit" value="Vásárlás">
                    </div>
                </div>
            </form>
            <hr>
            <div class="row">
                <div class="col-12 col-md-12 text-center" id="rendeles">
                    <?php
                    include('szervercsatlakozas.php');
                    include('rendeles.php');
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script>
        if(window.history.replaceState) 
        {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>