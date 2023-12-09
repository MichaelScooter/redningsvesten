export default class VejrTabel {
    constructor() {
        this.data = {
            password: "RedningsvestenKode"
        }

        this.rootElem = document.querySelector('.vejrtabel'); // Finder HTML-elementet med klassen "vejrtabel" og gemmer det i "rootElem."
        this.filter = this.rootElem.querySelector('.filter'); // Finder filterelementet inden for "rootElem."
        this.items = this.rootElem.querySelector('.items'); // Finder liste-elementet inden for "rootElem."

        this.nameSearch = this.filter.querySelector('.nameSearch'); // Finder inputfeltet for nameSearch inden for "filter."
    }

    async init() {
        this.nameSearch.addEventListener('input', () => { // Tilføjer en eventlytter til inputfeltet for nameSearch.
            if (this.nameSearch.value.length >= 3) { // Hvis der er mindst 3 tegn i søgefeltet, udfør følgende:
                this.render(); // Kald "render()" for at opdatere listen over koder.
            }
        });

        await this.render(); // Kald "render()" for at vise de første koder, når siden indlæses.
    }

    async render() {
        const data = await this.getData(); // Hent kode data ved hjælp af "getData()" funktionen.

        const row = document.createElement('div'); // Opret et nyt HTML-element (div) for at indeholde bøgerne.
        row.classList.add('row', 'g-4'); // Tilføj nogle CSS-klasser til det oprettede element.

        for (const item of data) { // Gennemgå hvert kode objekt i "data."

            const col = document.createElement('div'); // Opret et nyt element til hver kode.
            col.classList.add('col-md-6', 'col-lg-4', 'col-xl-6'); // Tilføj CSS-klasser til dette element.

            col.innerHTML = `
               <div class="card mt-4 p-3 shadow h-100">
                    ${(item.vejrBilled) ? `<img src="uploads/${item.vejrBilled}" class="card-img-top img-fluid" alt="Vejr billede">` : ''}
                    <div class="card-body">
                        <h5 class="card-title">${item.vejrUgeDag}</h5>
                        <p class="card-text">${item.vejrBy}</p>
                        <p class="card-text">${item.vejrUgeNr}</p>
                        <p class="card-text">${item.vejrTemp}</p>
                        <p class="card-text">${item.vejrBeskrivelse}</p>
                        <p class="card-text">${item.vejrMinTemp}</p>
                        <p class="card-text">${item.vejrMaxTemp}</p>
                        <p class="card-text">${item.vejrUx}</p>
                        <p class="card-text">${item.vejrRegn}</p>                       
                    </div>
               </div>               
                             
            `;

            row.appendChild(col); // Tilføj det oprettede bogelement til listen af bøger.
        }

        this.items.innerHTML = ''; // Ryd den gamle liste af bøger.
        this.items.appendChild(row); // Tilføj den nye liste af bøger til HTML-elementet.
    }

    async getData() {
        /* Note: this.data er objektet oppe i toppen der indeholder password. Det udbygger vi med nameSearch,
           så der også kommer til at ligge en nameSearch i også - Det får så værdien af nameSearch value (inputfeltet på shop siden) */
        this.data.nameSearch = this.nameSearch.value; // Tilføj værdien fra søgefeltet til data-objektet.

        const response = await fetch('api.php', {
            method: "POST",
            body: JSON.stringify(this.data) // Send data-objektet til en API ved hjælp af POST-anmodning.
        });
        return await response.json(); // Returner resultatet fra API som JSON-data.
    }
}
