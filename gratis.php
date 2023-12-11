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
    <title>Din Digitale Redningsvest</title>
    <meta name="description" content="Digital Redningsvest - Gør det Nemt & Enkelt !">
    <?php include "include/head.php"; ?>
</head>
<body>
<?php include "include/navigation.php"; ?>



<div class="container-fluid hovedContainer min-vh-100 pt-4" style="background-image: url('images/wavebred.png'); background-size: contain; background-repeat: no-repeat; background-position:bottom">
    <div class="pt-3">
        <div class="row">
            <div class="col-12 col-lg-10 ">
                <div class="ps-lg-3 pt-lg-5">
                    <div class="bg-white border border-1 border-white">
                        <div class="row pt-lg-3 ">
                            <div class="col-12 col-lg-4 ">
                                <div class="p-lg-3 pt-lg-5">
                                    <img src="images/brun_dame_lille.jpg" class="img-fluid heroImage">
                                </div>
                            </div>
                            <div class="col-12 col-lg-8 ">
                                <!----------- Tekst hero ----------------->
                                <div class=" px-3 pt-lg-5">
                                    <h1>Vigtige sider - Direkte adgang</h1>
                                    <p class="lead">Hold dig flydende i det store Internet hav - Find Nemt & Hurtigt !</p>
                                    <p><span class="fw-medium">Undgå reklamebølger med <a href="abonnement.php" class="text-secondary fw-semibold text-decoration-underline">abonnement</a> til kun kr. 20/måned. <a href="abonnement.php" class="text-secondary fw-semibold">1 GRATIS prøvemåned.</a></span><br>Svøm uden forstyrrende annoncer, og få bonus med flere direkte adgange og udvidede vejrinformationer. <br>Plus, du støtte mig med en god kage til kaffen, mens jeg passer og vedligeholder din redningskrans 😊.</p>
                                </div>
                                <!----------- Vejret ----------------->
                                <div class="pt-lg-3">
                                    <div class="p-3">
                                        <div class="row">
                                            <div class="col-lg-3 align-items-center">
                                                <div class="flex-lg-wrap align-items-center justify-content-center">
                                                    <h5 class="pt-1 border-bottom border-1 border-primary fw-semibold">Vejret - <span class="overskriftByogUge">Vælg & Godkend</span></h5>
                                                    <form action="" method="post" class="mt-3">
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
                                            <div class="col-lg-9 p-3">
                                                <div class="text-center align-items-center justify-content-evenly">
                                                    <div class="col-lg-auto pt-lg-0">
                                                        <div class="d-flex align-items-center justify-content-center">
                                                            <?php
                                                            foreach ($vejr as $v){
                                                                ?>
                                                                <div class="align-items-center justify-content-center mx-2">
                                                                    <div><img src="uploads/<?php echo $v->vejrBilled; ?>" alt="vejr Billede" class="img-fluid vejrIcon"></div>
                                                                    <div class="vejrUgeDag"><?php echo $v->vejrUgeDag;?></div>
                                                                    <div class="vejrTemp"> <?php echo $v->vejrTemp;?>&deg; C</div>

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
                <!----------- website ikoner ----------------->

                <div class="pt-lg-4 mt-lg-5" >
                    <div class="text-farve4 websiteIconBoks pt-3 pt-lg-5 ">
                        <div class="row text-center align-items-center justify-content-evenly py-3  pt-lg-5">
                            <div class="col-auto pt-lg-0 ">
                                <div class="d-flex- align-items-center justify-content-center">
                                    <h5 class="pt-1 ">Mail / Kalender</h5>
                                    <div class="row text-center align-items-center">
                                        <div class="col-auto">
                                            <div class="flex-lg-wrap align-items-center justify-content-center shadow">
                                                <a href="https://mail.google.com/mail/u/0/#inbox" target="_blank">
                                                    <img src="images/gmail.png" class="websiteIcon" alt="Alternativ tekst">
                                                    <p class="text-white">Gmail</p>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="flex-lg-wrap align-items-center justify-content-center shadow">
                                                <a href="https://outlook.live.com/mail/0/" target="_blank">
                                                    <img src="images/hotmail.png" class="websiteIcon" alt="Alternativ tekst">
                                                    <p class="text-white px-1">Hotmail</p>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="flex-lg-wrap align-items-center justify-content-center shadow">
                                                <a href="https://calendar.google.com/calendar/u/0/r" target="_blank">
                                                    <img src="images/kalender.png" class="websiteIcon" alt="Alternativ tekst">
                                                    <p class="text-white px-1">Kalender</p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto pt-lg-0">
                                <div class="d-flex- align-items-center justify-content-center">
                                    <h5 class="pt-1">Offentligt</h5>
                                    <div class="row text-center align-items-center">
                                        <div class="col-auto">
                                            <div class="flex-lg-wrap align-items-center justify-content-center shadow">
                                                <a href="https://www.mitid.dk/self-service-auto-logud/" target="_blank">
                                                    <img src="images/mitid.png" class="websiteIcon" alt="Alternativ tekst">
                                                    <p class="text-white px-1">MitID</p>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="flex-lg-wrap align-items-center justify-content-center shadow">
                                                <a href="https://www.borger.dk/" target="_blank">
                                                    <img src="images/borger.png" class="websiteIcon" alt="Alternativ tekst">
                                                    <p class="text-white  px-1">Borger</p>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="flex-lg-wrap align-items-center justify-content-center shadow">
                                                <a href="https://private.e-boks.com/" target="_blank">
                                                    <img src="images/eboks.png" class="websiteIcon" alt="Alternativ tekst">
                                                    <p class="text-white px-1">E-Boks</p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto pt-lg-0">
                                <div class="d-flex- align-items-center justify-content-center">
                                    <h5 class="pt-1">Helbred</h5>
                                    <div class="row text-center align-items-center">
                                        <div class="col-auto">
                                            <div class="flex-lg-wrap align-items-center justify-content-center shadow">
                                                <a href="https://apopro.dk/Account/Login" target="_blank">
                                                    <img src="images/apopro.png" class="websiteIcon" alt="Alternativ tekst">
                                                    <p class="text-white">Apopro</p>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="flex-lg-wrap align-items-center justify-content-center shadow">
                                                <a href="https://laegevagten.dk/" target="_blank">
                                                    <img src="images/laegevagt.png" class="websiteIcon" alt="Alternativ tekst">
                                                    <p class="text-white">Lægevagten</p>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="flex-lg-wrap align-items-center justify-content-center shadow">
                                                <a href="https://www.sundhed.dk/" target="_blank">
                                                    <img src="images/sundhed.png" class="websiteIcon" alt="Alternativ tekst">
                                                    <p class="text-white">Sundhed</p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto pt-lg-0">
                                <div class="d-flex- align-items-center justify-content-center">
                                    <h5 class="pt-1 pe-3">Transport</h5>
                                    <div class="row text-center align-items-center">
                                        <div class="col-auto">
                                            <div class="flex-lg-wrap align-items-center justify-content-center shadow">
                                                <a href="https://www.rejsekort.dk/" target="_blank">
                                                    <img src="images/rejsekort.png" class="websiteIcon" alt="Alternativ tekst">
                                                    <p class="text-white">Rejsekort</p>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="flex-lg-wrap align-items-center justify-content-center shadow">
                                                <a href="https://www.moviatrafik.dk/flexkunde/flextur/bestilling-af-flextur/?v=L0i92SKjs8U" target="_blank">
                                                    <img src="images/flextrafik.png" class="websiteIcon" alt="Alternativ tekst">
                                                    <p class="text-white">FlexTrafik</p>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="flex-lg-wrap align-items-center justify-content-center shadow">
                                                <a href="https://rejseplanen.dk/webapp/#!P|TP!histId|0!histKey|H574629" target="_blank">
                                                    <img src="images/rejseplanen.png" class="websiteIcon" alt="Alternativ tekst">
                                                    <p class="text-white">Rejseplanen</p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </div>
            <div class="col-12 col-lg-2 d-flex justify-content-center justify-content-lg-start bg-white">
                <img src="images/annoncer.png" class="img-fluid mx-auto mx-lg-0 ps-lg-1 pt-lg-5">
            </div>

        </div>

    </div>


</div>


<!------------------------------------------------- Footer ------------------------------------------------------------>
<?php include "include/footer.php"; ?>

<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

