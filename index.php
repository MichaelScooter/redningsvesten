<?php
require "settings/init.php";

if(!empty($_GET["type"])) {
    if($_GET["type"] == "slet"){
        $id = $_GET["id"];

        $db->sql("DELETE FROM vejr WHERE vejrId = :vejrId", [":vejrId"=>$id], false);
    }

}

$vejr = $db->sql("SELECT * FROM vejr WHERE vejrId = :vejrId", [":vejrId" => $_GET["vejrId"]]);

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

<div class="container-fluid bg-dark p-lg-5 vh-100">
    <?php
    foreach ($vejr as $blog){
        ?>

        <div class="row align-items-center flex-md-row-reverse pt-2 pb-5 pb-lg-0 px-lg-5 pt-lg-0 ">

            <div class="col-lg-6 d-flex justify-content-center pb-5 pb-lg-0">
                <img src="uploads/<?php echo $blog->vejrBilled; ?>" alt="vejr Billede" class="img-fluid pt-5 p-lg-5 bookCover">
            </div>

            <div class="col-lg-6 ps-md-5 text-center align-self-start align-self-md-center text-md-start pb-5 pt-4 pt-md-0">
                <h5 class="ps-md-4 mb-0 text-primary fw-light">By:</h5>
                <h1 class="ps-md-4">
                    <?php echo $blog->vejrBy; ?>
                </h1>
                <p class="lead ps-md-4">
                    Ugenr <?php echo $blog->vejrUgeNr; ?>
                </p>
                <div class="ps-md-4 text-white textBeskrivelse">
                    <p class="text-danger ">Ugedag
                        <?php
                        echo $blog->vejrUgeDag;
                        ?>
                    </p>
                    <p class="text-danger ">vejrbeskrivelse
                        <?php
                        echo $blog->vejrBeskrivelse;
                        ?>
                    </p>
                </div>
                <!-- Start info bokse -->
                <div class="row ps-md-4 pt-lg-4">
                    <div class="col-12 col-md-6">
                        <div>
                            <p><span class="text-primary">Temperatur:</span>
                                <?php
                                echo $blog->vejrTemp;
                                ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div>
                            <p><span class="text-primary">Minimum temperatur:</span>
                                <?php
                                echo $blog->vejrMinTemp;
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
                                echo $blog->vejrMaxTemp;
                                ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div>
                            <p><span class="text-primary">UV indeks:</span>
                                <?php
                                echo $blog->vejrUx;
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
                                echo $blog->vejrRegn;
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
