<?php

use Ibs\Laptops\ModelTable;


$APPLICATION->IncludeComponent(
	"ibs:laptops.element",
	"",
	Array(
		"LAPTOP_ID" => $arResult["VARIABLES"]["NOTEBOOK"],
        "SEF_FOLDER" => $arParams["SEF_FOLDER"],
	),
	$component
);
