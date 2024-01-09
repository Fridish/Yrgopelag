<!-- this is the header. the image will cover the background and text will be applied on top of it. -->
<div class="houseHeaderContainer">
    <div class="houseHeaderBackground">
        <div class="swiper seasideSwiper">
            <div class="swiper-wrapper seasideSwiperWrapper">
                <?php
                foreach ($slides as $slide) {
                ?> <div class="swiper-slide seaside">
                        <img class="swiperImg" src='<?php echo $slide ?>' alt="house images">
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="houseHeaderOverlay">
            <div class="houseTextWrap">
                <h1><?php echo $cabinName; ?></h1>
                <p> <?php echo $cabinDiscription; ?> </p>
            </div>
            <div class="houseStarButton">
                <img src=<?php echo $stars; ?> alt="rating of house is 2 stars">
                <button>BOOK NOW</button>
            </div>
        </div>
    </div>
    <!-- this is the information about the house. -->
    <div class="houseInfoContainer">
        <div class="houseInfoText">
            <p><?php echo $houseInfoText; ?></p>
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
                    <p>mountain climbing with guide</p>
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

    <div class="swiper-pagination"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
</div>

<!-- booking form -->
<div class="bookingFormWrapper">
    <div class="bookingFormContainer">
        <h1 class="formHeaderBig">BOOK <?php echo $cabinName; ?> </h1>
        <h1 class="formHeaderSmall"> $<?php echo $price; ?>/night</h1>
    </div>
    <form action="" method=" post">