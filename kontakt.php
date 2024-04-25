<!DOCTYPE html>
<html lang="da">
<head>

    <title>Mandekrisecenter - Kontakt</title>
    <meta name="description" content="Mandekrisecenter Kontakt">

    <?php include "include/head.php"; ?>

</head>
<!------------------------------------------------- Body -------------------------------------------------------------->
<body>
<?php include "include/navigation.php"; ?>

<div class="container-fluid g-0">
    <div>
        <div class="position-relative">
            <img src="images/forside-personer-lav.jpg" alt="Kontakt Vinoteque for at få svar på spørgsmål eller bestille en unik oplevelse" class="w-100">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center">
                <div class="text-center text-white row pt-3 pt-lg-5">
                    <h1>Kontakt</h1>
                    <p class="lead">fhfhf jkjlkl ælælæ</p>
                </div>
            </div>
        </div>
    </div>
    <!-- kontakt formular -->
    <div class="d-flex justify-content-center align-items-center my-5 mx-lg-5">
        <div class="form col-auto rounded-3 p-3 p-lg-5 bg-light shadow" style="width: 90%;">
            <h2 class="text-uppercase">Skriv en besked</h2>
            <form>
                <div class="mb-3">
                    <label for="navn" class="form-label pt-2">Navn</label>
                    <input type="text" class="form-control" id="navn" name="navn">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label pt-5">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="emne" class="form-label pt-5">Emne</label>
                    <input type="text" class="form-control" id="emne" name="emne"> <!-- Tilføjet id og name attributter -->
                </div>
                <div class="mb-3">
                    <label for="besked" class="form-label pt-5">Besked</label>
                    <textarea class="form-control" id="besked" name="besked" rows="5"></textarea> <!-- Tilføjet id og name attributter -->
                </div>
                <button type="submit" class="btn btn-secondary">Send besked</button>
            </form>
        </div>
    </div>
</div>


<!------------------------------------------------- Footer ------------------------------------------------------------>
<?php include "include/footer.php"; ?>

<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

