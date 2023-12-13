<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/pageview/header.php'; ?>

<body>
    <div class="heroWrapper">
    </div>
    <?php
    require __DIR__ . '/pageview/calendarfunctions.php';
    require __DIR__ . '/pageview/calendar.php';
    require __DIR__ . '/pageview/footer.php';
