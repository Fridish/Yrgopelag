<?php
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/header.php'; ?>

<body>
    <img src="" alt="">
    <div class="houseInformationContainer">
        <div class="textWrap">
            <h1>luxury House</h1>
            <p>luxury House is a house that is luxurious.</p>
        </div>
        <img class="img" src="/Media/House3.png" alt="the luxurious house">
    </div>
    <div class="imgSlideshow">
        <img src="" alt="">
        <img src="" alt="">
    </div>
    <form action="" method="post">
        <h1>$20/night</h1>
        <div>
            <?php
            $roomNumber = 3;
            require __DIR__ . '/calendarFunctions.php';
            require __DIR__ . '/calendar.php';
            require __DIR__ . '/formFunctions.php';
            ?>

            <?php
            require __DIR__ . '/footer.php';
