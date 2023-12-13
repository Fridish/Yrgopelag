<?php
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/header.php'; ?>

<body>
    <img src="" alt="">
    <div class="houseInformationContainer">
        <div class="textWrap">
            <h1>Basic House</h1>
            <p>Basic House is a house that is basic.</p>
        </div>
        <img src="Media/house1.png" alt="the basic house">
    </div>
    <div class="imgSlideshow">
        <img src="" alt="">
        <img src="" alt="">
    </div>
    <?php
    require __DIR__ . '/calendarFunctions.php';
    require __DIR__ . '/calendar.php';
    ?>
    <div class="extras">
        <h1>Tillägg</h1>
        <ul>
            <li> kajak</li>
            <li>kajak med fiskeutrustning</li>
            <li>bergsklättring</li>
            <li>häst</li>
            <li>guidad tur över ön</li>
        </ul>
    </div>
    <?php
    require __DIR__ . '/footer.php';
