<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//if($APPLICATION->sDocPath2!="/about/index.php"):?>
	<?//=GetMessage("TOP_DES");?>
<?//endif;?>
<?if (!empty($arResult)):?>
	<ul class="main-menu">
	<?foreach($arResult as $arItem):?>
		<?if ($arItem["PERMISSION"] > "D"):?>
			<li<?if(!empty($arItem["SELECTED"])):?> class="active"<?endif;?>><a onclick="nextPage('<?=$arItem["LINK"]?>');" href="javascript:void(0)"><?=$arItem["TEXT"]?></a></li>
			
			<?if(!empty($arItem["SELECTED"])):
				$APPLICATION->AddChainItem($arItem["TEXT"], $arItem["LINK"]);
			endif;?>
			
		<?endif?>
	<?endforeach?>
	</ul>
<?endif?>