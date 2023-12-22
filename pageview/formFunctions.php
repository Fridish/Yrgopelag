<div>
    <div class="extras">
        <label>Tillägg</label>

        <label class="container">Kajak $5
            <input type="checkbox" id="kajak" name="extras" value=5>
            <span class="checkmark"></span>
        </label>

        <label class="container">Kajak med fiskeutrustning $6
            <input type="checkbox" id="fiskeutrustning" name="extras" value=6>
            <span class="checkmark"></span>
        </label>

        <label class="checkbox">Bergsklättring $10
            <input type="checkbox" id="bergsklättring" name="extras" value=10>
            <span class="checkmark"></span>
        </label>

        <label class="checkbox">Guidad tur över ön $8
            <input type="checkbox" id="guide" name="extras" value=8>
            <span class="checkmark"></span>
        </label>
        <p>Order total: $<input type="hidden" id="orderTotal" name="orderTotal"> <span id="total" value="">0</span></p>
    </div>
    <input type="text" name="name" id="name" placeholder="Enter your full name here">
    <input type="text" name="uuid" placeholder="Enter your transfer code here">
    <input type="hidden" name="roomNumber" id="roomNumber" value="<?php echo $roomNumber; ?>">

    <button type="submit" name="submit"> submit</button>
    </form>