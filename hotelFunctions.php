<?php

/* 
Here's something to start your career as a hotel manager.

One function to connect to the database you want (it will return a PDO object which you then can use.)
    For instance: $db = connect('yrgopelag.db');
                  $db->prepare("SELECT * FROM bookings");
                  
one function to create a guid,
and one function to control if a guid is valid.
*/
$dbName = "Yrgopelag.db";
function connect(string $dbName): object
{
    $dbPath = __DIR__ . '/' . $dbName;
    $db = "sqlite:$dbPath";

    // Open the database file and catch the exception if it fails.
    try {
        $db = new PDO($db, null, null, array(PDO::ATTR_PERSISTENT => true));
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Failed to connect to the database";
        throw $e;
    }
    return $db;
}
if (isset($_POST['name'], $_POST['arrival'], $_POST['departure'], $_POST['uuid'])) {
    $db = connect($dbName);
    $username = $_POST['name'];
    $arrival = $_POST['arrival'];
    $departure = $_POST['departure'];
    $statement = $db->prepare("INSERT INTO bookings (full_name) VALUES (:username)");
    $statement->bindValue(':username', $username);
    $statement->execute();
    $statement = $db->prepare("SELECT * FROM bookings");
    $statement->execute();
    $result = $statement->fetchAll();
}
var_dump($_POST['name'], $_POST['arrival'], $_POST['departure'], $_POST['uuid'], $_POST['extras'], $_POST['orderTotal']);

$db = connect('yrgopelag.db');
$db->prepare("SELECT * FROM bookings");

function guidv4(string $data = null): string
{
    // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
    $data = $data ?? random_bytes(16);
    assert(strlen($data) == 16);

    // Set version to 0100
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    // Set bits 6-7 to 10
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

    // Output the 36 character UUID.
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

function isValidUuid(string $uuid): bool
{
    if (!is_string($uuid) || (preg_match('/^[0-9a-f]{8}-[0-9a-f]{4}-4[0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$/', $uuid) !== 1)) {
        return false;
    }
    return true;
}
