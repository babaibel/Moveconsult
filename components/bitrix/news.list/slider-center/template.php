<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="visual-box">
	<div class="visual-holder">
		<div class="container relative">
			<a href="#" class="next"></a>
			<a href="#" class="prev"></a>	
		</div>
		
		<ul class="visual">
		<?$i = "";?>
		<?foreach($arResult["ITEMS"] as $key=>$value):
			if($value["PREVIEW_PICTURE"]["SRC"]){
				$bg = $value["PREVIEW_PICTURE"]["SRC"];
			}else{
				$bg = SITE_TEMPLATE_PATH.'/images/bg-error.jpg';
			}
			?>
			<li style="background: #00009b url(<?=$bg?>) center center no-repeat;">
				<div id="video<?=$i;?>">
					<span class="blue-bg"></span>
				</div>
				<div class="box">
					<?/*
					<ul class="socials">
						<li><a href="#" class="vk"></a></li>
						<li><a href="#" class="fb"></a></li>
						<li><a href="#" class="tw"></a></li>
					</ul>*/?>
					<strong class="title"><?=$value["NAME"]?></strong>
					<div class="slider-line"></div>
					<div class="text">
						<?=$value["PREVIEW_TEXT"]?>
					</div>
					<?if($value["PROPERTIES"]["LINK"]["VALUE"]){
						if($value["PROPERTIES"]["LINK_TEXT"]["VALUE"]){
							$text = $value["PROPERTIES"]["LINK_TEXT"]["VALUE"];
						}else{
							$text = GetMessage("LINK_NEXT");
						}	
						?>
					<div class="btn-more-box">
						<a href="<?=$value["PROPERTIES"]["LINK"]["VALUE"];?>" class="btn-more"><?=$text;?></a>
					</div>
					<?}?>
				</div>
			</li>
			<?if(empty($i))
				$i = 1;
			else
				$i++;
			?>
		<?endforeach;?>
		</ul>
		<div class="switcher">
			<ul>
		<?foreach($arResult["ITEMS"] as $key=>$value):?>
<li<?if($key==0):?> class="active"<?endif;?>><a href="#"><?=($key+1);?></a></li>
		<?endforeach;?>
			</ul>
		</div>
	</div>
</div>
<? // if ($USER->IsAdmin()) {echo '<pre>';print_r($arResult);echo '</pre>';} ?>