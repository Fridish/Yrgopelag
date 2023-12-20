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

if (isset($_POST["submit"])) {
    //use guzzle to check transferCode 
    //if transferCode is valid, insert into database
    //else echo "invalid transfer code"
    $client = new GuzzleHttp\Client();
    $transferCode = $_POST['uuid'];
    $totalCost = $_POST['orderTotal'];
    try {
        $request = $client->request('POST', "https://www.yrgopelag.se/centralbank/transferCode", [
            "form_params" => [
                'transferCode' => $transferCode,
                'totalCost' => $totalCost,
            ],

        ]);
        $response = $request->getBody();
        $response = json_decode($response);
        $status = $response->statusCode();
        if ($status != 200) {
            echo "invalid transfer code";
        }
    } catch (GuzzleHttp\Exception\ServerException $e) {
        echo "Failed to send request: " . $e->getMessage();
        echo "Response body: " . $e->getResponse()->getBody();
        echo var_dump($_POST['uuid']);
        echo var_dump($_POST['orderTotal']);
    }
} else {
    //if all fields are filled out and UUID is ok, insert into database
    if (isset($_POST['arrival'], $_Post['departure'])) {
        $arrival = $_POST['arrival'];
        $departure = $_POST['departure'];
        $db = connect($dbName);
        $statement = $db->prepare("select * from bookings where (arrival = :arrival or departure = :departure or :arrival between arrival and departure or :departure between arrival and departure) and room_number = :roomNumber");
        $statement->bindValue(':arrival', $arrival);
        $statement->bindValue(':departure', $departure);
        $statement->bindValue(':roomNumber', $roomNumber);
        $statement->execute();
        $bookings = $statement->fetchAll();
        if (count($bookings) > 0) {
            print_r('you can\'t book a date that is already booked');
        } else {
            if (isset($_POST['name'], $_POST['arrival'], $_POST['departure'], $_POST['uuid'], $_POST['orderTotal'], $_POST['roomNumber'])) {
                echo var_dump($_POST["orderTotal"]);
                $db = connect($dbName);
                $username = trim(htmlspecialchars($_POST['name']));
                $arrival = $_POST['arrival'];
                $departure = $_POST['departure'];
                $uuid = $_POST['uuid'];
                if ($_POST['extras']) {
                    $extras = $_POST['extras'];
                } else {
                    $extras = 0;
                }
                $orderTotal = $_POST['orderTotal'];
                $roomNumber = $_POST['roomNumber'];
                $statement = $db->prepare("INSERT INTO bookings (full_name, arrival, departure, room_number, extras,total_cost) VALUES (:username, :arrival, :departure, :roomNumber, :extras, :orderTotal)");
                $statement->bindValue(':username', $username);
                $statement->bindValue(':arrival', $arrival);
                $statement->bindValue(':departure', $departure);
                $statement->bindValue(':roomNumber', $roomNumber);
                $statement->bindValue(':extras', $extras);
                $statement->bindValue(':orderTotal', $orderTotal);
                $statement->execute();
                $result = $statement->rowCount();
            } else {
                echo "Please fill out all fields";
            }
        }
    }
}
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
