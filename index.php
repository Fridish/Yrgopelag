<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/pageview/header.php';
require __DIR__ . '/hotelFunctions.php';
require __DIR__ . '/pageview/navbar.php';
?>
<div class="heroWrapper">
    <img src="/Media/HeroTest.png" alt="">
    <div class=" heroText">
        <h1>WELCOME TO</h1>
        <h1>STUUGA</h1>
        <p>Hotel and resort loceted on the island Berghav</p>

    </div>
    <div class=" indexHouseView">
        <a href="/pageview/basicHouse.php">
            <img src="Media/house1.png" alt="">
        </a>
        <a href="/pageview/regularHouse.php">
            <img src="Media/House2.png" alt="">
        </a>
        <a href="/pageview/luxuryHouse.php">
            <img src="Media/House3.png" alt="">
        </a>
    </div>
    <?php
    require __DIR__ . '/pageview/footer.php';
