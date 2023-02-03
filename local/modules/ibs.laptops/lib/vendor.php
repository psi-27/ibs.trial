<?php

namespace Ibs\Laptops;

/**
 * Class VendorTable
 *
 * @package Bitrix\Data
 */

use Bitrix\Main\Entity\DataManager;
use Bitrix\Main\Entity\IntegerField;
use Bitrix\Main\Entity\StringField;
use Bitrix\Main\ORM\Fields\Relations\OneToMany;

class VendorTable extends DataManager
{
    public static function getTableName()
    {
        return "ibs_laptops_vendor";
    }

    public static function getMap()
    {
        return [
            new IntegerField("ID", [ "primary" => true, "autocomplete" => true ]),
            new IntegerField("XML_ID", ["default_value" => 0]),
            new StringField("NAME", [ "required" => true ]),
            (new OneToMany("MODELS", ModelTable::class, "VENDOR"))->configureJoinType("inner"),
        ];
    }
}
