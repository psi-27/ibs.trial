<?php
$collection = $arResult["COLLECTION"]->fetchCollection();
?>

<?php if ($arResult["COLLECTION"]->getCount() <= 0) { ?> 
         <div>По вашему запросу ничего не найдено</div>
<?php } else if ($arResult["TYPE"] == "VENDOR") { ?> 
      <?php foreach($collection as $vendor) { ?>
         <div><a href="<?=$arParams["SEF_FOLDER"]?><?=$vendor->getId()?>/"><?=$vendor->getName()?></a></div>
      <?php } ?>
<?php } else if ($arResult["TYPE"] == "MODEL") { ?> 
      <?php foreach($collection as $model) { ?>
         <div><a href="<?=$arParams["SEF_FOLDER"]?><?=$model->getVendorId()?>/<?=$model->getId()?>/"><?=$model->getName()?></a></div>
      <?php } ?>
<?php } else if ($arResult["TYPE"] == "LAPTOP") { ?> 
      <?php foreach($collection as $laptop) { ?>
         <div>
            <a href="<?=$arParams["SEF_FOLDER"]?>detail/<?=$laptop->getId()?>/"><?=$laptop->getName()?></a>&nbsp;(<?=$laptop->getYear()?>)&nbsp;<?=$laptop->getPrice()?>
         </div>
      <?php } ?>
<?php } else { ?> 
      <div>По вашему запросу ничего не найдено</div>
<?php } ?>

<?php
$APPLICATION->IncludeComponent(
   "bitrix:main.pagenavigation",
   "",
   array(
      "NAV_OBJECT" => $arResult["NAV"],
      "SEF_MODE" => "N",
   ),
   false
);
?>