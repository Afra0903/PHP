<?php
$name = $_POST['name'];
$account = $_POST['account'];
$type = $_POST['type'];
$package = $_POST['package'];
$extraGB = (int)$_POST['extra'];

/* Package prices */
$packages = [
    "Basic" => 760,
    "Web Lite" => 1520,
    "Any Blast" => 2340,
    "Family Plan" => 3790
];

$monthlyRental = $packages[$package];

/* Fiber rental */
$fiberRental = ($type == "Fiber") ? 760 : 0;

/* Extra GB calculation */
$remaining = $extraGB;
$extraCharge = 0;

if ($remaining > 0) {
    $use = min(4, $remaining);
    $extraCharge += $use * 100;
    $remaining -= $use;
}
if ($remaining > 0) {
    $use = min(15, $remaining);
    $extraCharge += $use * 85;
    $remaining -= $use;
}
if ($remaining > 0) {
    $use = min(30, $remaining);
    $extraCharge += $use * 75;
    $remaining -= $use;
}
if ($remaining > 0) {
    $extraCharge += $remaining * 60;
}

$total = $fiberRental + $monthlyRental + $extraCharge;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Internet Usage Bill</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="bill">
    <h2>Internet Usage Bill of Account Number <?php echo $account; ?></h2>

    <p><strong>Customer Name :</strong> <?php echo $name; ?></p>
    <p><strong>Internet Package :</strong> <?php echo $package; ?></p>

    <table>
        <tr>
            <th></th>
            <th>Units</th>
            <th>Amount</th>
        </tr>
        <tr>
            <td>Rental / Fiber</td>
            <td>-</td>
            <td>Rs. <?php echo $fiberRental; ?></td>
        </tr>
        <tr>
            <td>Monthly Rental</td>
            <td>-</td>
            <td>Rs. <?php echo $monthlyRental; ?></td>
        </tr>
        <tr>
            <td>Extra GB used</td>
            <td><?php echo $extraGB; ?></td>
            <td>Rs. <?php echo $extraCharge; ?></td>
        </tr>
        <tr>
            <td><strong>Total</strong></td>
            <td></td>
            <td><strong>Rs. <?php echo $total; ?></strong></td>
        </tr>
    </table>
</div>

</body>
</html>
