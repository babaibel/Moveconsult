<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$APPLICATION->AddChainItem(strip_tags($arResult["~NAME"]), $arResult["DETAIL_PAGE_URL"]);?>
<div class="service-page-inner">
<a name="top"></a>
<div class="menu-box ">
	<ul class="menu-line">
	<?foreach($arResult["ALLSECTION"] as $key=>$value):?>
		<li<?if($value["ID"]==$arResult["ID"]):?> class="active"<?endif;?>>
			<a href="javascript:void(0)" onclick="nextPage('<?=$value["DETAIL_PAGE_URL"]?>');" title="<?=$value["NAME"]?>">
				<img class="img-1" src="<?=$value["DETAIL_PICTURE"]?>" />
				<img class="img-2" src="<?=$value["PREVIEW_PICTURE"]?>" />
			</a>
			
		</li>
		<?if($value["ID"]==$arResult["ID"]):
		//print $key;
			if($key==0):
				$prev = 7;
				$next = 1;
			else:
				$prev = $key-1;
				$next = $key+1;
					if($next==8)
						$next = 0;
			endif;
		endif;
		?>
		
	<?endforeach;?>
	</ul>
</div>
<? //if ($USER->IsAdmin()) {echo '<pre>';print_r($arResult);echo '</pre>';} ?>
<div class="text-galleryPage">
	<a onclick="nextPage('<?=$arResult["ALLSECTION"][$next]["DETAIL_PAGE_URL"]?>');" href="javascript:void(0)" class="next"></a>
	
	<a onclick="nextPage('<?=$arResult["ALLSECTION"][$prev]["DETAIL_PAGE_URL"]?>');" href="javascript:void(0)" class="prev"></a>
	<div class="gallery-holder">
		<ul class="flipsnap">
			<li>
<div class="text-box">
	<h2><?=strip_tags($arResult["~NAME"]);?></h2>
	<p><?=$arResult["DETAIL_TEXT"];?></p>
</div>
<?if(isset($arResult["PROPERTIES"]["CML2"]["VALUE_RES"])):?>
<h3 style="text-align:left;text-transform: none;">Перечень услуг по данному направлению:</h3>
<ul class="vacancy">
<?foreach($arResult["PROPERTIES"]["CML2"]["VALUE_RES"] as $key=>$value):?>
	<li<?/*if($key==0):?> class="active"<?endif;*/?>>
		<div class="heading">
			<a href="#" class="opener"><span><?=$value["NAME"]?></span></a>
		<?//if($key==0):?>
			<a href="#" class="close"></a>
		<?//endif;?>
                        <div class="clear"></div>
		</div>
		<div class="box<?//if($key!=0):?>  hide<?//endif;?> empty">
			<?if($value["DETAIL_TEXT"]){?>
				<div class="box-in"><?=$value["DETAIL_TEXT"]?></div>
			<?}?>
		</div>
	</li>
<?endforeach;?>
</ul>
<?endif;?>
			</li>
		</ul>
	</div>
</div>

<div class="menu-box" style="margin-bottom: 0px;">
	<ul class="menu-line">
	<?foreach($arResult["ALLSECTION"] as $key=>$value):?>
		<li<?if($value["ID"]==$arResult["ID"]):?> class="active"<?endif;?>>
			<a href="#top" onclick="nextPage('<?=$value["DETAIL_PAGE_URL"]?>');"  title="<?=$value["NAME"]?>">
				<img class="img-1" src="<?=$value["DETAIL_PICTURE"]?>" />
				<img class="img-2" src="<?=$value["PREVIEW_PICTURE"]?>" />
			</a>
		</li>
		<?if($value["ID"]==$arResult["ID"]):
		//print $key;
			if($key==0):
				$prev = 7;
				$next = 1;
			else:
				$prev = $key-1;
				$next = $key+1;
					if($next==8)
						$next = 0;
			endif;
		endif;
		?>
		
	<?endforeach;?>
	</ul>
</div>
</div>