<?php

use Ibs\Laptops\ModelTable;

$APPLICATION->AddChainItem("Производители", $arParams["SEF_FOLDER"].$arParams["VARIABLES"]["BRAND"]);
$APPLICATION->AddChainItem("Модели", $arParams["SEF_FOLDER"].$arResult["VARIABLES"]["BRAND"].'/');


if ($arResult["COLLECTION"]) {
    $APPLICATION->AddChainItem(ModelTable::getById($arResult["VARIABLES"]["MODEL"])->fetchObject()->getName());
}

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