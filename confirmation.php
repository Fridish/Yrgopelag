<?php

declare(strict_types=1);
session_start();
require __DIR__ . '/pageview/header.php';
$logbook = json_decode(file_get_contents(__DIR__ . '/logbook.json'));

foreach ($logbook->vacation as $vacation) {
    if ($vacation->booking_id === $_SESSION['bookingId']) {
        var_dump($vacation);
    }
}
require __DIR__ . '/pageview/footer.php';
