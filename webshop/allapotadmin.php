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
                <img src="" class="rounded">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="main_nav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="../index.html">Főoldal</a></li>
                        <li class="nav-item"><a class="nav-link" href="../rolunk.html">Rólunk</a></li>
                        <li class="nav-item"><a class="nav-link" href="webshop.php">Webshop</a></li>
                        <li class="nav-item"><a class="nav-link" href="allapot.php">Rendelés állapota</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container mt-4">
        <h1 class="text-center mb-4">Adatbázisban lévő rendelések:</h1>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-dark table-striped table-hover text-center">
                    <thead>
                        <tr>
                            <td>
                                Név
                            </td>
                            <td>
                                Email cím
                            </td>
                            <td>
                                Rendeltek
                            </td>
                            <td>
                                Kód
                            </td>
                            <td>
                                Állapot
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include('szervercsatlakozas.php');
                            $sql = "SELECT * FROM rendelesek";
                            $mennyi = $csatlakozas->query($sql);
                            if ($mennyi->num_rows > 0){
                                while($sor = $mennyi->fetch_assoc()) {
                                    $nev = $sor['nev'];
                                    $email = $sor['email'];
                                    $rendeltek = $sor['rendeltek'];
                                    $kod = $sor['kod'];
                                    $allapot = $sor['allapot'];
                                    echo "
                                        <tr>
                                            <td>
                                                $nev
                                            </td>
                                            <td>
                                                $email
                                            </td>
                                            <td>
                                                $rendeltek
                                            </td>
                                            <td>
                                                $kod
                                            </td>
                                            <td class='fw-bold'>
                                                $allapot
                                            </td>
                                        </tr>
                                    ";
                                };
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <hr class="mb-4 border bg-dark">
        <h1 class="text-center mb-4">Változtatás</h1>
        <form method="post">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <div class="form-floating mb-3">
                        <input name="micsoda" type="text" class="form-control" id="szam" placeholder="Rendelés kódja">
                        <label for="szam">A változtatni kívánt rendelés kódja</label>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-floating mb-3">
                        <input name="mive" type="text" class="form-control" id="mive" placeholder="Megjegyzés">
                        <label for="mive">Az új állapot</label>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-4">
                <div class="col-12 col-md-4 d-flex justify-content-center">
                    <input type="submit" name="lead" class="btn webshopgomb" value="Változtatások közzététele">
                </div>
            </div>
        </form>
        <?php
        include('allapotvaltoztat.php');
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>