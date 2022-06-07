<?php
// ЗАДАНИЯ К 7 ИЮНЯ (вторник):

// ЗАДАЧА 1
// создать новый массив из элементов массива $users, среди увлечений которых есть 'Фотография'
$users = [
    [
        'id' => 1,
        'name' => 'Александр',
        'age' => 46,
        'hobbies' => ['Чтение', 'Фотография']
    ],
    [
        'id' => 2,
        'name' => 'Ирина',
        'age' => 33,
        'hobbies' => ['Музыка', 'Фотография', 'Путешествия']
    ],
    [
        'id' => 3,
        'name' => 'Алексей',
        'age' => 28,
        'hobbies' => ['История', 'Реконструкция']
    ],
    [
        'id' => 4,
        'name' => 'Евгений',
        'age' => 26,
        'hobbies' => ['Спорт']
    ],
    [
        'id' => 5,
        'name' => 'Оксана',
        'age' => 22,
        'hobbies' => ['Спорт', 'Фотография']
    ],
];

$new_arr = [];

foreach ($users as $user) {
    if (in_array('Путешествия', $user['hobbies'])) 
    {
        $new_arr[] = $user;
    }    
    // на каждой итерации в $value копируется значение элемента массива
    var_dump($new_arr);
}




