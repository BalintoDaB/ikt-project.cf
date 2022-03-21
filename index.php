<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<header>
    <nav id="navbar_top" class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Brand</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="main_nav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link " href="#"> Menu item </a></li>
                    <li class="nav-item"><a class="nav-link " href="#"> Menu item </a></li>
                    <li class="nav-item"><a class="nav-link " href="#"> Menu item </a></li>
                </ul>
            </div> <!-- navbar-collapse.// -->
        </div> <!-- container-fluid.// -->
    </nav>
</header>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <div id="carouselPictures" class="carousel slide" data-bs-ride="carousel" >
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselPictures" data-bs-slide-to="0" class="active"></button>
                        <button type="button" data-bs-target="#carouselPictures" data-bs-slide-to="1" ></button>
                        <button type="button" data-bs-target="#carouselPictures" data-bs-slide-to="2" ></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="img/0.png" alt="Víztükör" class="d-block mx-auto w-25">
                        </div>
                        <div class="carousel-item">
                            <img src="img/1.png" alt="Nádas" class="d-block mx-auto w-25">
                        </div>
                        <div class="carousel-item">
                            <img src="img/2.png" alt="Tavirózsák" class="d-block mx-auto w-25">
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

    <script src="main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>