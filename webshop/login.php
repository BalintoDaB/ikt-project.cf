<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" id="form1">
        <table>
            <thead>
                <tr>
                    <td>
                        Username
                    </td>
                    <td>
                        Password
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <input type="text" name="Username_1" id="Username_1">
                    </td>
                    <td>
                        <input type="text" name="Password_1" id="Password_1">
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <input type="submit" value="Login" name="leadas" id="leadas">
                    </td>
                </tr>
            </tbody>
        </table>
        <h1>Not registered yet?<a onclick="change('form2', 'form1')">Click here!</a></h1>
    </form>
    <hr>
    <?php
        include('szervercsatlakozas.php');
        include('loginb.php')
    ?>
    <hr>
    <form method="post" style="display: none;" id="form2">
        <table>
            <thead>
                <tr>
                    <td>
                        Username
                    </td>
                    <td>
                        Password
                    </td>
                    <td>
                        Email
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <input type="text" name="Username_2" id="Username_2">
                    </td>
                    <td>
                        <input type="text" name="Password_2" id="Password_2">
                    </td>
                    <td>
                        <input type="email" name="Email" id="Email">
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <input type="submit" value="Register" name="leadas2" id="leadas2">
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
    <hr>
    <?php
        include('registerb.php')
    ?>
    <hr>
<script>
    function change(szar, szar2){
        var changeTo = document.getElementById(szar);
        var changeFrom = document.getElementById(szar2);
        changeTo.style.display = "block";
        changeFrom.style.display = "none";
    }
</script>
</body>
</html>