<?php
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/header.php'; ?>
<img src="" alt="">
<div class="houseInformationContainer">
    <div class="textWrap">
        <h1>Regular House</h1>
        <p>Regular House is a house that is regular.</p>
    </div>
    <img class="img" src="Media/House2.png" alt="the basic house">
</div>
<div class="imgSlideshow">
    <img src="" alt="">
    <img src="" alt="">
</div>
<form action="" method="post">
    <h1>$15/night</h1>
    <div>
        <?php
        $roomNumber = 2;
        require __DIR__ . '/calendarFunctions.php';
        require __DIR__ . '/calendar.php';
        require __DIR__ . '/formFunctions.php';
        ?>

        <?php
        require __DIR__ . '/footer.php';
