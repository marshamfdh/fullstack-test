# Online Store API
Simple API untuk flash sale

# Cara Menjalankan
1. Import database dari file:
schema.sql

2. Jalankan project menggunakan Laragon atau PHP built-in server.
php -S localhost:8000

3. Buka di browser:
http://localhost:8000

# Endpoint
POST /src/create_order.php

Body JSON:
{
"product_id": 1,
"qty": 1
}

# Functional Test
Jalankan command berikut untuk simulasi flash sale:
php test/flashsale_test.php

Test ini digunakan untuk mengirim multiple request dan memastikan stock tidak minus.
