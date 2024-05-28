function confirmChoice() {

    if (confirm("Du har ikke valgt om du ønsker tilmelding til nyhedsbrev eller ej.\nHusk at trykke på knappen bekræft valg, når du har valgt"))

        // Fjern event listeneren efter det første klik
        document.querySelector('.sikker').removeEventListener('click', confirmChoice);
}

