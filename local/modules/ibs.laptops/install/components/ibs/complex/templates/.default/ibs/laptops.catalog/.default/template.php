<?php
$collection = $arResult["COLLECTION"]->fetchCollection();

\Bitrix\Main\UI\Extension::load("ui.bootstrap4");

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
<?php if ($arResult["COLLECTION"]->getCount() <= 0) { ?>
   <div>По вашему запросу ничего не найдено</div>
<?php } else if ($arResult["TYPE"] == "VENDOR") { ?>

      <div>
      <?php foreach ($collection as $vendor) { ?>
         <?php $vendor->fillModels(); ?>
            <a class="btn btn-primary text-white" href="<?= $arParams["SEF_FOLDER"] ?><?= $vendor->getId() ?>/">
            <?= $vendor->getName(); ?>
               <span class="badge badge-primary">
               <?= $vendor->getModels()->count(); ?>
               </span>
            </a>
      <?php } ?>
      </div>
<?php } else if ($arResult["TYPE"] == "MODEL") { ?>
         <div>
      <?php foreach ($collection as $model) { ?>
         <?php $model->fillLaptops(); ?>
               <a class="btn btn-primary text-white"
                  href="<?= $arParams["SEF_FOLDER"] ?><?= $model->getVendorId() ?>/<?= $model->getId() ?>/">
            <?= $model->getName(); ?>
                  <span class="badge badge-primary">
               <?= $model->getLaptops()->count(); ?>
                  </span>
               </a>
      <?php } ?>
         </div>
<?php } else if ($arResult["TYPE"] == "LAPTOP") { ?>

            <div class="container">
               <div class="row">
         <?php foreach ($collection as $laptop) { ?>
                     <div class="col-6 mb-2">
                        <div class="card">
                           <div class="card-header">
                     <?= $laptop->getName() ?>
                           </div>
                           <div class="card-body">
                              <h5 class="card-title">
                        <?= $laptop->getPrice() ?>
                              </h5>
                              <a class="card-link" href="<?= $arParams["SEF_FOLDER"] ?>detail/<?= $laptop->getId() ?>/">Посмотреть</a>
                           </div>
                        </div>
                     </div>
         <?php } ?>

               </div>
            </div>
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