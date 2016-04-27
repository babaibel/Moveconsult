<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$i=1000;?>
<div class="counters">
<?foreach($arResult["ITEMS"] as $key=>$value):?>
	<li class="pleft" data-delay="<?=$i;?>">
		<strong><?=$value["NAME"]?></strong>
		<span><?=$value["PREVIEW_TEXT"]?></span>
	</li>
<?$i-=200;?>
<?endforeach;?>
</div>