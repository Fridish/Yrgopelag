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
<div class="houseWrapper">
    <div class="houseWrapperH1">
        <h1>CABINS</h1>
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
                <p><?php echo $forestStars; ?> stars</p>
                <a href="/pageview/forestCabin.php">
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
</div class="offerContainer">
<div class="offerDetailsWrapper">
    <div class="offerDetails">
        <h1>% CURRENT OFFERS %</h1>
        <p>Right now you get a $2 price reduction if you stay more than 2 nights, neat, huh? Discount is applied instantly. </p>
    </div>
    <div>
        <img src="/Media/offerImg.png" alt="">
    </div>
</div>
</div>
<div class="eventsWrapper">
    <div class="eventsWrapperHeader">
        <h1>EVENTS</h1>
    </div>
    <div class="eventsContainer">
        <div class="eventBox">
            <img src="/Media/kayak.png" alt="">
            <p>Kayaking</p>
        </div>
        <div class="eventBox">
            <img src="/Media/fishing.png" alt="">
            <p>Borrow fishing gear</p>
        </div>
        <div class="eventBox">
            <img src="/Media/hike.png" alt="">
            <p>Mountain climbing</p>
        </div>
        <div class="eventBox">
            <img src="/Media/sauna.png" alt="">
            <p>Access to sauna</p>
        </div>
    </div>
    <div class="eventsWrapperButton">
        <a href="/events.php"><button>READ MORE</button></a>
    </div>
</div>
<div class="reviewsContainer">
    <div class="reviewsWrapper">
        <div class="reviewSwiperContainer">
            <h1> WHAT OUR CUSTOMERS SAY</h1>
            <div>
                <div class="swiper reviewSwiper">
                    <div class="swiper-wrapper SwiperReviewWrapper">
                        <!-- Slides -->
                        <div class="swiper-slide reviewSlide">
                            <p>Had an amazing time at the mountain cabbin. The views of the island were incredible, and the beds were very comfortable. The staff was attentive, and the Nordic cuisine added a delicious touch to the experience. Definitely a great spot for a peaceful mountain retreat.</p>
                            <p>- Carla Jobber</p>
                        </div>
                        <div class="swiper-slide reviewSlide">
                            <p>
                                Found this gem of a mountain hotel on a Nordic island, what a pleasant surprise! The views were breathtaking, and the rooms were comfy and chic. The staff was friendly, and the Nordic cuisine was a tasty treat. Highly recommend for a relaxing mountain escape.
                            </p>
                            <p>- John Deer</p>
                        </div>
                        <div class="swiper-slide reviewSlide">
                            <p>Stayed at a charming island with cozy rooms and friendly staff. The kayaking experience around the island's shores was a thrilling highlight, blending adventure with the comforts of a delightful stay.</p>
                            <p>- Sarah Ohara</p>
                        </div>
                    </div>
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
        <img src="/Media/reviewImg.png" alt="our vacation resort">
    </div>
</div>
<?php

require __DIR__ . '/pageview/footer.php';
