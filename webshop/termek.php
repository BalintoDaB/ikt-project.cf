<!DOCTYPE html>
<html lang="hu">
    <head>
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
                        <li class="nav-item"><a class="nav-link" href="#">Rólunk</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Referenciáink</a></li>
                        <li class="nav-item"><a class="nav-link" href="allapot.php">Rendelés állapota</a></li>
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
                <div class="row mt-4">
                    <div class="col-12 col-md-8">
                        <input type="range" class="ml-auto" oninput="ratekiir()" name="ratein" value="3" min="1" max="5" id="range">
                    </div>
                    <div class="col-12 col-md-4 text-center">
                        <h4 id="rateszam" class="text-center mx-auto">5</h4>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12 col-md-12">
                        <input type="submit" class="btn webshopgomb" value="Értékelés" name="ratinglead">
                    </div>
                </div>
            </form>
        </div>
        <div class="col-12 col-md-6 text-center">
            <h3>Comment írás</h3>
            <form action="post">
                <div class="row mt-4">
                    <div class="col-12 col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="nevin" class="form-control" id="nevin" placeholder="Molnár Bálint">
                            <label for="nevin">Név</label>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="kodin" class="form-control" id="kodin" placeholder="325235">
                            <label for="kodin">Rendelést azonosító kód</label>
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
                        <input type="submit" class="btn webshopgomb" value="Közzététel" name="ratinglead">
                    </div>
                </div>
            </form>
        </div>
    </div>
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