<?php
require "settings/init.php";

// Hent alle arrangementer som standard
$events = $db->sql("SELECT * FROM events");

// Definer standardværdier for by og måned
$eventsSted = "";
$eventsMdr = "";
$eventsType = "";

// Hvis formularen er blevet sendt, filtrer arrangementerne baseret på brugerens valg af by og måned
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $eventsSted = isset($_POST["eventsSted"]) ? $_POST["eventsSted"] : "";
    $eventsMdr = isset($_POST["eventsMdr"]) ? $_POST["eventsMdr"] : "";
    $eventsType = isset($_POST["eventsType"]) ? $_POST["eventsType"] : "";

    // Hvis både by og måned er valgt, filtrer arrangementerne efter begge
    if (!empty($eventsSted) && !empty($eventsMdr)&& !empty($eventsType)) {
        $events = $db->sql("SELECT * FROM events WHERE eventsSted = :eventsSted AND eventsMdr = :eventsMdr AND eventsMdr = :eventsType ", [":eventsSted" => $eventsSted, ":eventsMdr" => $eventsMdr, ":eventsType" => $eventsType]);
    }
    // Hvis kun by er valgt, filtrer arrangementerne efter by
    elseif (!empty($eventsSted)) {
        $events = $db->sql("SELECT * FROM events WHERE eventsSted = :eventsSted", [":eventsSted" => $eventsSted]);
    }
    // Hvis kun måned er valgt, filtrer arrangementerne efter måned
    elseif (!empty($eventsMdr)) {
        $events = $db->sql("SELECT * FROM events WHERE eventsMdr = :eventsMdr", [":eventsMdr" => $eventsMdr]);
    }
    // Hvis kun måned er valgt, filtrer arrangementerne efter måned
    elseif (!empty($eventsType)) {
        $events = $db->sql("SELECT * FROM events WHERE eventsType = :eventsType", [":eventsType" => $eventsType]);
    }
}

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

<div class="container-fluid min-vh-100 pt-lg-3 g-0">
    <div class="position-relative">
        <img src="images/forside-personer-lav.jpg" alt="Eventbilledet til Mandekrisecenterets foredrag og arrangementer" class="w-100">
        <div class="position-absolute top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center overlay">
            <div class="text-center row pt-3 pt-lg-5">
                <p class="text-primary display-6">Events</p>
                <h1 class="text-white display-4 fw-medium">Mandekrisecenter Lolland</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <!-- 1 sektion -------------------------------------------------------------------------------------------------------->
        <div class="container-fluid bg-farve3">
            <div class="container py-5">
                <div class="row pt-2 pt-lg-5">
                    <div>
                        <h2 class="text-farve5">Events</h2>
                        <p class="lead">Se alle vores foredrag og arrangementer</p>

                        <hr>

                        <!-- Indledningstekst START -------------------------------------------------------------------------------------->
                        <div class="row p-0 pt-4">
                            <div class="col-lg-8">

                                <div>
                                    <p>Oplev glæde, styrke og fællesskab igennem vores inspirerende foredrag og engagerende arrangementer. Skab meningsfulde forbindelser og personlig vækst i et støttende miljø, hvor vi sammen skaber en positiv fremtid. Velkommen til et sted, hvor mænd kan finde glæde og styrke i fællesskabet!</p>
                                    <p class="text-primary pt-3 lead fw-medium">Sortér - Vælg & Godkend</p>
                                    <form action="" method="post" class="">
                                        <div class="row">
                                            <div class="col-4">
                                                <span class="">By:</span>
                                                <select name="eventsSted" class="w-100 border-secondary">
                                                    <option value="" <?php if ($eventsSted === "") echo "selected"; ?>>Alle</option>
                                                    <option value="Nakskov" <?php if ($eventsSted === "Nakskov") echo "selected"; ?>>Nakskov</option>
                                                    <option value="København" <?php if ($eventsSted === "København") echo "selected"; ?>>København</option>
                                                </select>
                                            </div>
                                            <div class="col-4">
                                                <span class="">Måned:</span>
                                                <select name="eventsMdr" class="w-100 border-secondary">
                                                    <option value="" <?php if ($eventsMdr === "") echo "selected"; ?>>Alle</option>
                                                    <option value="januar" <?php if ($eventsMdr === "januar") echo "selected"; ?>>januar</option>
                                                    <option value="februar" <?php if ($eventsMdr === "februar") echo "selected"; ?>>februar</option>
                                                    <option value="marts" <?php if ($eventsMdr === "marts") echo "selected"; ?>>marts</option>
                                                    <option value="april" <?php if ($eventsMdr === "april") echo "selected"; ?>>april</option>
                                                    <option value="maj" <?php if ($eventsMdr === "maj") echo "selected"; ?>>maj</option>
                                                    <option value="juni" <?php if ($eventsMdr === "juni") echo "selected"; ?>>juni</option>
                                                    <option value="juli" <?php if ($eventsMdr === "juli") echo "selected"; ?>>juli</option>
                                                    <option value="august" <?php if ($eventsMdr === "august") echo "selected"; ?>>august</option>
                                                    <option value="september" <?php if ($eventsMdr === "september") echo "selected"; ?>>september</option>
                                                    <option value="oktober" <?php if ($eventsMdr === "oktober") echo "selected"; ?>>oktober</option>
                                                    <option value="november" <?php if ($eventsMdr === "november") echo "selected"; ?>>november</option>
                                                    <option value="december" <?php if ($eventsMdr === "december") echo "selected"; ?>>december</option>
                                                </select>
                                            </div>
                                            <div class="col-4">
                                                <span class="">Eventtype:</span>
                                                <select name="eventsType" class="w-100 border-secondary">
                                                    <option value="" <?php if ($eventsType === "") echo "selected"; ?>>Alle</option>
                                                    <option value="Foredrag" <?php if ($eventsType === "Foredrag") echo "selected"; ?>>Foredrag</option>
                                                    <option value="Arrangement" <?php if ($eventsType === "Arrangement") echo "selected"; ?>>Arrangement</option>
                                                </select>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn bg-secondary text-white mt-3">Godkend</button>
                                    </form>

                                </div>

                            </div>

                            <!-- Billede -->
                            <div class="col-lg-4 d-flex justify-content-center d-none d-lg-block">
                                <img src="images/events.svg" alt="Et team billedet af Mandekrisecenterets medarbejder" class=" px-lg-5 w-75">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row g-4 pt-lg-5 pb-5">
            <?php
            foreach ($events as $event){
                ?>
                <div class="col-md-6 col-xl-3">
                    <div class="card mt-4 px-3 pt-3 shadow h-100">
                        <div class="row">
                            <div class="card-body col-8 col-lg-9">
                                <p class="card-title fw-medium eventCardTitle text-farve5"><?php echo $event->eventsTitel;?></p>
                                <p class="">Sted: <?php echo $event->eventsSted;?></p>
                                <p class="">Vært: <?php echo $event->eventsAnsvarlig;?></p>
                                <p class="">Pris kr. : <?php echo $event->eventsPris;?></p>

                            </div>
                             <div class="col-4 col-lg-3">
                                 <img src="uploads/<?php echo $event->eventsIcon; ?>" class="card-img-top img-fluid" alt="Billede til Mandekrisecenterets event">
                             </div>

                         </div>
                        <div class="">
                            <a href="event.php?eventsId=<?php echo $event->eventsId; ?>" class="btn btn-primary text-white w-100">Se event</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>



<!------------------------------------------------- Footer ------------------------------------------------------------>
<div class="mt-5 mt-lg-2"><?php include "include/footer.php"; ?></div>

<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
