<?php

declare(strict_types=1);
require __DIR__ . '/vendor/autoload.php';
session_start();
$dbName = "yrgopelag.db";

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

//checks if all fields are filled out, that the transfer code is valid, the dates aren't booked, deposit money and adds a booking to the database.
if (isset($_POST["submit"])) {
    //first, check if all fields are filled out
    if (isset($_POST['name'], $_POST['arrival'], $_POST['departure'], $_POST['uuid'], $_POST['orderTotal'], $_POST['roomNumber']) && !empty($_POST['name']) && !empty($_POST['arrival']) && !empty($_POST['departure']) && !empty($_POST['uuid']) && !empty($_POST['orderTotal']) && !empty($_POST['roomNumber'])) {
        //then check if the dates are booked
        $datesAvailable = checkDates();
        if ($datesAvailable === true) {
            $validUuid = checkUuid();
            //then check if the uuid is valid
            if ($validUuid !== false) {
                //if all fields are filled out and UUID is ok, insert into database
                bookRoom();
                //if everything works, deposit the money to my account
                depositMoney();

                header('Location:/confirmation.php');
                //if everything works, redirect to confirmation page with json of booking (using header?)
            }
        }
    } else {
        echo "Please fill out all fields";
    }
}
function checkDates()
{
    $roomNumber = $_POST['roomNumber'];
    $dbName = "yrgopelag.db";
    $arrival = $_POST['arrival'];
    $departure = $_POST['departure'];
    if ($_POST['arrival'] > $_POST['departure']) {
        echo 'Please choose a valid date';
        return false;
    } else {
        $db = connect($dbName);
        $statement = $db->prepare("SELECT * FROM bookings WHERE (arrival = :arrival OR departure = :departure OR :arrival BETWEEN arrival AND departure OR :departure BETWEEN arrival AND departure) AND room_number = :roomNumber");
        $statement->bindValue(':arrival', $arrival);
        $statement->bindValue(':departure', $departure);
        $statement->bindValue(':roomNumber', $roomNumber);
        $statement->execute();
        $bookings = $statement->fetchAll();
        if (count($bookings) > 0) {
            print_r('Please choose a date that hasn\'t already been booked');
            return false;
        } else {
            return true;
        }
    }
}

//Cheks if the uuid is valid, then it checks if it matches with the API
function checkUuid()
{
    if (isValidUuid($_POST['uuid']) == false) {
        echo 'please enter a valid transfercode';
        return false;
    } else {
        //use guzzle to check transferCode 
        //if transferCode is valid, insert into database
        $client = new GuzzleHttp\Client();
        $transferCode = $_POST['uuid']; //ex. 3e0a0d8d-28f0-4e47-9dd1-2f335ab65fd8
        $totalCost = (int) $_POST['orderTotal']; // ex. 10
        try {
            $response = $client->request('POST', "https://www.yrgopelag.se/centralbank/transferCode", [
                'form_params' => [
                    'transferCode' => $transferCode,
                    'totalcost' => $totalCost
                ],
            ]);
            $response = $response->getBody()->getContents();
        } catch (GuzzleHttp\Exception\ServerException $e) {
            echo 'Invalid transfercode';
            return false;
        }
    }
}


//deposits the money to my account
function depositMoney()
{
    $client = new GuzzleHttp\Client();
    try {
        $response = $client->request('POST', "https://www.yrgopelag.se/centralbank/deposit", [
            'form_params' => [
                'user' => 'Frida',
                'transferCode' => $_POST['uuid']
            ],
        ]);
        $response = $response->getBody()->getContents();
    } catch (GuzzleHttp\Exception\ServerException $e) {
        echo 'Something went wrong. Try again';
        return false;
    }
}


function bookRoom()
{
    $dbName = "yrgopelag.db";
    $db = connect($dbName);
    $username = trim(htmlspecialchars($_POST['name'],  ENT_QUOTES));
    $arrival = $_POST['arrival'];
    $departure = $_POST['departure'];
    if (isset($_POST['extras'])) {
        foreach ($_POST['extras'] as $extra) {
            $extras = $extra;
        }
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
    $uuidookie = vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    $_SESSION['bookingId'] = $uuidookie;
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}
function isValidUuid(string $uuid): bool
{
    if (!is_string($uuid) || (preg_match('/^[0-9a-f]{8}-[0-9a-f]{4}-4[0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$/', $uuid) !== 1)) {
        return false;
    }
    return true;
}


function addFeatureJson()
{
    if (isset($_POST['extras']['kayak']) && !empty($_POST['extras']['kayak'])) {
        $features[] = [
            'name' => 'kayak',
            'price' => 5,
        ];
    }
    if (isset($_POST['extras']['fishing_gear']) && !empty($_POST['extras']['fishing_gear'])) {
        $features[] = [
            'name' => 'kayak with fishing gear',
            'price' => 6,
        ];
    }
    if (isset($_POST['extras']['mountain_climbing']) && !empty($_POST['extras']['mountain_climbing'])) {
        $features[] = [
            'name' => 'mountain climbing',
            'price' => 10,
        ];
    }
    if (isset($_POST['extras']['guide']) && !empty($_POST['extras']['guide'])) {
        $features[] = [
            'name' => 'guided tour of the island',
            'price' => 8,
        ];
    }
    if (empty($_POST['extras']['kayak']) && empty($_POST['extras']['fishing_gear']) && empty($_POST['extras']['mountain_climbing']) && empty($_POST['extras']['guide'])) {
        $features[] = [
            'name' => 'No extras',
            'price' => 0,
        ];
    }
    return $features;
}
//insert the data into the json file
if (isset($_POST['submit'])) {

    $name = htmlspecialchars($_POST['name'], ENT_QUOTES);

    $vacation = [];

    $vacation = json_decode(file_get_contents(__DIR__ . '/logbook.json'), true);

    $vacation['vacation'][] = [
        'guest' => $name,
        'island' => 'Berghav',
        'hotel' => 'STUUGA',
        'arrival_date' => $_POST['arrival'],
        'departure_date' => $_POST['departure'],
        'total_cost' => $_POST['orderTotal'],
        'stars' => '2',
        'features' => addFeatureJson(),
        'addtional_info' => "Thank you for choosing STUUGA",
        'booking_id' => guidv4(),
    ];
    file_put_contents(__DIR__ . '/logbook.json', json_encode($vacation, JSON_PRETTY_PRINT));
}
