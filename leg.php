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

<div class="container-fluid hovedContainer bg-primary vh-100 pt-lg-5">
    <div class="pt-lg-4">
        <div class="row pt-lg-5">
            <div class="col-12 col-lg-10">
                <div class="ps-lg-3">
                    <div class="bg-farve3 border border-1 border-white">
                        <div class="row pt-lg-3 pb-2">
                            <div class="col-12 col-lg-3 ">
                                <div class="">
                                    <img src="images/dame_hero_610_brun.png" class="img-fluid heroImage">
                                </div>
                            </div>
                            <div class="col-12 col-lg-9 ">
                                <div class=" px-lg-3 pb-lg-2">
                                    <h1>Din Digitale Redningskrans</h1>
                                    <p class="lead">Hold dig flydende i det store Internet hav - Nemt & Hurtigt !</p>
                                    <p><span class="fw-semibold">Undgå reklamebølger med <a href="premium.php" class="text-primary fw-semibold text-decoration-underline">abonnement</a> til kun kr. 20/måned!</span> <br>Svøm uden forstyrrende annoncer, og få bonus med flere direkte indgange og udvidede vejrinformationer. Plus, din støtte giver mig mulighed for at nyde en god kage til kaffen, mens jeg passer på din redningskrans 😊.</p>
                                </div>
                                <div class="pt-lg-3">
                                    <div class="p-3">
                                        <div class="row">
                                            <div class="col-lg-3 align-items-center">
                                                <div class="flex-lg-wrap align-items-center justify-content-center">
                                                    <h5 class="pt-1 border-bottom border-1 border-primary">Vejret - <span class="fs-6 text-primary">Vælg & Godkend</span></h5>
                                                    <form action="" method="post" class="mt-3">
                                                        <div>
                                                            By:
                                                            <select name="vejrBy" class="w-100">
                                                                <option value="København" selected>København</option>
                                                                <option value="Odense">Odense</option>
                                                            </select>
                                                        </div>
                                                        <div>
                                                           Uge nr
                                                            <select name="vejrUgeNr" class="w-100">
                                                                <option value="50" selected>50</option>
                                                                <option value="51">51</option>
                                                            </select>
                                                        </div>
                                                        <button type="submit" class="btn-sm bg-primary text-white btn-link mt-2">Godkend</button>
                                                    </form>
                                                </div>

                                            </div>
                                            <div class="col-lg-9">
                                                <div class="text-center align-items-center justify-content-evenly">
                                                    <div class="col-lg-auto pt-lg-0">
                                                        <div class="d-flex align-items-center justify-content-center">
                                                            <?php
                                                            foreach ($vejr as $v){
                                                                ?>
                                                                <div class="align-items-center justify-content-center mx-2">
                                                                    <div><img src="uploads/<?php echo $v->vejrBilled; ?>" alt="vejr Billede" class="img-fluid vejrIcon"></div>
                                                                    <div><?php echo $v->vejrUgeDag;?></div>
                                                                    <div> <?php echo $v->vejrTemp;?>&deg; C</div>
                                                                    <div class="fw-semibold vejrBeskrivelse"> <?php echo $v->vejrBeskrivelse;?></div>
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

                <div class="">
                    <div class="text-farve4 websiteIconBoks">
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
                        <div class="row text-center align-items-center justify-content-evenly py-3 bg-primary">
                            <div class="col-auto pt-lg-0">
                                <div class="d-flex- align-items-center justify-content-center">
                                    <h5 class="pt-1">Sociale Medier</h5>
                                    <div class="row text-center align-items-center">
                                        <div class="col-auto">
                                            <div class="flex-lg-wrap align-items-center justify-content-center shadow">
                                                <a href="https://www.facebook.com/" target="_blank">
                                                    <img src="images/facebook.png" class="websiteIcon" alt="Alternativ tekst">
                                                    <p class="text-white">Facebook</p>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="flex-lg-wrap align-items-center justify-content-center shadow">
                                                <a href="https://www.linkedin.com/feed/?trk=onboarding-landing" target="_blank">
                                                    <img src="images/linkedin.png" class="websiteIcon" alt="Alternativ tekst">
                                                    <p class="text-white">LinkedIn</p>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="flex-lg-wrap align-items-center justify-content-center shadow">
                                                <a href="https://www.instagram.com/" target="_blank">
                                                    <img src="images/instagram.png" class="websiteIcon" alt="Alternativ tekst">
                                                    <p class="text-white">Instagram</p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto pt-lg-0">
                                <div class="d-flex- align-items-center justify-content-center">
                                    <h5 class="pt-1">Nyheder</h5>
                                    <div class="row text-center align-items-center">
                                        <div class="col-auto">
                                            <div class="flex-lg-wrap align-items-center justify-content-center shadow">
                                                <a href="https://nyheder.tv2.dk/" target="_blank">
                                                    <img src="images/tv2.png" class="websiteIcon" alt="Alternativ tekst">
                                                    <p class="text-white">TV2</p>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="flex-lg-wrap align-items-center justify-content-center shadow">
                                                <a href="https://www.dr.dk/nyheder" target="_blank">
                                                    <img src="images/dr.png" class="websiteIcon" alt="Alternativ tekst">
                                                    <p class="text-white">DR</p>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="flex-lg-wrap align-items-center justify-content-center shadow">
                                                <a href="https://trafikkort.vejdirektoratet.dk/index.html" target="_blank">
                                                    <img src="images/vejdirektoratet.png" class="websiteIcon" alt="Alternativ tekst">
                                                    <p class="text-white">Trafik info</p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto pt-lg-0">
                                <div class="d-flex- align-items-center justify-content-center">
                                    <h5 class="pt-1">Lydbøger</h5>
                                    <div class="row text-center align-items-center">
                                        <div class="col-auto">
                                            <div class="flex-lg-wrap align-items-center justify-content-center shadow">
                                                <a href="https://mofibo.com/dk" target="_blank">
                                                    <img src="images/mofibo.png" class="websiteIcon" alt="Alternativ tekst">
                                                    <p class="text-white">Mofibo</p>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="flex-lg-wrap align-items-center justify-content-center shadow">
                                                <a href="https://www.saxo.com/dk" target="_blank">
                                                    <img src="images/saxo.png" class="websiteIcon" alt="Alternativ tekst">
                                                    <p class="text-white">Saxo</p>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="flex-lg-wrap align-items-center justify-content-center shadow">
                                                <a href="https://ereolen.dk/Generelt-PR-materiale" target="_blank">
                                                    <img src="images/ereolen.png" class="websiteIcon" alt="Alternativ tekst">
                                                    <p class="text-white">eReolen</p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto pt-lg-0">
                                <div class="d-flex- align-items-center justify-content-center">
                                    <h5 class="pt-1">Underholdning</h5>
                                    <div class="row text-center align-items-center">
                                        <div class="col-auto">
                                            <div class="flex-lg-wrap align-items-center justify-content-center shadow">
                                                <a href="https://www.dr.dk/drtv/tv-guide" target="_blank">
                                                    <img src="images/tvguiden.png" class="websiteIcon " alt="Alternativ tekst">
                                                    <p class="text-white">TV-Guiden</p>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="flex-lg-wrap align-items-center justify-content-center shadow">
                                                <a href="https://samvirke.dk/" target="_blank">
                                                    <img src="images/samvirke.png" class="websiteIcon" alt="Alternativ tekst">
                                                    <p class="text-white">Samvirke</p>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="flex-lg-wrap align-items-center justify-content-center shadow">
                                                <a href="https://https://www.aeldresagen.dk/" target="_blank">
                                                    <img src="images/aeldresagen.png" class="websiteIcon" alt="Alternativ tekst">
                                                    <p class="text-white">Ældresagen</p>
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
            <div class="col-12 col-lg-2 d-flex justify-content-center justify-content-lg-start bg-primary">
                <img src="images/annoncer.png" class="img-fluid mx-auto mx-lg-0">
            </div>

        </div>

    </div>


</div>


<!------------------------------------------------- Footer ------------------------------------------------------------>
<?php include "include/footer.php"; ?>

<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

