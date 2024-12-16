<?php
$months = [
    1 => "มกราคม",
    2 => "กุมภาพันธ์",
    3 => "มีนาคม",
    4 => "เมษายน",
    5 => "พฤษภาคม",
    6 => "มิถุนายน",
    7 => "กรกฎาคม",
    8 => "สิงหาคม",
    9 => "กันยายน",
    10 => "ตุลาคม",
    11 => "พฤศจิกายน",
    12 => "ธันวาคม"
];

$number = isset($_POST["month_number"]) ? intval($_POST["month_number"]) : 0;


$month_name = $months[$number] ?? "กรุณากรอกตัวเลขระหว่าง 1 ถึง 12 เท่านั้น";
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แปลงเลขเป็นเดือน</title>
</head>
<body>
    <h1>แปลงเลขเป็นเดือน</h1>
    <form method="POST" action="">
        <label for="month_number">กรอกตัวเลข (1-12):</label>
        <input type="number" id="month_number" name="month_number" min="1" max="12" required>
        <button type="submit">แปลง</button>
    </form>
    
    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <h2>ผลลัพธ์:</h2>
        <p>แปลงเลขเป็นเดือน: <?= htmlspecialchars($month_name) ?></p>
    <?php endif; ?>
</body>
</html>
