<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $month_name = trim($_POST["month"]); 
    $year_thai = intval(trim($_POST["year"])); 

   
    $months_thai_to_number = [
        "มกราคม" => 1, "กุมภาพันธ์" => 2, "มีนาคม" => 3,
        "เมษายน" => 4, "พฤษภาคม" => 5, "มิถุนายน" => 6,
        "กรกฎาคม" => 7, "สิงหาคม" => 8, "กันยายน" => 9,
        "ตุลาคม" => 10, "พฤศจิกายน" => 11, "ธันวาคม" => 12
    ];

  
    if (array_key_exists($month_name, $months_thai_to_number) && $year_thai > 0) {
        $month = $months_thai_to_number[$month_name];
        $year = $year_thai - 543; 

        
        $is_leap_year = ($year % 4 == 0 && $year % 100 != 0) || ($year % 400 == 0);

        
        $days_in_month = [
            1 => 31,
            2 => $is_leap_year ? 29 : 28,
            3 => 31,
            4 => 30,
            5 => 31,
            6 => 30,
            7 => 31,
            8 => 31,
            9 => 30,
            10 => 31,
            11 => 30,
            12 => 31
        ];

        $total_days = $days_in_month[$month];
        $payday = $total_days - 3; 

        
        $result = "$payday $month_name $year_thai";
    } else {
        $result = "กรุณากรอกข้อมูลให้ถูกต้อง";
    }
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>โปรแกรมคำนวณวันที่จ่ายเงินเดือน</title>
</head>
<body>
    <h1>โปรแกรมคำนวณวันที่จ่ายเงินเดือน</h1>
    <form method="POST" action="">
        <label for="month">กรอกเดือน (ภาษาไทย เช่น 'มกราคม'):</label>
        <input type="text" id="month" name="month" required>
        <br><br>
        <label for="year">กรอกปี (พ.ศ.):</label>
        <input type="number" id="year" name="year" min="1" required>
        <br><br>
        <button type="submit">คำนวณ</button>
    </form>

    <?php if (!empty($result)): ?>
        <h2>ผลลัพธ์:</h2>
        <p><?= htmlspecialchars($result) ?></p>
    <?php endif; ?>
</body>
</html>
