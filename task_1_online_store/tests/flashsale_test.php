<?php

$url = "http://localhost:8000/src/create_order.php";

$data = json_encode([
    "product_id" => 1,
    "qty" => 1
]);

for ($i = 0; $i < 20; $i++) {

    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_POST, true);

    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json'
    ]);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);

    echo $response . PHP_EOL;

    curl_close($ch);
}