<!DOCTYPE html>
<html lang="da">
<head>

    <title>Oversigt</title>
    <meta name="description" content="Digital Redningsvest - vejr oversigt !">

    <?php include "include/head.php"; ?>

</head>
<!------------------------------------------------- Body -------------------------------------------------------------->
<body>
<?php include "include/navigation.php"; ?>


<div class="container-fluid p-5 min-vh-100 heroImage">
        <div class="pb-5 pb-lg-0 px-lg-5">
            <div class="vejrtabel pb-5 p-md-5">
                <div class="filter pt-3 py-lg-5">
                    <div class="row">
                        <h1 class="text-primary text-center">By</h1>
                        <div class="col-md-4 offset-md-4 pt-5 pt-md-0" >
                            <input type="search" class="form-control nameSearch" placeholder="Vælg by - (københavn, Odense eller Århus">
                        </div>
                    </div>
                </div>

                <div class="items px-lg-4 pb-5">
                    <!-- Her vises emnerne -->
                </div>
            </div>
        </div>
    </div>





<!------------------------------------------------- Footer ------------------------------------------------------------>
<?php include "include/footer.php"; ?>

<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script type="module">
    import VejrTabel from "./js/oversigttabel.js";

    const vejrtabel = new VejrTabel();
    vejrtabel.init();

</script>
</body>
</html>


