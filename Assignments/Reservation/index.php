<!DOCTYPE html>
<html>
<head>
    <title>Hotel Reservation</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="box">
<form method="post" action="reserve.php">

    <label>Customer name</label>
    <input type="text" name="name" value="" required><br>

    <label>Check-in date</label>
    <input type="date" name="checkin" required>

    <label>Check-out date</label>
    <input type="date" name="checkout" required>

    <label>Hotel</label>
    <select name="hotel">
        <option>Riverside hotel</option>
        <option>Lagoon view hotel</option>
        <option>Nature Villa</option>
        <option>Beach Resort</option>
    </select>
    <br>

    <label>Room Type</label><br>
    <input type="radio" name="room" value="Standard Double"> Standard Double<br>
    <input type="radio" name="room" value="Deluxe Twin Room" checked> Deluxe Twin Room<br>
    <input type="radio" name="room" value="Executive Suite"> Executive Suite<br><br>

    <label>Activities &emsp;No of hours</label><br><br>

    <input type="checkbox" name="spa"> Spa
    <input type="number" name="spa_h" min="0"><br>

    <input type="checkbox" name="cycling"> Cycling
    <input type="number" name="cycling_h" min="0"><br>

    <input type="checkbox" name="swimming"> Swimming
    <input type="number" name="swimming_h" min="0"><br>

    <input type="checkbox" name="gym"> Gym
    <input type="number" name="gym_h" min="0"><br><br>

    <input type="radio" name="board" value="Half board"> Half board
    <input type="radio" name="board" value="Full board" checked> Full board<br><br>

    <button type="submit" >Reserve</button>

</form>
</div>

</body>
</html>
