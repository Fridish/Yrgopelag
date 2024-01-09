<?php
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../hotelFunctions.php';
require __DIR__ . '/calendarFunctions.php';
?>

<div class="dateWrapper">
    <div class="dateArrival dropdown">
        <p class="datePicker"> FROM: <span id="arrival"> 2024-00-00</span></p>
        <div class="dropdownContent">
            <?php
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
            ?>
        </div>
    </div>
    <div class="dateDeparture dropdown">
        <p class="datePicker"> FROM: <span id="departure"> 2024-00-00</span></p>
        <div class="dropdownContent departure">
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
            ?>
        </div>
    </div>
</div>

<div class="formHeaderBig">EXTRAS</div>
<div class="extrasCardContainer">
    <div class="extrasWrapper">
        <img src="/Media/kayak.png" alt="kayaking">
        <div class="extrasInfoContainer">
            <label class="container">KAYAK $5
                <input type="checkbox" id="kayak" name="extras[kayak]" name="kayak" value=5>
                <span class="checkmark"></span>
            </label>
            <p class="extrasInfo">Unlock the thrill of the sea with our kayak borrowing service and immerse yourself in the tranquility of paddling as you explore the beauty of nature from a unique and unforgettable perspective.</p>
        </div>
    </div>
    <div class="extrasWrapper">
        <img src="/Media/fishing.png" alt="kayaking">
        <div class="extrasInfoContainer">
            <label class="container">FISHING GEAR $3
                <input type="checkbox" id="fishing" name="extras[fishing]" name="fishing" value=3>
                <span class="checkmark"></span>
            </label>
            <p class="extrasInfo">Embark on a natural escape with high-quality equipment for a serene angling experience. Reel in the peaceful surroundings and create unforgettable moments by the water's edge.</p>
        </div>
    </div>
    <div class="extrasWrapper">
        <img src="/Media/hike.png" alt="kayaking">
        <div class="extrasInfoContainer">
            <label class="container">MOUNTAIN CLIMBING WITH GUIDE $6
                <input type="checkbox" id="mountainclimbing" name="extras[mountainclimbing]" name="mountainclimbing" value=5>
                <span class="checkmark"></span>
            </label>
            <p class="extrasInfo"> Conquer heights, push your limits, and turn your mountain climb into a captivating event in the heart of nature.</p>
        </div>
    </div>
    <div class="extrasWrapper">
        <img src="/Media/sauna.png" alt="kayaking">
        <div class="extrasInfoContainer">
            <label class="container">SAUNA $3
                <input type="checkbox" id="guide" name="extras[guide]" name="guide" value=5>
                <span class="checkmark"></span>
            </label>
            <p class="extrasInfo">The warmth of our meticulously crafted cedar saunas meets the serenity of nature. Unwind, detoxify, and rejuvenate in this tranquil setting, turning your sauna session into a blissful escape amid the soothing embrace of the natural environment.</p>
        </div>
    </div>
</div>
<div class="orderDetails">
    <h1 class="formHeaderBig">ORDER DETAILS</h1>
    <div class="orderDetailsWrapper">
        <div>
            <p>Price/night:</p>
            <p>Extras:</p>
        </div>
        <div>
            <p class="orderTotal">Order total: $<input type="hidden" id="orderTotal" name="orderTotal"> <span id="total" value="">0</span></p>
            <input type="text" name="name" id="name" placeholder="Enter your full name here">
            <input type="text" name="uuid" placeholder="Enter your transfer code here">
            <input type="hidden" name="roomNumber" id="roomNumber" value="<?php echo $roomNumber; ?>">

            <button type="submit" name="submit"> submit</button>
            </form>
        </div>
    </div>
</div>
</div>
<div class="writeReview">
    <h1>HAVE YOU VISITED STUUGA BEFORE? FEEL FREE TO LEAVE US A REVIEW!</h1>
    <a>I WANT TO WRITE A REVIEW ></a>
</div>