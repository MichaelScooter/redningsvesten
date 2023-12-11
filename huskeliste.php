<!DOCTYPE html>
<html lang="da">
<head>

    <title>Din Digitale Redningsvest</title>
    <meta name="description" content="Digital Redningsvest - Gør det Nemt & Enkelt !">

    <?php include "include/head.php"; ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">

</head>
<!------------------------------------------------- Body -------------------------------------------------------------->
<body>
<?php include "include/navigation.php"; ?>

<div class="container pt-5 bg-light huskelisten">
    <i class="fas fa-list-ul fa-2x"></i>
    <h1 class="pt-5">Huskeliste</h1>
    <p class="lead">Skriv det du skal huske og tryk på gem knappen</p>

    <div id="inputArea">
        <input type="text" placeholder="Skriv det du skal huske og tryk på "gem-knappen"...">
        <button><i class="fas fa-pencil-alt"></i>Gem</button>
    </div>

    <ul id="toDoList"></ul>
</div>

<!------------------------------------------------- Footer ------------------------------------------------------------>
<?php include "include/footer.php"; ?>

<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script type="module" src="js/app.js"></script>
</body>
</html>
