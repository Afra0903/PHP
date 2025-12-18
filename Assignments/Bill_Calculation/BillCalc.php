<!DOCTYPE html>
<html>
<head>
    <title>Grocery Bill Calculator</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        input[type=number] { width: 60px; }
        .error { color: red; }
        .bill { margin-top: 20px; font-weight: bold; }
    </style>    
</head>
<body>
    <div class="container">
        <?php
        $items = [
            "biscuits" => ["label" => "Biscuits (Rs50 each)", "price" => 50],
            "noodles"  => ["label" => "Noodles (Rs100 each)", "price" => 100],
            "bread"    => ["label" => "Bread (Rs40 each)", "price" => 40],
            "milk"     => ["label" => "Milk (Rs60 each)", "price" => 60],
            "eggs"     => ["label" => "Eggs (Rs5 each)", "price" => 5],
            "dhal"     => ["label" => "Dhal (Rs75 per kg)", "price" => 75]
        ];

        $errors = [];
        $values = [];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            foreach ($items as $key => $item) {
                $input = $_POST[$key] ?? 0;
                if (!is_numeric($input) || $input < 0 || floor($input) != $input) {
                    $errors[$key] = "Enter a valid number";
                    $values[$key] = 0;
                } else {
                    $values[$key] = (int)$input;
                }
            }

            if (empty($errors)) {
                $total = 0;
                foreach ($items as $key => $item) {
                    $total += $values[$key] * $item["price"];
                }
                echo "<div class='bill'>Your Total Bill<br><br>Total Bill: Rs{$total}<br><br></div>";
                echo '<a href="' . $_SERVER['PHP_SELF'] . '">Go Back</a>';
                exit;
            }
        }
        ?>

        <h2>Grocery Bill Calculation</h2>
        <form method="post">
            <?php
            foreach ($items as $key => $item) {
                $value = $values[$key] ?? 0;
                echo "<div>{$item['label']}: <input type='number' name='{$key}' value='{$value}' min='0'></div>";
                if (isset($errors[$key])) {
                    echo "<div class='error'>{$errors[$key]}</div>";
                }
            }
            ?>
            <br>
            <input type="submit" value="Calculate Bill">
        </form>
    </div>
</body>
</html>