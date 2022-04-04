<?php
    include('osztalyok.php');
    if (isset($_POST['addologomb']) && isset($_POST['mihezad']) && isset($_POST['mitad'])){
        $ad = $_POST['mihezad'];
        $mennyitad = intval($_POST['mitad']);
        $rateles = new Rating();
        if($rateles->rateAdd($ad, $mennyitad)){
            echo"<script>alert('Sikeres értékelés!')</script>";
            header("Refresh:0");
        }
    }