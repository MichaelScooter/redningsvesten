<?php
require "settings/init.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $eventsSted = (!empty($_POST["eventsSted"])) ? $_POST["eventsSted"] : "Nakskov";
    $eventsMdr = (!empty($_POST["eventsMdr"])) ? $_POST["eventsMdr"] : "januar";
} else {
    // If the form is not submitted, use default values
    $eventsSted = "Nakskov";
    $eventsMdr = "januar";
}

$events = $db->sql("SELECT * FROM events WHERE eventsSted = :eventsSted AND eventsMdr = :eventsMdr", [":eventsSted" => $eventsSted, ":eventsMdr" => $eventsMdr]);
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

<div class="container-fluid min-vh-100 pt-lg-3">
    <div class="container">
        <div class=" ">
            <h1>Events</h1>
        <div class="row">
            <div class="col-lg-3 align-items-center">
                <div class="flex-lg-wrap align-items-center justify-content-center ps-lg-3">
                    <h5 class="pt-1 border-bottom border-1 border-primary fw-semibold ">Sortér - <span class="">Vælg & Godkend</span></h5>
                    <form action="" method="post" class="">
                        <div class="row">
                            <div class="col-8">
                                <span class="">By:</span>
                                <select name="eventsSted" class="w-100 border-secondary">
                                    <option value="Nakskov" <?php if ($eventsSted === "Nakskov") echo "selected"; ?>>Nakskov</option>
                                    <option value="København" <?php if ($eventsSted === "København") echo "selected"; ?>>København</option>
                                </select>
                            </div>
                            <div class="col-4">
                                <span class="">Måned:</span>
                                <select name="eventsMdr" class="w-100 border-secondary">
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
                        </div>
                        <button type="submit" class="btn-sm bg-primary text-white btn-link mt-2">Godkend</button>
                    </form>
                </div>
            </div>


        </div>
        </div>
        <div class="row g-4 pt-5">
            <?php
            foreach ($events as $event){
            ?>
            <div class="col-md-6 col-lg-4 col-xl-6">
                <div class="card d-xl-none mt-4 p-3 shadow h-100">
                    <img src="uploads/<?php echo $event->eventsIcon; ?>" class="card-img-top img-fluid" alt="Billede til Mandekrisecenterets event">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $event->eventsNavn;?></h5>
                        <p class="card-text pb-3"><?php echo $event->eventsBeskrivelse;?></p>
                        <a href="event.php?eventsId=<?php echo $event->eventsId; ?>" class="btn btn-primary text-white w-100">Se event</a>
                    </div>
                </div>

                <div class="d-none d-xl-block bg-white shadow border border-1 border-light-subtle rounded-4 h-100 p-3">
                    <div class="row h-100">
                        <div class="col-lg-8 d-flex flex-column">
                            <h5 class=""><?php echo $event->eventsNavn;?></h5>
                            <p class="card-text pb-3"><?php echo $event->eventsBeskrivelse;?></p>
                            <a href="event.php?eventsId=<?php echo $event->eventsId; ?>" class="btn btn-primary text-white w-50 mt-auto">Se event</a>
                        </div>
                        <div class="col-lg-4">
                            <img src="uploads/<?php echo $event->eventsIcon; ?>" class="card-right img-fluid" alt="Billede til Mandekrisecenterets event">
                        </div>
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

