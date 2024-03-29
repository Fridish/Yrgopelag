<?php

declare(strict_types=1);
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/pageview/header.php';
require __DIR__ . '/pageview/navbar.php';

if (isset($_SESSION['bookingId'])) {
?>
    <div class="confirmationContainer">
        <div class="confirmationMessage">
            <div class="ddContainer">
                <h1> BOOKING CONFIRMED!</h1>
                <p>Thank you for choosing STUUGA! We hope you enjoy your stay!</p>
                <div id="ddbtn3">
                    <div>
                        <p class="ddbtnTxt"> Boking detals </p>
                    </div>
                    <div class="ddContent">
                        <div>
                            <?php
                            $logbook = json_decode(file_get_contents(__DIR__ . '/logbook.json'));
                            foreach ($logbook->vacation as $vacation) {
                                if ($vacation->booking_id === $_SESSION['bookingId']) {
                                    $vacationEncoded =  json_encode($vacation,  JSON_PRETTY_PRINT);
                                    echo "<pre> $vacationEncoded <pre>";
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
} else {
    header('Location: /index.php');
}

require __DIR__ . '/pageview/footer.php';
