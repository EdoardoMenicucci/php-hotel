<?php
$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],



];

// SE METTO LA SPUNTA SENZA FILTRI DIVENTA ON IL SELECT ALTRIMENTI RESTA OFF
// if (isset($_GET['noFilters'])) {
//     $select = $_GET['noFilters'];
// } else {
//     $select = 'off';
// }
//Abbreviazione
$select = isset($_GET['noFilters']) ? $_GET['noFilters'] : 'off';

$parking = $_GET['parking'];

$rating = $_GET['rating'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>php hotel</title>
</head>

<body>
    <!-- TENTATIVO DI STAMPARE IN PAGINA I NOMI -->
    <!-- <?php /* foreach ($hotels as $hotel) {
        echo $hotel['name'];
    } */ ?>  -->
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Parking</th>
                <th>Vote</th>
                <th>Distance to Center (km)</th>
            </tr>
        </thead>
        <tbody> <!--corpo della tabela con ciclo for each -->
            <?php
            // SE L'OPZIONE SENZA FILTRI E' ATTIVA MOSTRO TUTTI GLI HOTEL
            if ($select == 'on') {
                foreach ($hotels as $hotel) {
                    echo "<tr>";
                    echo "<td>{$hotel['name']}</td>";
                    echo "<td>{$hotel['description']}</td>";
                    echo "<td>" . ($hotel['parking'] ? 'Yes' : 'No') . "</td>";
                    echo "<td>{$hotel['vote']}</td>";
                    echo "<td>{$hotel['distance_to_center']}</td>";
                    echo "</tr>";
                }
            } else {
                // Controllo le variabili sono selezionate entrambe
                if ($parking == 'true' && $rating == 'true') {
                    foreach ($hotels as $hotel) {
                        if ($hotel['parking'] && $hotel['vote'] >= 2.5) {
                            echo "<tr>";
                            echo "<td>{$hotel['name']}</td>";
                            echo "<td>{$hotel['description']}</td>";
                            echo "<td>" . ($hotel['parking'] ? 'Yes' : 'No') . "</td>";
                            echo "<td>{$hotel['vote']}</td>";
                            echo "<td>{$hotel['distance_to_center']}</td>";
                            echo "</tr>";
                        }
                    }
                    // Controllo se l'opzione parcheggio e' selezionata
                } else if ($parking == 'true') {
                    foreach ($hotels as $hotel) {
                        if ($hotel['parking']) {
                            echo "<tr>";
                            echo "<td>{$hotel['name']}</td>";
                            echo "<td>{$hotel['description']}</td>";
                            echo "<td>" . ($hotel['parking'] ? 'Yes' : 'No') . "</td>";
                            echo "<td>{$hotel['vote']}</td>";
                            echo "<td>{$hotel['distance_to_center']}</td>";
                            echo "</tr>";
                        }
                    }
                    // Controllo se il rating e' selezionato
                } else if ($rating == 'true') {
                    foreach ($hotels as $hotel) {
                        if ($hotel['vote'] >= 2.5) {
                            echo "<tr>";
                            echo "<td>{$hotel['name']}</td>";
                            echo "<td>{$hotel['description']}</td>";
                            echo "<td>" . ($hotel['parking'] ? 'Yes' : 'No') . "</td>";
                            echo "<td>{$hotel['vote']}</td>";
                            echo "<td>{$hotel['distance_to_center']}</td>";
                            echo "</tr>";
                        }
                    }
                }
            }
            ?>
        </tbody>
    </table>
    <!-- TESTO SE FUNZIONA -->
    <?=
    "$select $parking $rating"
    ?>
</body>

</html>