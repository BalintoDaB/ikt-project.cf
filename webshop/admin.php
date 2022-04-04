<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <script>
    if(window.history.replaceState) 
    {
        window.history.replaceState(null, null, window.location.href);
    }
    </script>
</body>
</html>