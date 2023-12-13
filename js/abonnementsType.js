function visIndhold() {
    let abonnementsValg = document.getElementById("abonnements").value;

    // Skjul begge indholdsdive ved start
    document.getElementById("1aarIndhold").style.display = "none";
    document.getElementById("1maanedIndhold").style.display = "none";

    if (abonnementsValg === "1aarIndhold") {
    document.getElementById("1aarIndhold").style.display = "block";
} else if (abonnementsValg === "1maanedIndhold") {
    document.getElementById("1maanedIndhold").style.display = "block";
}
}

    visIndhold();
