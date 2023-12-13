<?php
$calendar = new Calendar();
$calendar->setYear(2024);
$calendar->setMonth(1);
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
                        <?php foreach ($week as $day) : ?>
                            <td id="<?php echo $day; ?>">
                                <?php echo $day; ?>
                            </td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>