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
</div>
<div class="indexInfoWrapper">
    <div class="indexContainer">
        <div class="indexInfoText">
            <h1>ABOUT US</h1>
            <p>STUUGA is located on the island of Berghav, an island in the northern hemisphere with magnificent views in a mountainous landscape.

                STUUGA has a background in sea fishing and mountain climbing, something we consider as the foundation for the hotel and its atmosphere. Therefore, staying at STUUGA is suitable for those who enjoy exploring and adventuring with a Nordic and rustic feel in focus.

                Our hotel offers accommodation in the form of cottages in three different designs, making it easy to find something that suits you. If you have any questions, you can forward them to our customer service, which you can find here.</p>

            <div class="indexInfoImage">
                <img src="/Media/infoImage.png" alt="">
            </div>
        </div>
    </div>
</div>
<div class="sceneryContainer">
    <h1>DISCOVER THE ISLAND AND THE OCEAN</h1>
    <div class="sceneryImages">
        <img src="/Media/scenery1.png" alt="">
        <img src="/Media/scenery2.png" alt="">
        <img src="/Media/scenery3.png" alt="">
    </div>
</div>
<div class="houseWrapper">
    <h1>OUR CABINS</h1>
    <div class="houseInnerWrapper">
        <div class="houseContainer">
            <img src="Media/seasideCabin.png" alt="">
            <h3>Basic Cabbin</h3>
            <p> $5/night </p>
            <p>2 stars</p>
            <a href="/pageview/seasideCabin.php">
                <img class="arrow" src="/Media/arrow.svg" alt="">
            </a>
        </div>
        <div class="houseContainer">
            <img src="Media/forestCabin.png" alt="">
            <h3>Basic Cabbin</h3>
            <p> $5/night </p>
            <p>2 stars</p>
            <a href="/pageview/forestCabin.php">
                <img class="arrow" src="/Media/arrow.svg" alt="">
            </a>
        </div>
        <div class="houseContainer">
            <img src="Media/mountainCabin.png" alt="">
            <h3>Basic Cabbin</h3>
            <p> $5/night </p>
            <p>2 stars</p>
            <a href="/pageview/mountainCabin.php">
                <img class="arrow" src="/Media/arrow.svg" alt="">
            </a>
        </div>
    </div>
</div>
<?php
require __DIR__ . '/pageview/footer.php';
