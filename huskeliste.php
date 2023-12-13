<!DOCTYPE html>
<html lang="da">
<head>

    <title>Huskeliste</title>
    <meta name="description" content="Huskeliste - Gør det Nemt & Enkelt !">

    <?php include "include/head.php"; ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">

</head>
<!------------------------------------------------- Body -------------------------------------------------------------->
<body>
<?php include "include/navigation.php"; ?>
<div class="container-fluid">
    <div class="pt-lg-5 text-center">
        <div class="pt-5 huskelisten">

        <h1 class="pt-5">Huskeliste</h1>
        <p class="lead"> Hvis en opgave er udført og du ønsker den forbliver på listen, <br>så kan du klikke på den og den bliver grøn.</p>

            <div class="bg-primary p-5 mt-3">
                <div id="inputArea">
                    <input type="text" placeholder="Skriv her og tryk på 'Gem' knappen &rarr;">
                    <button><i class="fas fa-pencil-alt"></i>Gem</button>
                </div>

            <ul id="toDoList" class="pt-lg-2"></ul>
            </div>
        </div>
    </div>
</div>
<!------------------------------------------------- Footer ------------------------------------------------------------>
<?php include "include/footer.php"; ?>

<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script type="module" src="js/app.js"></script>
</body>
</html>
