<?php
require __DIR__ . '/../hotelFunctions.php';


$calendar = new Calendar();
$calendar->create();
?>
<div class="calendarContainer">
    <div class="calendarWrapper">
        <div id="calendarHeader">
            <p>Januari 2024</p>
        </div>
        <table class=" calendar">
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
                            <td class="calendarDay <?php echo $class ?>" data="<?php echo date("2024-01-" . $day); ?>" data="<?php echo $day; ?> ">
                                <?php echo $day; ?>
                            </td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>