<?php
    echo '<div class="container termekcont shadow-lg p-4">
    <h1 class="text-center mb-4">' . $termeknev . '</h1>
    <div class="row mb-4">
        <div class="col-12 col-md-6 rounded">
            <img class="mx-auto d-block w-25" src="../img/' . $termekkep . '">
        </div>
        <div class="col-12 col-md-6 p-4 text-center">
            <h2 class="mb-4">Termék ára: ' . $termekar .' Ft</h2>
            <h2>Értékelés: 5/' . substr($eredetiertekeles, 0, 4) . '</h2>
            <input type="button" class="webshopgomb btn mt-4" onclick="ugorj(&#039webshop.php?eredetitermek=' . $termeknev . '&eredetiar=' . $termekar . '&#039)" value="Kosárba tétel">
        </div>
    </div>
    <hr>
    <div class="row mt-4">
        <div class="col-12 col-md-6 text-center">
            <h3>Termék értékelése</h3>
            <form method="post">
                <div class="row mt-4">
                    <div class="col-12 col-md-8">
                        <input type="range" class="ml-auto" oninput="ratekiir()" name="ratein" value="3" min="1" max="5" id="range">
                    </div>
                    <div class="col-12 col-md-4 text-center">
                        <h4 id="rateszam" class="text-center mx-auto">5</h4>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12 col-md-12">
                        <input type="submit" class="btn webshopgomb" value="Értékelés" name="ratinglead">
                    </div>
                </div>
            </form>
        </div>
        <div class="col-12 col-md-6 text-center">
            <h3>Comment írás</h3>
            <form action="post">
                <div class="row mt-4">
                    <div class="col-12 col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="nevin" class="form-control" id="nevin" placeholder="Molnár Bálint">
                            <label for="nevin">Név</label>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="kodin" class="form-control" id="kodin" placeholder="325235">
                            <label for="kodin">Rendelést azonosító kód</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="mb-3">
                            <textarea class="form-control" name="commentin" placeholder="Komment" id="commenttextarea"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 col-md-4">
                        <input type="submit" class="btn webshopgomb" value="Közzététel" name="ratinglead">
                    </div>
                </div>
            </form>
        </div>
    </div>';