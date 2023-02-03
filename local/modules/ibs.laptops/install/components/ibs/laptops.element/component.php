<?php

use Bitrix\Main\Entity\ReferenceField;
use Bitrix\Main\Loader;
use Ibs\Laptops\LaptopTable;
use Ibs\Laptops\ModelTable;
use Ibs\Laptops\VendorTable;

Loader::includeModule("ibs.laptops");

$arResult["COLLECTION"] = LaptopTable::getList([
    "select" => [
        '*', "MODEL", "OPTIONS"
    ],
    "filter" => ["=ID" => $arParams["LAPTOP_ID"]],
]);

$this->IncludeComponentTemplate();
