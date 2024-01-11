<?php

declare(strict_types=1);
session_start();
require __DIR__ . '/../vendor/autoload.php';
unset($_SESSION['username']);
session_destroy();

header("Location: /signIn.php");
