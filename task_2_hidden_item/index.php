<?php
$grid = [
    ['#','#','#','#','#','#','#','#'],
    ['#','.','.','.','.','.','.','#'],
    ['#','.','#','#','#','.','.','#'],
    ['#','.','.','.','#','.','#','#'],
    ['#','X','#','.','.','.','.','#'],
    ['#','#','#','#','#','#','#','#'],
];

// jumlah langkah
$A = 1; // atas
$B = 2; // kanan
$C = 1; // bawah


// Fungsi untuk mencetak grid
function printGrid($grid)
{
    foreach ($grid as $row) {
        echo implode(' ', $row) . PHP_EOL;
    }
    echo PHP_EOL;
}


// Temukan posisi awal pemain
for ($i = 0; $i < count($grid); $i++) {
    for ($j = 0; $j < count($grid[$i]); $j++) {
        if ($grid[$i][$j] === 'X') {
            $row = $i;
            $col = $j;
        }
    }
}

echo "=== GRID AWAL ===\n";
printGrid($grid);


// Gerak ke atas
for ($i = 0; $i < $A; $i++) {
    if (isset($grid[$row - 1][$col]) && $grid[$row - 1][$col] !== '#') {
        $row--;
    }
}

// Gerak ke kanan
for ($i = 0; $i < $B; $i++) {
    if (isset($grid[$row][$col + 1]) && $grid[$row][$col + 1] !== '#') {
        $col++;
    }
}

// Gerak ke bawah
for ($i = 0; $i < $C; $i++) {
    if (isset($grid[$row + 1][$col]) && $grid[$row + 1][$col] !== '#') {
        $row++;
    }
}

echo "Posisi akhir pemain: ($row, $col)\n\n";


// Cek kemungkinan item di sekitar pemain
$possibleItems = [];

$arah = [
    [-1, 0], // atas
    [1, 0],  // bawah
    [0, -1], // kiri
    [0, 1],  // kanan
];

foreach ($arah as $a) {
    $r = $row + $a[0];
    $c = $col + $a[1];

    if (isset($grid[$r][$c]) && $grid[$r][$c] === '.') {
        $possibleItems[] = [$r, $c];
        $grid[$r][$c] = '$';
    }
}


// Tampilkan hasil
echo "Koordinat kemungkinan item:\n";

if (empty($possibleItems)) {
    echo "- Tidak ada\n";
} else {
    foreach ($possibleItems as $item) {
        echo "- (" . $item[0] . ", " . $item[1] . ")\n";
    }
}

echo "\n=== GRID HASIL ===\n";
printGrid($grid);