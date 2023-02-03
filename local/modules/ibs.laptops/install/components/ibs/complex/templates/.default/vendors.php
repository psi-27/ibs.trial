<?php

$APPLICATION->AddChainItem("Производители");

$APPLICATION->IncludeComponent(
    "ibs:laptops.catalog",
    "", 
    [
        "ENTITY" => "VENDOR", 
        "PAGE_SIZE" => $arParams["PAGE_SIZE"],
        "SEF_FOLDER" => $arParams["SEF_FOLDER"],
    ],
    $component
);