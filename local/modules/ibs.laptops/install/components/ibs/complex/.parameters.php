<?php

$arComponentParameters = [
    "PARAMETERS" => [
        "SEF_MODE" => [
            "laptop" => [
                "NAME" => "Детальная страница",
                "DEFAULT" => "detail/#NOTEBOOK#/",
                "VARIABLES" => ["NOTEBOOK"]
            ],
            "models" => [
                "NAME" => "Список моделей",
                "DEFAULT" => "#BRAND#/",
                "VARIABLES" => ["BRAND"]
            ],
            "laptops" => [
                "NAME" => "Список ноутбуков",
                "DEFAULT" => "#BRAND#/#MODEL#/",
                "VARIABLES" => ["BRAND", "MODEL"]
            ],
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