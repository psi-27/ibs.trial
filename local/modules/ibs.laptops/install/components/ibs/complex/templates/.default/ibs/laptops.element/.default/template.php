<?php
$laptopEO = $arResult["COLLECTION"]->fetchObject();
$laptopEO->getModel()->fillVendor();
?>


<div>
   <h4><?=$laptopEO->getName()?></h4>
   <div>Цена: <?=$laptopEO->getPrice()?></div>
   <div>Производитель: <strong><?=$laptopEO->getModel()->getVendor()->getName()?></strong></div>
   <div>Модель: <strong><?=$laptopEO->getModel()->getName()?></strong></div>
   <div>Год выпуска: <strong><?=$laptopEO->getYear()?></strong></div>
   <br/>
   <div>
      <strong>Дополнительные опции:</strong>
      <? foreach($laptopEO->getOptions() as $option) { ?>
         <div><?=$option->getName()?></div>
      <? } ?>
   </div>
</div>