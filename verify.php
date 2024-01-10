<?php

declare(strict_types=1);
session_start();
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/hotelFunctions.php';


if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = trim(htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8'));
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $db = connect($dbName);
    $statement = $db->prepare("select * from users where username = :username");
    $statement->bindValue(':username', $username);
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);
    if (password_verify($_POST['password'], $user['user_password']) !== false) {
        $_SESSION['username'] = $user;
        header('Location: /signIn.php');
        exit;
    } else {
        echo "Wrong username or password";
    }
}
header("Location: /signIn.php");
