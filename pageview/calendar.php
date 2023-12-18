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
                            $db = connect($dbName);
                            $statement = $db->prepare("select * from bookings where (arrival = :day or departure = :day) and room_number = 1");
                            $statement->bindValue(':day', $day);
                            $statement->execute();
                            $bookings = $statement->fetchAll();
                            $class = count($bookings) > 0 ? 'booked' : '';
                        ?>
                            <td class="calendarDay <?php echo $class ?>" id="<?php echo $day; ?>" data="<?php echo $day; ?> ">
                                <?php echo $day; ?>
                            </td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>