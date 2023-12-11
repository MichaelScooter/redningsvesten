function minSikkerFunktion() {
    let txt;
    if (confirm("Er du sikker? Hvis du ønsker at spare 15%, så skal du i stedet vælge 1 års abonnement.")) {
        txt = "Ok - Nu kan du bare vælge den abonnementstype du ønsker :-)";
    } else {
        txt = "Ok - Nu kan du bare vælge den abonnementstype du ønsker :-)";
    }
}

document.querySelector('.sikker').addEventListener('click', function () {

    minSikkerFunktion();
});