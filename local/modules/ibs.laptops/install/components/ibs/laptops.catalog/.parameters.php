<?php

$arComponentParameters = [
    "PARAMETERS" => [
        "ENTITY" => [
            "NAME" => "Сущность",
            "TYPE" => "LIST",
            "VALUES" => [
                "VENDOR" => "Производитель",
                "MODEL" => "Модель",
                "LAPTOP" => "Ноутбук",
            ],
            "DEFAULT" => "VENDOR",
        ],
        "SORT_FIELD" => [
            "NAME" => "Поле для сортировки",
            "TYPE" => "LIST",
            "VALUES" => [
                0 => "Не выбрано",
                "YEAR" => "Год выпуска",
                "PRICE" => "Цена",
            ],
            "DEFAULT" => 0,
        ],
        "SORT_ORDER" => [
            "NAME" => "Направление сортировки",
            "TYPE" => "LIST",
            "VALUES" => [
                "DESC" => "По убыванию",
                "ASC" => "По возрастанию",
            ],
            "DEFAULT" => "ASC",
        ],
        "PAGE_SIZE" => [
            "NAME" => "Элементов на странице",
            "TYPE" => "STRING",
            "DEFAULT" => "2",
        ],
    ]
];