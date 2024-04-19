<?php
require "settings/init.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vejrBy = (!empty($_POST["vejrBy"])) ? $_POST["vejrBy"] : "København";
    $vejrUgeNr = (!empty($_POST["vejrUgeNr"])) ? $_POST["vejrUgeNr"] : "50";
} else {
    // If the form is not submitted, use default values
    $vejrBy = "København";
    $vejrUgeNr = "50";
}

$vejr = $db->sql("SELECT * FROM vejr WHERE vejrBy = :vejrBy AND vejrUgeNr = :vejrUgeNr", [":vejrBy" => $vejrBy, ":vejrUgeNr" => $vejrUgeNr]);
?>

<!DOCTYPE html>
<html lang="da">
<head>
    <title>Mandekrisecenter Lolland - Events</title>
    <meta name="description" content="Mandekrisecenter Lolland - Events">
    <?php include "include/head.php"; ?>
</head>
<!------------------------------------------------- Body -------------------------------------------------------------->
<body>
<?php include "include/navigation.php"; ?>

<div class="container-fluid hovedContainer min-vh-100 pt-lg-3">
    <div class="pt-5">
        <div class="row pt-4">
            <div class="col-12 ">
                <div class="ps-lg-3">
                    <div class="bg-white border border-1 border-white">
                        <div class="row pb-1">
                            <div class="col-12 col-lg-3 pt-lg-5">
                                <div class="ps-lg-2 pt-lg-2">
                                    <img src="images/brun_dame_lille.jpg" class="img-fluid heroImage">
                                </div>
                            </div>
                            <div class="col-12 col-lg-9 pt-lg-3">
                                <div class=" ps-lg-3 pt-lg-5">
                                    <h1>Premium Abonnement</h1>
                                </div>
                                <div class="">
                                    <div class="">
                                        <div class="row">
                                            <div class="col-lg-3 align-items-center">
                                                <div class="flex-lg-wrap align-items-center justify-content-center ps-lg-3">
                                                    <h5 class="pt-1 border-bottom border-1 border-primary fw-semibold ">Vejret - <span class="overskriftByogUge">Vælg & Godkend</span></h5>
                                                    <form action="" method="post" class="">
                                                        <div class="row">
                                                            <div class="col-8">
                                                                <span class="overskriftByogUge">By:</span>
                                                                <select name="vejrBy" class="w-100 border-secondary">

                                                                    <option value="København" <?php if ($vejrBy === "København") echo "selected"; ?>>København</option>
                                                                    <option value="Odense" <?php if ($vejrBy === "Odense") echo "selected"; ?>>Odense</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-4">
                                                                <span class="overskriftByogUge">Uge:</span>
                                                                <select name="vejrUgeNr" class="w-100 border-secondary">
                                                                    <option value="50" <?php if ($vejrUgeNr === "50") echo "selected"; ?>>50</option>
                                                                    <option value="51" <?php if ($vejrUgeNr === "51") echo "selected"; ?>>51</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn-sm bg-primary text-white btn-link mt-2">Godkend</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="col-lg-9 ">
                                                <div class="text-center align-items-center justify-content-evenly">
                                                    <div class="col-lg-auto pt-lg-0">
                                                        <div class="d-flex align-items-center justify-content-center">
                                                            <?php
                                                            foreach ($vejr as $v){
                                                                ?>
                                                                <div class="align-items-center justify-content-center mx-3 tempBox">
                                                                    <div><img src="uploads/<?php echo $v->vejrBilled; ?>" alt="vejr Billede" class="img-fluid vejrIcon"></div>
                                                                    <div class="vejrUgeDag fw-normal"><?php echo $v->vejrUgeDag;?></div>
                                                                    <div class="vejrTemp fw-normal"> <?php echo $v->vejrTemp;?>&deg; C</div>
                                                                    <div class="vejrBeskrivelse fw-normal"><?php echo $v->vejrBeskrivelse;?></div><br>
                                                                    <div class="vejrMaxTemp">Max. <?php echo $v->vejrMaxTemp;?>&deg;</div>
                                                                    <div class="vejrMinTemp">Min. <?php echo $v->vejrMinTemp;?>&deg;</div><br>
                                                                    <div class="vejrUx">UV-indeks: <br><?php echo $v->vejrUx;?></div>
                                                                    <div class="vejrRegn">Nedbør: <br><?php echo $v->vejrRegn;?> mm.</div>

                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


</div>



<!------------------------------------------------- Footer ------------------------------------------------------------>
<?php include "include/footer.php"; ?>

<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
