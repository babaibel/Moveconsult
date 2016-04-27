<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$arrayStyle = array(
	0 => "width: 203px; top: -112px; left: 162px;",
	1 => "top: 40px; right: -285px;",
	2 => "top:218px;right:-354px;",
	3 => "top:405px;right: -282px;",
	4 => "left: 160px; width: 235px; top: 483px;",
	5 => "top:405px;left:-136px;text-align: right;",
	6 => "top:218px;left:-270px;text-align: right;",
	7 => "top:40px;left:-180px;text-align: right;",
);?>

<div class="menu-box">
	<div class="menu">
		<?foreach($arResult["ITEMS"] as $key=>$value):?>
			<div class="block<?if($key==0):?> active<?endif;?>">
				<?/*<a href="<?=$value["DETAIL_PAGE_URL"];?>"><?=strip_tags($value["~NAME"]);?></a>*/?>
				<div class="h100p">
					<div class="table h100p">
						<div class="table-cell">
							<b><?=$value["PREVIEW_TEXT"];?></b>
						</div>
					</div>
				</div>
			</div>
		<?endforeach;?>
		<div>
		<?$i = 200;?>
		<?foreach($arResult["ITEMS"] as $key=>$value):?>
			<a href="<?=$value["DETAIL_PAGE_URL"];?>" class="item animation<?if($key==0):?> active<?endif;?>" data-animation="pop-up" data-delay="<?=$i;?>" style="<?=$arrayStyle[$key]?>">
			<?if($key==0):?>
				<strong class="text<?=$key?>"><?=$value["~NAME"]?></strong><br>
			<?endif;?>
			<?if($key==5 or $key==6 or $key==7):?>
				<strong class="text<?=$key?>"><?=$value["~NAME"]?></strong>
			<?endif;?>
				<span class="img-holder alignleft <?if($key==0):?>center-element-top<?endif;?> <?if($key==4):?>center-element-bottom<?endif;?>">
					<span>
					<img class="img-1" src="<?=$value["PREVIEW_PICTURE"]["SRC"]?>" width="<?=$value["PREVIEW_PICTURE"]["WIDTH"]?>" height="<?=$value["PREVIEW_PICTURE"]["HEIGHT"]?>" />
					<img class="img-2" src="<?=$value["DETAIL_PICTURE"]["SRC"]?>" width="<?=$value["DETAIL_PICTURE"]["WIDTH"]?>" height="<?=$value["DETAIL_PICTURE"]["HEIGHT"]?>" />
					</span>
				</span>
			<?if($key==4):?>
				<strong class="text<?=$key?>"><?=$value["~NAME"]?></strong>
			<?endif;?>
			<?if($key==1 or $key==2 or $key==3):?>
				<br><strong class="text<?=$key?>"><?=$value["~NAME"]?></strong>
			<?endif;?>
			</a>
		<?$i += 200;?>
		<?endforeach;?>
		</div>
	</div>
</div>