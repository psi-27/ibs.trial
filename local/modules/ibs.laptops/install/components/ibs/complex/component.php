<?php
use Bitrix\Main\Loader;

Loader::includeModule("ibs.laptops");

$arDefaultUrlTemplates = [
    "laptop" => "detail/#NOTEBOOK#/",
    "models" => "#BRAND#/",
    "laptops" => "#BRAND#/#MODEL#/",
];

$arDefaultVariableAliases = [];

$arComponentVariables = ["BRAND", "MODEL", "NOTEBOOK"];

if ($arParams["SEF_MODE"] == "Y") {
    $arUrlTemplates = CComponentEngine::MakeComponentUrlTemplates(
        $arDefaultUrlTemplates,
        $arParams['SEF_URL_TEMPLATES']
    );
    
    $arVariableAliases = CComponentEngine::MakeComponentVariableAliases(
        $arDefaultVariableAliases,
        $arParams['VARIABLE_ALIASES']
    );
    
    $componentPage = CComponentEngine::ParseComponentPath(
        $arParams['SEF_FOLDER'],
        $arUrlTemplates,
        $arVariables
    )?:"vendors";
    
    CComponentEngine::InitComponentVariables(
        $componentPage,
        $arComponentVariables,
        $arVariableAliases,
        $arVariables
    );

} else {
    CComponentEngine::InitComponentVariables(
        false,
        $arComponentVariables,
        $arVariableAliases,
        $arVariables
    );

    if (!empty($arVariables["BRAND"]) && !empty($arVariables["MODEL"])) {
        $componentPage = "laptops";
    }
    else if (!empty($arVariables["BRAND"])) {
        $componentPage = "models";
    }
    else if (!empty($arVariables["NOTEBOOK"])) {
        $componentPage = "laptop";
    }
    else {
        $componentPage = "vendors";
    }

}

$arResult = [
    'VARIABLES'     => $arVariables,
];

$this->IncludeComponentTemplate($componentPage);