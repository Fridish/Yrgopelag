<?php

declare(strict_types=1);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../functions/hotelFunctions.php';
require __DIR__ . '/../functions/calendarFunctions.php';
?>

<div class="dateWrapper">
    <div class="dateArrival dropdown" id="ddbtn1">
        <div class="datePicker">
            <p> FROM: </p>
            <div class="dropdownButton">
                <input type="hidden" name="arrival" id="arrivalPost" value=""><span class="arrivalDate"> 2024-00-00</span>
                <img src="/Media/arrowDown.svg" alt="arrow">
            </div>
        </div>

        <div class="dropdownContent">
            <div class="calendarContainer">
                <div id="calendarHeader">
                    <p>Januari 2024</p>
                </div>
                <div class="calendarWrapper">
                    <?php
                    $calendar = new Calendar();
                    $calendar->create();
                    ?>
                    <table class="calendar">
                        <tbody>
                            <?php foreach ($calendar->getWeek() as $week) : ?>
                                <tr>
                                    <?php foreach ($week as $day) :
                                        $date = "2024-01-" . str_pad((string) $day, 2, "0", STR_PAD_LEFT); //för att få rätt format på datumet
                                        $db = connect($dbName);
                                        $statement = $db->prepare("select * from bookings where (arrival = :date or departure = :date or :date between arrival and departure )and room_number = :roomNumber");

                                        $statement->bindValue(':date', $date);
                                        $statement->bindValue(':roomNumber', $roomNumber);
                                        $statement->execute();
                                        $bookings = $statement->fetchAll();
                                        $class = count($bookings) > 0 ? 'booked' : '';
                                    ?>
                                        <td class=" <?php echo $class ?> arrival" data="<?php echo date("2024-01-" . $day); ?>"><?php echo $day; ?>
                                        </td>
                                    <?php endforeach; ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="dateDeparture dropdown" id="ddbtn2">
        <div class="datePicker">
            <p> TO:</p>
            <div class="dropdownButton">
                <input type="hidden" id="departurePost" name="departure" value=""><span class="departureDate"> 2024-00-00</span>
                <img src="/Media/arrowDown.svg" alt="arrow">
            </div>
        </div>
        <div class="dropdownContent">
            <?php
            $calendar2 = new Calendar();
            $calendar2->create();
            ?>
            <div class="calendarContainer">
                <div id="calendarHeader">
                    <p>Januari 2024</p>
                </div>
                <div class="calendarWrapper">
                    <table class="calendar">
                        <tbody>
                            <?php foreach ($calendar2->getWeek() as $week) : ?>
                                <tr>
                                    <?php foreach ($week as $day) :
                                        $date = "2024-01-" . str_pad((string)$day, 2, "0", STR_PAD_LEFT); //för att få rätt format på datumet
                                        $db = connect($dbName);
                                        $statement = $db->prepare("select * from bookings where (arrival = :date or departure = :date or :date between arrival and departure )and room_number = :roomNumber");

                                        $statement->bindValue(':date', $date);
                                        $statement->bindValue(':roomNumber', $roomNumber);
                                        $statement->execute();
                                        $bookings = $statement->fetchAll();
                                        $class = count($bookings) > 0 ? 'booked' : '';
                                    ?>
                                        <td class=" <?php echo $class ?> departure" data="<?php echo date("2024-01-" . $day); ?>"><?php echo $day; ?>
                                        </td>
                                    <?php endforeach; ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="formDetailHeader">EXTRAS</div>
<div class="extrasCardContainer">
    <div class="extrasWrapper">
        <img src="/Media/kayak.png" alt="kayaking">
        <div class="extrasInfoContainer">
            <label class="container">KAYAK $5
                <input type="checkbox" id="kayak" name="extras[kayak]" name="kayak" value=5>
                <span class="checkmark"></span>
            </label>
            <p class="extrasInfo"></p>
        </div>
    </div>
    <div class="extrasWrapper">
        <img src="/Media/fishing.png" alt="kayaking">
        <div class="extrasInfoContainer">
            <label class="container">FISHING GEAR $3
                <input type="checkbox" id="fishing" name="extras[fishing]" name="fishing" value=3>
                <span class="checkmark"></span>
            </label>
            <p class="extrasInfo"></p>
        </div>
    </div>
    <div class="extrasWrapper">
        <img src="/Media/hike.png" alt="kayaking">
        <div class="extrasInfoContainer">
            <label class="container">MOUNTAIN CLIMBING WITH GUIDE $5
                <input type="checkbox" id="mountainclimbing" name="extras[mountainclimbing]" name="mountainclimbing" value=5>
                <span class="checkmark"></span>
            </label>
            <p class="extrasInfo"></p>
        </div>
    </div>
    <div class="extrasWrapper">
        <img src="/Media/sauna.png" alt="kayaking">
        <div class="extrasInfoContainer">
            <label class="container">SAUNA $3
                <input type="checkbox" id="guide" name="extras[guide]" name="guide" value=3>
                <span class="checkmark"></span>
            </label>
            <p class="extrasInfo"></p>
        </div>
    </div>
</div>
<div class="orderDetails">
    <div class="orderForm">
        <p class="orderTotal">Order total: $<input type="hidden" id="orderTotal" name="orderTotal"> <span id="total" value="">0</span></p>
        <input type="text" name="name" id="name" placeholder="Enter your full name here" autocomplete="off">
        <input type="text" name="uuid" placeholder="Enter your transfer code here" autocomplete="off">
        <input type="hidden" name="roomNumber" id="roomNumber" value="<?php echo $roomNumber; ?>">

        <button type="submit" id="submit" name="submit"> BOOK ROOM</button>
    </div>
</div>
</div>
</form>