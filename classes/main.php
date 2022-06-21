<?php
require_once 'item.php';
require_once 'itemStorage.php';

// создать объекты Item (товар) и ItemStore (хранилище),
$balk = new Item(1, 'Брус', 1000, 'дерево');
$awning = new Item(2, 'Тент', 700, 'пластик');
$castle = new Item(3, 'Замок', 5000, 'металл');
$board = new Item(4, 'Доска', 1500, 'дерево');
$storage = new ItemStorage();

// добавить товары в хранилище
$storage->add_item($balk);
$storage->add_item($awning);
$storage->add_item($castle);
$storage->add_item($board);

// вызвать методы поиска товаров в хранилище:
    // get_by_material,
var_dump($storage->get_by_material('дерево'));

    // get_by_price_and_material,
var_dump($storage->get_by_price_and_material(1500,'дерево'));

    // get_by_price
var_dump($storage->get_by_price(1500, 700));