<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$APPLICATION->AddChainItem($arResult["NAME"]);?>
<?if(strpos($_SERVER["REQUEST_URI"], 'press/seminars')!==false){?>
<script src="/bitrix/templates/moveconsulting/js/jquery.scrollTo-min.js"></script>
<?}?>


<div class="press-detail <?if(strpos($_SERVER["REQUEST_URI"], 'news')!==false){?>news-new<?}else{?>seminars-new<?}?>">
	<?if(strpos($_SERVER["REQUEST_URI"], 'news')!==false){?>
		<em><?=$arResult["DISPLAY_ACTIVE_FROM"];?></em>
	<?}else{?>
		<?if(strlen(trim($arResult["PROPERTIES"]["TIME"]["VALUE"]))){?><em><?=$arResult["PROPERTIES"]["TIME"]["VALUE"]?></em><?}?>
	<?}?>
	
	<h2><?=$arResult["NAME"];?></h2>
	
	<?=$arResult["DETAIL_TEXT"];?>
	
	<?if(strpos($_SERVER["REQUEST_URI"], 'press/seminars')!==false){?>
	
	<?if(strlen(trim($arResult["PROPERTIES"]["WHOM"]["VALUE"]["TEXT"]))){?><div class="whom"><?=html_entity_decode($arResult["PROPERTIES"]["WHOM"]["VALUE"]["TEXT"])?></div><?}?>
	
	<?if(strlen(trim($arResult["PROPERTIES"]["BENEFIT"]["VALUE"]["TEXT"]))){?><div class="benefit"><?=html_entity_decode($arResult["PROPERTIES"]["BENEFIT"]["VALUE"]["TEXT"])?></div><?}?>
	
	<div class="block prices">
		<?if(strlen(trim($arResult["PROPERTIES"]["PRICE"]["VALUE"]))){?>
			<div class="price left">
				<div class="price-s">Стоимость семинара</div>
				<div class="price-c left"><?=html_entity_decode($arResult["PROPERTIES"]["PRICE"]["VALUE"])?></div>
				<div class="price-r left"></div>
				<div class="clear"></div>
				<a href="#seminars" class="price-reg block">Регистрация</a>
			</div>
		<?}?>
		
		<div class="pay-prog left">
		<?if(strlen(trim($arResult["PROPERTIES"]["PAY"]["VALUE"]["TEXT"]))){?>
			<div class="pay left">
				<h3>Способы оплаты</h3>
				<div><?=html_entity_decode($arResult["PROPERTIES"]["PAY"]["VALUE"]["TEXT"])?></div>
			</div>
		<?}?>
		<?if(strlen(trim($arResult["PROPERTIES"]["PROGRAM"]["VALUE"]["TEXT"]))){?>
			<div class="prog left">
				<h3>Программа семинара</h3>
				<div><?=html_entity_decode($arResult["PROPERTIES"]["PROGRAM"]["VALUE"]["TEXT"])?></div>
			</div>
		<?}?>
		</div>
	</div>
	
	<?if(strlen(trim($arResult["PROPERTIES"]["DESC"]["VALUE"]["TEXT"]))){?><div class="benefit desc"><?=html_entity_decode($arResult["PROPERTIES"]["DESC"]["VALUE"]["TEXT"])?></div><?}?>
	
	<div class="block prices">
	<?if(strlen(trim($arResult["PROPERTIES"]["PRICE"]["VALUE"]))){?>
			<div class="price left">
				<div class="price-s">Стоимость семинара</div>
				<div class="price-c left"><?=html_entity_decode($arResult["PROPERTIES"]["PRICE"]["VALUE"])?></div>
				<div class="price-r left"></div>
				<div class="clear"></div>
				<a href="#seminars" class="price-reg block">Регистрация</a>
			</div>
		<?}?>
	<?if(strlen(trim($arResult["PROPERTIES"]["PART"]["VALUE"]["TEXT"]))){?><div class="part left"><h3>Для участия в семинаре необходимо:</h3><?=html_entity_decode($arResult["PROPERTIES"]["PART"]["VALUE"]["TEXT"])?></div><?}?>
	</div>
	
	<div class="block partner-p">
		<?if(strlen(trim($arResult["PROPERTIES"]["PARTNER"]["VALUE"]))){?>
			<div class="partner left">
				<h3>Партнер</h3>
				<img src="<?=CFile::GetPath($arResult["PROPERTIES"]["PARTNER"]["VALUE"]);?>" />
			</div>
		<?}?>
		<?if(strlen(trim($arResult["PROPERTIES"]["PLACE"]["VALUE"]["TEXT"]))){?><div class="place left"><?=html_entity_decode($arResult["PROPERTIES"]["PLACE"]["VALUE"]["TEXT"])?></div><?}?>
	</div>
	
	<div id="seminars" class="seminars-form">
		<form enctype="multipart/form-data" action="/include/ajax_sem.php" name="seminars" method="POST" class="jClever" id="seminars-form">
			<div class="form-box">
				<strong class="title">РЕГИСТРАЦИЯ НА СЕМИНАР</strong>
				<div class="wrapf block"> 
					<div class="alignleft">
						<label>ФИО</label>
						<input name="name" type="text" value="" class="text" id="lab1">
					</div>
					<div class="alignright">
						<label>Телефон</label>
						<input name="phone" type="text" value="" class="text" id="lab2">
					</div>
				</div>
				<div class="wrapf block">
					<div class="alignleft">
						<label>Компания</label>
						<input name="comp" type="text" value="" class="text" id="lab3">
					</div>
					<div class="alignright">
						<label>Направление деятельности</label>
						<input name="deyt" type="text" value="" class="text" id="lab4">
					</div>
				</div>
				<div class="wrapf block">
					<div class="alignleft">
						<label>Должность</label>
						<input name="dol" type="text" value="" class="text" id="lab5">
					</div>
					<div class="alignright">
						<label>Email</label>
						<input name="email" type="text" value="" class="text incorrect" id="lab6">
					</div>
				</div>
				<div class="wrapf block">
					<label for="lab4">Откуда Вы узнали о семинаре?</label>
					<select id="sem-select" name="sem-select">
						<option value="Выбрать ответ">Выбрать ответ</option>
						<option value="Из рассылки компании Мувконсалтинг">Из рассылки компании Мувконсалтинг</option>
						<option value="От сотрудников компании Мувконсалтинг">От сотрудников компании Мувконсалтинг</option>
						<option value="От партнёров компании Мувконсалтинг">От партнёров компании Мувконсалтинг</option>
						<option value="Из рассылки Сбербанка">Из рассылки Сбербанка</option>
						<option value="Из социальных сетей">Из социальных сетей</option>
						<option value="От знакомых">От знакомых</option>
						<option value="Другое">Другое</option>
					</select>
				</div>
				<div class="wrap">
					<?$code=$APPLICATION->CaptchaGetCode();?>
					<div class="alignleft">
						<label for="lab2">Captcha</label>
						<input type="hidden" name="captcha_sid" value="<?=$code;?>" />
						<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$code;?>" alt="CAPTCHA" style="margin-top: 5px; height: 42px; border: 3px solid rgb(255, 255, 255);"/>
													
					</div>
					<div class="alignright">
						<label for="lab2">Код с картинки</label>
						<input type="text" id="keystring" name="captcha_word" size="25" class="text">
					</div>
				</div>
				<div class="wrapf" style="text-align: center">
					<input type="submit" value="ЗАРЕГИСТРИРОВАТЬСЯ" class="btn-send">
				</div>
			</div>
		</form>
	</div>
	
	<div class="sem-bottom">
		<h3>ОСТАЛИСЬ ВОПРОСЫ?</h3>
		
		<table> 
		<tbody> 
		<tr>
		<td style="padding-right:30px"> 
		Звоните!  <b>+7 (495) 66-99-22-7</b>
		</td> 
		<td>
		Пишите! <a href="mailto:info@moveconsult.ru"><b>info@moveconsult.ru</b></a>
		</td> 
		</tr>
		</tbody>
		</table>
			<br/>
		Ждём Вас на нашем семинаре!
	</div>

	<?}else{?>
	<div style="text-align:center; width:100%; margin-top:60px">
		<a href="/press/" class="btn-all"><?=GetMessage("ALLNEWS");?></a>
	</div>
	<?}?>
</div>

<script>
$(document).ready(function(){
	$('.prog table tr').each(function(){
		$(this).find('td:first').addClass('first');
	});
	$('.prog table tr:even').addClass('even');
	
	if(!$('html.ipad,html.iphone,html.android').size())
		$('.price-reg').click(function(){$.scrollTo('#seminars', 600); return false});
});
window.onload=function(){$('.jClever-element-select-list li:first').remove()}
</script>