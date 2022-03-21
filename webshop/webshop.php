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
            <h1>
                Szállítási és fizetési adatok
            </h1>
            <form method="post">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
<script src='script.js'></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</html>