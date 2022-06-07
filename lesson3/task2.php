<?php

// ЗАДАЧА 2
// Дан массив $tours. Увеличить стоимость каждого тура на 10%. Стоимость австралийских туров на 12%
$tours = [
    [
        'id' => 1,
        'city' => 'Лондон',
        'price' => 3600,
        'country' => 'Великобритания'
    ],
    [
        'id' => 2,
        'city' => 'Осло',
        'price' => 2800,
        'country' => 'Норвегия'
    ],
    [
        'id' => 3,
        'city' => 'Сидней',
        'price' => 4100,
        'country' => 'Австралия'
    ],
    [
        'id' => 4,
        'city' => 'Канберра',
        'price' => 3900,
        'country' => 'Австралия'
    ]
];

foreach ($tours as &$tour) {
    $tour['price'] += 10;
    
}
unset($tour);
var_dump($tours);



