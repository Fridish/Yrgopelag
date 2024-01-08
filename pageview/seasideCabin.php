<?php

declare(strict_types=1);
require __DIR__ . '/../vendor/autoload.php';

$houseInfoText = "Nestled on the rugged coastline, this charming seaside cabin is a cozy retreat where the soothing sound of waves meets the rustle of sea breezes through pine trees. With weathered shingles and a quaint porch, the cabin exudes a timeless coastal charm. Inside, you'll find a snug living space adorned with nautical decor, large windows framing panoramic ocean views, and a crackling fireplace for chilly evenings. The simplicity of this coastal haven invites you to unwind, whether you're sipping coffee on the porch or strolling along the sandy shore just steps away. It's the perfect escape for those seeking serenity by the sea.";
$roomNumber = 1;
$cabinName = "SEASIDE CABIN";
$cabinDiscription = "This cozy seaside cabin with panoramic ocean views and a crackling fireplace, offering timeless coastal charm.";
$price = 10;
$slides = [
    "/Media/seasideCabin.png",
    "/Media/seasideSlideshow1.png",
    "/Media/seasideSlideshow2.png",
    "/Media/seasideSlideshow3.png",
    "/Media/seasideSlideshow4.png",
    "/Media/seasideSlideshow5.png"
];
$stars = "/Media/2Stars.svg";

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/header.php';
require __DIR__ . '/navbar.php';
require __DIR__ . '/calendarFunctions.php';
require __DIR__ . '/houseDetailPage.php';
require __DIR__ . '/formFunctions.php';
require __DIR__ . '/footer.php';
