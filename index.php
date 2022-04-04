<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Cases</title>
    <?php
        include('./webshop/szervercsatlakozas.php');
    ?>
</head>

<body style="height: 1000000px;">
    <div id="sec1">
        <header>
            <nav id="navbar_top" class="navbar navbar-expand-lg navbar-dark">
                <div class="container">
                    <object height="50px" data="../logo1.svg" type="image/svg+xml"></object>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav">
                        <span class="navbar-toggler-icon"></span> 
                    </button>
                    <div class="collapse navbar-collapse" id="main_nav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item"><a class="nav-link" href="#">Rólunk</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Referenciáink</a></li>
                            <li class="nav-item"><a class="nav-link" href="webshop/webshop.php">Webshop</a></li>
                            <li class="nav-item"><a class="nav-link" href="webshop/allapot.php">Rendelés állapota</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <div class="container">
            <div class="row justify-content-center mt-4">
                <div class="col-12 col-md-12">
                    <div id="carouselPictures" class="carousel slide shadow-lg rounded py-auto" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselPictures" data-bs-slide-to="0" class="active"></button>
                            <button type="button" data-bs-target="#carouselPictures" data-bs-slide-to="1"></button>
                            <button type="button" data-bs-target="#carouselPictures" data-bs-slide-to="2"></button>
                            <button type="button" data-bs-target="#carouselPictures" data-bs-slide-to="3"></button>
                            <button type="button" data-bs-target="#carouselPictures" data-bs-slide-to="4"></button>
                        </div>
                        <div class="carousel-inner" onmouseover='nagyobbit()' onmouseleave="sima()">
                            <div class="carousel-item active">
                                <img src="img/0.png" alt="Víztükör" class="rounded d-block mx-auto img-fluid w-25 cr-kep d-inline-block">
                                <div class="rating cr-buy">
                                    <span>Coral</span><br>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                    </svg>
                                    <span>5/<?php
                                    $sql = "SELECT * FROM webshopitemek WHERE neve = 'Coral'";
                                    $mennyi = $csatlakozas->query($sql);
                                    if ($mennyi->num_rows > 0){
                                        while($sor = $mennyi->fetch_assoc()) {
                                            $cucc = substr($sor['Rating'], 0, 3);
                                            echo $cucc;
                                        };
                                    }
                                    ?></span><br>
                                    <button class="btn webshopgomb btn-success" onclick="ugorj('http://ikt-project.rf.gd/webshop/webshop.php?eredetitermek=Coral&eredetiar=30000')">Buy Now!</button>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="img/1.png" alt="Nádas" class="rounded d-block mx-auto img-fluid w-25 cr-kep">
                                <div class="rating cr-buy">
                                    <span>Blood</span><br>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                    </svg>
                                    <span>5/<?php
                                    $sql = "SELECT * FROM webshopitemek WHERE neve = 'Blood'";
                                    $mennyi = $csatlakozas->query($sql);
                                    if ($mennyi->num_rows > 0){
                                        while($sor = $mennyi->fetch_assoc()) {
                                            $cucc = substr($sor['Rating'], 0, 3);
                                            echo $cucc;
                                        };
                                    }
                                    ?></span><br>
                                    <button class="btn webshopgomb btn-success" onclick="ugorj('http://ikt-project.rf.gd/webshop/webshop.php?eredetitermek=Blood&eredetiar=28000')">Buy Now!</button>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="img/2.png" alt="Tavirózsák" class="rounded d-block mx-auto img-fluid w-25 cr-kep">
                                <div class="rating cr-buy">
                                    <span>Poison </span><br>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                    </svg>
                                    <span>5/<?php
                                    $sql = "SELECT * FROM webshopitemek WHERE neve = 'Poison'";
                                    $mennyi = $csatlakozas->query($sql);
                                    if ($mennyi->num_rows > 0){
                                        while($sor = $mennyi->fetch_assoc()) {
                                            $cucc = substr($sor['Rating'], 0, 3);
                                            echo $cucc;
                                        };
                                    }
                                    ?></span><br>
                                    <button class="btn webshopgomb btn-success" onclick="ugorj('http://ikt-project.rf.gd/webshop/webshop.php?eredetitermek=Poison&eredetiar=31000')">Buy Now!</button>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="img/3.png" alt="Tavirózsák" class="rounded d-block mx-auto img-fluid w-25 cr-kep">
                                <div class="rating cr-buy">
                                    <span>Ocean </span><br>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                    </svg>
                                    <span>5/<?php
                                    $sql = "SELECT * FROM webshopitemek WHERE neve = 'Ocean'";
                                    $mennyi = $csatlakozas->query($sql);
                                    if ($mennyi->num_rows > 0){
                                        while($sor = $mennyi->fetch_assoc()) {
                                            $cucc = substr($sor['Rating'], 0, 3);
                                            echo $cucc;
                                        };
                                    }
                                    ?></span><br>
                                    <button class="btn webshopgomb btn-success" onclick="ugorj('http://ikt-project.rf.gd/webshop/webshop.php?eredetitermek=Ocean&eredetiar=25000')">Buy Now!</button>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="img/4.png" alt="Tavirózsák" class="rounded d-block mx-auto img-fluid w-25 cr-kep">
                                <div class="rating cr-buy">
                                    <span>Nightsky </span><br>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                    </svg>
                                    <span>5/<?php
                                    $sql = "SELECT * FROM webshopitemek WHERE neve = 'Nightsky'";
                                    $mennyi = $csatlakozas->query($sql);
                                    if ($mennyi->num_rows > 0){
                                        while($sor = $mennyi->fetch_assoc()) {
                                            $cucc = substr($sor['Rating'], 0, 3);
                                            echo $cucc;
                                        };
                                    }
                                    ?></span><br>
                                    <button class="btn webshopgomb btn-success" onclick="ugorj('http://ikt-project.rf.gd/webshop/webshop.php?eredetitermek=Nightsky&eredetiar=35000')">Buy Now!</button>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselPictures" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselPictures" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js" integrity="sha512-z4OUqw38qNLpn1libAN9BsoDx6nbNFio5lA6CuTp9NlK83b89hgyCVq+N5FdBJptINztxn1Z3SaKSKUS5UP60Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="title-scroll.js" data-start="5000" data-speed="250"></script>
    <script src="main.js"></script>
</body>

</html>