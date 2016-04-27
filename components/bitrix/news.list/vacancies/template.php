<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="text-gallery">
	<div class="gallery-holder">
		<ul class="vacancy vacancy-block">
		<?foreach($arResult["ITEMS"] as $key=>$value):?>
			<li<?if($key==0):?> class="active"<?endif;?>>
				<div class="heading">
					<a href="#" class="opener"><?=$value["NAME"];?></a>
					<a href="#" class="close"></a>
					<div class="clear"></div>
				</div>
				<div class="box<?if($key!=0):?> hide<?endif;?> empty">
					<?=$value["DETAIL_TEXT"];?>
				<form enctype="multipart/form-data" action="/include/ajax_vak.php" name="iinsert" method="POST" class="contacts-form" id="ajax_ref_cont<?=$value["ID"];?>">
					<input name="ELEMENT_NAME" type="hidden" value="<?=$value["NAME"];?>" />
				<fieldset>
					<div class="form-box">
						<strong class="title"><?=GetMessage("TITLE");?></strong>
						<div class="wrap">
							<label for="lab1"><?=GetMessage("V_NAME");?></label>
							<input name="name" type="text" value="" class="text" id="lab1" />
						</div>
						<div class="wrap">
							<div class="alignleft">
								<label for="lab2"><?=GetMessage("PHONE");?></label>
								<input name="phone" type="text" value="" class="text" id="lab2" />
							</div>
							<div class="alignright">
								<label for="lab3"><?=GetMessage("EMAIL");?></label>
								<input name="email" type="text" value="" class="text incorrect" id="lab3" />
							</div>
						</div>
						<div class="wrap">
							<label for="lab4"><?=GetMessage("PIS");?></label>
							<textarea name="text" cols="30" rows="10" id="lab4"></textarea>
						</div>
						<div class="wrap">
							<?$code=$APPLICATION->CaptchaGetCode();?>
							<div class="alignleft">
								<label for="lab2"><?=GetMessage("CAPTCHA");?></label>
								<input type="hidden" name="captcha_sid" value="<?=$code;?>" />
								<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$code;?>" alt="CAPTCHA" style="margin-top: 5px; height: 42px; border: 3px solid rgb(255, 255, 255);"/>
															
							</div>
							<div class="alignright">
								<label for="lab2"><?=GetMessage("CAPTCHA2");?></label>
								<input type="text" id="keystring" name="captcha_word" size="25" class="text">
							</div>
						</div>
						<div class="wrap">
							<div class="file">
								<a href="#"><?=GetMessage("REZ");?></a>
								<input name="file_rez" type="file" id="pic_file" />
							</div>
							<input type="submit" value="<?=GetMessage("SUBMIT");?>" class="btn-send" />
						</div>
						
					</div>
				</fieldset>
				</form>
			</div>
			</li>
		<?endforeach;?>
		<?foreach($arResult["ITEMS_N"] as $key=>$value):?>
			<li>
				<div class="heading">
					<a href="#" class="opener"><?=$value["NAME"];?></a>
					<div class="clear"></div>
				</div>
				<div class="box hide empty">
					<strong class="title"><?=GetMessage("NO_VAK");?></strong>
			</div>
			</li>
		<?endforeach;?>
		
		</ul>
	</div>
</div>