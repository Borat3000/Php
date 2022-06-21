<?php

class Item
{
    private $id; // не может быть отрицательным или 0
    private $title; // максимум 10 символов
    private $price; // не может быть отрицательным или 0
    private $material; // минимум 3 символа

    // свойства title и id являются обязательными,
    public function __construct(int $id, string $title, int $price, string $material) 
    // int - целое число
    // string - строка

    // InvalidAegumentException - Создаётся исключение, если аргумент не соответствует ожидаемому типу.
    // strlen — Возвращает длину строки
    {
        if ($id <= 0) {
            throw new InvalidAegumentException('Id не может быть отрицательным или 0');
        }
        $this->id = $id;
        if (strlen($title) > 10) {
            throw new InvalidAegumentException('title максимум 10 символов');
        }
        $this->title = $title;
        if ($price <= 0) {
            throw new InvalidAegumentException('price не может быть отрицательным или 0');
        }
        $this->price = $price;
        if (strlen($material) < 3) {
            throw new InvalidAegumentException('material минимум 3 символа');
        }
        $this->material = $material;
    }

    // добавить все необходимые геттеры и сеттеры

    // сеттеры

    public function setId(int $id)
    {
        if ($id <= 0) {
            throw new InvalidAegumentException('Id не может быть отрицательным или 0');
        }
        $this->id = $id;
    }
     public function setTitle(string $title)
    {
        if (strlen($title) > 10) {
            throw new InvalidAegumentException('title максимум 10 символов');
        }
        $this->title = $title;
    }
    public function setPrice(int $price)
    {
        if ($price <= 0) {
            throw new InvalidAegumentException('price не может быть отрицательным или 0');
        }
        $this->price = $price;
    }
      public function setMaterial(string $material)
    {
        if (trlen($material) < 3) {
            throw new InvalidAegumentException('material минимум 3 символа');
        }
        $this->material = $material;
    }

    // геттеры

       public function getId()
    {
        return $this->id;
    }

      public function getTitle()
    {
        return $this->title;
    }

     public function getPrice()
    {
        return $this->price;
    }


    public function getMaterial()
    {
        return $this->material;
    }

}