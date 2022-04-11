<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="../logo1.svg" type="image/x-icon">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Megrendeléseim</title>
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
                    <li class="nav-item"><a class="nav-link" href="#">Rólunk</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Referenciáink</a></li>
                    <li class="nav-item"><a class="nav-link" href="webshop.php">Webshop</a></li>
                    <li class="nav-item"><?php
                        require_once('osztalyok.php');
                        $loginell = new Loginform();
                        if($loginell->loginMegnez()){
                            $uname = $_COOKIE['uname'];
                            $pword = $_COOKIE['pword'];
                            echo '
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Üdvözlet, ' . $uname . '
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                            <li><a class="dropdown-item" href="jelszovaltoztat.php">Jelszó változtatás</a></li>
                            <li><a class="dropdown-item" href="adatok.php">Adatok</a></li>
                            <li><a class="dropdown-item active" href="megrendeleseim.php">Megrendeléseim</a></li>
                            <li><a class="dropdown-item" style="cursot:pointer;" onclick="kijelentkezes()">Kijelentkezés</a></li>
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
<div class="container text-center">
    <h1 class="my-4"><?php echo"$uname Megrendelései"?></h1>
    <h2 class="mb-4">Folyamatban lévő megrendeléseim:</h2>
    <div class="table-responsive">
        <table class="table table-dark table-hover table-striped">
            <thead>
                <tr>
                    <th>Cím</th>
                    <th>Rendelés</th>
                    <th>Megjegyzés</th>
                    <th>Állapot</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if($loginell->loginMegnez()){
                    include('szervercsatlakozas.php');
                    $sql = "SELECT * FROM rendelesek WHERE username = '$uname' AND allapot <> 'Rendelés lezárva'";
                    $mennyi = $csatlakozas->query($sql);
                    if ($mennyi->num_rows > 0){
                        while($sor = $mennyi->fetch_assoc()) {
                            $email = $sor['cim'];
                            $rendeles = $sor['rendeltek'];
                            $megjegyzes = $sor['$megjegyzes'];
                            $allapot = $sor['allapot'];
                            echo "<tr><td>$email</td><td>$rendeles</td><td>$megjegyzes</td><td><b>$allapot</b></td></tr>";
                        };
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
        <hr class="my-4">
        <h2 class="mb-4">Lezárult rendeléseim</h2>
        <div class="table-responsive">
            <table class="table table-dark table-hover table-striped">
                <thead>
                    <tr>
                        <th>Cím</th>
                        <th>Rendelés</th>
                        <th>Megjegyzés</th>
                        <th>Állapot</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                if($loginell->loginMegnez()){
                    include('szervercsatlakozas.php');
                    $sql = "SELECT * FROM rendelesek WHERE username = '$uname' AND allapot = 'Rendelés lezárva'";
                    $mennyi = $csatlakozas->query($sql);
                    if ($mennyi->num_rows > 0){
                        while($sor = $mennyi->fetch_assoc()) {
                            $email = $sor['cim'];
                            $rendeles = $sor['rendeltek'];
                            $megjegyzes = $sor['$megjegyzes'];
                            $allapot = $sor['allapot'];
                            echo "<tr><td>$email</td><td>$rendeles</td><td>$megjegyzes</td><td><b>$allapot</b></td></tr>";
                        };
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="script.js"></script>
    <script>
        if(window.history.replaceState) 
    {
        window.history.replaceState(null, null, window.location.href);
    }
</script>
</body>
</html>