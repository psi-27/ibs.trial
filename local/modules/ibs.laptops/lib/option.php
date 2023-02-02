<?php

namespace Ibs\Laptops;

/**
 * Class OptionTable
 * 
 * @package Bitrix\Data
 */

use Bitrix\Main\Entity\DataManager;
use Bitrix\Main\Entity\IntegerField;
use Bitrix\Main\Entity\StringField;
use Bitrix\Main\ORM\Fields\Relations\ManyToMany;

class OptionTable extends DataManager {
    
    public static function getTableName() {
        return "ibs_laptops_option";
    }

    public static function getMap() {
        return [
            new IntegerField("ID",[ "primary" => true, "autocomplete" => true ]),
            new IntegerField("XML_ID", ["default_value" => 0]),
            new StringField("NAME", [ "required" => true ]),
            (new ManyToMany("LAPTOPS", LaptopTable::class))->configureTableName("ibs_laptops_laptops_options"),
        ];
    }
}