<!DOCTYPE html>
<html>
<head>
    <title> BMI Calculator </title>
    <style>
        body {
            font-family: Arial;
        }

        p {
            margin: 0;
        }

        .container {
           width: 600px;
           padding: 50px;
           margin; 30px auto;
        }

        .report {
           
           width: 600px;
           border: 1px solid black;
           padding: 20px;
           margin: 30px auto ;            
        }

        .columns {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            text-align: center;
            margin-top: 15px;
        }

        .columns div {
            padding: 8px;
        }

        h2 {
            text-align: center;
        }

    </style>
</head>
<body>

<div class="container">

    <form method="post">
        Full Name: <input type="text" name="name" required><br><br>
        Age: <input type="number" name="age" required><br><br>
        Address: <textarea name="address" required></textarea><br><br>
        Contact Number: <input type="text" name="contact" required><br><br>

        Weight (Pounds): <input type="number" step="0.01" name="weight" required><br><br>
        Height (cm): <input type="number" step="0.01" name="height" required><br><br>

        <input type="submit" name="submit" value="Submit">
        <input type="reset" value="Clear">
    </form>

<?php
if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $weightKg = $_POST['weight'];
    $heightFeet = $_POST['height'];

    // Conversions
    $weightPounds = $weightKg * 2.205;
    $heightInches = $heightFeet * 12;
    $heightMeters = ($heightInches * 2.54) / 100;

    // BMI Calculation
    $bmi = $weightKg / ($heightMeters * $heightMeters);
    $bmi = round($bmi, 2);

    // BMI Chart as Array (Converted from BMI_Chart.txt)
    $bmiChart = [
        "Under Healthy Weight" => [0, 18.4],
        "Healthy Weight" => [18.5, 24.9],
        "Overweight" => [25, 29.9],
        "Obese I" => [30, 34.9],
        "Obese II" => [35, 39.9],
        "Obese III" => [40, 100]
    ];

    foreach ($bmiChart as $category => $range) {
        if ($bmi >= $range[0] && $bmi <= $range[1]) {
            $bmiCategory = $category;
            break;
        }
    }
?>

    <div class="report">
        <h2>BMI Report of <?php echo $name; ?></h2>

        <p>Age: <?php echo $age; ?></p>
        <p>Address: <?php echo $address; ?></p>
        <p>Contact Number: <?php echo $contact; ?></p>

        <div class="columns">
            <div>Weight (Pounds)</div>
            <div>Height (Inches)</div>
            <div>BMI</div>

            <div><?php echo $weightKg; ?></div>
            <div><?php echo $heightFeet; ?></div>
            <div><?php echo $bmi; ?></div>

            <div></div>
            <div><strong>Category</strong></div>
            <div><strong><?php echo ($bmi >= 30) ? $bmiCategory : "N/A"; ?></strong></div>
        </div>
    </div>

<?php } ?>

</div>

</body>
</html>
