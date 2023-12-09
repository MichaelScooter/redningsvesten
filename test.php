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

<div class="container-fluid pt-lg-5">
    <div class="row pt-lg-5">
        <div class="col-12 col-lg-10 bg-black">cgfgkkkkkf
            <div class="">
                <div class="text-farve4 websiteIconBoks pt-3">
                    <div class="row text-center align-items-center justify-content-evenly py-3 bg-primary">
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
                                <h5 class="pt-1">Transport</h5>
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
        <div class="col-12 col-lg-2 bg-farve3">gfgf</div>
    </div>

</div>


<!------------------------------------------------- Footer ------------------------------------------------------------>
<?php include "include/footer.php"; ?>

<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


