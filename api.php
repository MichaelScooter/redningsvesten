<?php
require "settings/init.php";


$data = json_decode(file_get_contents('php://input'), true);

header('content-type: application/json; chartset=utf-8');

// Password skal udfyldes og være RedningsvestenKode
$data["password"] = "RedningsvestenKode";

if($data["password"] == "RedningsvestenKode") {


    $sql = "SELECT * FROM vejr WHERE 1=1 ";
    $bind = [];

    /* Her er valgt $data, da det er det vi har kaldt i linje 5 + nameSearch, da vi har valgt vi ville have det med linje 11
    - Denne kode: $sql = $sql . ""; er skrevet kortere med denne = $sql .= "";
    */
    if (isset($data["nameSearch"]) && !empty($data["nameSearch"])) {
        // Tjek om "nameSearch" eksisterer i det indkomne data og ikke er tomt.
        // Hvis det er tilfældet, udfør følgende:

        $nameSearch = "%" . $data["nameSearch"] . "%";
        // Opret en variabel $nameSearch og tildel den en værdi, der indeholder brugersøgningen med jokertegn (%) foran og bagved.

        $sql .= " AND (vejrBy LIKE :vejrBy)";
        // Tilføj betingelsen til SQL-forespørgslen. Dette søger i valgte kolonner (kodeKunde, kodeCvr, kodeUnik) og bruger LIKE-operatoren til delvise tekstmatcher.

        $bind[":vejrBy"] = $nameSearch;


        // Opret en associeret liste (array) med placeholders for SQL-bindings. Dette sikrer, at søgeudtrykket bliver erstattet i SQL-forespørgslen.
    }


    $sql .= " ORDER BY vejrBy ASC";

    $kode = $db->sql($sql, $bind);
    header("HTTP/1.1 200 OK");

    /* Grunden til json_encode er, at så kommer det som et json format og ikke et array*/
    echo json_encode($kode);

} else{
    header("HTTP/1.1 401 Unauthorized");
    $error["errorMessage"] = "Dit kodeord var forkert";

    echo json_encode($error);
}


?>


