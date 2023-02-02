<?php

use Bitrix\Main\Application;
use Bitrix\Main\Loader;
use Bitrix\Main\Entity\Base;
use Ibs\Laptops\LaptopsOptionsTable;
use Ibs\Laptops\OptionTable;
use Ibs\Laptops\VendorTable;
use Ibs\Laptops\ModelTable;
use Ibs\Laptops\LaptopTable;

class Ibs_Laptops extends CModule
{
    public $MODULE_ID = 'ibs.laptops';
    public $MODULE_VERSION = '1.0.1';
    public $MODULE_VERSION_DATE = '2020-07-30 00:00:00';
    public $MODULE_NAME = 'Ibs Laptops';
    public $MODULE_DESCRIPTION = 'Laptops catalog';
    public $MODULE_GROUP_RIGHTS = 'N';

    public function __construct()
    {

    }

    function DoInstall()
    {
        RegisterModule('ibs.laptops');

        $this->installDB();
        $this->InstallFiles();
    }

    function DoUninstall()
    {
        $this->uninstallDB();
        $this->DeleteFiles();
        UnRegisterModule('ibs.laptops');
    }

    public function installDB()
    {
        if (Loader::includeModule($this->MODULE_ID)) {
            VendorTable::getEntity()->createDbTable();
            ModelTable::getEntity()->createDbTable();
            LaptopsOptionsTable::getEntity()->createDbTable();
            LaptopTable::getEntity()->createDbTable();
            OptionTable::getEntity()->createDbTable();

            $tdata = new DOMDocument();
            $tdata->load($_SERVER["DOCUMENT_ROOT"] . "/local/modules/ibs.laptops/install/test.data/laptops.xml");
            $xpath = new DOMXPath($tdata);

            foreach ($xpath->query("*/vendor") as $vendor) {
                VendorTable::add(["NAME" => $vendor->nodeValue, "XML_ID" => $vendor->attributes->getNamedItem("id")->nodeValue]);
            }

            foreach ($xpath->query("*/model") as $model) {
                $vendor = VendorTable::getList(["filter" => ["=XML_ID" => $model->attributes->getNamedItem("vendor")->nodeValue]])->fetchObject();
                ModelTable::add([
                    "NAME" => $model->nodeValue,
                    "XML_ID" => $model->attributes->getNamedItem("id")->nodeValue,
                    "VENDOR" => $vendor,
                ]);
            }

            foreach ($xpath->query("*/option") as $option) {
                OptionTable::add([
                    "XML_ID" => $option->attributes->getNamedItem("id")->nodeValue,
                    "NAME" => $option->nodeValue,
                ]);
            }

            foreach ($xpath->query("*/laptop") as $laptop) {
                $model = ModelTable::getList(["filter" => ["=XML_ID" => $laptop->attributes->getNamedItem("model")->nodeValue]])->fetchObject();
                LaptopTable::add([
                    "NAME" => $xpath->query("name", $laptop)->item(0)->nodeValue,
                    "XML_ID" => $laptop->attributes->getNamedItem("id")->nodeValue,
                    "MODEL" => $model,
                    "YEAR" => $xpath->query("year", $laptop)->item(0)->nodeValue,
                    "PRICE" => $xpath->query("price", $laptop)->item(0)->nodeValue,
                ]);
            }

            foreach ($xpath->query("*/laptop/options/option") as $laptopOption) {
                $laptopXmlId = $laptopOption->parentNode->parentNode->attributes->getNamedItem("id")->nodeValue;
                $laptopEO = LaptopTable::getList(["filter" => ["=XML_ID" => $laptopXmlId]])->fetchObject();
                $optionEO = OptionTable::getList(["filter" => ["=XML_ID" => $laptopOption->attributes->getNamedItem("id")->nodeValue]])->fetchObject();
                $laptopEO->addToOptions($optionEO);
                $laptopEO->save();
            }

        }
    }

    public function uninstallDB()
    {
        if (Loader::includeModule($this->MODULE_ID)) {
            if (Application::getConnection()->isTableExists(Base::getInstance('Ibs\Laptops\VendorTable')->getDBTableName())) {
                $connection = Application::getInstance()->getConnection();
                $connection->dropTable(VendorTable::getTableName());
            }
            if (Application::getConnection()->isTableExists(Base::getInstance('Ibs\Laptops\ModelTable')->getDBTableName())) {
                $connection = Application::getInstance()->getConnection();
                $connection->dropTable(ModelTable::getTableName());
            }
            if (Application::getConnection()->isTableExists(Base::getInstance('Ibs\Laptops\LaptopTable')->getDBTableName())) {
                $connection = Application::getInstance()->getConnection();
                $connection->dropTable(LaptopTable::getTableName());
            }
            if (Application::getConnection()->isTableExists(Base::getInstance('Ibs\Laptops\OptionTable')->getDBTableName())) {
                $connection = Application::getInstance()->getConnection();
                $connection->dropTable(OptionTable::getTableName());
            }
            if (Application::getConnection()->isTableExists(Base::getInstance('Ibs\Laptops\LaptopsOptionsTable')->getDBTableName())) {
                $connection = Application::getInstance()->getConnection();
                $connection->dropTable(LaptopsOptionsTable::getTableName());
            }
        }
    }

    function InstallFiles()
    {

        CopyDirFiles($_SERVER["DOCUMENT_ROOT"] . "/local/modules/ibs.laptops/install/components", $_SERVER["DOCUMENT_ROOT"] . "/local/components", true, true);
        return true;
    }

    function DeleteFiles()
    {
        Bitrix\Main\IO\Directory::deleteDirectory($_SERVER["DOCUMENT_ROOT"] . "/local/components/ibs");
        return true;
    }
}