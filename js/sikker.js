function minSikkerFunktion() {

    if (confirm("Er du sikker?\nVælg tilmelding til nyhedsbrev og SPAR kr. 100,-"))

    // Fjern event listeneren efter det første klik
    document.querySelector('.sikker').removeEventListener('click', minSikkerFunktion);
}


