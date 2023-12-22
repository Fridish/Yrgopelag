<?php

declare(strict_types=1);
require __DIR__ . '/pageview/header.php';

$logbook = json_decode(file_get_contents(__DIR__ . '/logbook.json'));
$logbookData = $logbook->vacation;

$_POST['mountain climbing'] = "mountain climbing";
$_POST['kayak'] = "kayak";
$_POST['fishing gear'] = "kayak and fishing gear";

foreach ($logbookData as $key => $entry) {
    $logbookData[$key]->arrival_date = $_POST['arrival'];
    $logbookData[$key]->departure_date = $_POST['departure'];
    $logbookData[$key]->total_cost = $_POST['orderTotal'];
    if (isset($_POST['extras'])) {
        if (isset(!empty($_POST['guide']))) {

            $logbookData[$key]->features->price = $_POST['guide'];
        }

        $logbookData[$key]->features->price = $_POST['extras'];
    }
    var_dump($logbookData);
}

require __DIR__ . '/pageview/footer.php';
