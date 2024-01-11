<?php

declare(strict_types=1);
require __DIR__ . '/vendor/autoload.php';

$houseInfoText = "Nestled on the rugged coastline, this charming seaside cabin is a cozy retreat where the soothing sound of waves meets the rustle of sea breezes through pine trees. With weathered shingles and a quaint porch, the cabin exudes a timeless coastal charm. Inside, you'll find a snug living space adorned with nautical decor, large windows framing panoramic ocean views, and a crackling fireplace for chilly evenings. The simplicity of this coastal haven invites you to unwind, whether you're sipping coffee on the porch or strolling along the sandy shore just steps away. It's the perfect escape for those seeking serenity by the sea.";
$roomNumber = 1;
$cabinName = "SEASIDE CABIN";
$cabinDiscription = "This cozy seaside cabin with panoramic ocean views and a crackling fireplace, offering timeless coastal charm.";
$price = 8;
$slides = [
    "/Media/seasideCabin.png",
    "/Media/seasideSlideshow1.png",
    "/Media/seasideSlideshow2.png",
    "/Media/seasideSlideshow3.png",
    "/Media/seasideSlideshow4.png",
    "/Media/seasideSlideshow5.png"
];
$stars = 2;

require __DIR__ . '/pageview/header.php';
require __DIR__ . '/pageview/navbar.php';
require __DIR__ . '/pageview/houseDetailPage.php';
?>
<p class=invisible><?php echo $price; ?></p>
<?php
require __DIR__ . '/pageview/form.php';
require __DIR__ . '/pageview/footer.php';
