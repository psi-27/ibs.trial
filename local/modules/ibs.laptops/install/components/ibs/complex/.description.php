<?php
/*
 * Файл local/components/tokmakov/iblock/.description.php
 */
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
    'NAME' => 'Ibs Laptops (комплексный)', // название компонента
    'DESCRIPTION' => 'Универсальный компонент для информационного блока',
    'CACHE_PATH' => 'Y', // показывать кнопку очистки кеша
    'SORT' => 40, // порядок сортировки в визуальном редакторе
    'COMPLEX' => 'Y', // признак комплексного компонента
    'PATH' => array( // расположение компонента в визуальном редакторе
        'ID' => 'other_components', // идентификатор верхнего уровеня в редакторе
        'NAME' => 'IBS', // название верхнего уровня в редакторе
    )
);