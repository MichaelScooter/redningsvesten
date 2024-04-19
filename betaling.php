<!DOCTYPE html>
<html lang="da">
<head>

    <title>Betalingsside</title>
    <meta name="description" content="Mandekrisecenter - Betaling af Foredrag/Arrangementer">

    <?php include "include/head.php"; ?>

</head>
<!------------------------------------------------- Body -------------------------------------------------------------->
<body>
<?php include "include/navigation.php"; ?>

<div class="container vh-100">
    <div class="row">
        <div class="text-center pt-lg-2">
            <div class="d-flex justify-content-center mt-5" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="Tilmelding.php" class="text-primary">1. Vælg foredrag</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><span class="text-decoration-underline">2. Betaling</span></li>

                </ol>
            </div>
            <h2 class="text-primary">Betaling</h2>
            <p class="lead text-secondary fw-medium">Vi bruger sikker betaling</p>
            <p>Vi bruger krypteringsteknologi til at beskytte dine betalingsoplysninger. <br>Dermed at du sikret, at dine oplysninger ikke kan ses af andre end os. </p>
        </div>
    </div>
    <div class="pt-4 betalingsSiden mx-lg-5">
        <div class="card-body pt-5 pt-lg-0">
            <div class="d-flex justify-content-center">
                <div class="row">
                    <div class="col-12 col-lg-6 pe-lg-5">
                        <div class="payment">
                            <div class="creditcard mx-auto"> <!-- Tilføjet "mx-auto" klasse -->
                                <div class="thecard">
                                    <div class="top-card">
                                        <div class="circle"></div>
                                        <div class="card-title">
                                            Visakort
                                        </div>
                                    </div>
                                    <div class="card-info">
                                        <div class="card-number">
                                            1234 5678 9012 3456
                                        </div>
                                        <div class="exp-date">
                                            01 / 2018
                                        </div>
                                        <div class="card-holder">
                                            Jens Jensen
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-6 ps-lg-5">
                        <div class="payment py-4">
                            <div class="formBetaling mx-auto"> <!-- Tilføjet "mx-auto" klasse -->
                                <form action="" method="get">
                                    <label for="cardnumber">Kort nummer</label>
                                    <input type="text" id="cardnumber" class="form-control" placeholder="1234 5678 9012 3456">
                                    <label for="cardholder">Navn på kortet</label>
                                    <input type="text" id="cardholder" class="form-control" placeholder="F.eks. Jens Jensen">
                                    <label for="exp">Udløbsdato</label>
                                    <div class="date d-flex">
                                        <select name="month" id="month" class="form-control">
                                            <option value="january">Januar</option>
                                            <option value="february">Februar</option>
                                            <option value="march">Marts</option>
                                            <option value="april">April</option>
                                            <option value="may">Maj</option>
                                            <option value="june">Juni</option>
                                            <option value="july">Juli</option>
                                            <option value="august">August</option>
                                            <option value="september">September</option>
                                            <option value="october">Oktober</option>
                                            <option value="november">November</option>
                                            <option value="december">December</option>
                                        </select>
                                        <select name="Year" class="form-control">
                                            <option value="2018">2018</option>
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                        </select>
                                    </div>
                                    <div class="small">
                                        <div class="cvc">
                                            <label for="cvc">CVC</label>
                                            <input type="text" id="cvc" class="form-control" maxlength="3" size="4" placeholder="123">
                                        </div>
                                        <p class="cifferTekstBetalingskort pt-3">Tre eller fire cifre, som normalt findes på bagsiden af kortet</p>
                                    </div>
                                    <label for="email">E-mail</label> <!-- Ny label til e-mail-indtastningsfelt -->
                                    <input type="email" id="email" class="form-control" placeholder="Indtast din e-mailadresse" required> <!-- E-mail-indtastningsfelt med påkrævet attribut -->

                                    <button class="btn bg-secondary text-white mt-3">Godkend køb</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!------------------------------------------------- Footer ------------------------------------------------------------>
<?php include "include/footer.php"; ?>

<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
