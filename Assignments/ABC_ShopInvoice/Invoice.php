<?php
function calculateDiscount($qty, $unitPrice) {
    $total = $qty * $unitPrice;
    $discount = 0;

    if ($qty > 50) {
        $freeItems = floor($qty / 30) * 5;
        $payableQty = $qty - $freeItems;
        $total = $payableQty * $unitPrice;
    }

    if ($qty > 50) {
        $discount = 0; // Already applied free items
    } elseif ($qty > 20) {
        $discount = $total * 0.10;
    } elseif ($qty > 10) {
        $discount = $total * 0.02;
    }

    return [$total - $discount, $discount];
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $shopName = $_POST['shop_name'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];

    $items = $_POST['item'];
    $total = 0;
    $totalDiscount = 0;
    $invoiceItems = [];

    foreach ($items as $item) {
        $code = $item['code'];
        $name = $item['name'];
        $qty = (int)$item['qty'];
        $price = (float)$item['price'];

        list($finalPrice, $discount) = calculateDiscount($qty, $price);
        $invoiceItems[] = [
            'code' => $code,
            'name' => $name,
            'qty' => $qty,
            'price' => number_format($finalPrice, 2)
        ];
        $total += $finalPrice;
        $totalDiscount += $discount;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Shop Invoice Generator</title>
    <style>
        body { font-family: Arial; margin: 40px; }
        table, th, td { border: none; border-collapse: collapse; padding: 8px; }
        .invoice { margin-top: 30px; }

        .Box,
.invoice {
  width: 800px;
  border: 1px solid black;
  padding: 20px;
  margin: 30px auto;
}
    </style>
</head>
<body>
<div class="Box">
<form method="post">
    <label>Shop Name: <input type="text" name="shop_name" required></label><br><br>
    <label>Address: <input type="text" name="address" required></label><br><br>
    <label>Contact Number: <input type="text" name="contact" required></label><br><br>
    <label>Email Address: <input type="email" name="email" required></label><br><br>

    <table>
        <tr>
            <th>Item Code</th>
            <th>Item Name</th>
            <th>Quantity</th>
            <th>Unit Price (Rs.)</th>
        </tr>
        <?php for ($i = 0; $i < 3; $i++): ?>
        <tr>
            <td><input type="text" name="item[<?= $i ?>][code]"></td>
            <td><input type="text" name="item[<?= $i ?>][name]"></td>
            <td><input type="number" name="item[<?= $i ?>][qty]" min="0"></td>
            <td><input type="number" name="item[<?= $i ?>][price]" step="0.01" min="0"></td>
        </tr>
        <?php endfor; ?>
    </table><br>

    <button type="submit" name="submit">Submit</button>
    <button type="reset">Clear</button>
</form>
</div>
<?php if (!empty($invoiceItems)): ?>
<div class="invoice">
    <h3><?= htmlspecialchars($shopName) ?> - Invoice</h3>
    <p>Address: <?= htmlspecialchars($address) ?><br>
       Contact Number: <?= htmlspecialchars($contact) ?><br>
       Email: <?= htmlspecialchars($email) ?></p>

    <table>
        <tr>
            <th>Item Code</th>
            <th>Item Name</th>
            <th>Quantity</th>
            <th>Price (Rs.)</th>
        </tr>
        <?php foreach ($invoiceItems as $item): ?>
        <tr>
            <td><?= htmlspecialchars($item['code']) ?></td>
            <td><?= htmlspecialchars($item['name']) ?></td>
            <td><?= $item['qty'] ?></td>
            <td><?= $item['price'] ?></td>
        </tr>
        <?php endforeach; ?>
        <tr>
            <td><td><td><strong>Discount</strong></td></td></td>
            <td><strong>Rs. <?= number_format($totalDiscount, 2) ?></strong></td>
        </tr>
        <tr>
            <td><td><td><strong>Total</strong></td></td></td>
            <td><strong>Rs. <?= number_format($total, 2) ?></strong></td>
            
        </tr>
        </table>
    

    
</div>
<?php endif; ?>
</body>
</html>