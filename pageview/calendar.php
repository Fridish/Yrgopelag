<?php

declare(strict_types=1);
require __DIR__ . '/../hotelFunctions.php';
require __DIR__ . '/calendarFunctions.php';
$calendar = new Calendar();
$calendar->create();
?>
<div class="calendarContainer">
    <div id="calendarHeader">
        <p>Januari 2024</p>
    </div>
    <div class="calendarWrapper">

        <table class="calendar">
            <tbody>
                <?php foreach ($calendar->getWeek() as $week) : ?>
                    <tr>
                        <?php foreach ($week as $day) :
                            $date = "2024-01-" . str_pad($day, 2, "0", STR_PAD_LEFT); //för att få rätt format på datumet
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
                            $date = "2024-01-" . str_pad($day, 2, "0", STR_PAD_LEFT); //för att få rätt format på datumet
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
<!-- <span name="departure" id="departureDate">2024-01-01</span>
 <span name="arrival" id="arrivalDate">2024-01-01</span> -->