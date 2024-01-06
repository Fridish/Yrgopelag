<?php
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/header.php';
require __DIR__ . '/navbar.php';
?>

<img src="" alt="">

<!-- this is the header. the image will cover the background and text will be applied on top of it. -->
<div class="houseHeaderContainer">
    <img class="houseHeaderImg" src="/Media/seasideCabin.png" alt="A seaside cabin">
    <div class="houseHeaderOverlay">
        <div class="houseTextWrap">
            <h1>SEASIDE CABIN</h1>
            <p>
                This cozy seaside cabin with panoramic ocean views and a crackling fireplace, offering timeless coastal charm.</p>
        </div>
        <div class="houseStarButton">
            <img src=" /Media/2Stars.svg" alt="rating of house is 2 stars">
            <button>BOOK NOW</button>
        </div>
    </div>
</div>

<!-- this is the information about the house. -->
<div class="houseInfoContainer">
    <div class="houseInfoText">
        <p>Nestled on the rugged coastline, this charming seaside cabin is a cozy retreat where the soothing sound of waves meets the rustle of sea breezes through pine trees. With weathered shingles and a quaint porch, the cabin exudes a timeless coastal charm. Inside, you'll find a snug living space adorned with nautical decor, large windows framing panoramic ocean views, and a crackling fireplace for chilly evenings. The simplicity of this coastal haven invites you to unwind, whether you're sipping coffee on the porch or strolling along the sandy shore just steps away. It's the perfect escape for those seeking serenity by the sea.</p>
        <div class="houseInfoFeatures">
            <div>
                <img src="/Media/phone.svg" alt="">
                <p>room service</p>
            </div>
            <div>
                <img src="/Media/noWifi.svg" alt="">
                <p>no wifi</p>
            </div>
            <div>
                <img src="/Media/people.svg" alt="">
                <p>1 person</p>
            </div>
            <div>
                <img src="/Media/bed.svg" alt="">
                <p>queen size</p>
            </div>
            <div>
                <img src="/Media/width.svg" alt="">
                <p>40m2</p>
            </div>
            <div>
                <img src="/Media/tv.svg" alt="">
                <p>satelite tv</p>
            </div>
        </div>
    </div>
    <div class="houseInfoExtras">
        <h1>EXTRAS</h1>
        <div class="houseInfoExtrasContainer">
            <div>
                <img src="/Media/kayak.svg" alt="">
                <p>Kayak</p>
            </div>
            <div>
                <img src="/Media/fishing.svg" alt="">
                <p>fishing gear</p>
            </div>
            <div>
                <img src="/Media/mountian.svg" alt="">
                <p>mountain climbing gear and instructor</p>
            </div>
            <div>
                <img src="/Media/sauna.svg" alt="">
                <p>access to sauna</p>
            </div>
        </div>
        <br>
        <a href="">More information about our events ></a>
    </div>
</div>
<!-- image slideshow -->
<div class="swiper seasideSwiper">
    <div class="swiper-wrapper seasideSwiperWrapper">
        <div class="swiper-slide seaside">
            <img src="/Media/seasideSlideshow1.png" alt="">
        </div>
        <div class="swiper-slide seaside">
            <img class="swiperImg" src="/Media/seasideSlideshow2.png" alt="">
        </div>
        <div class="swiper-slide seaside">
            <img class="swiperImg" src="/Media/seasideSlideshow3.png" alt="">
        </div>
        <div class="swiper-slide seaside">
            <img class="swiperImg" src="/Media/seasideSlideshow4.png" alt="">
        </div>
        <div class="swiper-slide seaside">
            <img class="swiperImg" src="/Media/seasideSlideshow5.png" alt="">
        </div>
    </div>
    <div class="swiper-pagination"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
</div>
<form action="" method=" post">
    <h1>$10/night</h1>
    <div>

        <?php
        $roomNumber = 1;
        require __DIR__ . '/calendarFunctions.php';
        require __DIR__ . '/calendar.php';
        require __DIR__ . '/formFunctions.php';
        require __DIR__ . '/footer.php';
