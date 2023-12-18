<?php
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/header.php'; ?>

<body>
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
        <h1>10$/night</h1>
        <div>
            <?php
            require __DIR__ . '/calendarFunctions.php';
            require __DIR__ . '/calendar.php';
            ?>
        </div>
        <div class="extras">
            <label>Tillägg</label>

            <label class="container">Kajak 5$
                <input type="checkbox" id="kajak" value=5>
                <span class="checkmark"></span>
            </label>

            <label class="container">Kajak med fiskeutrustning 6$
                <input type="checkbox" id="fiskeutrustning" value=6>
                <span class="checkmark"></span>
            </label>

            <label class="checkbox">Bergsklättring 10$
                <input type="checkbox" id="bergsklättring" value=10>
                <span class="checkmark"></span>
            </label>

            <label class="checkbox">Guidad tur över ön 8$
                <input type="checkbox" id="guide" value=8>
                <span class="checkmark"></span>
            </label>
            Order total: <span id="total">0</span>
        </div>
        <input type="text" name="name" id="name" placeholder="Enter your full name here">
        <input type="text" name="uuid" plcaeholder="enter your transfer code here">

        <button type="submit"> submit</button>
    </form>

    <form action="submit"></form>
    <?php
    require __DIR__ . '/footer.php';
