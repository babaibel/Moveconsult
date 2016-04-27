<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if(sizeof($arResult["ITEMS"])>0):?>
<div class="news-cols">
	<div class="wrap">
		<div class="col">
			<ul class="news">
<?foreach($arResult["ITEMS"] as $key=>$value):?>
	<?//if($key%3 == 0):?>
	<?//endif;?>
		<li><a href="<?=$value["DETAIL_PAGE_URL"];?>"><em><?=$value["DISPLAY_ACTIVE_FROM"]?></em><span><?=$value["NAME"];?></span>
			<div><?=TruncateText($value["PREVIEW_TEXT"],100);?></div></a></li>
	<?
	//$key++;
	//if($key%3 == 0):?>
			
	<?//endif;?>
<?endforeach;?>
			</ul>
		</div>
<?if($arParams["COUNT_PAGE"]>1):?>
	<div id="ajax_next_news2"></div>
<?endif;?>

	</div>
	<?if($arParams["COUNT_PAGE"]>1):?>
		<?$datefilter = "";
		if(isset($_REQUEST["date"]))
			$datefilter = $_REQUEST["date"];
		?>
		
		<a href="javascript:void(0)" id="btn-show2" onclick="next_news(<?=$arParams["COUNT_PAGE"];?>,2,'<?=$datefilter;?>')" class="btn-show"><?=GetMessage("NEWS_NEWXT");?></a>
	<?endif;?>
</div>



<?endif;?>