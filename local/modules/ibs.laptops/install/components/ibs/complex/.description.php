<?php
/*
 * Файл local/components/tokmakov/iblock/.description.php
 */
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
    'NAME' => 'Ibs Laptops (комплексный)', 
    'DESCRIPTION' => 'Универсальный компонент для информационного блока',
    'CACHE_PATH' => 'Y',
    'SORT' => 40,
    'COMPLEX' => 'Y',
    'PATH' => [
        'ID' => 'other_components', // идентификатор верхнего уровеня в редакторе
        'NAME' => 'IBS', // название верхнего уровня в редакторе
    ]
);