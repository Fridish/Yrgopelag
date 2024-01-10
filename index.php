<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/pageview/header.php';
require __DIR__ . '/hotelFunctions.php';
require __DIR__ . '/pageview/navbar.php';

function getPrice($filename, $variableName)
{
    $file = file_get_contents(__DIR__ . '/pageview/' . $filename . '.php');
    $variableName = "price";
    $search = '/\$' . preg_quote($variableName) . '\s*=\s*(\d+);/';
    if (preg_match($search, $file, $matches)) {
        // $matches[1] contains the value of the variable
        return $matches[1];
    }
}
$seasidePrice = getPrice('seasideCabin', 'price');
$mountainPrice = getPrice('mountainCabin', 'price');
$forestPrice = getPrice('forestCabin', 'price');
function getStars($filename, $variableName)
{
    $file = file_get_contents(__DIR__ . '/pageview/' . $filename . '.php');
    $variableName = "stars";
    $search = '/\$' . preg_quote($variableName) . '\s*=\s*(\d+);/';
    if (preg_match($search, $file, $matches)) {
        // $matches[1] contains the value of the variable
        return $matches[1];
    }
}
$seasideStars = getStars('seasideCabin', 'stars');
$mountainStars = getStars('mountainCabin', 'stars');
$forestStars = getStars('forestCabin', 'stars');
?>
<div class="indexHeroWrapper">
    <div class=" indexHeroText">
        <h1>WELCOME</h1>
        <h1> TO</h1>
        <h1>STUUGA</h1>
        <p>Hotel and resort located on the island Berghav</p>
    </div>
</div>
<div class="indexInfoWrapper">
    <div class="indexContainer">
        <div class="indexInfoText">
            <h1>ABOUT US</h1>
            <p>STUUGA is located on the island of Berghav, an island in the northern hemisphere with magnificent views in a mountainous landscape.

                STUUGA has a background in sea fishing and mountain climbing, something we consider as the foundation for the hotel and its atmosphere. Therefore, staying at STUUGA is suitable for those who enjoy exploring and adventuring with a Nordic and rustic feel in focus.

                Our hotel offers accommodation in the form of cottages in three different designs, making it easy to find something that suits you. If you have any questions, you can forward them to our customer service, which you can find here.</p>
        </div>
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
    <div class="houseWrapperH1">
        <h1>OUR CABINS</h1>
    </div>
    <div class="houseOuterContainer">
        <div class="houseInnerWrapper">
            <div class="houseContainer">
                <img class="indexHouseImg" src="Media/seasideCabin.png" alt="">
                <h3>SEASIDE CABIN</h3>
                <p> $<?php echo $seasidePrice; ?>/night </p>
                <p><?php echo $seasideStars; ?> stars</p>
                <a href="/pageview/seasideCabin.php">
                    <img class="arrow" src="/Media/arrow.svg" alt="">
                </a>
            </div>
            <div class="houseContainer">
                <img class="indexHouseImg" src="Media/forestCabin.png" alt="">
                <h3>FOREST CABIN</h3>
                <p> $<?php echo $forestPrice ?>/night </p>
                <p><?php echo $forestStars; ?> stars</p <a href="/pageview/forestCabin.php">
                <img class="arrow" src="/Media/arrow.svg" alt="">
                </a>
            </div>
            <div class="houseContainer">
                <img class="indexHouseImg" src="Media/mountainCabin.png" alt="">
                <h3>MOUNTAIN CABIN</h3>
                <p> $<?php echo $mountainPrice ?>/night </p>
                <p><?php echo $mountainStars; ?> stars</p>
                <a href="/pageview/mountainCabin.php">
                    <img class="arrow" src="/Media/arrow.svg" alt="">
                </a>
            </div>
        </div>
    </div>
</div>
<div class="reviewsContainer">
    <h1> OUR REVIEWS</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa itaque, voluptate, magni illo nostrum modi iste dolore exercitationem optio voluptatum corporis saepe corrupti ut in natus rerum adipisci consectetur sapiente!</p>
</div>
<?php

require __DIR__ . '/pageview/footer.php';
