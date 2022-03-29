<?php
    if(isset($_POST['allapotlekerdezgomb'])){
        $kod = $_POST['kod'];
        $sql = "SELECT * FROM rendelesek WHERE kod = '$kod'";
        $mennyi = $csatlakozas->query($sql);
        if ($mennyi->num_rows > 0){
            while($sor = $mennyi->fetch_assoc()) {
                $nev = $sor['nev'];
                $email = $sor['email'];
                $telszam = $sor['telszam'];
                $rendeltek = $sor['rendeltek'];
                $allapot = $sor['allapot'];
                echo '
                    <table class="table table-dark table-striped table-hover shadow-lg text-center">
                    <thead>
                        <tr>
                            <td>
                                Név
                            </td>
                            <td>
                                Telefonszám
                            </td>
                            <td>
                                Email cím
                            </td>
                            <td>
                                Rendelt elemek
                            </td>
                            <td>
                                Rendelés állapota
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                ';
                echo "<tr>
                        <td>$nev</td>
                        <td>$telszam</td>
                        <td>$email</td>
                        <td>$rendeltek</td>
                        <td class='fw-bold'>$allapot</td>
                        </tr>
                        </tbody>
                        </table>";
                        
            };
        }
    }