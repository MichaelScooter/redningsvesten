<?php
require "settings/init.php";

// Hent alle arrangementer som standard
$events = $db->sql("SELECT * FROM events");


?>

<!DOCTYPE html>
<html lang="da">
<head>

    <title>Mandekrisecenter Lolland - Tilmelding af foredrag & Arrangementer</title>
    <meta name="description" content="Mandekrisecenter Lolland - Tilmelding af foredrag & Arrangementer">

    <?php include "include/head.php"; ?>

</head>
<!------------------------------------------------- Body -------------------------------------------------------------->
<body>
<?php include "include/navigation.php"; ?>

<!-- 1. sektion ----------------------------------------------------------------------------------------------------->
<div class="container-fluid bg-farve3">
    <div class="container py-5">
        <div class="row pt-2 ">
            <div class="d-flex justify-content-center mt-5" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page"><span class="text-decoration-underline">1. Køb billetter</span></li>
                    <li class="breadcrumb-item"><a href="betaling.php" class="text-primary">2. Betaling</a></li>
                </ol>
            </div>
            <div>
                <h2 class="text-farve5">Køb Billetter</h2>
                <p class="lead">Når du har gennemført købet, vil du øjeblikkeligt modtage de købte billetter via e-mail.</p>

                <hr>

                <!-- Indledningstekst START -------------------------------------------------------------------------------------->
                <div class="row p-0 pt-4">
                    <div class="col-lg-8">

                        <div class="pt-3 pt-lg-0 ">
                            <p>På betalingssiden skal du indtaste din e-mailadresse og du vil modtage dine billetter øjeblikkeligt.</p>
                            <p>Det er derfor vigtigt, at du indtaster din korrekte e-mailadresse for at modtage billetterne efter købet.</p>
                            <p>Hvis du får brug for hjælp: <a href="kontakt.php">skriv</a> eller <a href="tel:+4540792019">ring</a> til os på 40 79 20 19</p>
                            <p class="text-primary pt-3 lead fw-medium">Rabat kode</p>
                            <p class="pt-3">Hvis du har modtaget en rabatkode, så indtaster du bare den og trykker på indløs knappen, så bliver rabatten modregnet automatisk.</p>

                        </div>
                    </div>

                    <!-- Billede -->
                    <div class="col-lg-3 d-flex justify-content-center">
                        <img src="images/billet.svg" alt="Mandekrisecenter Lollands svar på oftest stillede spørgsmål." class=" ps-lg-5 px-lg-3 w-100">
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>


<main>
    <div class="ps-3 ps-lg-0">
        <div class="row">
            <div class="col-12 col-lg-6 basket">
                <div class="basket-module">
                    <label for="promo-code">Indtast rabat kode:</label>
                    <input id="promo-code" type="text" name="promo-code" maxlength="5" class="promo-code-field">
                    <button class="promo-code-cta  btn btn-farve5 text-white">Indløs</button>

                </div>
                <div class="basket-labels">
                    <ul>
                        <li class="item item-heading">Event</li>
                        <li class="price">Pris</li>
                        <li class="quantity">Antal</li>
                        <li class="subtotal">Subtotal</li>
                    </ul>
                </div>

                <!-- Events -->
                <div>
                <?php
                foreach ($events as $event){
                ?>
                <div class="basket-product">
                    <div class="item">
                        <div class="product-image">
                            <img src="uploads/<?php echo $event->eventsIcon; ?>" alt="Placholder Image 2" class="product-frame">
                        </div>
                        <div class="product-details">
                            <h6>1 x billet</h6>
                            <p><strong><?php echo $event->eventsTitel;?></strong></p>
                            <p><?php echo $event->eventsDag; ?> <?php echo $event->eventsDato; ?>. <?php echo $event->eventsMdr; ?></p>
                            <p>kl. <?php echo $event->eventsTid; ?></p>
                        </div>
                    </div>
                    <div class="price"><?php echo $event->eventsPris;?></div>
                    <div class="quantity">
                        <input type="number" value="0" min="0" class="quantity-field">
                    </div>
                    <div class="subtotal">0.00</div>

                </div>
                <?php } ?>
                </div>




            </div>

            <aside class="col-12 col-lg-6 pt-5">
                <div class="summary">
                    <div class="summary-total-items"><span class="total-items"></span> Billetter</div>
                    <div class="summary-subtotal">
                        <div class="subtotal-title">Subtotal</div>
                        <div class="subtotal-value final-value" id="basket-subtotal">0.00</div>
                        <div class="summary-promo hide">
                            <div class="promo-title">Rabat</div>
                            <div class="promo-value final-value" id="basket-promo"></div>
                        </div>
                    </div>

                    <div class="summary-total">
                        <div class="total-title">Total</div>
                        <div class="total-value final-value" id="basket-total">0.00</div>
                    </div>
                    <div class="summary-checkout">
                        <a href="betaling.php" class="checkout-cta btn btn-farve5 text-white "style="font-family: montserrat">Gå til sikker betaling</a>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</main>

