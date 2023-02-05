<?php 
    Bitrix\Main\Localization\Loc::loadMessages(__FILE__);
?>
<form action="<?echo $APPLICATION->GetCurPage()?>" name="form1" method="post">
	<?=bitrix_sessid_post()?>
	<input type="hidden" name="lang" value="<?echo LANG?>" />
	<input type="hidden" name="id" value="ibs.laptops" />
	<input type="hidden" name="install" value="Y" />
	<input type="hidden" name="step" value="2" />
	<?= Bitrix\Main\Localization\Loc::getMessage("IBS.RECREATE_TABLE_LABLE")?>: <input type="checkbox" name="recreateTables"/>
	<input type="submit" name="inst" value="<?echo GetMessage("MOD_INSTALL")?>" />
</form>