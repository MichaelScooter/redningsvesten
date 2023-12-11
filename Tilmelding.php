<!DOCTYPE html>
<html lang="da">
<head>

    <title>Tilmelding</title>
    <meta name="description" content="Digital Redningsvest - vejr oversigt !">

    <?php include "include/head.php"; ?>

</head>
<!------------------------------------------------- Body -------------------------------------------------------------->
<body>
<?php include "include/navigation.php"; ?>

<!-- Her skal sidens indhold ligge -->



<div class="container pt-lg-5">
    <div class="d-flex justify-content-center mt-5" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><span class="text-decoration-underline"> 1. Vælg abonnement</span></li>
            <li class="breadcrumb-item"><a href="betaling.php" class="text-primary">2. Betaling</a></li>
        </ol>
    </div>

    <div class="row">
        <div class="text-center">
            <h2 class="pt-lg-2">Læg i kurven</h2>
            <p class="lead text-secondary fw-normal">Vælg abonnement - (årligt / månedligt)</p>
            <p>Når du har gennemført købet, vil du øjeblikkeligt få flere adgange og vejrinformation <br>
               Du modtager en kvittering på e-mail. </p>
        </div>
    </div>
</div>





<main>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 basket pt-lg-5">
                <div class="basket-module">
                    <label for="promo-code">Indtast rabat kode: (Få en Gratis prøve måned = Skriv ordet: Gratis)</label>
                    <input id="promo-code" type="text" name="promo-code" maxlength="5" class="promo-code-field">
                    <button class="promo-code-cta  btn btn-primary text-white">Indløs</button>

                </div>
                <div class="basket-labels">
                    <ul>
                        <li class="item item-heading">Abonnementstype</li>
                        <li class="price">Pris</li>
                        <li class="quantity">Antal</li>
                        <li class="subtotal">Subtotal</li>
                    </ul>
                </div>

                <div class="basket-product">
                    <div class="item">
                        <div class="product-details">
                            <h6>1 års</h6>
                            <p><strong>Abonnement</strong></p>
                            <p class="text-secondary fw-semibold">Spar over 15%</p>
                        </div>
                    </div>
                    <div class="price">200.00</div>
                    <div class="quantity">
                        <input type="number" value="0" min="0" class="quantity-field">
                    </div>
                    <div class="subtotal">0.00</div>
                </div>


                <div class="basket-product">
                    <div class="item">
                        <div class="product-details">
                            <h6>1 måned</h6>
                            <p><strong>Abonnement</strong></p>
                        </div>
                    </div>
                    <div class="price">20.00</div>
                    <div class="quantity">
                        <input type="number" value="0" min="0" class="quantity-field sikker">
                    </div>
                    <div class="subtotal">0.00</div>
                </div>


            </div>

            <aside class="col-12 col-lg-6 pt-5">
                <div class="summary">
                    <div class="summary-total-items"><span class="total-items"></span> Abonnement</div>
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
                        <a href="betaling.php" class="checkout-cta btn btn-success text-white">Gå til sikker betaling</a>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</main>



<?php include "include/footer.php"; ?>

<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/sikker.js"></script>
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

        if (promoCode == "måned" || promoCode == "Måned" || promoCode == "MÅNED") {
            //If promoPrice has no value, set it as 10 for the 10OFF promocode - Michael Har ændret til Måned
            if (!promoPrice) {
                promoPrice = 20;
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


