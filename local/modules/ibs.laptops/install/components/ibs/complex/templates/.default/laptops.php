<?php

$APPLICATION->IncludeComponent(
    "ibs:laptops.catalog",
    "", 
    [
        "ENTITY" => "LAPTOP", 
        "PAGE_SIZE" => 2,
        "SORT_FIELD" => $arParams["SORT_FIELD"],
        "SORT_ORDER" => $arParams["SORT_ORDER"],
        "SEF_FOLDER" => $arParams["SEF_FOLDER"],
        "BRAND" => $arResult["VARIABLES"]["BRAND"],
        "MODEL" => $arResult["VARIABLES"]["MODEL"],
    ],
    $component
);