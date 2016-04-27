<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if(sizeof($arResult["ITEMS"])>0):?>
<div class="news-box">
<strong class="title"><?=GetMessage("NEWS");?></strong>
	<ul class="news">
<?$i = 400;?>
<?foreach($arResult["ITEMS"] as $key=>$arItem):?>
	<li class="pright" data-delay="<?=$i;?>">
	<a href="/press/<?if($arItem["IBLOCK_SECTION_ID"]==1){?>news<?}else{?>seminars<?}?>/<?=$arItem["CODE"]?>/">
		<em><?=$arItem["DISPLAY_ACTIVE_FROM"]?></em>
		<span><?=$arItem["NAME"]?></span>
		<p><?=$arItem["PREVIEW_TEXT"]?></p></a></li>
<?$i +=400;?>
<?endforeach;?>
	</ul>
	<a href="/press/" class="btn-all"><?=GetMessage("ALL_NEWS");?></a>
</div>
<?endif;?>