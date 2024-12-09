<?php

const TOTAL = 100;
$price = 47;

$change = TOTAL - $price;

$tenCoinCount = intdiv($change, 10);
$change %= 10;

$fiveCoinCount = intdiv($change, 5);
$change %= 5;

$oneCoinCount = $change;

echo "Change is: " . (TOTAL - $price) . " <br>";

if ($tenCoinCount > 0) {
    echo "Ten coin is : " . $tenCoinCount . " <br>";
}
if ($fiveCoinCount > 0) {
    echo "Five coin is : " . $fiveCoinCount . " <br>";
}
if ($oneCoinCount > 0) {
    echo "One coin is : " . $oneCoinCount . " <br>";
}
?>
