<?php

namespace Ibs\Laptops;

/**
 * Class ModelTable
 *
 * @package Bitrix\Data
 */

use Bitrix\Main\Entity\DataManager;
use Bitrix\Main\Entity\IntegerField;
use Bitrix\Main\Entity\Query\Join;
use Bitrix\Main\Entity\StringField;
use Bitrix\Main\Entity\ReferenceField;
use Bitrix\Main\ORM\Fields\Relations\OneToMany;

class ModelTable extends DataManager
{
    public static function getTableName()
    {
        return "ibs_laptops_model";
    }

    public static function getMap()
    {
        return [
            new IntegerField("ID", [ "primary" => true, "autocomplete" => true ]),
            new IntegerField("XML_ID", ["default_value" => 0]),
            new StringField("NAME", [ "required" => true ]),
            new IntegerField("VENDOR_ID"),
            (new ReferenceField("VENDOR", VendorTable::class, Join::on("this.VENDOR_ID", "ref.ID"), [ "required" => true ]))->configureJoinType("inner"),
            (new OneToMany("LAPTOPS", LaptopTable::class, "MODEL"))->configureJoinType("inner"),
        ];
    }
}
