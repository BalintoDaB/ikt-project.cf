<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
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
                        <li class="nav-item"><a class="nav-link" href="../index.php">Főoldal</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Rólunk</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Referenciáink</a></li>
                        <li class="nav-item"><a class="nav-link" href="webshop.php">Webshop</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container mt-4">
        <h1 class="text-center mb-4">Rendelés állapotának megtekintése</h1>
        <form method="post">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="form-floating mb-3">
                        <input required name="kod" class="form-control" id="kodin" placeholder="37528">
                        <label for="kodin">Megrendeléskor kapott kód</label>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-4">                
                <div class="col-12 col-md-12 d-flex justify-content-center">
                    <input type="submit" name="allapotlekerdezgomb" class="btn webshopgomb mx-auto" value="Rendelés állapotának megtekintése">
                </div>
            </div>
        </form>
        <hr class="border my-4">
                <?php
                    include('szervercsatlakozas.php');
                    include('allapotlekerdez.php');
                ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>