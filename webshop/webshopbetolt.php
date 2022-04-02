<?php
    $sql = "SELECT * FROM webshopitemek";
    $mennyi = $csatlakozas->query($sql);
    if ($mennyi->num_rows > 0){
        while($sor = $mennyi->fetch_assoc()) {
            $termeknev = $sor['neve'];
            $termekar = $sor['ara'];
            $termekkep = $sor['kepnev'];
            $benev = '"' . $termeknev . '"';
            echo "
              <div class='col-12 col-md-4 p-4 mx-auto'>              
                <div class='card text-center shadow-lg text-center'>
                <img class='card-img-top w-50 mx-auto' src='../img/$termekkep'>
                  <div class='card-body'>
                    <h5 class='card-title'>$termeknev</h5>
                    <p class='card-text'>$termekar Ft</p>
                    <input type='button' onclick='kosarbatetel($benev, $termekar)' name='$termeknev' value='Kosárba' placeholder='1' class='btn webshopgomb'>
                    <input type='button' onclick='ugorj(" . '"termek.php?termek=' . $termeknev . '"' . ")' name='' value='Termék megtekintése' placeholder='1' class='btn webshopgomb'>
                    </div>
                </div>
              </div>";
        };
    }