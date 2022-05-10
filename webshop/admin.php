<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="icon" href="../logo1.svg" type="image/x-icon">
</head>
<body>
    <form method="post">
        <table>
            <thead>
                <tr>
                    <td>
                        Termék
                    </td>
                    <td>
                        Ár
                    </td>
                    <td>
                        Kép
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <input type="text" name="termek" id="termek">
                    </td>
                    <td>
                        <input type="number" name="ar" id="ar">
                    </td>
                    <td>
                        <input type="text" name="kep" id="kep">
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <input type="submit" value="Hozzáadás" name="leadas" id="leadas">
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
    <hr>
    <?php
        include('szervercsatlakozas.php');
        include('addolas.php')
    ?>
    <hr>
    <form method="post">
        <table>
            <thead>
                <th>
                    Termék
                </th>
                <th>
                    Ár
                </th>
            </thead>
            <tbody>
                <tr>
                   <?php
                    include('listazas.php')
                   ?> 
                </tr>
            </tbody>
        </table>
        <input name="listagomb" value="Jelenlegi elemek kilistázása" type="submit">
    </form>
    <hr>
    <form method="post">
        <table>
            <caption>
                Törlés
            </caption>
            <tr>
                <td>
                    <input name="mittorol" placeholder="Mit szeretne törölni?" type="text">
                </td>
                <td>
                    <input name="torlogomb" value="Törlés" type="submit">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="mindenttorol" value="Minden adat törlése az adatbázisból">
                </td>
            </tr>
        </table>
    </form>
    <?php
        include('torles.php')
    ?>
    <hr>
    <form method="post">
        <table>
            <caption>
                Rating Add
            </caption>
            <tr>
                <td>
                    <input name="mihezad" placeholder="Mihez szeretne addolni?" type="text">
                </td>
                <td>
                    <input type="int" name="mitad" placeholder="Mennyit szeretne addolni?">
                </td>
                <td>
                    <input name="addologomb" value="Addolás" type="submit">
                </td>
            </tr>
        </table>
    </form>
    <?php
        include('ratingadd.php')
    ?>
    <hr>
    <form method="post" enctype="multipart/form-data">
        <table>
            <caption>
                Upload Image
            </caption>
            <tr>
                <th>
                    Put File Here
                </th>
            </tr>
            <tr>
                <td>
                    <input type="file" name="fileToUpload" id="fileToUpload">
                </td>
                <td>
                    <input type="text" name="name" id="name">
                </td>
                <td>
                    <input type="submit" value="Upload Image" name="submit">
                </td>
            </tr>
        </table>
    </form>
    <?php
        include('fileupload.php')
    ?>
    <hr>
    <form method="post">
        <table>
            <tr>
                <th>
                    Kuponkód
                </th>
                <th>
                    Lejárat
                </th>
                <th>
                    Kedvezmény
                </th>
            </tr>
            <tr>
                <td>
                    <input type="text" name="kodin">
                </td>
                <td>
                    <input type="date" name="datein">
                </td>
                <td>
                    <input type="number" name="kedvezmenyin" style="width: auto;" min="1" max="100">
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <input type="submit" name="kuponadd" value="Hozzáadás">
                </td>
            </tr>
        </table>
        <?php
            if(isset($_POST['kuponadd'])){
                $kod = $_POST['kodin'];
                $date = strtotime($_POST['datein']);
                $kedvezmeny = $_POST['kedvezmenyin'];
                $kuponjson1 = file_get_contents('kuponok.json');
                $jsonTomb = json_decode($kuponjson1,true);
                // $jsontomb2 = $jsonTomb['kuponok'];
                // foreach ($jsontomb2 as $jsontom) {
                    //     print $jsontom['kod'];
                    // }
                    
                $kuponjson = fopen('kuponok.json', 'w');
                $beilllesztendotomb = array(
                    "kod" => $kod,
                    "ervenyesseg" => $date,
                    "kedvezmeny" => $kedvezmeny
                );
                array_push($jsonTomb,$beilllesztendotomb);
                $beillesztendo = json_encode($jsonTomb);
                fwrite($kuponjson, $beillesztendo);
                fclose($kuponjson);
            }
        ?>
    </form>
    <script>
    if(window.history.replaceState) 
    {
        window.history.replaceState(null, null, window.location.href);
    }
    </script>
</body>
</html>