<!------------------------------------------------- Footer ------------------------------------------------------------>
<?php include "include/footer.php"; ?>

<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<!-- Tilmeldingsside -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    /* Set values + misc */
    var promoCode;
    var promoPrice;
    var fadeTime = 300;

    /* Assign actions */
    $(".quantity input").change(function () {
        updateQuantity(this);
    });

    $(".remove button").click(function () {
        removeItem(this);
    });

    $(document).ready(function () {
        updateSumItems();
    });

    $(".promo-code-cta").click(function () {
        promoCode = $("#promo-code").val();

        if (promoCode == "ven" || promoCode == "ven") {
            //If promoPrice has no value, set it as 10 for the 10OFF promocode - Michael Har ændret til VEN
            if (!promoPrice) {
                promoPrice = 100;
            } else if (promoCode) {
                promoPrice = promoPrice * 1;
            }
        } else if (promoCode != "") {
            alert("Invalid Promo Code");
            promoPrice = 0;
        }
        //If there is a promoPrice that has been set (it means there is a valid promoCode input) show promo
        if (promoPrice) {
            $(".summary-promo").removeClass("hide");
            $(".promo-value").text(promoPrice.toFixed(2));
            recalculateCart(true);
        }
    });

    /* Recalculate cart */
    function recalculateCart(onlyTotal) {
        var subtotal = 0;

        /* Sum up row totals */
        $(".basket-product").each(function () {
            subtotal += parseFloat($(this).children(".subtotal").text());
        });

        /* Calculate totals */
        var total = subtotal;

        //If there is a valid promoCode, and subtotal < 10 subtract from total
        var promoPrice = parseFloat($(".promo-value").text());
        if (promoPrice) {
            if (subtotal >= 10) {
                total -= promoPrice;
            } else {
                alert("For at kunne indløse rabatten, så skal der være noget i kurven!");
                $(".summary-promo").addClass("hide");
            }
        }

        /*If switch for update only total, update only total display*/
        if (onlyTotal) {
            /* Update total display */
            $(".total-value").fadeOut(fadeTime, function () {
                $("#basket-total").html(total.toFixed(2));
                $(".total-value").fadeIn(fadeTime);
            });
        } else {
            /* Update summary display. */
            $(".final-value").fadeOut(fadeTime, function () {
                $("#basket-subtotal").html(subtotal.toFixed(2));
                $("#basket-total").html(total.toFixed(2));
                if (total == 0) {
                    $(".checkout-cta").fadeOut(fadeTime);
                } else {
                    $(".checkout-cta").fadeIn(fadeTime);
                }
                $(".final-value").fadeIn(fadeTime);
            });
        }
    }

    /* Update quantity */
    function updateQuantity(quantityInput) {
        /* Calculate line price */
        var productRow = $(quantityInput).parent().parent();
        var price = parseFloat(productRow.children(".price").text());
        var quantity = $(quantityInput).val();
        var linePrice = price * quantity;

        /* Update line price display and recalc cart totals */
        productRow.children(".subtotal").each(function () {
            $(this).fadeOut(fadeTime, function () {
                $(this).text(linePrice.toFixed(2));
                recalculateCart();
                $(this).fadeIn(fadeTime);
            });
        });

        productRow.find(".item-quantity").text(quantity);
        updateSumItems();
    }

    function updateSumItems() {
        var sumItems = 0;
        $(".quantity input").each(function () {
            sumItems += parseInt($(this).val());
        });
        $(".total-items").text(sumItems);
    }

    /* Remove item from cart */
    function removeItem(removeButton) {
        /* Remove row from DOM and recalc cart total */
        var productRow = $(removeButton).parent().parent();
        productRow.slideUp(fadeTime, function () {
            productRow.remove();
            recalculateCart();
            updateSumItems();
        });
    }
</script>


</body>
</html>