<?php

declare(strict_types=1);
require __DIR__ . '/../vendor/autoload.php';

$houseInfoText = "Nestled in the solitude of mountain peaks and surrounded by towering pines, this cabin is a rustic haven offering a perfect blend of charm and comfort. Inside, a cozy living space features a crackling fireplace and large windows framing panoramic views, while outside, an expansive deck provides an ideal spot to savor the crisp mountain air. Whether you're exploring nearby trails or simply unwinding in the tranquility of nature, this mountain cabin is a retreat designed for unforgettable moments amid the beauty of the wilderness.";
$roomNumber = 3;
$cabinName = "MOUNTAIN CABIN";
$cabinDiscription = "Perched in mountain solitude, this cabin beckons with panoramic views, a crackling fireplace, and rustic tranquility.";
$price = 12;
$slides = [
    "/Media/mountainCabin.png",
    "/Media/mountainSlideshow1.png",
    "/Media/mountainSlideshow2.png",
    "/Media/mountainSlideshow3.png",
    "/Media/mountainSlideshow4.png",
    "/Media/mountainSlideshow5.png"
];
$stars = "/Media/2Stars.svg";

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/header.php';
require __DIR__ . '/navbar.php';
require __DIR__ . '/houseDetailPage.php';
?>
<p class=invisible><?php echo $roomNumber; ?></p>
<?php
require __DIR__ . '/formFunctions.php';
require __DIR__ . '/footer.php';
