<?php

\Bitrix\Main\UI\Extension::load("ui.bootstrap4");

$laptopEO = $arResult["COLLECTION"]->fetchObject();
$laptopEO->getModel()->fillVendor();

$APPLICATION->AddChainItem("Производители", $arParams["SEF_FOLDER"].$laptopEO->getModel()->getVendor()->getId());
$APPLICATION->AddChainItem("Модели", $arParams["SEF_FOLDER"].$laptopEO->getModel()->getVendor()->getId().'/'.$laptopEO->getModel()->getId().'/');
$APPLICATION->AddChainItem($laptopEO->getName());
?>

<div>
<?php
   $APPLICATION->IncludeComponent(
      "bitrix:breadcrumb",
      "",
      array(
         "START_FROM" => "0", 
         "PATH" => "", 
         "SITE_ID" => "s1" 
      ),
      false
   );
   ?>
</div>

<div class="card">
   <div class="card-header h5">
      <?=$laptopEO->getName()?> (<?=$laptopEO->getYear()?>)
   </div>
   <div class="card-body">
      <div>Цена: <?=$laptopEO->getPrice()?></div>
      <div>Производитель: <strong><?=$laptopEO->getModel()->getVendor()->getName()?></strong></div>
      <div>Модель: <strong><?=$laptopEO->getModel()->getName()?></strong></div>
      <br/>
      <div class="list-group">
         <div li class="list-group-item"><strong>Дополнительные опции:</strong></div>
         <? foreach($laptopEO->getOptions() as $option) { ?>
            <div li class="list-group-item"><?=$option->getName()?></div>
         <? } ?>
      </div>
   </div>
</div>