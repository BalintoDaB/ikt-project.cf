<?php
    if (isset($_POST)){
        $name = '';
        foreach($_POST as $name => $content) {
        }
        $sql = "SELECT * FROM webshopitemek WHERE neve = '$name'";
        $mennyi = $csatlakozas->query($sql);
        if ($mennyi->num_rows > 0){
            while($sor = $mennyi->fetch_assoc()) {
                $termeknev = $sor['neve'];
                $termekar = $sor['ara'];
                echo "  <form method='post' action='checkout.php?termeknev=$termeknev&termekar=$termekar'>
                            <tr>
                                <td>
                                    $termeknev
                                </td>
                                <td>
                                    <input type='number' style='width:50px' name='rendelesdb' max='10' min='1' value='1' style='width: 50px;'>
                                </td>
                                <td>
                                    $termekar Ft
                                </td>
                            </tr>
                            <tr>
                                <td colspan='2'>
                                    <input type='submit' value='Tovább a rendeléshez'>
                                </td>
                                <td>
                                    <input type='reset' value='Kosár törlése'>
                                </td>
                            </tr>
                        </form>
                ";
            }
        }
    }

    // echo array_keys($_POST);