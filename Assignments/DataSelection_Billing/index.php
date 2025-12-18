<!DOCTYPE html>
<html>
<head>
    <title>Internet Usage Calculator</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <form action="billing.php" method="post">
        <label><strong>Client's name</strong></label>
        <input type="text" name="name" required>

        <label><strong>Account number</strong></label>
        <input type="text" name="account" required><br>

        <label><strong>Type</strong></label>
        <div class="radio-group">
            <input type="radio" name="type" value="4G" required> 4G<br>
            <input type="radio" name="type" value="Fiber"> Fiber
        </div>

        <label><strong>Internet Package</strong></label>
        <select name="package">
            <option value="Basic">Basic</option>
            <option value="Web Lite">Web Lite</option>
            <option value="Any Blast">Any Blast</option>
            <option value="Family Plan">Family Plan</option>
        </select><br>

        <label><strong>Extra GB used</strong></label>
        <input type="number" name="extra" required>

        <button type="submit">Calculate</button>
    </form>
</div>

</body>
</html>
