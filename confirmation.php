<?php

declare(strict_types=1);
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/pageview/header.php';
session_start();
?>
<div class="confirmationMessage">
    <h1> BOOKING CONFIRMED!</h1>
    <p>Thank you for choosing STUUGA! We hope you enjoy your stay!</p>
    <div class="dropdown">
        <div class="dropdownHeader">
            <p> Boking detals </p>
        </div>
        <div class="dropdownContent">
            <?php
            $logbook = json_decode(file_get_contents(__DIR__ . '/logbook.json'));

            foreach ($logbook->vacation as $vacation) {
                if ($vacation->booking_id === $_SESSION['bookingId']) {
                    var_dump($vacation);
                }
            }
            ?>
        </div>
    </div>
</div>
<?php
require __DIR__ . '/pageview/footer.php';
