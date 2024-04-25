<?php
require "settings/init.php";

if(!empty($_GET["type"])) {
    if($_GET["type"] == "slet"){
        $id = $_GET["id"];

        $db->sql("DELETE FROM events WHERE eventsId = :eventsId", [":eventsId"=>$id], false);
    }


}

$events = $db->sql("SELECT * FROM events WHERE eventsId = :eventsId", [":eventsId" => $_GET["eventsId"]]);

?>



<!DOCTYPE html>
<html lang="da">
<head>

    <title>Mandekrisecenter Lolland - Event</title>
    <meta name="description" content="Mandekrisecenter Lolland - Event">

    <?php include "include/head.php"; ?>

</head>
<!------------------------------------------------- Body -------------------------------------------------------------->
<body>
<?php include "include/navigation.php"; ?>

<!-- 1. sektion ----------------------------------------------------------------------------------------------------->
<div class="container-fluid g-0">
    <?php
    foreach ($events as $event){
    ?>
        <div>
            <div class="position-relative">
                <img src="images/forside-personer-lav.jpg" alt="Eventbilledet til Mandekrisecenterets foredrag og arrangementer" class="w-100">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center">
                    <div class="text-center row pt-3 pt-lg-5">
                        <p class="text-primary display-6"><?php echo $event->eventsType; ?></p>
                        <h1 class="text-white display-4 fw-medium">  <?php echo $event->eventsNavn; ?></h1>
                    </div>
                </div>
            </div>
        </div>

    <div class="container py-5 ps-5 ps-lg-0">
        <div class="row pt-2 pt-lg-3">

                    <div class="row align-items-center px-lg-5">


                            <h2 class="text-farve5 text-center text-lg-start eventTitel">  <?php echo $event->eventsTitel; ?></h2>
                            <p class="lead text-center text-lg-start eventLead"><?php echo $event->eventsLead; ?></p>
                            <div class="d-lg-none d-flex justify-content-center px-5">
                                <img src="uploads/<?php echo $event->eventsIcon; ?>" alt="Mandekrisecenter Lollands svar på oftest stillede spørgsmål." class=" px-5 w-100">
                            </div>
                            <hr>

                            <!-- Indledningstekst START -------------------------------------------------------------------------------------->
                            <div class="row p-0">
                                <div class="col-lg-8">

                                        <p class="fw-medium"> <?php echo $event->eventsSted; ?>: <?php echo $event->eventsDag; ?> <?php echo $event->eventsDato; ?>. <?php echo $event->eventsMdr; ?> kl. <?php echo $event->eventsTid; ?></p>
                                        <p class="pt-3"> <?php echo $event->eventsBeskrivelse; ?></p>
                                        <p class="pt-3 lead fw-medium text-center text-lg-start">Pris pr. person kr.  <?php echo number_format($event->eventsPris, 2, ",", "."); ?></p>
                                        <div class="pt-3 text-center text-lg-start">
                                            <a href="Tilmelding.php" class="btn btn-primary text-white">Tilmeld</a>
                                            <a href="events.php" class="btn btn-secondary text-white">Events</a>
                                        </div>

                                </div>

                                <!-- Billede -->
                                <div class="col-lg-4 d-flex justify-content-center d-none d-lg-block ">
                                    <img src="uploads/<?php echo $event->eventsIcon; ?>" alt="Mandekrisecenter Lollands svar på oftest stillede spørgsmål." class=" ps-lg-5 w-100">
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
