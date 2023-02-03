<?php

namespace Ibs\Laptops;

/**
 * Class LaptopsOptionsTable
 *
 * @package Bitrix\Data
 */

use Bitrix\Main\Entity\DataManager;
use Bitrix\Main\Entity\IntegerField;
use Bitrix\Main\Entity\ReferenceField;
use Bitrix\Main\ORM\Query\Join;

class LaptopsOptionsTable extends DataManager
{
    public static function getTableName()
    {
        return "ibs_laptops_laptops_options";
    }

    public static function getMap()
    {
        return [
            new IntegerField("LAPTOP_ID", ["primary" => true]),
            (new ReferenceField("LAPTOP", LaptopTable::class, Join::on("this.LAPTOP_ID", "ref.ID"))),
            new IntegerField("OPTION_ID", ["primary" => true]),
            (new ReferenceField("OPTION", OptionTable::class, Join::on("this.OPTION_ID", "ref.ID"))),
        ];
    }
}
