<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if(sizeof($arResult["ITEMS"])>0):?>
<!--<div class="news-cols">
	<div class="wrap">-->
<?foreach($arResult["ITEMS"] as $key=>$value):?>
	<?if($key%3 == 0):?>
		<div class="col">
			<ul class="news">
	<?endif;?>
		<li><a href="<?=$value["DETAIL_PAGE_URL"];?>"><em><?=$value["DISPLAY_ACTIVE_FROM"]?></em><span><?=$value["NAME"];?></span>
			<p><?=$value["PREVIEW_TEXT"];?></p></a></li>
	<?
	$key++;
	if($key%3 == 0):?>
			</ul>
		</div>
	<?endif;?>
<?endforeach;?>
	<!--</div>-->
	<?if($arParams["COUNT_PAGE"]>$_REQUEST["PAGEN_1"]):?>
		<?$datefilter = "";
		if(isset($_REQUEST["date"]))
			$datefilter = $_REQUEST["date"];
		?>
		<a href="javascript:void(0)" id="btn-show<?=($_REQUEST["PAGEN_1"]+1);?>" onclick="next_news(<?=$arParams["COUNT_PAGE"];?>,<?=($_REQUEST["PAGEN_1"]+1);?>,'<?=$datefilter;?>')" class="btn-show"><?=GetMessage("NEWS_NEWXT");?></a>
	<?endif;?>
<!--</div>-->
	<?if($arParams["COUNT_PAGE"]>$_REQUEST["PAGEN_1"]):?>
		<div id="ajax_next_news<?=($_REQUEST["PAGEN_1"]+1);?>"></div>
	<?endif;?>
<?endif;?>