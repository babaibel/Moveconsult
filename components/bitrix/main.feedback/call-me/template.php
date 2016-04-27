<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */
?>
<?
if($arParams["FORM_NAME"]):
    $nameForm = $arParams["FORM_NAME"];
else:
    $nameForm = 'CallMe';
endif;
?>
<?
if($arParams["FORM_TITLE"]):
    $titleForm = $arParams["FORM_TITLE"];
else:
    $titleForm = 'Заказ звонка';
endif;
?>
<script type="text/javascript">
    $(document).ready(function(){

        var path<?=$nameForm?> = '<?=$templateFolder?>/ajax/ajax.php';
        $('#<?=$nameForm?> input[name=phone]').mask("+7 (999) 999-9999", {placeholder: " "});

        $('#<?=$nameForm?> input,#<?=$nameForm?> textarea').click(function()
        {
            $(this).removeClass('no-valid');
        });

        $(document).on("submit",'#<?=$nameForm?>',function() {return false;});
        $(document).on("click",'#<?=$nameForm?> input[name=submit]',function() {
            var errorOrder = 0;
            if($('#<?=$nameForm?> input[name=phone]').val()=='') {
                errorOrder++;
                $('#<?=$nameForm?> input[name=phone]').addClass('no-valid');
            }
            if($('#<?=$nameForm?> input[name=name]').val()=='') {
                errorOrder++;
                $('#<?=$nameForm?> input[name=name]').addClass('no-valid');
            }
            var NAME = $('#<?=$nameForm?> input[name=name]').val();
            var PHONE = $('#<?=$nameForm?> input[name=phone]').val();
            var TEXT = $('#<?=$nameForm?> textarea[name=MESSAGE]').val();
            var TYPE_FORM = '<?=$titleForm?>';
            if(errorOrder == 0){
                $('input').removeClass('no-valid');
                var TIME = "<?=date('d.m.Y H:i:s')?>";
                var DATE = "<?=date('d.m.Y')?>";
                $.post(path<?=$nameForm?>, {
                        TYPE_FORM:TYPE_FORM,
                        NAME:NAME,
                        PHONE:PHONE,
                        TEXT:TEXT,
                        DATE:DATE,
                        TIME:TIME

                    },
                    function (data) {
                        //console.log(data)
                        $("#<?=$nameForm?> input[name=phone]").val("");
                        $("#<?=$nameForm?> input[name=name]").val("");
                        $("#<?=$nameForm?> textarea[name=MESSAGE]").val("");
                        $("#<?=$nameForm?> input[name=submit]").val('Отправлено!')
                    }
                );
            }

            return false;
        });
    });
</script>
<div class="mfeedback">
<form id="<?=$nameForm?>" action="<?=POST_FORM_ACTION_URI?>" method="POST">
<?=bitrix_sessid_post()?>
	<div class="mf-name">
		<div class="mf-text">
			<?=GetMessage("MFT_NAME")?><?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("NAME", $arParams["REQUIRED_FIELDS"])):?><span class="mf-req">*</span><?endif?>
		</div>
		<input type="text" name="name" value="<?=$arResult["AUTHOR_NAME"]?>">
	</div>
	<div class="mf-phone">
		<div class="mf-text">
			<?=GetMessage("MFT_PHONE")?><span class="mf-req">*</span>
		</div>
		<input type="text" name="phone" value="">
	</div>

	<div class="mf-message">
		<div class="mf-text">
			<?=GetMessage("MFT_MESSAGE")?>
		</div>
		<textarea name="MESSAGE" rows="5" cols="40"><?=$arResult["MESSAGE"]?></textarea>
	</div>

	<?if($arParams["USE_CAPTCHA"] == "Y"):?>
	<div class="mf-captcha">
		<div class="mf-text"><?=GetMessage("MFT_CAPTCHA")?></div>
		<input type="hidden" name="captcha_sid" value="<?=$arResult["capCode"]?>">
		<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["capCode"]?>" width="180" height="40" alt="CAPTCHA">
		<div class="mf-text"><?=GetMessage("MFT_CAPTCHA_CODE")?><span class="mf-req">*</span></div>
		<input type="text" name="captcha_word" size="30" maxlength="50" value="">
	</div>
	<?endif;?>
	<input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
	<input style="margin: 20px auto 0px; display: block;" type="submit" name="submit" value="<?=GetMessage("MFT_SUBMIT")?>">
</form>
</div>