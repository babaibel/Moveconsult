<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);
	?>	
											
				</div>	
				<?
				    $page = $APPLICATION->GetCurPage();    
				    $dir = explode("/", $page);
				    if($dir[1]=='about'){?>    
					<div class="w1">
						<div class="form-callme border-top">
							<h2>Остались вопросы?</h2>
							<div class="text-form">Позвоните по телефону +7 (495) 66-99-22-7 <br>
								Или заполните форму ниже, и мы сами перезвоним.</div>
								<?$APPLICATION->IncludeFile(SITE_DIR."include/callme.php",Array(),Array("MODE"=>"html"));?>
						</div>
					</div>
					<?}?>			
			</section>
			<!-- main end --> 		
	</section>
	<!-- footer -->
	<footer>
		<div class="holder">
			<span class="copy">© Moveconsult, 2005-<?=date('Y')?><br/>
Все права защищены <br/> Мувконсалтъ® / Moveconsultъ®</span>
			<span class="dev">
				<div class="phone-footer"><img src="<?=SITE_TEMPLATE_PATH?>/images/icon-phone.png" alt=""> +7 (495) 66-99-22-7</div>
				<div class="mail"><img src="<?=SITE_TEMPLATE_PATH?>/images/icon-email.png" alt=""> info@moveconsult.ru</div>
			</span>
			<div class="row">
				<div class="menu-bottom">
					<?$APPLICATION->IncludeComponent(
							"bitrix:menu",
							"footer",
							Array(
								"ROOT_MENU_TYPE" => "footer",
								"MAX_LEVEL" => "1",
								"CHILD_MENU_TYPE" => "footer",
								"USE_EXT" => "N",
								"DELAY" => "N",
								"ALLOW_MULTI_SELECT" => "N",
								"MENU_CACHE_TYPE" => "N",
								"MENU_CACHE_TIME" => "3600",
								"MENU_CACHE_USE_GROUPS" => "Y",
								"MENU_CACHE_GET_VARS" => array()
							),
						false
						);?>
				</div>
			</div>
		</div>
		<div class="holder holder-2">
			<span class="float-l">
				<a href="javascript:void(0)" onclick="$('#ajax_polit').fadeIn();">Политика конфиденциальности</a>
			</span>
			<span class="float-r">
				Сделано с любовью в веб-студии <a target="_blank" href="http://visario.ru/?utm_source=moveconsult&utm_medium=copyright&utm_campaign=moveconsult ">Визарио</a>
			</span>
		</div>
	</footer>
	<div id="ajax_polit" class="form" style="display:none;">
		<div class="form-box" onclick="$('#ajax_polit').fadeOut();">
			<div class="close"></div>
			<strong class="title">Политика конфиденциальности</strong>
			<div class="ex_z_text">
				<div>Настоящая политика конфиденциальности распространяется на всех посетителей и пользователей сайта. Пользователю сайта необходимо внимательно ознакомиться с настоящими Условиями.</div>
				<div>Пользователь дает ООО "Мувконсалт" разрешение на обработку своих персональных данных, указываемых им в анкете, на сайтах компании.</div>
				<div>ООО "Мувконсалт" использует всю добровольно предоставленную пользователем информацию для обработки и предоставления информационных образовательных услуг.</div>
				<div>Никакая информация личного характера об отдельном пользователе не разглашается, кроме случаев, предусмотренных законом.</div>
				<div>Мувконсалт - зарегистрированный товарный знак. Все исключительные права принадлежат ООО "Мувконсалт". Любое частичное или полное копирование текстов с сайта преследуется по закону</div>
			</div>
		</div>
	</div>
	<!-- footer end -->
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
(function (d, w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter27042245 = new Ya.Metrika({id:27042245,
                    webvisor:true,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true});
        } catch(e) { }
    });

    var n = d.getElementsByTagName("script")[0],
        s = d.createElement("script"),
        f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

    if (w.opera == "[object Opera]") {
        d.addEventListener("DOMContentLoaded", f, false);
    } else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/27042245" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-72503677-1', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>