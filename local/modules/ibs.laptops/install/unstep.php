<?php 
    Bitrix\Main\Localization\Loc::loadMessages(__FILE__);
?>
<form action="<?echo $APPLICATION->GetCurPage()?>" name="form1" method="post">
	<?=bitrix_sessid_post()?>
	<input type="hidden" name="lang" value="<?echo LANG?>" />
	<input type="hidden" name="id" value="ibs.laptops" />
	<input type="hidden" name="uninstall" value="Y">
	<input type="hidden" name="step" value="2" />
	<?= Bitrix\Main\Localization\Loc::getMessage("IBS.REMOVE_TABLE_LABLE")?>: <input type="checkbox" name="removeTables"/>
	<input type="submit" name="inst" value="<?echo GetMessage("MOD_UNINST_DEL")?>" />
</form>