<?php

$APPLICATION->IncludeComponent(
    "ibs:laptops.catalog",
    "", 
    [
        "ENTITY" => "MODEL", 
        "PAGE_SIZE" => $arParams["PAGE_SIZE"],
        "SEF_FOLDER" => $arParams["SEF_FOLDER"],
        "BRAND" => $arResult["VARIABLES"]["BRAND"],
    ],
    $component
);