# Hidden Item Game
Simple command-line program untuk mencari kemungkinan lokasi item tersembunyi pada grid.

# Cara Menjalankan
Jalankan file PHP:
php hidden_item.php

atau sesuaikan dengan nama file yang digunakan.

# Aturan Grid
* `#` = obstacle (tidak bisa dilewati)
* `.` = clear path
* `X` = posisi awal pemain
* `$` = kemungkinan lokasi item

# Cara Kerja
Player bergerak dengan urutan:
1. Up/North sebanyak A langkah
2. Right/East sebanyak B langkah
3. Down/South sebanyak C langkah

Setelah pergerakan selesai, program akan:
1. Menentukan posisi akhir pemain
2. Mengecek 4 arah di sekitar posisi akhir (atas, bawah, kiri, kanan)
3. Menyimpan semua koordinat yang berisi `.`
4. Menampilkan koordinat kemungkinan item
5. Menampilkan grid hasil dengan simbol `$`

# Output
Program akan menampilkan:
* Grid awal
* Posisi akhir pemain
* Daftar koordinat kemungkinan item
* Grid hasil dengan penanda `$`
