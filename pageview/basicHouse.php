<?php
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/header.php';
require __DIR__ . '/navbar.php';
?>

<img src="" alt="">
<div class="houseInformationContainer">
    <div class="textWrap">
        <h1>Basic House</h1>
        <p>Basic House is a house that is basic.</p>
    </div>
    <img class="img" src="/Media/House1.png" alt="the basic house">
</div>
<div class="imgSlideshow">
    <img src="" alt="">
    <img src="" alt="">
</div>
<form action="" method="post">
    <h1>$10/night</h1>
    <div>

        <?php
        $roomNumber = 1;
        require __DIR__ . '/calendarFunctions.php';
        require __DIR__ . '/calendar.php';
        require __DIR__ . '/formFunctions.php';
        ?>
        <?php
        require __DIR__ . '/footer.php';
