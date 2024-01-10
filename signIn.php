<?php

declare(strict_types=1);
require __DIR__ . '/pageview/header.php';
require __DIR__ . '/pageview/navbar.php';
?>

<?php if (isset($_SESSION['username']) && !empty($_SESSION['username'])) { ?>
    <div class="logedIn">
        <p>WELCOME, <?php echo strtoupper($_SESSION['username']['username']); ?></p>
        <form action="/updatePrice.php" method="post">
            <p>update price of seaside cabin to $</p> <input type="text" name="SeasideCabinPrice" id="seasideCabinPrice" placeholder="Enter price here" autocomplete="off">
            <button for="seasideCabinPrice">update</button>
        </form>
        <form action="/updatePrice.php" method="post">
            <p>update price of forest cabin to $</p> <input type="text" name="ForestCabinPrice" id="ForestCabinPrice" placeholder="Enter price here" autocomplete="off">
            <button for="MountainCabinPrice">update</button>
        </form>
        <form action="/updatePrice.php" method="post">
            <p>update price of mountain cabin to $</p> <input type="text" name="MountainCabinPrice" id="MountainCabinPrice" placeholder="Enter price here" autocomplete="off">
            <button for="MountainCabinPrice">update</button>
        </form>
        <button onclick="location.href='/logout.php'">LOG OUT</button>
    </div>
<?php } else { ?>

    <form class="loginForm" action="/verify.php" method="post" autocomplete="off">
        <label for="username">SIGN IN</label>
        <input type="text" id="username" placeholder="Username" name="username">
        <input type="password" placeholder="Password" name="password">
        <button action="/verify.php" type="submit"> SIGN IN</button>
    </form>
<?php
}
require __DIR__ . '/pageview/footer.php';
