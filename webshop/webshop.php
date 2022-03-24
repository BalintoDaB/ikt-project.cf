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
    <div class="container">    
        <div class="row">
        <?php
        include('szervercsatlakozas.php');
        include('webshopbetolt.php');
        ?>
        </div>
        <hr>
        <table id='kosartable' class="table table-striped table-hover table-bordered text-center">
            <thead>
                <tr>
                    <th>
                        Termék neve
                    </th>
                    <th>
                        Darabszám
                    </th>
                    <th>
                        Darabár
                    </th>
                    <th>
                        Törlés
                    </th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <hr class="my-4">
        <div class="text-center">
            <h1 class="mb-4">
                Szállítási és fizetési adatok
            </h1>
            <form method="post">
                <input type="hidden" name="kosar" id="kosarform">
                <input type="hidden" name="kosardarabszam" id="kosardarabszam">
                <div class="row mb-4">
                    <div class="col-12 col-md-4">
                        <div class="form-floating mb-3">
                            <input autocomplete="email" name="email" type="email" class="form-control" id="emailin" placeholder="minta@gmail.com">
                            <label for="emailin">Email Cím</label>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-floating mb-3">
                            <input autocomplete="name" name="name" type="text" class="form-control" id="nevin" placeholder="Molnár Bálint">
                            <label for="nevin">Név</label>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-floating mb-3">
                            <input autocomplete="tel" name="telszam" type="text" class="form-control" id="telin" placeholder="+36201234567">
                            <label for="telin">Telefonszám</label>
                        </div>
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col-12 col-md-4">
                        <div class="form-floating mb-3">
                            <input autocomplete="country-name" name="orszag" type="text" class="form-control" id="orszagin" placeholder="Magyarország">
                            <label for="orszagin">Ország</label>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="megye" id="megyein" placeholder="Győr-Moson-Sopron megye">
                            <label for="megyein">Megye/Állam</label>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-floating mb-3">
                            <input autocomplete="postal-code" name="iranyitoszam" type="text" class="form-control" id="iranyin" placeholder="9200">
                            <label for="iranyin">Irányítószám</label>
                        </div>
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col-12 col-md-12">
                        <div class="form-floating mb-3">
                            <input autocomplete="address-line1" name="cim" type="text" class="form-control" id="cimin" placeholder="Mosonmagyaróvár, Fő utca 1.">
                            <label for="cimin">Cím</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="form-floating mb-3">
                            <input name="megjegyzes" type="text" class="form-control" id="megjegyzen" placeholder="Megjegyzés">
                            <label for="megjegyzen">Megjegyzés</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 p-4">
                        <input class="btn webshopreset" type="reset" value="Adatok törlése">
                    </div>
                    <div class="col-12 col-md-6 p-4">
                        <input class="btn webshopgomb" name="submit" type="submit" value="Vásárlás">
                    </div>
                </div>
            </form>
            <hr>
            <div class="row">
                <div class="col-12 col-md-12" id="rendeles">
                    <!-- <?php
                        // include("rendeles.php")
                    ?> -->
                </div>
            </div>
        </div>
    </div>
</body>
<script src='script.js'></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</html>