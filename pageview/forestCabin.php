<?php

declare(strict_types=1);
require __DIR__ . '/../vendor/autoload.php';

$houseInfoText = "Tucked away in the heart of a lush forest, this cabin provides a serene escape into nature's embrace, where the fragrance of pine trees mingles with the soothing sounds of rustling leaves. The cozy interior, adorned with natural textures and bathed in dappled sunlight, features a fireplace that invites you to unwind, while the surrounding greenery becomes a living tapestry visible through every window. Step onto the cabin's porch to immerse yourself in the forest symphony or explore nearby trails, making this woodland cabin a tranquil retreat for those seeking solace and connection with the enchanting forest surroundings.";
$roomNumber = 2;
$cabinName = "FOREST CABIN";
$cabinDiscription = "Secluded in a lush forest, this cabin invites tranquility with a cozy interior, fireplace, and a porch immersed in the soothing sounds of nature.";
$price = 12;
$slides = [
    "/Media/forestCabin.png",
    "/Media/forestSlideshow1.png",
    "/Media/forestSlideshow2.png",
    "/Media/forestSlideshow3.png",
    "/Media/forestSlideshow4.png",
    "/Media/forestSlideshow5.png"
];

$stars = "/Media/2Stars.svg";

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/header.php';
require __DIR__ . '/navbar.php';
require __DIR__ . '/calendarFunctions.php';
require __DIR__ . '/houseDetailPage.php';
require __DIR__ . '/formFunctions.php';
require __DIR__ . '/footer.php';
