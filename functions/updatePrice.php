<?php

declare(strict_types=1);
require __DIR__ . '/../vendor/autoload.php';
function updatePrice()
{
    if (isset($_POST['SeasideCabinPrice'])) {
        $file = file_get_contents(__DIR__ . '/../seasideCabin.php');
        $price = $_POST['SeasideCabinPrice'];
        $content = preg_replace('/\$price = \d+;/', '$price = ' . $price . ';', $file);
        file_put_contents(__DIR__ . '/../seasideCabin.php', $content);
        header('Location: /signIn.php');
        exit;
    } else if (isset($_POST['ForestCabinPrice'])) {
        $file = file_get_contents(__DIR__ . '/../forestCabin.php');
        $price = $_POST['ForestCabinPrice'];
        $content = preg_replace('/\$price = \d+;/', '$price = ' . $price . ';', $file);
        file_put_contents(__DIR__ . '/../forestCabin.php', $content);
        header('Location: /signIn.php');
        exit;
    } else if (isset($_POST['MountainCabinPrice'])) {
        $file = file_get_contents(__DIR__ . '/../mountainCabin.php');
        $price = $_POST['MountainCabinPrice'];
        $content = preg_replace('/\$price = \d+;/', '$price = ' . $price . ';', $file);
        file_put_contents(__DIR__ . '/../mountainCabin.php', $content);
        header('Location: /../signIn.php');
        exit;
    }
}

updatePrice();
