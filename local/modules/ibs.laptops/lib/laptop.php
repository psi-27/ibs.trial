<?php

namespace Ibs\Laptops;

/**
 * Class LaptopTable
 * 
 * @package Bitrix\Data
 */

use Bitrix\Main\Entity\DataManager;
use Bitrix\Main\Entity\IntegerField;
use Bitrix\Main\Entity\FloatField;
use Bitrix\Main\Entity\ReferenceField;
use Bitrix\Main\Entity\StringField;
use Bitrix\Main\ORM\Fields\Relations\ManyToMany;
use Bitrix\Main\ORM\Query\Join;

class LaptopTable extends DataManager {
    
    public static function getTableName() {
        return "ibs_laptops_laptop";
    }

    public static function getMap() {
        return [
            new IntegerField("ID",[ "primary" => true, "autocomplete" => true ]),
            new IntegerField("XML_ID", ["default_value" => 0]),
            new IntegerField("MODEL_ID"),
            new StringField("NAME", [ "required" => true ]),
            new StringField("YEAR", [ "required" => true ]),
            new FloatField("PRICE", [ "required" => true ]),
            (new ReferenceField("MODEL", ModelTable::class, Join::on("this.MODEL_ID", "ref.ID")))->configureJoinType("inner"),
            (new ManyToMany("OPTIONS", OptionTable::class))->configureTableName("ibs_laptops_laptops_options"),
        ];
    }
}