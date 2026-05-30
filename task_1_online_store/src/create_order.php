<?php

include '../config/db.php';

header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"), true);

if (!$data) {

    http_response_code(400);

    echo json_encode([
        "message" => "Invalid request"
    ]);

    exit;
}

$product_id = $data['product_id'];
$qty = $data['qty'];

try {

    // Mulai transaksi
    $conn->begin_transaction();

    $sql = "
        SELECT * FROM product
        WHERE id_product = $product_id
        FOR UPDATE
    ";

    $result = $conn->query($sql);

    if ($result->num_rows == 0) {

        http_response_code(404);

        echo json_encode([
            "message" => "Produk tidak ditemukan"
        ]);

        exit;
    }

    $product = $result->fetch_assoc();
    
    // Cek stock
    if ($product['stock'] < $qty) {

        $conn->rollback();

        http_response_code(400);

        echo json_encode([
            "message" => "Stock tidak cukup"
        ]);

        exit;
    }

    $newStock = $product['stock'] - $qty;

    $update = "
        UPDATE product
        SET stock = $newStock
        WHERE id_product = $product_id
    ";

    $conn->query($update);

    $insert = "
        INSERT INTO orders(product_id, qty)
        VALUES($product_id, $qty)
    ";

    $conn->query($insert);

    $conn->commit();

    echo json_encode([
        "message" => "Order berhasil",
        "sisa_stock" => $newStock
    ]);

} catch (Exception $e) {

    $conn->rollback();

    http_response_code(500);

    echo json_encode([
        "message" => $e->getMessage()
    ]);
}