?php
$path = explode("/", $_SERVER['REQUEST_URI']);
$url = end($path);
?>

<!-- Navbar - Start -->
<nav class="navbar navbar-expand-lg bg-white fixed-top shadow px-2 px-lg-0">
    <div class="container-fluid px-lg-5">

        <a class="navbar-brand" href="index.php" id="logo">Vinoteque Marittima</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-secondary-hover">
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="index.php">Forside</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="betaling.php">Om os</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="betaling.php">Strand Caféen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="betaling.php">Find Vej</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="betaling.php">Kontakt</a>
                </li>
            </ul>
            <a href="betaling.php" class="btn btn-primary text-white ms-lg-2">Events</a>
            <a href="Tilmelding.php" class="btn btn-secondary text-white ms-lg-2">Tilmelding</a>
        </div>
    </div>
</nav>