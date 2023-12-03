<?php
require "settings/init.php";

if (!empty($_POST["data"])) {
    $data = $_POST["data"];
    $file = $_FILES;

    if (!empty($file["vejrBilled"]["tmp_name"])) {
        move_uploaded_file($file["vejrBilled"]["tmp_name"], "uploads/" . basename($file["vejrBilled"]["name"]));
    }



    $sql = "INSERT INTO kode (vejrBy, vejrUgeNr, vejrUgeDag, vejrBeskrivelse, vejrTemp, vejrMinTemp, vejrMaxTemp, vejrUx, vejrBilled, vejrRegn) 
            VALUES (:vejrBy, :vejrUgeNr, :vejrUgeDag, :vejrBeskrivelse, :vejrTemp, :vejrMinTemp, :vejrMaxTemp, :vejrUx, :vejrBilled, :vejrRegn)";
    $bind = [
        ":vejrBy" => $data["vejrBy"],
        ":vejrUgeNr" => $data["vejrUgeNr"],
        ":vejrUgeDag" => $data["vejrUgeDag"],
        ":vejrBeskrivelse" => $data["vejrBeskrivelse"],
        ":vejrTemp" => $data["vejrTemp"],
        ":vejrMinTemp" => $data["vejrMinTemp"],
        ":vejrMaxTemp" => $data["vejrMaxTemp"],
        ":vejrUx" => $data["vejrUx"],
        ":vejrBilled" => (!empty($file["vejrBilled"]["tmp_name"])) ? $file["vejrBilled"]["name"] : NULL,
        ":vejrRegn" => $data["vejrRegn"],
    ];

    if (!empty($data["vejrBy"]) && !empty($data["vejrUgeNr"]) && !empty($data["vejrUgeDag"]) && !empty($data["vejrBeskrivelse"]) && !empty($data["vejrTemp"]) && !empty($data["vejrMinTemp"]) && !empty($data["vejrMaxTemp"]) && !empty($data["vejrUx"]) && !empty($data["vejrBilled"])&& !empty($data["vejrRegn"])) {
        $db->sql($sql, $bind, false);

        $statusMsg = "<h3 class='text-success pt-3 ps-3'>Vejr dagen blev oprettet korrekt.</h3><a href='insert.php' class='text-white ps-3'><span class='text-decoration-none'>Opret en ny vejr dag:</span></a>";

        header('Location: ' . '/redningsvesten/oversigt.php');
    } else {
        $statusMsg = "<h3 class='text-danger pt-3 ps-3'>Vejr dagen blev IKKE indsat</h3><a href='insert.php' class='text-white ps-3'><span class='text-decoration-underline'>Prøv igen</span></a>";
    }
}
?>

<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>Opret vejr dag</title>
    <meta name="description" content="Opret vejr dag">

    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">

    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/styles.css" rel="stylesheet" type="text/css">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://cdn.tiny.cloud/1/071g1xh1hwccgkhfewg0rdoqybb95uwgaiyhpb7xt8dyxzce/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>



</head>

<body>

<?php include "include/navigation.php"; ?>
<div class="container-fluid bg-light p-5 mb-5 mb-lg-0 heroImage heroOverlay min-vh-100">
    <div class="px-lg-5">
        <div class=" py-5 pb-5 px-lg-5 mb-5 mb-lg-0 ">
            <div class="text-center ">
                <h1 class="text-primary ps-3">Oprettelse af vejr dage</h1>
                <p class="text-white pb-3 ps-3 mb-0">Udfyld <span class="fst-italic text-primary">ALLE</span> felterne og tryk på "opret kode" knappen</p>
            </div>

            <?php
            if (!empty($statusMsg)) {
                echo $statusMsg;
            }
            ?>

            <div class=" px-5 bg-light border border-dark border-1">
                <form method="post" action="insert.php" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-12 col-md-6 pt-3">
                            <div class="form-group">
                                <label for="vejrBy" class="fw-semibold">By</label>
                                <input class="form-control" type="text" name="data[vejrBy]" id="vejrBy" placeholder="Indtast by navn" value="<?php echo !empty($data["vejrBy"]) ? $data["vejrBy"] : '' ?>" required>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 pt-3">
                            <div class="form-group">
                                <label for="vejrUgeNr" class="fw-semibold">vejrUgeNr</label>
                                <input class="form-control" type="number" name="data[vejrUgeNr]" id="vejrUgeNr" placeholder="Indtast vejrUgeNr" value="">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 pt-3">
                            <div class="form-group">
                                <label for="vejrUgeDag" class="fw-semibold">vejrUgeDag</label>
                                <input class="form-control" type="text" name="data[vejrUgeDag]" id="vejrUgeDag" placeholder="vejrUgeDag" value="">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 pt-3">
                            <div class="form-group">
                                <label for="vejrTemp" class="fw-semibold">vejrTemp</label>
                                <input class="form-control" type="number" name="data[vejrTemp]" id="vejrTemp" placeholder="vejrTemp" value="">
                            </div>
                        </div>

                        <div class="col-12 col-md-6 pt-3">
                            <div class="form-group">
                                <label for="vejrMinTemp" class="fw-semibold">vejrMinTemp</label>
                                <input class="form-control" type="number" name="data[vejrMinTemp]" id="vejrMinTemp" placeholder="vejrMinTemp="">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 pt-3">
                            <div class="form-group">
                                <label for="vejrMaxTemp" class="fw-semibold">vejrMaxTemp</label>
                                <input class="form-control" type="number" name="data[kodeRabatInput]" id="kodeRabatInput" placeholder="vejrMaxTemp" value="">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 pt-3">
                            <div class="form-group">
                                <label for="vejrUx" class="fw-semibold">vejrUx</label>
                                <input class="form-control" type="number" name="data[vejrUx]" id="vejrUx" placeholder="vejrUx" value="">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 pt-3">
                            <div class="form-group">
                                <label for="vejrRegn" class="fw-semibold">vejrRegn</label>
                                <input class="form-control" type="number" name="data[vejrRegn]" id="vejrRegn" placeholder="vejrRegn" value="">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 pt-3">
                            <div class="form-group">
                                <label class="form-label fw-semibold" for="vejrBilled">vejrBilled</label>
                                <input type="file" class="form-control" id="vejrBilled" name="vejrBilled">
                            </div>
                        </div>
                        <div class="col-12 pt-3">
                            <div class="form-group">
                                <label for="vejrBeskrivelse" class="fw-semibold">vejrBeskrivelse</label>
                                <textarea class="form-control" name="data[vejrBeskrivelse]" id="vejrBeskrivelse" placeholder="Skriv vejrBeskrivelse"></textarea>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 offset-md-6 pb-3">
                            <button class="form-control btn btn-success text-white" type="submit" id="btnSubmit">Opret kode</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<script>
    tinymce.init({
        selector: 'textarea',
        height : "200"
    });
</script>

<?php include "include/footer.php"; ?>

</body>
</html>


