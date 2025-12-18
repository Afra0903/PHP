<?php
$name = $_POST['name'];
$hotel = $_POST['hotel'];
$room = $_POST['room'];
$board = $_POST['board'];

$checkin = strtotime($_POST['checkin']);
$checkout = strtotime($_POST['checkout']);
$days = ($checkout - $checkin) / (60 * 60 * 24);

/* Room charges table */
$rates = [
    "Riverside hotel" => [
        "Standard Double" => 7500,
        "Deluxe Twin Room" => 8500,
        "Executive Suite" => 10000
    ],
    "Lagoon view hotel" => [
        "Standard Double" => 8500,
        "Deluxe Twin Room" => 10000,
        "Executive Suite" => 12500
    ],
    "Nature Villa" => [
        "Standard Double" => 10000,
        "Deluxe Twin Room" => 12500,
        "Executive Suite" => 15000
    ],
    "Beach Resort" => [
        "Standard Double" => 12500,
        "Deluxe Twin Room" => 15000,
        "Executive Suite" => 20000
    ]
];

$roomCost = $rates[$hotel][$room] * $days;

/* Board charge */
$boardCost = ($board == "Full board") ? 3500 : 0;

/* Activity charges */
$activities = [
    "Spa" => [5000, $_POST['spa_h'] ?? 0, isset($_POST['spa'])],
    "Cycling" => [400, $_POST['cycling_h'] ?? 0, isset($_POST['cycling'])],
    "Swimming" => [1000, $_POST['swimming_h'] ?? 0, isset($_POST['swimming'])],
    "Gym" => [850, $_POST['gym_h'] ?? 0, isset($_POST['gym'])]
];

$activityTotal = 0;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reservation Receipt</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="receipt">
<h2>Reservation Receipt</h2>

<p><strong>Customer Name :</strong> <?php echo $name; ?></p>

<table>
<tr><td><td><td><strong>Charges(Rs.)</strong></td><td></td></td></td></tr>
<tr><td>Hotel:</td><td><?php echo $hotel; ?></td></tr>
<tr><td>Room type:</td><td><?php echo $room; ?></td>

<tr><td>Number of days you stay:</td><td><?php echo $days; ?></td>
<td><?php echo number_format($roomCost,2); ?></td></tr>

<tr><td>Full board/ half board:</td><td><?php echo $board; ?></td>
<td><?php echo number_format($boardCost,2); ?></td></tr>

<tr><td><strong>Activities</strong></td></tr>

<?php
foreach ($activities as $act => $data) {
    if ($data[2] && $data[1] > 0) {
        $cost = $data[0] * $data[1];
        $activityTotal += $cost;
        echo "<tr>
                <td>$act ({$data[1]}h)</td>
                <td></td>
                <td>".number_format($cost,2)."</td>
              </tr>";
    }
}

$total = $roomCost + $boardCost + $activityTotal;
?>

<tr>
    <td><td><strog>Total</strog></td></td>
    <td><strong><?php echo number_format($total,2); ?></strong></td>
</tr>

</table>
</div>

</body>
</html>
