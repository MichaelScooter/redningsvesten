<?php
require "settings/init.php";


$vejrBy = (!empty($_POST["vejrBy"])) ? $_POST["vejrBy"] : "København";
$vejrUgeNr = (!empty($_POST["vejrUgeNr"])) ? $_POST["vejrUgeNr"] : "50";

$vejr = $db->sql("SELECT * FROM vejr WHERE vejrBy = :vejrBy AND vejrUgeNr = :vejrUgeNr", [":vejrBy" => $vejrBy, ":vejrUgeNr" => $vejrUgeNr]);

$vejr = $db->sql("SELECT * FROM vejr WHERE vejrBy = :vejrBy AND vejrUgeNr = :vejrUgeNr", [":vejrBy" => $vejrBy, ":vejrUgeNr" => $vejrUgeNr]);
?>


<!DOCTYPE html>
<html lang="da">
<head>

    <title>Din Digitale Redningsvest</title>
    <meta name="description" content="Digital Redningsvest - Gør det Nemt & Enkelt !">

    <?php include "include/head.php"; ?>

</head>
<!------------------------------------------------- Body -------------------------------------------------------------->
<body>
<?php include "include/navigation.php"; ?>

<div class="container-fluid bg-light p-lg-5 vh-100">

    <form action="" method="post">
        <select name="vejrBy">
            <option value="København" selected>København</option>
        </select>

        <select name="vejrUgeNr">
            <option value="50" selected>50</option>
            <option value="51">51</option>
        </select>

        <button type="submit">Submit</button>
    </form>




    <?php
    foreach ($vejr as $v){
        ?>

        <div class="row align-items-center flex-md-row-reverse pt-2 pb-5 pb-lg-0 px-lg-5 pt-lg-0 ">

            <div class="col-lg-6 d-flex justify-content-center pb-5 pb-lg-0">
                <img src="uploads/<?php echo $v->vejrBilled; ?>" alt="vejr Billede" class="img-fluid pt-5 p-lg-5 bookCover">
            </div>

            <div class="col-lg-6 ps-md-5 text-center align-self-start align-self-md-center text-md-start pb-5 pt-4 pt-md-0">
                <h5 class="ps-md-4 mb-0 text-primary fw-light">By:</h5>
                <h1 class="ps-md-4">
                    <?php echo $v->vejrBy; ?>
                </h1>
                <p class="lead ps-md-4">
                    Ugenr <?php echo $v->vejrUgeNr; ?>
                </p>
                <div class="ps-md-4 text-white textBeskrivelse">
                    <p class="text-danger ">Ugedag
                        <?php
                        echo $v->vejrUgeDag;
                        ?>
                    </p>
                    <p class="text-danger ">vejrbeskrivelse
                        <?php
                        echo $v->vejrBeskrivelse;
                        ?>
                    </p>
                </div>
                <!-- Start info bokse -->
                <div class="row ps-md-4 pt-lg-4">
                    <div class="col-12 col-md-6">
                        <div>
                            <p><span class="text-primary">Temperatur:</span>
                                <?php
                                echo $v->vejrTemp;
                                ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div>
                            <p><span class="text-primary">Minimum temperatur:</span>
                                <?php
                                echo $v->vejrMinTemp;
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row ps-md-4">
                    <div class="col-12 col-md-6">
                        <div>
                            <p><span class="text-primary">Max temperatur:</span>
                                <?php
                                echo $v->vejrMaxTemp;
                                ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div>
                            <p><span class="text-primary">UV indeks:</span>
                                <?php
                                echo $v->vejrUx;
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row ps-md-4">
                    <div class="col-12 col-md-6">
                        <div>
                            <p><span class="text-primary">Nedbør:</span>
                                <?php
                                echo $v->vejrRegn;
                                ?>
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <?php

    }
    ?>



</div>


<!------------------------------------------------- Footer ------------------------------------------------------------>
<?php include "include/footer.php"; ?>

<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
