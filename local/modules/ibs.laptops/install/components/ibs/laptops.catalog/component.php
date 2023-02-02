<?php
use Bitrix\Main\Loader;
use Ibs\Laptops\LaptopTable;
use Ibs\Laptops\ModelTable;
use Ibs\Laptops\VendorTable;

Loader::includeModule("ibs.laptops");

$entities = [
    "VENDOR" => "Ibs\\Laptops\\VendorTable",
    "MODEL" => "Ibs\\Laptops\\ModelTable",
    "LAPTOP" => "Ibs\\Laptops\\LaptopTable",
];

$entityClassName = $entities[$arParams["ENTITY"]];

$filter = [];
$order = [];

if (!empty($arParams["BRAND"]) && !empty($arParams["MODEL"])) {
    $filter = [
        "=MODEL_ID" => $arParams["MODEL"]
    ];
} else if (!empty($arParams["BRAND"])) {
    $filter = [
        "=VENDOR_ID" => $arParams["BRAND"]
    ];
}



if (!empty($arParams["BRAND"]) && !empty($arParams["MODEL"]) && !empty($arParams["SORT_FIELD"])) {
    $order = [
        $arParams["SORT_FIELD"] => $arParams["SORT_ORDER"]
    ];
}

$nav = new \Bitrix\Main\UI\PageNavigation("page");
$nav->allowAllRecords(true)
   ->setPageSize($arParams["PAGE_SIZE"])
   ->initFromUri();

$arResult["COLLECTION"] = $entityClassName::getList([
    "select" => [
        '*',
    ],
    "filter" => $filter,
    "order" => $order,
    "count_total" => true,
    "offset" => $nav->getOffset(),
    "limit" => $nav->getLimit(),
]);

$arResult["TYPE"] = $arParams["ENTITY"];

$arResult["NAV"] = $nav;

$nav->setRecordCount($arResult["COLLECTION"]->getCount());

$this->IncludeComponentTemplate();