<?php

// ЗАДАЧА 3. Сгенерировать html на основе данных массива $items
$items = [
    [
        'id' => 1,
        'title' => 'Flute',
        'price' => 20000,
        'img' => 'flute.jpg',
        'description' => [
            'color' => 'white',
            'material' => 'bamboo'
        ]
    ],
    [
        'id' => 2,
        'title' => 'Guitar',
        'price' => 18000,
        'img' => 'guitar.jpg',
        'description' => [
            'color' => 'brown',
            'material' => 'linden'
        ]
    ],
    [
        'id' => 3,
        'title' => 'Drum',
        'price' => 68000,
        'img' => 'drum.jpg',
        'description' => [
            'color' => 'brown',
            'material' => 'steel'
        ]
    ],
];
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Звери</title>
</head>
<body>
 
<?php foreach ($items as $item): ?>
    <div>
        <h2> <?php echo $item['title'] ?> </h2>  <!-- Название -->
        <p>Цена: <? echo $item['price'] ?></p> <!-- Цена -->
        <img src="<?php echo $item ['img'] ?>" alt=""> <!-- Картинка -->
        <ol>
        <?php foreach ($item['description'] as $desc): ?> <!-- перебор вложенного массива -->
            <li> <?php echo $desc ?>  </li>
        <?php  endforeach; ?>
        </ol>
    </div>
<?php  endforeach; ?>

</body>
</html>




